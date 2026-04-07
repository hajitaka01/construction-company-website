<?php 
require_once '../includes/config.php';
include '../includes/header.php';
include '../includes/navbar.php';
?>

<!-- Page Header với Parallax Effect -->
<section class="hero-section">
    <div class="hero-bg-container">
        <div class="hero-bg" style="background-image: url('<?php echo BASE_URL; ?>/assets/images/phongthuy/header-bg.jpg');"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="hero-text">
                <div class="hero-badge animate-fade-up">
                    <i class="fas fa-magic"></i>
                    <span>Phong Thủy Chính Phái</span>
                </div>
                <h1 class="hero-title animate-fade-up" data-delay="0.2s">
                    Khoa Học Phong Thủy
                    <span class="gradient-text">Hiện Đại</span>
                </h1>
                <p class="hero-subtitle animate-fade-up" data-delay="0.4s">
                    Khám phá nghệ thuật phong thủy chính phái, mang lại sự hài hòa và thịnh vượng cho cuộc sống với phương pháp khoa học hiện đại
                </p>
                <div class="hero-buttons animate-fade-up" data-delay="0.6s">
                    <a href="#services" class="btn btn-primary-gradient smooth-scroll">
                        <i class="fas fa-compass"></i>
                        Khám Phá Dịch Vụ
                    </a>
                    <a href="<?php echo BASE_URL; ?>/pages/contact.php" class="btn btn-outline-white">
                        <i class="fas fa-phone"></i>
                        Tư Vấn Ngay
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <div class="scroll-arrow"></div>
    </div>
</section>

<!-- Introduction Section với Interactive Cards -->
<section class="intro-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="intro-content">
                    <div class="section-header">
                        <span class="section-badge">Giới Thiệu</span>
                        <h2 class="section-title">
                            Phong Thủy Là 
                            <span class="highlight-text">Khoa Học</span>
                        </h2>
                    </div>
                    <div class="intro-text">
                        <p class="lead">
                            Phong thủy là một nghệ thuật cổ xưa bắt nguồn từ Trung Quốc, tập trung vào việc cân bằng năng lượng (khí) trong không gian sống để mang lại sức khỏe, tài lộc và hạnh phúc.
                        </p>
                        <p>
                            Phong thủy chính phái dựa trên khoa học và các nguyên tắc tự nhiên, không mê tín dị đoan. Chúng tôi cung cấp các dịch vụ tư vấn phong thủy chuyên sâu, giúp bạn tối ưu hóa không gian sống và làm việc.
                        </p>
                    </div>
                    <div class="intro-features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <span>Dựa trên khoa học và tự nhiên</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <span>Không mê tín dị đoan</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <span>Chuyên gia giàu kinh nghiệm</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="intro-visual">
                    <div class="image-card">
                        <img src="<?php echo BASE_URL; ?>/assets/images/phongthuy-image.jpg" alt="Phong Thủy" class="main-image">
                        <div class="floating-elements">
                            <div class="floating-card card-1">
                                <i class="fas fa-yin-yang"></i>
                                <span>Cân Bằng</span>
                            </div>
                            <div class="floating-card card-2">
                                <i class="fas fa-leaf"></i>
                                <span>Tự Nhiên</span>
                            </div>
                            <div class="floating-card card-3">
                                <i class="fas fa-gem"></i>
                                <span>Thịnh Vượng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section với Modern Cards -->
