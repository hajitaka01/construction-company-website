<?php require_once 'config.php'; ?>
<header class="main-header">
    <div class="header-container">
        <!-- Logo and Company Info -->
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
                <li class="has-dropdown">
    <a href="<?php echo BASE_URL; ?>/pages/about/">Thông Tin Công Ty</a>
    <ul class="dropdown">
        <li><a href="<?php echo BASE_URL; ?>/pages/about/company-info.php">Giới Thiệu</a></li>
        <li><a href="<?php echo BASE_URL; ?>/pages/about/core-values.php">Giá Trị Cốt Lõi</a></li>
        <li><a href="<?php echo BASE_URL; ?>/pages/about/team.php">Đội Ngũ Lãnh Đạo</a></li>
    </ul>
</li>

                <li class="has-dropdown">
                    <a href="<?php echo BASE_URL; ?>/pages/services">Dịch Vụ</a>
                    <ul class="dropdown">
                        <li><a href="<?php echo BASE_URL; ?>/pages/services/categories">Danh Mục Dịch Vụ</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/pages/services">Danh Sách Dịch Vụ</a></li>
                    </ul>
                </li>
                <li class="has-dropdown">
                    <a href="<?php echo BASE_URL; ?>/pages/projects">Dự Án</a>
                    <ul class="dropdown">
                        <li><a href="<?php echo BASE_URL; ?>/pages/projects/categories/nha-pho.php">Nhà Phố</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/pages/projects/categories/biet-thu.php">Biệt Thự</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/pages/projects/categories/homestay.php">Homestay</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/pages/projects/categories/thuong-mai.php">Công Trình Thương Mại</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo BASE_URL; ?>/pages/blog">Blog/Tin Tức</a></li>
                <li><a href="<?php echo BASE_URL; ?>/pages/testimonials">Đánh Giá</a></li>
                <li><a href="<?php echo BASE_URL; ?>/pages/contact.php">Liên Hệ</a></li>
            </ul>
        </nav>
    </div>
</header>