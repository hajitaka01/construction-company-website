<?php
require_once '../includes/header.php';
require_once '../includes/navbar.php';
require_once '../config/database.php';

// Khởi tạo kết nối PDO
$database = new Database();
$pdo = $database->getConnection();

// Xử lý tham số tìm kiếm và lọc
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$category_filter = isset($_GET['category']) ? (int)$_GET['category'] : 0;
$location_filter = isset($_GET['location']) ? trim($_GET['location']) : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'newest';

// Phân trang
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$projects_per_page = 9;
$offset = ($page - 1) * $projects_per_page;

// Xây dựng câu truy vấn
$where_conditions = ['1=1'];
$params = [];

if (!empty($search)) {
    $where_conditions[] = "(p.title LIKE :search OR p.description LIKE :search)";
    $params[':search'] = "%$search%";
}

if ($category_filter > 0) {
    $where_conditions[] = "p.category_id = :category";
    $params[':category'] = $category_filter;
}

if (!empty($location_filter)) {
    $where_conditions[] = "p.location LIKE :location";
    $params[':location'] = "%$location_filter%";
}

// Sắp xếp
$order_by = match($sort) {
    'oldest' => 'p.created_at ASC',
    'title_asc' => 'p.title ASC',
    'title_desc' => 'p.title DESC',
    'completed_newest' => 'p.completed_date DESC',
    'completed_oldest' => 'p.completed_date ASC',
    default => 'p.created_at DESC'
};

$where_clause = implode(' AND ', $where_conditions);

// Đếm tổng số dự án
$count_sql = "SELECT COUNT(*) FROM projects p WHERE $where_clause";
$count_stmt = $pdo->prepare($count_sql);
$count_stmt->execute($params);
$total_projects = $count_stmt->fetchColumn();
$total_pages = ceil($total_projects / $projects_per_page);

// Lấy dữ liệu dự án
$sql = "SELECT p.*, 
               CASE 
                   WHEN p.category_id = 1 THEN 'Nhà Phố'
                   WHEN p.category_id = 2 THEN 'Biệt Thự' 
                   WHEN p.category_id = 3 THEN 'Homestay'
                   ELSE 'Khác'
               END as category_name
        FROM projects p 
        WHERE $where_clause 
        ORDER BY $order_by 
        LIMIT :limit OFFSET :offset";