<section id="services" class="services-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-badge">Dịch Vụ</span>
            <h2 class="section-title">
                Dịch Vụ Phong Thủy
                <span class="highlight-text">Chuyên Nghiệp</span>
            </h2>
            <p class="section-subtitle">
                Chúng tôi cung cấp đầy đủ các dịch vụ phong thủy từ cơ bản đến chuyên sâu
            </p>
        </div>
        
        <div class="services-grid">
            <div class="service-card-modern" data-tilt>
                <div class="service-icon-wrapper">
                    <div class="service-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="icon-bg"></div>
                </div>
                <div class="service-content">
                    <h3>Tư Vấn Nhà Ở</h3>
                    <p>Tối ưu hóa bố cục nhà ở để thu hút tài lộc và sức khỏe. Phân tích toàn diện không gian sống của bạn.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Xem hướng nhà</li>
                        <li><i class="fas fa-check"></i> Bố trí nội thất</li>
                        <li><i class="fas fa-check"></i> Chọn màu sắc</li>
                    </ul>
                </div>
                <div class="service-hover-overlay">
                    <a href="#" class="service-btn">Tìm Hiểu Thêm</a>
                </div>
            </div>

            <div class="service-card-modern" data-tilt>
                <div class="service-icon-wrapper">
                    <div class="service-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="icon-bg"></div>
                </div>
                <div class="service-content">
                    <h3>Tư Vấn Văn Phòng</h3>
                    <p>Cân bằng năng lượng nơi làm việc để tăng hiệu suất và thu hút thành công trong sự nghiệp.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Bố trí bàn làm việc</li>
                        <li><i class="fas fa-check"></i> Chọn vị trí ngồi</li>
                        <li><i class="fas fa-check"></i> Trang trí không gian</li>
                    </ul>
                </div>
                <div class="service-hover-overlay">
                    <a href="#" class="service-btn">Tìm Hiểu Thêm</a>
                </div>
            </div>

            <div class="service-card-modern" data-tilt>
                <div class="service-icon-wrapper">
                    <div class="service-icon">
                        <i class="fas fa-compass"></i>
                    </div>
                    <div class="icon-bg"></div>
                </div>
                <div class="service-content">
                    <h3>Xem Hướng Nhà</h3>
                    <p>Xác định hướng nhà phù hợp với mệnh của gia chủ dựa trên nguyên tắc khoa học phong thủy.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Tính toán mệnh</li>
                        <li><i class="fas fa-check"></i> Xác định hướng tốt</li>
                        <li><i class="fas fa-check"></i> Tư vấn chi tiết</li>
                    </ul>
                </div>
                <div class="service-hover-overlay">
                    <a href="#" class="service-btn">Tìm Hiểu Thêm</a>
                </div>
            </div>

            <div class="service-card-modern" data-tilt>
                <div class="service-icon-wrapper">
                    <div class="service-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <div class="icon-bg"></div>
                </div>
                <div class="service-content">
                    <h3>Phong Thủy Kinh Doanh</h3>
                    <p>Tư vấn phong thủy cho cửa hàng, showroom và các không gian kinh doanh để thu hút khách hàng.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Thiết kế mặt tiền</li>
                        <li><i class="fas fa-check"></i> Bố trí sản phẩm</li>
                        <li><i class="fas fa-check"></i> Tăng doanh thu</li>
                    </ul>
                </div>
                <div class="service-hover-overlay">
                    <a href="#" class="service-btn">Tìm Hiểu Thêm</a>
                </div>
            </div>

            <div class="service-card-modern" data-tilt>
                <div class="service-icon-wrapper">
                    <div class="service-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <div class="icon-bg"></div>
                </div>
                <div class="service-content">
                    <h3>Phong Thủy Sân Vườn</h3>
                    <p>Thiết kế và bố trí sân vườn theo nguyên tắc phong thủy để tạo không gian hài hòa với tự nhiên.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Chọn cây phù hợp</li>
                        <li><i class="fas fa-check"></i> Thiết kế tiểu cảnh</li>
                        <li><i class="fas fa-check"></i> Bố trí hồ nước</li>
                    </ul>
                </div>
                <div class="service-hover-overlay">
                    <a href="#" class="service-btn">Tìm Hiểu Thêm</a>
                </div>
            </div>

            <div class="service-card-modern" data-tilt>
                <div class="service-icon-wrapper">
                    <div class="service-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="icon-bg"></div>
                </div>
                <div class="service-content">
                    <h3>Đào Tạo Phong Thủy</h3>
                    <p>Khóa học phong thủy từ cơ bản đến nâng cao, dạy bởi các chuyên gia hàng đầu trong lĩnh vực.</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Lý thuyết cơ bản</li>
                        <li><i class="fas fa-check"></i> Thực hành thực tế</li>
                        <li><i class="fas fa-check"></i> Cấp chứng chỉ</li>
                    </ul>
                </div>
                <div class="service-hover-overlay">
                    <a href="#" class="service-btn">Tìm Hiểu Thêm</a>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- CTA Section với Gradient Background -->
<section class="cta-section">
    <div class="cta-bg"></div>
    <div class="container">
        <div class="cta-content text-center">
            <div class="cta-icon">
                <i class="fas fa-magic"></i>
            </div>
            <h2 class="cta-title">
                Sẵn Sàng Thay Đổi Cuộc Sống?
            </h2>
            <p class="cta-subtitle">
                Liên hệ ngay để nhận tư vấn phong thủy chuyên sâu từ đội ngũ chuyên gia hàng đầu của chúng tôi. 
                Chúng tôi cam kết mang đến giải pháp tối ưu cho không gian sống của bạn.
            </p>
            <div class="cta-buttons">
                <a href="<?php echo BASE_URL; ?>/pages/contact.php" class="btn btn-white-gradient">
                    <i class="fas fa-phone"></i>
                    Liên Hệ Ngay
                </a>
                <a href="#" class="btn btn-outline-white-alt">
                    <i class="fas fa-calendar"></i>
                    Đặt Lịch Tư Vấn
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Reset và Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Hero Section với Parallax */
.hero-section {
    position: relative;
    height: 100vh;
    min-height: 600px;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hero-bg-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 120%;
    z-index: -2;
}

