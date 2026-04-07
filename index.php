<?php
require_once 'config/database.php'; // kết nối DB

$query = "SELECT p.*, c.name AS category_name FROM projects p 
          JOIN project_categories c ON p.category_id = c.id
          ORDER BY p.created_at DESC";
$result = mysqli_query($conn, $query);

$services_query = "SELECT * FROM services WHERE status = 'active' ORDER BY display_order LIMIT 6";
$services_result = mysqli_query($conn, $services_query);
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-slider">
        <div class="slide active" style="background-image: url('<?php echo BASE_URL; ?>/assets/images/projects/uytinchatluong.jpg');">
            <div class="slide-overlay">
                <div class="slide-content">
                    <h2>Xây Dựng Uy Tín, Chất Lượng Bền Vững</h2>
                    <p>Công ty Xây dựng Hoàng Gia Khánh - Đối tác tin cậy cho mọi công trình của bạn với hơn 15 năm kinh nghiệm trong ngành.</p>
                    <a href="#contact" class="cta-btn">Liên Hệ Ngay</a>
                </div>
            </div>
        </div>
        <div class="slide" style="background-image: url('<?php echo BASE_URL; ?>/assets/images/projects/banner2.jpg');">
            <div class="slide-overlay">
                <div class="slide-content">
                    <h2>Thiết Kế Hiện Đại, Thi Công Chuyên Nghiệp</h2>
                    <p>Chúng tôi cung cấp giải pháp xây dựng toàn diện với đội ngũ kiến trúc sư và kỹ sư giàu kinh nghiệm.</p>
                    <a href="#services" class="cta-btn">Khám Phá Dịch Vụ</a>
                </div>
            </div>
        </div>
        <div class="slide" style="background-image: url('<?php echo BASE_URL; ?>/assets/images/projects/banner1.jpg');">
            <div class="slide-overlay">
                <div class="slide-content">
                    <h2>Dự Án Đa Dạng, Khách Hàng Hài Lòng</h2>
                    <p>Hàng trăm công trình đã hoàn thành từ biệt thự cao cấp đến nhà xưởng công nghiệp trên khắp cả nước.</p>
                    <a href="#projects" class="cta-btn">Xem Dự Án</a>
                </div>
            </div>
        </div>

        <div class="slider-nav">
            <div class="slider-dot active" data-slide="0"></div>
            <div class="slider-dot" data-slide="1"></div>
            <div class="slider-dot" data-slide="2"></div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Về Chúng Tôi</h2>
            <p>Công ty Xây dựng Hoàng Gia Khánh - Đối tác xây dựng tin cậy của bạn với hơn 15 năm kinh nghiệm</p>
        </div>

        <div class="about-content">
            <div class="about-text" data-aos="fade-right">
                <p>Công ty Xây dựng Hoàng Gia Khánh tự hào là một trong những đơn vị hàng đầu trong lĩnh vực xây dựng và thiết kế tại Việt Nam. Với hơn 10 năm kinh nghiệm, chúng tôi đã thực hiện hàng trăm dự án thành công trên khắp cả nước, từ nhà ở dân dụng, biệt thự, chung cư đến các công trình công nghiệp và thương mại.</p>

                <p>Chúng tôi cam kết mang đến cho khách hàng những giải pháp xây dựng toàn diện với chất lượng cao nhất, đúng tiến độ và chi phí hợp lý. Đội ngũ kỹ sư, kiến trúc sư và công nhân lành nghề của chúng tôi luôn nỗ lực không ngừng để đáp ứng mọi yêu cầu khắt khe nhất của khách hàng.</p>

                <p>Với phương châm "Chất lượng là danh dự", Hoàng Gia Khánh luôn đặt chất lượng công trình lên hàng đầu, sử dụng vật liệu cao cấp và áp dụng công nghệ xây dựng tiên tiến để đảm bảo độ bền vững và tính thẩm mỹ cho mọi công trình.</p>
            </div>

            <div class="about-stats" data-aos="fade-left">
                <div class="stat-item">
                    <i class="fas fa-building"></i>
                    <h3>500+</h3>
                    <p>Dự án hoàn thành</p>
                </div>

                <div class="stat-item">
                    <i class="fas fa-users"></i>
                    <h3>150+</h3>
                    <p>Nhân viên chuyên nghiệp</p>
                </div>

                <div class="stat-item">
                    <i class="fas fa-award"></i>
                    <h3>25+</h3>
                    <p>Giải thưởng danh giá</p>
                </div>

                <div class="stat-item">
                    <i class="fas fa-smile"></i>
                    <h3>450+</h3>
                    <p>Khách hàng hài lòng</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Promotion Section -->
