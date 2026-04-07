
<?php
$title = 'Dịch Vụ Xây Dựng - Hoàng Gia Khánh';
require_once '../includes/header.php';
require_once '../includes/navbar.php';
require_once '../config/database.php';

$services_query = "SELECT * FROM services WHERE status = 'active' ORDER BY display_order";
$services_result = mysqli_query($conn, $services_query);
?>

<!-- Services Page -->
<section class="hero services-hero">
    <div class="hero-slider">
        <div class="slide active" style="background-image: url('<?php echo BASE_URL; ?>/assets/images/services-hero1.jpg');">
            <div class="slide-overlay">
                <div class="slide-content container">
                    <h2 data-aos="fade-up">Thiết Kế & Thi Công Chuyên Nghiệp</h2>
                    <p data-aos="fade-up" data-aos-delay="200">Tạo nên không gian sống hoàn hảo với phong thủy hài hòa, chất lượng vượt trội.</p>
                    <a href="<?php echo BASE_URL; ?>/pages/contact.php" class="cta-btn" data-aos="fade-up" data-aos-delay="400">Liên Hệ Ngay</a>
                </div>
            </div>
        </div>
        <div class="slide" style="background-image: url('<?php echo BASE_URL; ?>/assets/images/services-hero2.jpg');">
            <div class="slide-overlay">
                <div class="slide-content container">
                    <h2 data-aos="fade-up">Nội Thất Phong Thủy</h2>
                    <p data-aos="fade-up" data-aos-delay="200">Mang tài lộc và thịnh vượng đến từng không gian sống.</p>
                    <a href="<?php echo BASE_URL; ?>/pages/contact.php" class="cta-btn" data-aos="fade-up" data-aos-delay="400">Khám Phá Ngay</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-nav">
        <div class="slider-dot active"></div>
        <div class="slider-dot"></div>
    </div>
</section>

<section class="section services">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Dịch Vụ Của Chúng Tôi</h2>
            <p>Cung cấp giải pháp xây dựng toàn diện, kết hợp phong thủy và công nghệ hiện đại để mang lại giá trị bền vững.</p>
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
               class="read-more">Xem chi tiết <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    <?php endwhile; ?>
</div>
    </div>
</section>

<section class="section why-choose-us">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Tại Sao Chọn Hoàng Gia Khánh?</h2>
            <p>Chúng tôi mang đến sự khác biệt với chất lượng, uy tín và sự tận tâm trong từng dự án.</p>
        </div>
        <div class="grid grid-3">
            <div class="stat-item" data-aos="fade-up">
                <i class="fas fa-award"></i>
                <h3>15+ Năm Kinh Nghiệm</h3>
                <p>Đội ngũ chuyên gia giàu kinh nghiệm, thực hiện hàng trăm dự án thành công.</p>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-shield-alt"></i>
                <h3>Cam Kết Chất Lượng</h3>
                <p>Sử dụng vật liệu cao cấp, đảm bảo công trình bền vững theo thời gian.</p>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-water"></i>
                <h3>Phong Thủy Hài Hòa</h3>
                <p>Tư vấn phong thủy chuyên sâu, mang tài lộc và thịnh vượng cho gia chủ.</p>
            </div>
        </div>
    </div>
</section>

<section class="section process">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Quy Trình Làm Việc</h2>
            <p>Quy trình chuyên nghiệp, minh bạch, đảm bảo dự án hoàn thành đúng tiến độ.</p>
        </div>
        <div class="process-timeline">
            <div class="process-step" data-aos="fade-right">
                <div class="step-icon"><i class="fas fa-phone"></i></div>
                <h3>Tiếp Nhận Yêu Cầu</h3>
                <p>Lắng nghe nhu cầu, tư vấn sơ bộ và khảo sát hiện trạng.</p>
            </div>
            <div class="process-step" data-aos="fade-left">
                <div class="step-icon"><i class="fas fa-pencil-ruler"></i></div>
                <h3>Thiết Kế & Lập Kế Hoạch</h3>
                <p>Thiết kế bản vẽ, dự toán chi phí, đảm bảo hợp phong thủy.</p>
            </div>
            <div class="process-step" data-aos="fade-right">
                <div class="step-icon"><i class="fas fa-tools"></i></div>
                <h3>Thi Công Xây Dựng</h3>
                <p>Thực hiện thi công với đội ngũ chuyên nghiệp, giám sát chặt chẽ.</p>
            </div>
            <div class="process-step" data-aos="fade-left">
                <div class="step-icon"><i class="fas fa-home"></i></div>
                <h3>Hoàn Thiện & Bàn Giao</h3>
                <p>Kiểm tra chất lượng, hoàn thiện và bàn giao công trình đúng hạn.</p>
            </div>
            <div class="process-step" data-aos="fade-right">
                <div class="step-icon"><i class="fas fa-handshake"></i></div>
                <h3>Bảo Hành & Hỗ Trợ</h3>
                <p>Cung cấp bảo hành dài hạn, hỗ trợ khách hàng sau bàn giao.</p>
            </div>
        </div>
    </div>