$stmt = $pdo->prepare($sql);
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}
$stmt->bindValue(':limit', $projects_per_page, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Lấy danh sách category và location để làm filter
$categories_sql = "SELECT DISTINCT category_id, 
                          CASE 
                              WHEN category_id = 1 THEN 'Nhà Phố'
                              WHEN category_id = 2 THEN 'Biệt Thự' 
                              WHEN category_id = 3 THEN 'Homestay'
                              ELSE 'Khác'
                          END as category_name
                   FROM projects WHERE category_id IS NOT NULL ORDER BY category_id";
$categories = $pdo->query($categories_sql)->fetchAll(PDO::FETCH_ASSOC);

$locations_sql = "SELECT DISTINCT location FROM projects WHERE location IS NOT NULL AND location != '' ORDER BY location";
$locations = $pdo->query($locations_sql)->fetchAll(PDO::FETCH_COLUMN);
?>

<style>
    /* Projects Page Styles */
.projects-page {
    min-height: 100vh;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}

/* Hero Section */
.hero-section {
    position: relative;
    height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #667eea 0%,rgb(58, 58, 187) 100%);
    color: white;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('../images/hero-construction.jpg') center/cover;
    opacity: 0.3;
    z-index: 1;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    z-index: 2;
}

.hero-content {
    position: relative;
    z-index: 3;
    text-align: center;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.hero-subtitle {
    font-size: 1.2rem;
    margin-bottom: 3rem;
    opacity: 0.95;
}

.hero-stats {
    display: flex;
    justify-content: center;
    gap: 4rem;
    margin-top: 2rem;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: #ffd700;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.stat-label {
    font-size: 1rem;
    margin-top: 0.5rem;
    opacity: 0.9;
}

/* Filter Section */
.filter-section {
    background: white;
    padding: 2rem 0;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 100;
}

.filter-wrapper {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}

.filter-row {
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
}

.search-box {
    position: relative;
    flex: 2;
    min-width: 300px;
}

.search-box input {
    width: 100%;
    padding: 12px 50px 12px 20px;
    border: 2px solid #e1e5e9;
    border-radius: 50px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
}

.search-box input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.search-btn {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background: #667eea;
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
}

.search-btn:hover {
    background: #5a6fd8;
    transform: translateY(-50%) scale(1.05);
}

.filter-group {
    flex: 1;
    min-width: 150px;
}

.filter-select {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e1e5e9;
    border-radius: 10px;
    font-size: 1rem;
    background: white;
    cursor: pointer;
    transition: all 0.3s ease;
}

.filter-select:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.filter-btn, .clear-filter-btn {
    padding: 12px 20px;
    border: none;
    border-radius: 10px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-btn {
    background: #667eea;
    color: white;
}

.filter-btn:hover {
    background: #5a6fd8;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.clear-filter-btn {
    background: #dc3545;
    color: white;
}

.clear-filter-btn:hover {
    background: #c82333;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
}

/* Projects Grid Section */
.projects-grid-section {
    padding: 4rem 0;
}

.results-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding: 1rem 0;
}

.results-count {
    font-size: 1rem;
    color: #666;
    font-weight: 500;
}

.view-toggle {
    display: flex;
    gap: 0.5rem;
}

.view-btn {
    padding: 10px;
    border: 2px solid #e1e5e9;
    background: white;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #666;
}

.view-btn.active,
.view-btn:hover {
    border-color: #667eea;
    background: #667eea;
    color: white;
}

/* Projects Grid */
.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.projects-grid.list-view {
    grid-template-columns: 1fr;
    gap: 1.5rem;
}

.projects-grid.list-view .project-card {
    transform: none;
}

.projects-grid.list-view .project-card-inner {
    display: flex;
    height: 200px;
}

.projects-grid.list-view .project-image {
    flex: 0 0 300px;
    border-radius: 15px 0 0 15px;
}

.projects-grid.list-view .project-content {
    flex: 1;
    padding: 1.5rem;
}

/* Project Card 3D */
.project-card {
    perspective: 1000px;
    height: 100%;
}

.project-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: left;
    transition: transform 0.6s;
    transform-style: preserve-3d;
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    cursor: pointer;
}

.project-card:hover .project-card-inner {
    transform: rotateY(5deg) rotateX(5deg);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

.project-image {
    position: relative;
    height: 250px;
    overflow: hidden;
    border-radius: 20px 20px 0 0;
}

.project-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.project-card:hover .project-image img {
    transform: scale(1.1);
}

.project-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(102, 126, 234, 0.8), rgba(118, 75, 162, 0.8));
    opacity: 0;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.project-card:hover .project-overlay {
    opacity: 1;
}

.project-actions {
    display: flex;
    gap: 1rem;
}

.action-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
    transform: translateY(20px);
}

.project-card:hover .action-btn {
    transform: translateY(0);
}

.action-btn:nth-child(1) { transition-delay: 0.1s; }
.action-btn:nth-child(2) { transition-delay: 0.2s; }
.action-btn:nth-child(3) { transition-delay: 0.3s; }

.action-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(0) scale(1.1);
    color: white;
}

.project-category {
    position: absolute;
    top: 15px;
    left: 15px;
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    z-index: 2;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
}

.project-content {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.project-title {
    margin: 0 0 1rem 0;
    font-size: 1.3rem;
    font-weight: 700;
    line-height: 1.3;
}

.project-title a {
    color: #2c3e50;
    text-decoration: none;
    transition: color 0.3s ease;
}

.project-title a:hover {
    color: #667eea;
}

.project-location {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.project-location i {
    color: #667eea;
}

.project-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    flex-grow: 1;
}

.project-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    padding-top: 1rem;
    border-top: 1px solid #eee;
}