.hero-bg {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    transform: scale(1.1);
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(0, 123, 255, 0.8) 0%, rgba(0, 198, 255, 0.6) 100%);
    z-index: -1;
}

.hero-content {
    position: relative;
    z-index: 1;
    width: 100%;
}

.hero-text {
    text-align: center;
    color: white;
    max-width: 800px;
    margin: 0 auto;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    padding: 8px 20px;
    border-radius: 25px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    margin-bottom: 20px;
    font-size: 14px;
    font-weight: 500;
}

.hero-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    margin-bottom: 20px;
    line-height: 1.2;
}

.gradient-text {
    background: linear-gradient(45deg, #FFD700, #FFA500);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: 1.2rem;
    margin-bottom: 30px;
    opacity: 0.9;
    line-height: 1.6;
}

.hero-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn {
    padding: 12px 30px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    font-size: 16px;
}

.btn-primary-gradient {
    background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
    color: white;
    box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
}

.btn-primary-gradient:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 107, 107, 0.6);
    color: white;
    text-decoration: none;
}

.btn-outline-white {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
}

.btn-outline-white:hover {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
}

/* Scroll Indicator */
.scroll-indicator {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 2;
}

.scroll-arrow {
    width: 30px;
    height: 30px;
    border: 2px solid white;
    border-top: none;
    border-left: none;
    transform: rotate(45deg);
    animation: scrollBounce 2s infinite;
}

@keyframes scrollBounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0) rotate(45deg);
    }
    40% {
        transform: translateY(-10px) rotate(45deg);
    }
    60% {
        transform: translateY(-5px) rotate(45deg);
    }
}

/* Animation Classes */
.animate-fade-up {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeUp 1s ease forwards;
}

.animate-fade-up[data-delay="0.2s"] {
    animation-delay: 0.2s;
}

.animate-fade-up[data-delay="0.4s"] {
    animation-delay: 0.4s;
}

.animate-fade-up[data-delay="0.6s"] {
    animation-delay: 0.6s;
}

@keyframes fadeUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Introduction Section */
.intro-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.section-header {
    margin-bottom: 30px;
}

.section-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 15px;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.section-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 700;
    margin-bottom: 20px;
    line-height: 1.2;
}

.highlight-text {
    background: linear-gradient(45deg, #FFD700, #FFA500);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.lead {
    font-size: 1.25rem;
    font-weight: 400;
    margin-bottom: 20px;
    opacity: 0.9;
}

.intro-features {
    margin-top: 30px;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.feature-icon {
    width: 24px;
    height: 24px;
    background: linear-gradient(45deg, #4ECDC4, #44A08D);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    flex-shrink: 0;
}

.feature-icon i {
    font-size: 12px;
    color: white;
}

/* Visual Section */
.intro-visual {
    position: relative;
}

.image-card {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.main-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 20px;
}

.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.floating-card {
    position: absolute;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    padding: 15px 20px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    animation: float 3s ease-in-out infinite;
    border: 1px solid rgba(255, 255, 255, 0.5);
}

.floating-card i {
    font-size: 20px;
    color: #007bff;
}

.floating-card span {
    font-weight: 600;
    color: #333;
    font-size: 14px;
}

.card-1 {
    top: 20%;
    right: -20px;
    animation-delay: 0s;
}

.card-2 {
    top: 50%;
    left: -20px;
    animation-delay: 1s;
}

.card-3 {
    bottom: 20%;
    right: -20px;
    animation-delay: 2s;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

/* Services Section */
.services-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}

.services-section .section-header {
    margin-bottom: 60px;
}

.services-section .section-title {
    color: #333;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.service-card-modern {
    background: white;
    border-radius: 20px;
    padding: 40px 30px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.8);
    cursor: pointer;
}

.service-card-modern:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
}

.service-card-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
}

.service-icon-wrapper {
    position: relative;
    margin-bottom: 25px;
}

.service-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(45deg, #007bff, #00c6ff);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 2;
}

.service-icon i {
    font-size: 30px;
    color: white;
}