<section id="promotion" class="section promotion-section">
    <div class="container">
        <div class="promotion-wrapper" data-aos="fade-up">
            <div class="promotion-content">
                <div class="promotion-header">
                    <h2>Xây Nhà Trọn Gói</h2>
                    <p class="subtitle">Tiết kiệm chi phí lên đến 20% với gói thi công trọn gói</p>
                </div>

                <div class="promotion-features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Thiết kế kiến trúc miễn phí</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Giám sát công trình 24/7</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Bảo hành công trình lên đến 5 năm</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Chi phí rõ ràng, minh bạch</span>
                    </div>
                </div>

                <div class="promotion-price">
                    <div class="price-tag">
                        <span class="label">Chỉ từ</span>
                        <span class="amount">4.2 Triệu</span>
                        <span class="unit">/m²</span>
                    </div>
                    <p class="price-note">* Áp dụng cho nhà phố tiêu chuẩn</p>
                </div>

                <div class="promotion-cta">
                    <a href="<?php echo BASE_URL; ?>/pages/giadichvu.php" class="btn btn-primary">Tìm hiểu thêm</a>
                    <a href="tel:0968074179" class="btn btn-outline">Gọi ngay: 0968.074.179</a>
                </div>
            </div>

            <div class="promotion-image" data-aos="fade-left">
                <img src="<?php echo BASE_URL; ?>/assets/images/projects/dichvu.jpg" alt="Xây nhà trọn gói">
                <div class="promotion-badge">
                    <span class="badge-text">Ưu đãi</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="section services">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Dịch Vụ Của Chúng Tôi</h2>
            <p>Chúng tôi cung cấp đa dạng các dịch vụ xây dựng và thiết kế chất lượng cao</p>
        </div>

        <div class="services-grid">
    <?php while($service = mysqli_fetch_assoc($services_result)): ?>
    <div class="service-card" data-aos="fade-up">
        <img src="<?php echo BASE_URL; ?>/assets/images/projects/<?php echo $service['image']; ?>" 
             alt="<?php echo htmlspecialchars($service['title']); ?>" 
             class="service-img">
        <div class="service-content">
            <h3><?php echo htmlspecialchars($service['title']); ?></h3>
            <p><?php echo htmlspecialchars($service['short_description']); ?></p>
            <a href="<?php echo BASE_URL; ?>/pages/service-details.php?id=<?php echo $service['id']; ?>" 
               class="read-more">Xem thêm <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    <?php endwhile; ?>
</div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Dự Án Tiêu Biểu</h2>
            <p>Khám phá các dự án nổi bật mà chúng tôi đã thực hiện</p>
        </div>

        <div class="projects-filter" data-aos="fade-up">
            <button class="filter-btn active" data-filter="all">Tất cả</button>
            <button class="filter-btn" data-filter="biet-thu">Biệt Thự</button>
            <button class="filter-btn" data-filter="nha-pho">Nhà Phố</button>
            <button class="filter-btn" data-filter="home-stay">HomeStay</button>
        </div>

        <div class="projects-grid">
            <?php while ($row = mysqli_fetch_assoc($result)):
                // Gán class filter theo tên category
                $category_class = '';
                if ($row['category_name'] == 'Biệt thự') $category_class = 'biet-thu';
                elseif ($row['category_name'] == 'Nhà phố liền kề') $category_class = 'nha-pho';
                elseif ($row['category_name'] == 'Homestay') $category_class = 'home-stay';
            ?>
                <div class="project-card" data-category="<?php echo $category_class; ?>" data-aos="fade-up">
                    <img src="<?php echo BASE_URL . '/assets/images/projects/' . $row['main_image']; ?>"
                        alt="<?php echo htmlspecialchars($row['title']); ?>"
                        class="project-img">
                    <div class="project-overlay">
                        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p><?php echo htmlspecialchars($row['location']); ?></p>
                        <a href="<?php echo BASE_URL; ?>/pages/project-detail.php?id=<?php echo $row['id']; ?>" class="view-project">Xem chi tiết</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
</section>