.project-date {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #666;
    font-size: 0.9rem;
}

.project-date i {
    color: #667eea;
}

.project-status .status {
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
}

.status.completed {
    background: #d4edda;
    color: #155724;
}

.status.in-progress {
    background: #fff3cd;
    color: #856404;
}

.project-footer {
    margin-top: auto;
}

.btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 12px 24px;
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    color: white;
}

.btn-secondary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 12px 24px;
    background: transparent;
    color: #667eea;
    text-decoration: none;
    border: 2px solid #667eea;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 12px 24px;
    background: transparent;
    color: white;
    text-decoration: none;
    border: 2px solid white;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline:hover {
    background: white;
    color: #667eea;
    transform: translateY(-2px);
}

/* No Results */
.no-results {
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.no-results-icon {
    font-size: 4rem;
    color: #ccc;
    margin-bottom: 1rem;
}

.no-results h3 {
    color: #2c3e50;
    margin-bottom: 1rem;
}

.no-results p {
    color: #666;
    margin-bottom: 2rem;
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 2rem;
    margin-top: 3rem;
}

.pagination {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.pagination-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    border: 2px solid #e1e5e9;
    background: white;
    color: #666;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pagination-btn:hover,
.pagination-btn.active {
    border-color: #667eea;
    background: #667eea;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.pagination-info {
    color: #666;
    font-size: 0.9rem;
}

/* Advertisement Section */
.advertisement-section {
    background: linear-gradient(135deg,rgb(52, 33, 108) 0%,rgb(107, 122, 201) 100%);
    padding: 4rem 0;
    margin: 4rem 0;
}

.ad-banner {
    display: flex;
    align-items: center;
    gap: 3rem;
    background: white;
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.ad-content {
    flex: 1;
}

.ad-content h3 {
    font-size: 2rem;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.ad-content p {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.ad-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.ad-image {
    flex: 0 0 300px;
}

.ad-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

/* Call to Action */
.cta-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 4rem 0;
    color: white;
    text-align: center;
}

.cta-content h2 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    font-weight: 700;
}

.cta-content p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.cta-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .projects-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 2rem;
    }
    
    .filter-row {
        flex-direction: column;
        gap: 1rem;
    }
    
    .search-box,
    .filter-group {
        min-width: auto;
        width: 100%;
    }
    
    .projects-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .projects-grid.list-view .project-card-inner {
        flex-direction: column;
        height: auto;
    }
    
    .projects-grid.list-view .project-image {
        flex: none;
        height: 200px;
        border-radius: 15px 15px 0 0;
    }
    
    .ad-banner {
        flex-direction: column;
        text-align: center;
        gap: 2rem;
    }
    
    .ad-image {
        flex: none;
    }
    
    .cta-content h2 {
        font-size: 2rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .pagination-wrapper {
        flex-direction: column;
        gap: 1rem;
    }
}

@media (max-width: 480px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .filter-wrapper {
        padding: 1rem;
    }
    
    .project-card-inner {
        border-radius: 15px;
    }
    
    .project-image {
        height: 200px;
        border-radius: 15px 15px 0 0;
    }
    
    .project-content {
        padding: 1rem;
    }
    
    .ad-banner {
        padding: 2rem;
    }
    
    .cta-content h2 {
        font-size: 1.8rem;
    }
}

/* Loading Animation */
@keyframes shimmer {
    0% {
        background-position: -200px 0;
    }
    100% {
        background-position: calc(200px + 100%) 0;
    }
}

.loading-card {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200px 100%;
    animation: shimmer 1.5s infinite;
}

/* Smooth scroll */
html {
    scroll-behavior: smooth;
}
</style>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/projects.css">

<main class="projects-page">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="container">
                <h1 class="hero-title" data-aos="fade-up">Dự Án Tiêu Biểu</h1>
                <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Khám phá những công trình chất lượng cao được thực hiện bởi Hoàng Gia Khánh
                </p>
                <div class="hero-stats" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-item">
                        <div class="stat-number"><?php echo $total_projects; ?>+</div>
                        <div class="stat-label">Dự Án Hoàn Thành Gần Đây</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">10+</div>
                        <div class="stat-label">Năm Kinh Nghiệm</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Khách Hàng Hài Lòng</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter & Search Section -->
    <section class="filter-section">
        <div class="container">
            <div class="filter-wrapper" data-aos="fade-up">
                <form method="GET" class="filter-form">
                    <div class="filter-row">
                        <div class="search-box">
                            <input type="text" name="search" placeholder="Tìm kiếm dự án..." 
                                   value="<?php echo htmlspecialchars($search); ?>">
                            <button type="submit" class="search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        
                        <div class="filter-group">
                            <select name="category" class="filter-select">
                                <option value="0">Tất cả danh mục</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['category_id']; ?>" 
                                            <?php echo $category_filter == $category['category_id'] ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($category['category_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <select name="location" class="filter-select">
                                <option value="">Tất cả địa điểm</option>
                                <?php foreach ($locations as $location): ?>
                                    <option value="<?php echo htmlspecialchars($location); ?>" 
                                            <?php echo $location_filter == $location ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($location); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <select name="sort" class="filter-select">
                                <option value="newest" <?php echo $sort === 'newest' ? 'selected' : ''; ?>>Mới nhất</option>
                                <option value="oldest" <?php echo $sort === 'oldest' ? 'selected' : ''; ?>>Cũ nhất</option>
                                <option value="title_asc" <?php echo $sort === 'title_asc' ? 'selected' : ''; ?>>Tên A-Z</option>
                                <option value="title_desc" <?php echo $sort === 'title_desc' ? 'selected' : ''; ?>>Tên Z-A</option>
                                <option value="completed_newest" <?php echo $sort === 'completed_newest' ? 'selected' : ''; ?>>Hoàn thành mới nhất</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="filter-btn">
                            <i class="fas fa-filter"></i> Lọc
                        </button>
                        
                        <?php if (!empty($search) || $category_filter > 0 || !empty($location_filter)): ?>
                            <a href="<?php echo BASE_URL; ?>/pages/projects.php" class="clear-filter-btn">
                                <i class="fas fa-times"></i> Xóa bộ lọc
                            </a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="projects-grid-section">
        <div class="container">
            <!-- Results Info -->
            <div class="results-info" data-aos="fade-up">
                <div class="results-count">
                    Hiển thị <?php echo min($offset + 1, $total_projects); ?> - 
                    <?php echo min($offset + $projects_per_page, $total_projects); ?> 
                    trong tổng số <?php echo $total_projects; ?> dự án
                </div>
                <div class="view-toggle">
                    <button class="view-btn active" data-view="grid">
                        <i class="fas fa-th-large"></i>
                    </button>
                    <button class="view-btn" data-view="list">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>

            <?php if (empty($projects)): ?>
                <div class="no-results" data-aos="fade-up">
                    <div class="no-results-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Không tìm thấy dự án nào</h3>
                    <p>Vui lòng thử lại với từ khóa khác hoặc điều chỉnh bộ lọc</p>
                    <a href="<?php echo BASE_URL; ?>/pages/projects.php" class="btn-primary">
                        Xem tất cả dự án
                    </a>
                </div>
            <?php else: ?>
                <div class="projects-grid" id="projectsGrid">
                    <?php foreach ($projects as $index => $project): ?>
                        <div class="project-card" data-aos="fade-up" data-aos-delay="<?php echo ($index % 9) * 100; ?>">
                            <div class="project-card-inner">
                                <div class="project-image">
                                    <img src="<?php 
    if (!empty($project['main_image'])) {
        // If main_image starts with assets/, use it as is
        if (strpos($project['main_image'], 'assets/') === 0) {
            echo BASE_URL . '/' . $project['main_image'];
        } else {
            // Otherwise, assume it's in the projects folder
            echo BASE_URL . '/assets/images/projects/' . $project['main_image'];
        }
    } else {
        echo BASE_URL . '/assets/images/default-project.jpg';
    }
?>" 
alt="<?php echo htmlspecialchars($project['title']); ?>" 
loading="lazy">
                                    <div class="project-overlay">
                                        <div class="project-actions">
                                            <a href="<?php echo BASE_URL; ?>/pages/project-detail.php?id=<?php echo $project['id']; ?>" 
                                               class="action-btn" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="action-btn" title="Thêm vào yêu thích">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                            <a href="#" class="action-btn" title="Chia sẻ">
                                                <i class="fas fa-share-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="project-category">
                                        <?php echo htmlspecialchars($project['category_name']); ?>
                                    </div>
                                </div>
                                
                                <div class="project-content">
                                    <h3 class="project-title">
                                        <a href="<?php echo BASE_URL; ?>/pages/project-detail.php?id=<?php echo $project['id']; ?>">
                                            <?php echo htmlspecialchars($project['title']); ?>
                                        </a>
                                    </h3>
                                    
                                    <div class="project-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo htmlspecialchars($project['location'] ?? 'Chưa cập nhật'); ?>
                                    </div>
                                    
                                    <div class="project-description">
                                        <?php 
                                        $description = $project['description'] ?? '';
                                        echo htmlspecialchars(mb_substr($description, 0, 100, 'UTF-8') . (mb_strlen($description, 'UTF-8') > 100 ? '...' : ''));
                                        ?>
                                    </div>
                                    
                                    <div class="project-meta">
                                        <div class="project-date">
                                            <i class="fas fa-calendar-alt"></i>
                                            <?php 
                                            if ($project['completed_date']) {
                                                echo date('d/m/Y', strtotime($project['completed_date']));
                                            } else {
                                                echo 'Đang thực hiện';
                                            }
                                            ?>
                                        </div>
                                        <div class="project-status">
                                            <?php if ($project['completed_date']): ?>
                                                <span class="status completed">Hoàn thành</span>
                                            <?php else: ?>
                                                <span class="status in-progress">Đang thực hiện</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="project-footer">
                                        <a href="<?php echo BASE_URL; ?>/pages/project-detail.php?id=<?php echo $project['id']; ?>" 
                                           class="btn-primary">
                                            Xem chi tiết <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <div class="pagination-wrapper" data-aos="fade-up">
                    <div class="pagination">
                        <!-- First Page -->
                        <?php if ($page > 1): ?>
                            <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => 1])); ?>" 
                               class="pagination-btn">
                                <i class="fas fa-angle-double-left"></i>
                            </a>
                        <?php endif; ?>
                        
                        <!-- Previous Page -->
                        <?php if ($page > 1): ?>
                            <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $page - 1])); ?>" 
                               class="pagination-btn">
                                <i class="fas fa-angle-left"></i>
                            </a>
                        <?php endif; ?>
                        
                        <!-- Page Numbers -->
                        <?php
                        $start = max(1, $page - 2);
                        $end = min($total_pages, $page + 2);
                        
                        for ($i = $start; $i <= $end; $i++):
                        ?>
                            <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $i])); ?>" 
                               class="pagination-btn <?php echo $i === $page ? 'active' : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                        
                        <!-- Next Page -->
                        <?php if ($page < $total_pages): ?>
                            <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $page + 1])); ?>" 
                               class="pagination-btn">
                                <i class="fas fa-angle-right"></i>
                            </a>
                        <?php endif; ?>
                        
                        <!-- Last Page -->
                        <?php if ($page < $total_pages): ?>
                            <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $total_pages])); ?>" 
                               class="pagination-btn">
                                <i class="fas fa-angle-double-right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <div class="pagination-info">
                        Trang <?php echo $page; ?> / <?php echo $total_pages; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Advertisement Section -->
    <section class="advertisement-section" data-aos="fade-up">
        <div class="container">
            <div class="ad-banner">
                <div class="ad-content">
                    <h3>Bạn có dự án xây dựng?</h3>
                    <p>Liên hệ với chúng tôi để được tư vấn miễn phí và báo giá tốt nhất</p>
                    <div class="ad-actions">
                        <a href="<?php echo BASE_URL; ?>/pages/contact.php" class="btn-primary">
                            <i class="fas fa-phone"></i> Liên hệ ngay
                        </a>
                        <a href="tel:0968074179" class="btn-secondary">
                            <i class="fas fa-phone-volume"></i> 0909.074.179
                        </a>
                    </div>
                </div>
                <div class="ad-image">
                    <img src="<?php echo BASE_URL; ?>/assets/images/doingu.jpg" alt="Đội ngũ xây dựng">
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content" data-aos="fade-up">
                <h2>Sẵn sàng bắt đầu dự án của bạn?</h2>
                <p>Hãy để Hoàng Gia Khánh biến ước mơ ngôi nhà của bạn thành hiện thực</p>
                <div class="cta-buttons">
                    <a href="<?php echo BASE_URL; ?>/pages/contact.php" class="btn-primary">
                        Bắt đầu dự án
                    </a>
                    <a href="<?php echo BASE_URL; ?>/pages/services.php" class="btn-outline">
                        Xem dịch vụ
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// View toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const viewBtns = document.querySelectorAll('.view-btn');
    const projectsGrid = document.getElementById('projectsGrid');
    
    viewBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            viewBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const view = this.getAttribute('data-view');
            if (view === 'list') {
                projectsGrid.classList.add('list-view');
            } else {
                projectsGrid.classList.remove('list-view');
            }
        });
    });
    
    // Animate on scroll
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });
    
    // Filter form auto-submit on select change
    const filterSelects = document.querySelectorAll('.filter-select');
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            this.closest('form').submit();
        });
    });
    
    // Smooth scroll for pagination
    const paginationLinks = document.querySelectorAll('.pagination-btn');
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!this.classList.contains('active')) {
                document.querySelector('.filter-section').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});