</section>

<section class="section cta-section">
    <div class="container">
        <div class="promotion-wrapper" data-aos="fade-up">
            <div class="promotion-content">
                <div class="promotion-header">
                    <h2>Ưu Đãi Đặc Biệt Hôm Nay</h2>
                    <p class="subtitle">Miễn phí tư vấn phong thủy và thiết kế khi ký hợp đồng thi công!</p>
                </div>
                <div class="promotion-price">
                    <div class="price-tag">
                        <span class="label">Chỉ từ</span>
                        <span class="amount">4,2</span>
                        <span class="unit">triệu/m²</span>
                    </div>
                    <div class="price-note">*Áp dụng cho nhà phố, biệt thự và các công trình dân dụng.</div>
                </div>
                <div class="promotion-cta">
                    <a href="<?php echo BASE_URL; ?>/pages/contact.php" class="cta-btn">Liên Hệ Ngay</a>
                    <a href="<?php echo BASE_URL; ?>/pages/projects.php" class="cta-btn secondary">Xem Dự Án</a>
                </div>
            </div>
            <div class="promotion-image">
                <img src="<?php echo BASE_URL; ?>/assets/images/promo-construction.jpg" alt="Ưu Đãi Xây Dựng">
                <div class="promotion-badge">
                    <span class="badge-text">Giảm</span>
                    <span class="badge-amount">10%</span>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once '../includes/footer.php'; ?>

<script>
    // Initialize AOS
    AOS.init({ duration: 800, once: true });

    // Hero Slider
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slider-dot');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
            dots[i].classList.toggle('active', i === index);
        });
    }

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            currentSlide = i;
            showSlide(currentSlide);
        });
    });

    setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }, 5000);
</script>

<style>
    /* Services Hero Section */
    .services-hero {
        height: 70vh;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
    }

    .services-hero .slide-content h2 {
        font-size: 40px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .services-hero .slide-content p {
        font-size: 18px;
        max-width: 500px;
    }

    .services-hero .cta-btn {
        background: var(--secondary);
        color: var(--dark);
        border-radius: 30px;
        padding: 12px 30px;
        font-weight: 600;
        transition: transform 0.3s, background 0.3s;
    }

    .services-hero .cta-btn:hover {
        background: var(--primary-dark);
        color: var(--white);
        transform: scale(1.05);
    }

    /* Why Choose Us Section */
    .why-choose-us {
        background: #f5f8fa;
    }

    .stat-item {
        text-align: center;
        padding: 20px;
        background: var(--white);
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s;
    }

    .stat-item:hover {
        transform: translateY(-5px);
    }

    .stat-item i {
        font-size: 40px;
        color: var(--primary);
        margin-bottom: 15px;
    }

    .stat-item h3 {
        font-size: 24px;
        color: var(--primary-dark);
    }

    .stat-item p {
        font-size: 14px;
        color: var(--gray);
    }

    /* Process Section */
    .process {
        background: var(--white);
    }

    .process-timeline {
        display: flex;
        flex-direction: column;
        gap: 20px;
        position: relative;
        padding: 20px 0;
    }

    .process-step {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 20px;
        background: var(--light);
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        position: relative;
    }

    .process-step:nth-child(even) {
        flex-direction: row-reverse;
        text-align: right;
    }

    .step-icon {
        width: 60px;
        height: 60px;
        background: var(--primary);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .process-step h3 {
        font-size: 20px;
        color: var(--primary-dark);
        margin-bottom: 10px;
    }

    .process-step p {
        font-size: 14px;
        color: var(--gray);
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        color: var(--white);
        padding: 60px 0;
    }

    .promotion-content h2 {
        color: var(--white);
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .promotion-content .subtitle {
        color: var(--light);
    }

    .promotion-price {
        background: rgba(255, 255, 255, 0.95);
        color: var(--dark);
    }

    .promotion-cta .cta-btn {
        background: var(--secondary);
        color: var(--dark);
        border-radius: 30px;
        padding: 12px 30px;
        font-weight: 600;
    }

    .promotion-cta .cta-btn.secondary {
        background: transparent;
        border: 2px solid var(--white);
        color: var(--white);
    }

    .promotion-cta .cta-btn:hover {
        background: var(--primary-dark);
        color: var(--white);
    }

    .promotion-image img {
        border-radius: 15px;
        max-height: 400px;
        object-fit: cover;
    }

    .promotion-badge {
        width: 100px;
        height: 100px;
        top: 30px;
        right: 30px;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .services-hero {
            height: 60vh;
        }

        .services-hero .slide-content h2 {
            font-size: 32px;
        }

        .services-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .process-step {
            flex-direction: column !important;
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .services-hero {
            height: 50vh;
        }

        .services-hero .slide-content h2 {
            font-size: 24px;
        }

        .services-hero .slide-content p {
            font-size: 16px;
        }

        .services-grid {
            grid-template-columns: 1fr;
        }

        .grid-3 {
            grid-template-columns: 1fr;
        }

        .promotion-cta {
            flex-direction: column;
        }
    }
</style>
