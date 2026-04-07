<?php
require_once '../includes/header.php';
require_once '../includes/navbar.php';
require_once '../config/database.php';

// Lấy ID dịch vụ từ URL
$service_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Truy vấn thông tin dịch vụ
$service_query = "SELECT * FROM services WHERE id = ? AND status = 'active'";
$stmt = mysqli_prepare($conn, $service_query);
mysqli_stmt_bind_param($stmt, "i", $service_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$service = mysqli_fetch_assoc($result);

// Kiểm tra dịch vụ tồn tại
if (!$service) {
    header('Location: ' . BASE_URL . '/pages/services.php');
    exit;
}

// Lấy dịch vụ liên quan
$related_services_query = "SELECT id, title, image, short_description FROM services WHERE id != ? AND status = 'active' ORDER BY display_order ASC LIMIT 6";
$stmt = mysqli_prepare($conn, $related_services_query);
mysqli_stmt_bind_param($stmt, "i", $service_id);
mysqli_stmt_execute($stmt);
$related_services = mysqli_stmt_get_result($stmt);
?>

<!-- Service Details Page -->
<main class="service-details-page">
    <!-- Hero Section with Breadcrumb -->
    <section class="service-hero" style="background-image: linear-gradient(135deg, rgba(13, 110, 253, 0.9), rgba(108, 117, 125, 0.8)), url('<?php echo BASE_URL; ?>/assets/images/services/<?php echo $service['image']; ?>')">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb" class="mb-3" data-aos="fade-right">
                        <ol class="breadcrumb custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>"><i class="fas fa-home"></i> Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>/pages/services.php">Dịch vụ</a></li>
                            <li class="breadcrumb-item active"><?php echo htmlspecialchars($service['title']); ?></li>
                        </ol>
                    </nav>
                    <div class="hero-content" data-aos="fade-up">
                        <h1 class="display-4 text-white mb-3"><?php echo htmlspecialchars($service['title']); ?></h1>
                        <p class="lead text-white-50 mb-4"><?php echo htmlspecialchars($service['short_description']); ?></p>
                        <div class="hero-actions">
                            <a href="#consultation" class="btn-custom btn-primary">
                                <i class="fas fa-phone-alt me-2"></i>Tư Vấn Ngay
                            </a>
                            <a href="#service-details" class="btn-custom btn-outline">
                                <i class="fas fa-info-circle me-2"></i>Xem Chi Tiết
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="hero-stats" data-aos="fade-left">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="stat-content">
                                <h3>10+</h3>
                                <p>Năm Kinh Nghiệm</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-content">
                                <h3>500+</h3>
                                <p>Khách Hàng Hài Lòng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="service-content-section" id="service-details">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Service Overview -->
                    <div class="content-card" data-aos="fade-up">
                        <div class="card-header">
                            <h2 class="section-title">
                                <i class="fas fa-info-circle text-primary me-2"></i>
                                Tổng Quan Dịch Vụ
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="service-description">
                                <?php echo nl2br(htmlspecialchars($service['full_description'])); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Service Features -->
                    <div class="content-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-header">
                            <h2 class="section-title">
                                <i class="fas fa-star text-warning me-2"></i>
                                Điểm Nổi Bật Của Dịch Vụ
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="features-grid">
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Chất Lượng Cao</h4>
                                        <p>Đảm bảo chất lượng công trình với đội ngũ chuyên nghiệp và kinh nghiệm lâu năm</p>
                                    </div>
                                </div>
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Đúng Tiến Độ</h4>
                                        <p>Cam kết hoàn thành dự án đúng thời gian đã thỏa thuận với khách hàng</p>
                                    </div>
                                </div>
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Bảo Hành Lâu Dài</h4>
                                        <p>Chế độ bảo hành dài hạn cho mọi hạng mục công trình</p>
                                    </div>
                                </div>
                                <div class="feature-card">
                                    <div class="feature-icon">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Giá Cả Hợp Lý</h4>
                                        <p>Báo giá chi tiết, minh bạch từng hạng mục công việc</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="service-sidebar">
                        <!-- Contact Form -->
                        <div class="sidebar-card contact-form-card" id="consultation" data-aos="fade-left">
                            <div class="card-header text-center">
                                <h3 class="mb-0">
                                    <i class="fas fa-phone-alt text-primary me-2"></i>
                                    Đăng Ký Tư Vấn Miễn Phí
                                </h3>
                                <p class="text-muted mt-2">Chúng tôi sẽ liên hệ với bạn trong 24h</p>
                            </div>
                            <div class="card-body">
                                <form id="consultationForm" class="consultation-form">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" required>
                                        <label for="name"><i class="fas fa-user me-2"></i>Họ và tên *</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" required>
                                        <label for="phone"><i class="fas fa-phone me-2"></i>Số điện thoại *</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        <label for="email"><i class="fas fa-envelope me-2"></i>Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" name="message" style="height: 100px" placeholder="Nội dung"></textarea>
                                        <label for="message"><i class="fas fa-comment me-2"></i>Nội dung tư vấn</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i>Gửi Yêu Cầu Tư Vấn
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Quick Contact -->
                        <div class="sidebar-card contact-info-card" data-aos="fade-left" data-aos-delay="200">
                            <div class="card-header">
                                <h4 class="mb-0">
                                    <i class="fas fa-headset text-success me-2"></i>
                                    Liên Hệ Nhanh
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="contact-content">
                                        <span class="contact-label">Hotline</span>
                                        <a href="tel:0979596114" class="contact-value">0979 596 114</a>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="contact-content">
                                        <span class="contact-label">Email</span>
                                        <a href="mailto:info@company.com" class="contact-value">hoanggiakhanh114@gmail.com</a>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fab fa-facebook-messenger"></i>
                                    </div>
                                    <div class="contact-content">
                                        <span class="contact-label">Messenger</span>
                                        <a href="#" class="contact-value">Chat ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Other Services -->
                        <div class="sidebar-card other-services-card" data-aos="fade-left" data-aos-delay="400">
                            <div class="card-header">
                                <h4 class="mb-0">
                                    <i class="fas fa-list-alt text-info me-2"></i>
                                    Dịch Vụ Khác
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="service-list">
                                    <?php while ($other = mysqli_fetch_assoc($related_services)): ?>
                                        <div class="service-item">
                                            <div class="service-image">
                                                <img src="<?php echo BASE_URL; ?>/assets/images/projects/<?php echo $other['image']; ?>" alt="<?php echo htmlspecialchars($other['title']); ?>">
                                            </div>
                                            <div class="service-content">
                                                <h6><?php echo htmlspecialchars($other['title']); ?></h6>
                                                <p class="text-muted small"><?php echo htmlspecialchars(substr($other['short_description'], 0, 60)); ?>...</p>
                                                <a href="<?php echo BASE_URL; ?>/pages/service-details.php?id=<?php echo $other['id']; ?>" class="btn btn-sm btn-outline-primary">
                                                    Xem chi tiết <i class="fas fa-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="cta-content" data-aos="fade-right">
                        <h2 class="text-white mb-3">Bạn Cần Tư Vấn Thêm Về Dịch Vụ Này?</h2>
                        <p class="text-white-50 mb-0">Hãy liên hệ với chúng tôi để được tư vấn chi tiết và báo giá tốt nhất</p>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="cta-actions" data-aos="fade-left">
                        <a href="tel:0979596114" class="btn-custom btn-primary">
                            <i class="fas fa-phone-alt me-2"></i>Gọi Ngay
                        </a>
                        <a href="#consultation" class="btn-custom btn-outline">
                            <i class="fas fa-calendar-alt me-2"></i>Đặt Lịch
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Include Footer -->
<?php include '../includes/footer.php'; ?>

<style>
    :root {
        --primary: #0d6efd;
        --secondary: #6c757d;
        --success: #198754;
        --info: #0dcaf0;
        --warning: #ffc107;
        --danger: #dc3545;
        --light: #f8f9fa;
        --dark: #212529;
        --gradient-primary: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
        --shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        --shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        --shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
    }

    /* Hero Section */
    .service-hero {
        min-height: 500px;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        position: relative;
    }

    .custom-breadcrumb {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 25px;
        padding: 8px 20px;
        margin: 0;
    }

    .custom-breadcrumb .breadcrumb-item a {
        color: #fff;
        text-decoration: none;
        transition: all 0.3s;
    }

    .custom-breadcrumb .breadcrumb-item a:hover {
        color: var(--warning);
    }

    .custom-breadcrumb .breadcrumb-item.active {
        color: #fff;
    }

    .hero-stats {
        display: flex;
        gap: 20px;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        color: white;
        flex: 1;
        transition: transform 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon i {
        font-size: 2rem;
        margin-bottom: 10px;
        color: var(--warning);
    }

    .stat-card h3 {
        font-size: 2rem;
        font-weight: bold;
        margin: 0;
    }

    .stat-card p {
        margin: 0;
        font-size: 0.9rem;
        opacity: 0.9;
    }

    /* Content Section */
    .service-content-section {
        padding: 80px 0;
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    }

    .content-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: var(--shadow);
        margin-bottom: 30px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .content-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .content-card .card-header {
        background: var(--gradient-primary);
        color: white;
        padding: 20px 30px;
        border-bottom: none;
    }

    .content-card .card-body {
        padding: 30px;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
    }

    .service-description {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--dark);
    }

    /* Features Grid */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    .feature-card {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 20px;
        background: var(--light);
        border-radius: 15px;
        transition: all 0.3s;
        border-left: 4px solid var(--primary);
    }

    .feature-card:hover {
        background: #fff;
        box-shadow: var(--shadow);
        transform: translateX(5px);
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        background: var(--gradient-primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .feature-content h4 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--dark);
    }

    .feature-content p {
        margin: 0;
        color: var(--secondary);
        line-height: 1.6;
    }

    

    /* Sidebar */
    .service-sidebar {
        position: sticky;
        top: 100px;
    }

    .sidebar-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: var(--shadow);
        margin-bottom: 30px;
        overflow: hidden;
        transition: transform 0.3s;
    }

    .sidebar-card:hover {
        transform: translateY(-5px);
    }

    .sidebar-card .card-header {
        background: var(--gradient-primary);
        color: white;
        padding: 20px;
        border-bottom: none;
    }

    .sidebar-card .card-body {
        padding: 25px;
    }

    /* Contact Form */
    .consultation-form .form-floating {
        position: relative;
    }

    .consultation-form .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 1rem 0.75rem;
        font-size: 1rem;
        transition: all 0.3s;
    }

    .consultation-form .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .consultation-form label {
        font-weight: 500;
        color: var(--secondary);
    }

    /* Contact Info */
    .contact-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .contact-item:last-child {
        border-bottom: none;
    }

    .contact-icon {
        width: 40px;
        height: 40px;
        background: var(--gradient-primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .contact-content {
        flex: 1;
    }

    .contact-label {
        display: block;
        font-size: 0.85rem;
        color: var(--secondary);
        margin-bottom: 2px;
    }

    .contact-value {
        display: block;
        font-weight: 600;
        color: var(--dark);
        text-decoration: none;
        transition: color 0.3s;
    }

    .contact-value:hover {
        color: var(--primary);
    }

    /* Service List */
    .service-item {
        display: flex;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
        transition: all 0.3s;
    }

    .service-item:last-child {
        border-bottom: none;
    }

    .service-item:hover {
        background: var(--light);
        margin: 0 -15px;
        padding: 15px;
        border-radius: 10px;
    }

    .service-image {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .service-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .service-content {
        flex: 1;
    }

    .service-content h6 {
        font-size: 0.95rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark);
    }

    .service-content p {
        font-size: 0.8rem;
        margin-bottom: 8px;
    }

    /* CTA Section */
    .cta-section {
        background: var(--gradient-primary);
        padding: 60px 0;
    }

    .cta-content h2 {
        font-size: 2rem;
        font-weight: 600;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .service-sidebar {
            position: static;
            margin-top: 40px;
        }

        .hero-stats {
            flex-direction: column;
            margin-top: 30px;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .cta-actions {
            margin-top: 20px;
            text-align: center;
        }
    }

    @media (max-width: 767px) {
        .service-hero {
            min-height: 400px;
            background-attachment: scroll;
        }

        .hero-content h1 {
            font-size: 2rem;
        }

        .process-timeline {
            padding-left: 0;
        }

        .process-timeline::before {
            display: none;
        }

        .timeline-marker {
            position: static;
            margin: 0 auto 15px;
        }

        .timeline-content {
            text-align: center;
        }

        .feature-card {
            flex-direction: column;
            text-align: center;
        }

        .contact-item {
            flex-direction: column;
            text-align: center;
            gap: 10px;
        }

        .service-item {
            flex-direction: column;
            text-align: center;
        }

        .service-image {
            width: 80px;
            height: 80px;
            margin: 0 auto;
        }
    }

    /* Animation Enhancement */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .btn:hover {
        animation: pulse 0.6s ease-in-out;
    }

    /* Loading States */
    .consultation-form button[type="submit"]:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .consultation-form button[type="submit"]:disabled::after {
        content: '';
        width: 16px;
        height: 16px;
        margin-left: 10px;
        border: 2px solid transparent;
        border-top: 2px solid #fff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        display: inline-block;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Scroll to top button */
    .scroll-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: var(--gradient-primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s;
        z-index: 1000;
        box-shadow: var(--shadow);
    }

    .scroll-to-top.show {
        opacity: 1;
        visibility: visible;
    }

    .scroll-to-top:hover {
        transform: translateY(-5px);
        color: white;
    }

    /* Print Styles */
    @media print {

        .service-sidebar,
        .cta-section,
        .scroll-to-top {
            display: none;
        }

        .service-hero {
            background: none !important;
            color: black !important;
        }

        .content-card {
            box-shadow: none;
            border: 1px solid #ddd;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scrolling for anchor links
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        anchorLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Form submission with enhanced UX
        const consultationForm = document.getElementById('consultationForm');
        if (consultationForm) {
            consultationForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;

                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Đang gửi...';

                // Get form data
                const formData = new FormData(consultationForm);
                formData.append('service_name', '<?php echo htmlspecialchars($service['title']); ?>');

                // Send AJAX request
                fetch('<?php echo BASE_URL; ?>/includes/send-mail.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Show success/error message
                        showNotification(data.message, data.status);

                        // Reset form if successful
                        if (data.status === 'success') {
                            consultationForm.reset();
                            // Focus first input for better UX
                            consultationForm.querySelector('input').focus();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showNotification('Có lỗi xảy ra. Vui lòng thử lại sau.', 'error');
                    })
                    .finally(() => {
                        // Restore button state
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    });
            });
        }

        // Form validation enhancement
        const formInputs = consultationForm?.querySelectorAll('input, textarea');
        formInputs?.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });

            input.addEventListener('input', function() {
                if (this.classList.contains('is-invalid')) {
                    validateField(this);
                }
            });
        });

        // Scroll to top button
        createScrollToTopButton();

        // Phone number formatting
        const phoneInput = document.querySelector('input[name="phone"]');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 0) {
                    if (value.length <= 3) {
                        value = value;
                    } else if (value.length <= 6) {
                        value = value.slice(0, 3) + ' ' + value.slice(3);
                    } else {
                        value = value.slice(0, 3) + ' ' + value.slice(3, 6) + ' ' + value.slice(6, 10);
                    }
                }
                e.target.value = value;
            });
        }

        // Lazy loading for service images
        const serviceImages = document.querySelectorAll('.service-image img');
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.remove('lazy');
                        observer.unobserve(img);
                    }
                });
            });

            serviceImages.forEach(img => imageObserver.observe(img));
        }

        // Enhanced AOS animations
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-out-cubic',
                once: true,
                offset: 100
            });
        }
    });

    // Utility Functions
    function validateField(field) {
        const value = field.value.trim();
        const fieldName = field.getAttribute('name');
        let isValid = true;
        let errorMessage = '';

        // Remove existing validation classes
        field.classList.remove('is-valid', 'is-invalid');

        // Remove existing error message
        const existingError = field.parentNode.querySelector('.invalid-feedback');
        if (existingError) {
            existingError.remove();
        }

        // Validation rules
        if (field.hasAttribute('required') && !value) {
            isValid = false;
            errorMessage = 'Trường này là bắt buộc';
        } else if (fieldName === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                errorMessage = 'Email không hợp lệ';
            }
        } else if (fieldName === 'phone' && value) {
            const phoneRegex = /^[0-9\s]{10,}$/;
            if (!phoneRegex.test(value.replace(/\s/g, ''))) {
                isValid = false;
                errorMessage = 'Số điện thoại không hợp lệ';
            }
        }

        // Apply validation result
        if (isValid) {
            field.classList.add('is-valid');
        } else {
            field.classList.add('is-invalid');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'invalid-feedback';
            errorDiv.textContent = errorMessage;
            field.parentNode.appendChild(errorDiv);
        }

        return isValid;
    }

    function showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} notification-toast`;
        notification.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
            <span>${message}</span>
            <button type="button" class="btn-close ms-auto" onclick="this.parentElement.parentElement.remove()"></button>
        </div>
    `;

        // Add styles
        notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        animation: slideInRight 0.5s ease-out;
    `;

        // Add to page
        document.body.appendChild(notification);

        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.style.animation = 'slideOutRight 0.5s ease-out';
                setTimeout(() => notification.remove(), 500);
            }
        }, 5000);
    }

    function createScrollToTopButton() {
        const scrollBtn = document.createElement('a');
        scrollBtn.href = '#';
        scrollBtn.className = 'scroll-to-top';
        scrollBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
        document.body.appendChild(scrollBtn);

        // Show/hide button based on scroll position
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollBtn.classList.add('show');
            } else {
                scrollBtn.classList.remove('show');
            }
        });

        // Smooth scroll to top
        scrollBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Add CSS animations for notifications
    const notificationStyles = document.createElement('style');
    notificationStyles.textContent = `
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100%);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideOutRight {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100%);
        }
    }
    
    .notification-toast {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        border: none;
    }
`;
    document.head.appendChild(notificationStyles);
</script>