// Projects Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize AOS (Animate On Scroll)
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }
    
    // View Toggle Functionality
    initViewToggle();
    
    // Filter Form Auto-submit
    initFilterAutoSubmit();
    
    // Smooth Scroll for Pagination
    initPaginationSmoothScroll();
    
    // Project Card 3D Effects
    initProjectCard3D();
    
    // Search Enhancement
    initSearchEnhancement();
    
    // Lazy Loading for Images
    initLazyLoading();
    
    // Favorites System (Local Storage)
    initFavoritesSystem();
    
    // Share Functionality
    initShareFunctionality();
});

// View Toggle (Grid/List)
function initViewToggle() {
    const viewBtns = document.querySelectorAll('.view-btn');
    const projectsGrid = document.getElementById('projectsGrid');
    
    if (!projectsGrid) return;
    
    viewBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            viewBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const view = this.getAttribute('data-view');
            
            // Add transition class
            projectsGrid.style.transition = 'all 0.3s ease';
            
            if (view === 'list') {
                projectsGrid.classList.add('list-view');
                localStorage.setItem('projectsView', 'list');
            } else {
                projectsGrid.classList.remove('list-view');
                localStorage.setItem('projectsView', 'grid');
            }
            
            // Trigger AOS refresh for new layout
            if (typeof AOS !== 'undefined') {
                setTimeout(() => {
                    AOS.refresh();
                }, 300);
            }
        });
    });
    
    // Restore saved view preference
    const savedView = localStorage.getItem('projectsView');
    if (savedView === 'list') {
        document.querySelector('[data-view="list"]')?.click();
    }
}