.icon-bg {
    position: absolute;
    top: 10px;
    left: 10px;
    width: 70px;
    height: 70px;
    background: linear-gradient(45deg, rgba(255, 107, 107, 0.3), rgba(78, 205, 196, 0.3));
    border-radius: 20px;
    z-index: 1;
}

.service-content h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 15px;
}

.service-content p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
}

.service-features {
    list-style: none;
    padding: 0;
}

.service-features li {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    color: #666;
    font-size: 14px;
}

.service-features li i {
    color: #4ECDC4;
    margin-right: 8px;
    font-size: 12px;
}

.service-hover-overlay {
    position: absolute;
    bottom: -60px;
    left: 0;
    right: 0;
    padding: 20px 30px;
    background: linear-gradient(45deg, #007bff, #00c6ff);
    transition: all 0.3s ease;
    text-align: center;
}

.service-card-modern:hover .service-hover-overlay {
    bottom: 0;
}

.service-btn {
    color: white;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.service-btn:hover {
    color: white;
    text-decoration: none;
    transform: translateX(5px);
}



/* CTA Section */
.cta-section {
    position: relative;
    padding: 100px 0;
    background: #1a1a1a;
    overflow: hidden;
}

.cta-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    opacity: 0.9;
}

.cta-content {
    position: relative;
    z-index: 2;
    color: white;
}

.cta-icon {
    width: 100px;
    height: 100px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.cta-icon i {
    font-size: 40px;
    color: #FFD700;
}

.cta-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 700;
    margin-bottom: 20px;
}

.cta-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 800px;
    margin: 0 auto 40px;
    line-height: 1.6;
}

.cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-white-gradient {
    background: linear-gradient(45deg, #FFD700, #FFA500);
    color: #333;
    font-weight: 700;
}

.btn-white-gradient:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 215, 0, 0.4);
    color: #333;
    text-decoration: none;
}

.btn-outline-white-alt {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
}

.btn-outline-white-alt:hover {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
}

/* Smooth Scrolling */
.smooth-scroll {
    scroll-behavior: smooth;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .service-card-modern {
        padding: 30px 20px;
    }
    
    .floating-card {
        display: none;
    }
    
    .intro-section {
        padding: 60px 0;
    }
    
    .services-section {
        padding: 60px 0;
    }
    
    .stats-section {
        padding: 60px 0;
    }
    
    .cta-section {
        padding: 60px 0;
    }
    
    .stat-number {
        font-size: 2.5rem;
    }
}

@media (max-width: 576px) {
    .hero-section {
        min-height: 500px;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn {
        width: 200px;
        justify-content: center;
    }
}

/* Tilt Effect for Service Cards */
[data-tilt] {
    transform-style: preserve-3d;
}

/* Loading Animation */
@keyframes pulse {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
    100% {
        opacity: 1;
    }
}

.loading {
    animation: pulse 1.5s ease-in-out infinite;
}
</style>

<script>
// Animation on scroll
document.addEventListener('DOMContentLoaded', function() {
    // Parallax effect for hero background
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;
        const heroBg = document.querySelector('.hero-bg');
        if (heroBg) {
            heroBg.style.transform = `scale(1.1) translateY(${rate}px)`;
        }
    });

    // Animate elements on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all sections
    const sections = document.querySelectorAll('.intro-section, .services-section, .stats-section, .cta-section');
    sections.forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(30px)';
        section.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        observer.observe(section);
    });

    // Counter animation for stats
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 20);
    }

    // Observe stats section for counter animation
    const statsObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const statNumbers = entry.target.querySelectorAll('.stat-number');
                statNumbers.forEach(stat => {
                    const target = parseInt(stat.getAttribute('data-count'));
                    animateCounter(stat, target);
                });
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        statsObserver.observe(statsSection);
    }

    // Tilt effect for service cards
    const serviceCards = document.querySelectorAll('[data-tilt]');
    serviceCards.forEach(card => {
        card.addEventListener('mousemove', function(e) {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.05, 1.05, 1.05)`;
        });
        
        card.addEventListener('mouseleave', function() {
            card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
        });
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Floating animation for cards
    const floatingCards = document.querySelectorAll('.floating-card');
    floatingCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.5}s`;
    });

    // Add loading state management
    window.addEventListener('load', function() {
        document.body.classList.remove('loading');
    });
});

// Add some interactive hover effects
document.addEventListener('DOMContentLoaded', function() {
    // Service card hover effects
    const serviceCards = document.querySelectorAll('.service-card-modern');
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        });
    });

    // Button ripple effect
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});
</script>

<?php include '../includes/footer.php'; ?>