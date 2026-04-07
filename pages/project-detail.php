<?php
require_once '../includes/header.php';
require_once '../includes/navbar.php';
require_once '../config/database.php';

// Lấy ID dự án từ URL
$project_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Kết nối database
$database = new Database();
$pdo = $database->getConnection();

// Lấy thông tin chi tiết dự án
$sql = "SELECT p.*, 
               CASE 
                   WHEN p.category_id = 1 THEN 'Nhà Phố'
                   WHEN p.category_id = 2 THEN 'Biệt Thự' 
                   WHEN p.category_id = 3 THEN 'Homestay'
                   ELSE 'Khác'
               END as category_name
        FROM projects p 
        WHERE p.id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $project_id, PDO::PARAM_INT);
$stmt->execute();
$project = $stmt->fetch(PDO::FETCH_ASSOC);

// Nếu không tìm thấy dự án, chuyển hướng về trang danh sách
if (!$project) {
    header('Location: ' . BASE_URL . '/pages/projects.php');
    exit;
}

// Lấy danh sách hình ảnh của dự án từ bảng project_images
$images_sql = "SELECT id, project_id, image_url, caption 
               FROM project_images 
               WHERE project_id = :project_id 
               ORDER BY id ASC";
$images_stmt = $pdo->prepare($images_sql);
$images_stmt->bindParam(':project_id', $project_id, PDO::PARAM_INT);
$images_stmt->execute();
$project_images = $images_stmt->fetchAll(PDO::FETCH_ASSOC);

// Lấy các dự án liên quan cùng danh mục
$related_sql = "SELECT p.*, 
                       CASE 
                           WHEN p.category_id = 1 THEN 'Nhà Phố'
                           WHEN p.category_id = 2 THEN 'Biệt Thự' 
                           WHEN p.category_id = 3 THEN 'Homestay'
                           ELSE 'Khác'
                       END as category_name
                FROM projects p 
                WHERE p.category_id = :category_id 
                AND p.id != :current_id 
                ORDER BY p.created_at DESC 
                LIMIT 3";
$related_stmt = $pdo->prepare($related_sql);
$related_stmt->bindParam(':category_id', $project['category_id'], PDO::PARAM_INT);
$related_stmt->bindParam(':current_id', $project_id, PDO::PARAM_INT);
$related_stmt->execute();
$related_projects = $related_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
/* Project Detail Styles */
.project-detail {
    padding: 4rem 0;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}

.project-header {
    position: relative;
    height: 60vh;
    background-size: cover;
    background-position: center;
    color: white;
    display: flex;
    align-items: flex-end;
    margin-bottom: 4rem;
}

.project-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.8));
    z-index: 1;
}

.project-header-content {
    position: relative;
    z-index: 2;
    padding: 2rem;
    width: 100%;
}

.project-category {
    display: inline-block;
    background: #667eea;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.project-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: white;
}