<!-- Blog Section -->
<section id="blog" class="section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Tin Tức & Bài Viết</h2>
            <p>Cập nhật những tin tức mới nhất về công ty và ngành xây dựng</p>
        </div>

        <div class="blog-grid">
            <div class="blog-card" data-aos="fade-up">
                <img src="<?php echo BASE_URL; ?>/assets/images/articles/smart-home.jpg" alt="Xu hướng thiết kế 2025" class="blog-img">
                <div class="blog-content">
                    <div class="blog-date"><i class="far fa-calendar-alt"></i> 05/05/2025</div>
                    <h3>Xu hướng thiết kế nhà ở năm 2025</h3>
                    <p>Khám phá những xu hướng thiết kế nhà ở mới nhất năm 2025, từ không gian mở đến các giải pháp thông minh tiết kiệm năng lượng...</p>
                    <a href="#" class="read-more">Đọc tiếp <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="blog-card" data-aos="fade-up">
                <img src="<?php echo BASE_URL; ?>/assets/images/articles/green-materials.jpg" alt="Vật liệu xây dựng xanh" class="blog-img">
                <div class="blog-content">
                    <div class="blog-date"><i class="far fa-calendar-alt"></i> 20/04/2025</div>
                    <h3>Vật liệu xây dựng xanh và bền vững</h3>
                    <p>Tìm hiểu về các loại vật liệu xây dựng thân thiện với môi trường đang được ứng dụng phổ biến trong các công trình hiện đại...</p>
                    <a href="#" class="read-more">Đọc tiếp <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="blog-card" data-aos="fade-up">
                <img src="<?php echo BASE_URL; ?>/assets/images/articles/smart-office.jpg" alt="Kinh nghiệm xây nhà" class="blog-img">
                <div class="blog-content">
                    <div class="blog-date"><i class="far fa-calendar-alt"></i> 10/04/2025</div>
                    <h3>10 kinh nghiệm xây nhà tiết kiệm chi phí</h3>
                    <p>Chia sẻ những kinh nghiệm quý báu giúp bạn tiết kiệm chi phí khi xây nhà mà vẫn đảm bảo chất lượng và thẩm mỹ cho công trình...</p>
                    <a href="#" class="read-more">Đọc tiếp <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="section contact">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Liên Hệ Với Chúng Tôi</h2>
            <p>Bạn cần tư vấn hoặc báo giá? Liên hệ ngay với chúng tôi</p>
        </div>

        <div class="contact-content">
            <div class="contact-info animate-in show">
                <h3>Thông Tin Liên Hệ</h3>
                <div class="row">
                    <div class="col-md-6 col-sm-6 mb-4">
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h4>Địa chỉ</h4>
                                <p>A7 - 9/8 Trung Tâm Đô Thị Chí Linh, Phường 10, TP. Vũng Tàu, Tỉnh Bà Rịa - Vũng Tàu</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h4>Điện thoại</h4>
                                <p><a href="tel:0979596114">0979 596 114</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 mb-4">
                        <div class="info-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <h4>Email</h4>
                                <p><a href="mailto:hoanggiakhanh114@gmail.com">hoanggiakhanh114@gmail.com</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="info-item">
                            <i class="far fa-clock"></i>
                            <div>
                                <h4>Giờ làm việc</h4>
                                <p>Thứ 2 - Thứ 7: 7:30 - 17:30<br>Chủ nhật: Nghỉ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form" data-aos="fade-left">
                <form id="contactForm" action="javascript:void(0);" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Họ tên của bạn *" required>
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email của bạn *" required>
                    </div>

                    <div class="form-group">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Số điện thoại *" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Tiêu đề">
                    </div>                    <div class="form-group">
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Nội dung tin nhắn *" required></textarea>
                    </div>

                    <button type="submit" id="submitBtn" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Gửi tin nhắn
                    </button>
                </form>
            </div>
            
            <!-- Contact Form Handler -->
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const contactForm = document.getElementById('contactForm');
                const submitBtn = document.getElementById('submitBtn');
                
                if (contactForm) {
                    contactForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        
                        // Show loading state
                        submitBtn.classList.add('loading');
                        submitBtn.disabled = true;
                        
                        // Get form data
                        const formData = new FormData(contactForm);
                        
                        // Send AJAX request
                        fetch('includes/send-mail.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Create alert element
                            const alertDiv = document.createElement('div');
                            alertDiv.className = `alert alert-${data.status === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
                            alertDiv.innerHTML = `
                                ${data.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            `;
                            
                            // Insert alert before form
                            contactForm.parentNode.insertBefore(alertDiv, contactForm);
                            
                            // Reset form on success
                            if (data.status === 'success') {
                                contactForm.reset();
                            }
                            
                            // Remove alert after 5 seconds
                            setTimeout(() => alertDiv.remove(), 5000);
                        })
                        .catch(error => {
                            // Show error message
                            const alertDiv = document.createElement('div');
                            alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                            alertDiv.innerHTML = `
                                Có lỗi xảy ra. Vui lòng thử lại sau.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            `;
                            contactForm.parentNode.insertBefore(alertDiv, contactForm);
                        })
                        .finally(() => {
                            // Reset button state
                            submitBtn.classList.remove('loading');
                            submitBtn.disabled = false;
                        });
                    });
                }
            });
            </script>
        </div>
    </div>
</section>
<div class="floating-contact">
    <a href="tel:0968074179" class="contact-button phone-button">
        <div class="button-wrapper">
            <i class="fas fa-phone-alt"></i>
        </div>
        <span class="button-label">Gọi ngay</span>
    </a>

    <a href="https://zalo.me/0968074179" target="_blank" class="contact-button zalo-button">
        <div class="button-wrapper">
            <img src="<?php echo BASE_URL; ?>/assets/images/zalo-icon.png" alt="Zalo" class="zalo-icon">
        </div>
        <span class="button-label">Chat Zalo</span>
    </a>
</div>
<?php include 'includes/footer.php'; ?>