// Filter Form Auto-submit
function initFilterAutoSubmit() {
    const filterSelects = document.querySelectorAll('.filter-select');
    const filterForm = document.querySelector('.filter-form');
    
    if (!filterForm) return;
    
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            // Show loading state
            showFilterLoading(true);
            
            // Submit form after short delay for better UX
            setTimeout(() => {
                filterForm.submit();
            }, 300);
        });
    });
}

// Show/Hide Filter Loading
function showFilterLoading(show) {
    const projectsGrid = document.getElementById('projectsGrid');
    if (!projectsGrid) return;
    
    if (show) {
        projectsGrid.style.opacity = '0.5';
        projectsGrid.style.pointerEvents = 'none';
        
        // Add loading overlay
        const loadingOverlay = document.createElement('div');
        loadingOverlay.className = 'loading-overlay';
        loadingOverlay.innerHTML = '<div class="loading-spinner"></div>';
        loadingOverlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        `;
        document.body.appendChild(loadingOverlay);
    } else {
        projectsGrid.style.opacity = '1';
        projectsGrid.style.pointerEvents = 'auto';
        
        const loadingOverlay = document.querySelector('.loading-overlay');
        if (loadingOverlay) {
            loadingOverlay.remove();
        }
    }
}

// Smooth Scroll for Pagination
function initPaginationSmoothScroll() {
    const paginationLinks = document.querySelectorAll('.pagination-btn');
    
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!this.classList.contains('active')) {
                const filterSection = document.querySelector('.filter-section');
                if (filterSection) {
                    setTimeout(() => {
                        filterSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 100);
                }
            }
        });
    });
}

// Project Card 3D Effects
function initProjectCard3D() {
    const projectCards = document.querySelectorAll('.project-card');
    
    projectCards.forEach(card => {
        const cardInner = card.querySelector('.project-card-inner');
        
        card.addEventListener('mouseenter', function() {
            cardInner.style.transform = 'rotateY(5deg) rotateX(5deg) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            cardInner.style.transform = 'rotateY(0deg) rotateX(0deg) scale(1)';
        });
        
        // Enhanced 3D effect based on mouse position
        card.addEventListener('mousemove', function(e) {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / centerY * 10;
            const rotateY = (centerX - x) / centerX * 10;
            
            cardInner.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
        });
    });
}

// Search Enhancement
function initSearchEnhancement() {
    const searchInput = document.querySelector('.search-box input');
    const searchBtn = document.querySelector('.search-btn');
    
    if (!searchInput) return;
    
    // Search suggestions (mock data - replace with real API)
    const searchSuggestions = [
        'Biệt thự',
        'Nhà phố',
        'Homestay',
        'Quận 7',
        'Thủ Đức',
        'Đà Lạt',
        'Vũng Tàu'
    ];
    
    let suggestionContainer = null;
    
    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();
        
        if (query.length > 1) {
            showSearchSuggestions(query, searchSuggestions);
        } else {
            hideSearchSuggestions();
        }
    });
    
    searchInput.addEventListener('blur', function() {
        // Delay hiding to allow clicking on suggestions
        setTimeout(hideSearchSuggestions, 200);
    });
    
    function showSearchSuggestions(query, suggestions) {
        const filtered = suggestions.filter(item => 
            item.toLowerCase().includes(query)
        );
        
        if (filtered.length === 0) {
            hideSearchSuggestions();
            return;
        }
        
        if (!suggestionContainer) {
            suggestionContainer = document.createElement('div');
            suggestionContainer.className = 'search-suggestions';
            suggestionContainer.style.cssText = `
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                border: 1px solid #e1e5e9;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                max-height: 200px;
                overflow-y: auto;
            `;
            searchInput.parentElement.appendChild(suggestionContainer);
        }
        
        suggestionContainer.innerHTML = filtered.map(item => 
            `<div class="suggestion-item" style="
                padding: 10px 15px;
                cursor: pointer;
                border-bottom: 1px solid #f0f0f0;
                transition: background 0.2s ease;
            " onmouseover="this.style.background='#f8f9fa'" 
               onmouseout="this.style.background='white'"
               onclick="selectSuggestion('${item}')">${item}</div>`
        ).join('');
        
        suggestionContainer.style.display = 'block';
    }
    
    function hideSearchSuggestions() {
        if (suggestionContainer) {
            suggestionContainer.style.display = 'none';
        }
    }
    
    // Global function for suggestion selection
    window.selectSuggestion = function(suggestion) {
        searchInput.value = suggestion;
        hideSearchSuggestions();
        searchInput.focus();
    };
}

// Lazy Loading for Images
function initLazyLoading() {
    const images = document.querySelectorAll('img[loading="lazy"]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.src || img.dataset.src;
                    img.classList.remove('lazy');
                    observer.unobserve(img);
                }
            });
        });
        
        images.forEach(img => imageObserver.observe(img));
    }
}

// Favorites System
function initFavoritesSystem() {
    const favoriteButtons = document.querySelectorAll('.action-btn[title="Thêm vào yêu thích"]');
    
    favoriteButtons.forEach(btn => {
        const projectCard = btn.closest('.project-card');
        const projectId = getProjectIdFromCard(projectCard);
        
        // Check if already favorited
        if (isFavorited(projectId)) {
            btn.classList.add('favorited');
            btn.querySelector('i').classList.replace('far', 'fas');
        }
        
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            toggleFavorite(projectId, this);
        });
    });
}

function getProjectIdFromCard(card) {
    const link = card.querySelector('a[href*="project-detail.php?id="]');
    if (link) {
        const url = new URL(link.href);
        return url.searchParams.get('id');
    }
    return null;
}

function isFavorited(projectId) {
    const favorites = JSON.parse(localStorage.getItem('favoriteProjects') || '[]');
    return favorites.includes(projectId);
}

function toggleFavorite(projectId, button) {
    if (!projectId) return;
    
    let favorites = JSON.parse(localStorage.getItem('favoriteProjects') || '[]');
    const icon = button.querySelector('i');
    
    if (favorites.includes(projectId)) {
        // Remove from favorites
        favorites = favorites.filter(id => id !== projectId);
        button.classList.remove('favorited');
        icon.classList.replace('fas', 'far');
        showNotification('Đã xóa khỏi danh sách yêu thích', 'info');
    } else {
        // Add to favorites
        favorites.push(projectId);
        button.classList.add('favorited');
        icon.classList.replace('far', 'fas');
        showNotification('Đã thêm vào danh sách yêu thích', 'success');
    }
    
    localStorage.setItem('favoriteProjects', JSON.stringify(favorites));
}

// Share Functionality
function initShareFunctionality() {
    const shareButtons = document.querySelectorAll('.action-btn[title="Chia sẻ"]');
    
    shareButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const projectCard = this.closest('.project-card');
            const projectTitle = projectCard.querySelector('.project-title a').textContent;
            const projectUrl = projectCard.querySelector('.project-title a').href;
            
            if (navigator.share) {
                navigator.share({
                    title: projectTitle,
                    text: `Xem dự án: ${projectTitle}`,
                    url: projectUrl
                });
            } else {
                // Fallback - copy to clipboard
                navigator.clipboard.writeText(projectUrl).then(() => {
                    showNotification('Đã sao chép liên kết', 'success');
                });
            }
        });
    });
}

// Notification System
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#28a745' : type === 'error' ? '#dc3545' : '#17a2b8'};
        color: white;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        z-index: 10000;
        transform: translateX(100%);
        transition: transform 0.3s ease;
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Auto remove
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Performance optimization: Debounce function
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Add CSS for favorites
const style = document.createElement('style');
style.textContent = `
    .action-btn.favorited {
        background: rgba(220, 53, 69, 0.2) !important;
        border-color: rgba(220, 53, 69, 0.3) !important;
    }
    
    .action-btn.favorited i {
        color: #dc3545 !important;
    }
    
    .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #667eea;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
`;
document.head.appendChild(style);

</script>

<?php require_once '../includes/footer.php'; ?>