.project-meta {
    display: flex;
    gap: 2rem;
    color: rgba(255,255,255,0.9);
    font-size: 0.9rem;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.meta-item i {
    color: #667eea;
}

.project-content {
    background: white;
    border-radius: 20px;
    padding: 3rem;
    margin-bottom: 4rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.project-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.info-group h3 {
    font-size: 1.2rem;
    color: #2c3e50;
    margin-bottom: 1rem;
    font-weight: 600;
}

.info-list {
    list-style: none;
    padding: 0;
}

.info-list li {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.8rem 0;
    border-bottom: 1px solid #eee;
}

.info-list li:last-child {
    border-bottom: none;
}

.info-label {
    color: #666;
    min-width: 120px;
}

.info-value {
    color: #2c3e50;
    font-weight: 500;
}

.project-description {
    margin-bottom: 3rem;
}

.project-description h2 {
    font-size: 1.5rem;
    color: #2c3e50;
    margin-bottom: 1.5rem;
}

.project-description p {
    color: #666;
    line-height: 1.8;
    margin-bottom: 1rem;
}

.project-gallery {
    margin-bottom: 3rem;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1.5rem;
}

.gallery-item {
    position: relative;
    aspect-ratio: 4/3;
    overflow: hidden;
    border-radius: 10px;
    cursor: pointer;
    height: 250px;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-item:hover img {
    transform: scale(1.1);
}

.gallery-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-item:hover .gallery-caption {
    opacity: 1;
}

.project-features {
    margin-bottom: 3rem;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.feature-item {
    background: #f8f9fa;
    padding: 2rem;
    border-radius: 15px;
    text-align: center;
}

.feature-icon {
    font-size: 2rem;
    color: #667eea;
    margin-bottom: 1rem;
}

.feature-title {
    font-size: 1.1rem;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.feature-text {
    color: #666;
    font-size: 0.9rem;
}

.related-projects {
    background: white;
    padding: 4rem 0;
}

.related-projects h2 {
    text-align: center;
    font-size: 2rem;
    color: #2c3e50;
    margin-bottom: 3rem;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.contact-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 4rem 0;
    color: white;
    text-align: center;
}

.contact-section h2 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    font-weight: 700;
}

.contact-section p {
    font-size: 1.2rem;
    margin-bottom: 2.5rem;
    opacity: 0.9;
}

.contact-buttons {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.contact-buttons a {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.contact-buttons .btn-primary {
    background: white;
    color: #667eea;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.contact-buttons .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.contact-buttons .btn-outline {
    border: 2px solid white;
    color: white;
}

.contact-buttons .btn-outline:hover {
    background: white;
    color: #667eea;
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
}

.contact-buttons i {
    font-size: 1.2rem;
}

/* Responsive */
@media (max-width: 768px) {
    .project-header {
        height: 50vh;
    }

    .project-title {
        font-size: 2rem;
    }

    .project-meta {
        flex-direction: column;
        gap: 1rem;
    }

    .project-content {
        padding: 2rem;
    }

    .info-group {
        grid-template-columns: 1fr;
    }

    .gallery-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }

    .contact-section h2 {
        font-size: 2rem;
    }
    
    .contact-section p {
        font-size: 1.1rem;
    }
    
    .contact-buttons {
        flex-direction: column;
        gap: 1rem;
        padding: 0 1rem;
    }
    
    .contact-buttons a {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .project-header {
        height: 40vh;
    }

    .project-title {
        font-size: 1.8rem;
    }

    .project-content {
        padding: 1.5rem;
    }

    .contact-buttons {
        flex-direction: column;
    }
}
</style>

<main class="project-detail">
    <!-- Project Header -->
    <header class="project-header" style="background-image: url('<?php echo BASE_URL . '/assets/images/projects/' . basename($project['main_image']); ?>');">
        <div class="container">
            <div class="project-header-content">
                <span class="project-category"><?php echo htmlspecialchars($project['category_name']); ?></span>
                <h1 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h1>
                <div class="project-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo htmlspecialchars($project['location']); ?></span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span><?php echo $project['completed_date'] ? date('d/m/Y', strtotime($project['completed_date'])) : 'Đang thực hiện'; ?></span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-clock"></i>
                        <span>Thời gian thi công: 6 tháng</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Project Content -->
    <div class="container">
        <div class="project-content">
            <!-- Project Info -->
            <div class="project-info">
                <div class="info-group">
                    <h3>Thông Tin Dự Án</h3>
                    <ul class="info-list">
                        <li>
                            <span class="info-label">Chủ đầu tư:</span>
                            <span class="info-value">Ông Nguyễn Văn A</span>
                        </li>
                        <li>
                            <span class="info-label">Địa điểm:</span>
                            <span class="info-value"><?php echo htmlspecialchars($project['location']); ?></span>
                        </li>
                        <li>
                            <span class="info-label">Diện tích:</span>
                            <span class="info-value">500m²</span>
                        </li>
                        <li>
                            <span class="info-label">Năm hoàn thành:</span>
                            <span class="info-value"><?php echo $project['completed_date'] ? date('Y', strtotime($project['completed_date'])) : 'Đang thực hiện'; ?></span>
                        </li>
                    </ul>
                </div>

                <div class="info-group">
                    <h3>Thông Số Kỹ Thuật</h3>
                    <ul class="info-list">
                        <li>
                            <span class="info-label">Số tầng:</span>
                            <span class="info-value">3 tầng</span>
                        </li>
                        <li>
                            <span class="info-label">Phong cách:</span>
                            <span class="info-value">Hiện đại</span>
                        </li>
                        <li>
                            <span class="info-label">Kết cấu:</span>
                            <span class="info-value">Khung bê tông cốt thép</span>
                        </li>
                        <li>
                            <span class="info-label">Mặt tiền:</span>
                            <span class="info-value">8m</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Project Description -->
            <div class="project-description">
                <h2>Mô Tả Dự Án</h2>
                <?php echo nl2br(htmlspecialchars($project['description'])); ?>
            </div>

            <!-- Project Gallery -->
            <div class="project-gallery">
                <h2>Hình Ảnh Dự Án</h2>
                <?php if (empty($project_images)): ?>
                <div class="alert alert-info">
                    Dự án này hiện chỉ có ảnh chính. Chúng tôi sẽ cập nhật thêm hình ảnh trong thời gian tới.
                </div>
                <?php else: ?>
                <div class="gallery-grid">
                    <?php foreach ($project_images as $image): ?>
                    <div class="gallery-item" data-caption="<?php echo htmlspecialchars($image['caption'] ?? ''); ?>">
                        <img src="<?php echo BASE_URL . '/assets/images/projects/' . basename($image['image_url']); ?>" 
                             alt="<?php echo htmlspecialchars($image['caption'] ?? $project['title']); ?>" 
                             loading="lazy">
                        <?php if (!empty($image['caption'])): ?>
                        <div class="gallery-caption">
                            <span><?php echo htmlspecialchars($image['caption']); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- Project Features -->
            <div class="project-features">
                <h2>Điểm Nổi Bật</h2>
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <h3 class="feature-title">Thiết Kế Hiện Đại</h3>
                        <p class="feature-text">Thiết kế theo phong cách hiện đại, tối ưu công năng sử dụng</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3 class="feature-title">Thân Thiện Môi Trường</h3>
                        <p class="feature-text">Sử dụng vật liệu xanh, thiết kế thông thoáng tự nhiên</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h3 class="feature-title">Thi Công Chuyên Nghiệp</h3>
                        <p class="feature-text">Đội ngũ thi công lành nghề, đảm bảo chất lượng công trình</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Projects -->
    <?php if (!empty($related_projects)): ?>
    <section class="related-projects">
        <div class="container">
            <h2>Dự Án Liên Quan</h2>
            <div class="related-grid">
                <?php foreach ($related_projects as $related): ?>
                <div class="project-card" data-aos="fade-up">
                    <div class="project-card-inner">
                        <div class="project-image">
                            <img src="<?php echo BASE_URL . '/assets/images/projects/' . basename($related['main_image']); ?>" 
                                 alt="<?php echo htmlspecialchars($related['title']); ?>" 
                                 loading="lazy">
                            <div class="project-overlay">
                                <div class="project-actions">
                                    <a href="<?php echo BASE_URL; ?>/pages/project-detail.php?id=<?php echo $related['id']; ?>" 
                                       class="action-btn" title="Xem chi tiết">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="project-content">
                            <h3 class="project-title">
                                <a href="<?php echo BASE_URL; ?>/pages/project-detail.php?id=<?php echo $related['id']; ?>">
                                    <?php echo htmlspecialchars($related['title']); ?>
                                </a>
                            </h3>
                            
                            <div class="project-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo htmlspecialchars($related['location'] ?? 'Chưa cập nhật'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <h2>Bạn Quan Tâm Đến Dự Án Này?</h2>
            <p>Liên hệ ngay để được tư vấn chi tiết và nhận báo giá tốt nhất</p>
            <div class="contact-buttons">
                <a href="<?php echo BASE_URL; ?>/pages/contact.php" class="btn-primary">
                    <i class="fas fa-envelope"></i>
                    <span>Gửi Yêu Cầu Tư Vấn</span>
                </a>
                <a href="tel:0979596114" class="btn-outline">
                    <i class="fas fa-phone"></i>
                    <span>Gọi Ngay: 0979.596.114</span>
                </a>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }    // Gallery Lightbox
    const galleryItems = document.querySelectorAll('.gallery-item');
    galleryItems.forEach(item => {
        item.addEventListener('click', function() {
            const imgSrc = this.querySelector('img').src;
            const caption = this.dataset.caption;
            const lightbox = document.createElement('div');
            lightbox.classList.add('lightbox');
            lightbox.innerHTML = `
                <div class="lightbox-content">
                    <img src="${imgSrc}" alt="Gallery Image">
                    ${caption ? `<div class="lightbox-caption">${caption}</div>` : ''}
                    <button class="close-lightbox">&times;</button>
                </div>
            `;
            document.body.appendChild(lightbox);

            // Close lightbox
            lightbox.addEventListener('click', function(e) {
                if (e.target.classList.contains('lightbox') || 
                    e.target.classList.contains('close-lightbox')) {
                    lightbox.remove();
                }
            });
        });
    });

    // Add lightbox styles
    const style = document.createElement('style');
    style.textContent = `
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90vh;
        }

        .lightbox-content img {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
        }

        .close-lightbox {
            position: absolute;
            top: -40px;
            right: 0;
            background: none;
            border: none;
            color: white;
            font-size: 2rem;
            cursor: pointer;
        }
    `;
    document.head.appendChild(style);
});
</script>

<?php require_once '../includes/footer.php'; ?>
