<?php require_once 'config.php'; ?>
<header class="main-header">
    <div class="header-container">
        <!-- Logo -->
        <div class="logo">
            <a href="<?php echo BASE_URL; ?>">
                <img src="<?php echo BASE_URL; ?>/assets/images/logo.png" alt="Hoàng Gia Khánh" />
            </a>
            <div class="logo-text">
                <h1>Hoàng Gia Khánh</h1>
                <p>Chất lượng - Uy tín - Bền vững</p>
            </div>
        </div>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-btn" aria-label="Menu">
            <span class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>

        <!-- Navigation -->
        <nav class="main-nav">
            <button class="close-nav">
                <i class="fas fa-times"></i>
            </button>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>">Trang Chủ</a></li>
                <li><a href="<?php echo BASE_URL; ?>/pages/about.php">Thông Tin Công Ty</a></li>

                <li class="has-dropdown">
                    <a href="<?php echo BASE_URL; ?>/pages/services">Dịch Vụ</a>
                    <ul class="dropdown">
                        <li><a href="<?php echo BASE_URL; ?>/pages/services/categories">Thiết Kế Kiến Trúc</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/pages/services">Thi Công Xây Dựng</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/pages/services">Trang Trí Nội Thất</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/pages/services">Thiết Kế Cảnh Quan</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/pages/services">Tư Vấn Xây Dựng</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/pages/services">Cải Tạo Công Trình</a></li>

                    </ul>
                </li>
                <li class="has-dropdown">
                    <a href="<?php echo BASE_URL; ?>/pages/projects">Dự Án</a>
                    <ul class="dropdown">
                        <li><a href="<?php echo BASE_URL; ?>/pages/projects/categories/nha-pho.php">Nhà Phố</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/pages/projects/categories/biet-thu.php">Biệt Thự</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/pages/projects/categories/homestay.php">Homestay</a></li>                    </ul>
                </li>
                <li><a href="<?php echo BASE_URL; ?>/pages/blog.php">Blog/Tin Tức</a></li>
                
                <li><a href="<?php echo BASE_URL; ?>/pages/contact.php">Liên Hệ</a></li>
            </ul>
        </nav>
        <!-- Hotline -->
        <div class="header-contact">
            <div class="hotline-wrapper">
                <div class="hotline-icon">
                    <i class="fas fa-phone-volume"></i>
                </div>
                <div class="hotline-info">
                    <span class="hotline-label">Hotline 24/7</span>
                    <a href="tel:0912345678" class="hotline-number">0968.074.179</a>
                </div>
            </div>
        </div>
    </div>
</header>