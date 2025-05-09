<?php include '../../includes/header.php';
include '../../includes/navbar.php';?>



<!-- About Content -->
<section class="about-section section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-content">
                    <h2>Hoàng Gia Khánh - Công ty xây dựng hàng đầu</h2>
                    <p class="lead">Với hơn 15 năm kinh nghiệm trong ngành xây dựng, chúng tôi tự hào là đối tác tin cậy cho mọi công trình.</p>
                    <p>Được thành lập từ năm 2010, Hoàng Gia Khánh đã không ngừng phát triển và khẳng định vị thế của mình trong lĩnh vực xây dựng. Chúng tôi cung cấp đầy đủ các dịch vụ từ tư vấn thiết kế, thi công xây dựng đến hoàn thiện nội thất.</p>
                    <ul class="about-features">
                        <li><i class="fas fa-check"></i> Đội ngũ kỹ sư giàu kinh nghiệm</li>
                        <li><i class="fas fa-check"></i> Trang thiết bị hiện đại</li>
                        <li><i class="fas fa-check"></i> Quy trình làm việc chuyên nghiệp</li>
                        <li><i class="fas fa-check"></i> Cam kết chất lượng và tiến độ</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="about-image">
                    <img src="assets/images/about-company.jpg" alt="Công ty Hoàng Gia Khánh">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="vision-mission section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-up">
                <div class="vision-box">
                    <h3><i class="fas fa-eye"></i> Tầm Nhìn</h3>
                    <p>Trở thành công ty xây dựng hàng đầu Việt Nam, mang đến những công trình chất lượng và bền vững cho khách hàng.</p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up">
                <div class="mission-box">
                    <h3><i class="fas fa-bullseye"></i> Sứ Mệnh</h3>
                    <p>Kiến tạo không gian sống và làm việc hoàn hảo thông qua các giải pháp xây dựng tiên tiến và bền vững.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="core-values section">
    <div class="container">
        <h2 class="section-title text-center" data-aos="fade-up">Giá Trị Cốt Lõi</h2>
        <div class="row">
            <div class="col-md-3" data-aos="fade-up">
                <div class="value-item">
                    <i class="fas fa-medal"></i>
                    <h4>Chất Lượng</h4>
                    <p>Cam kết chất lượng trong từng chi tiết công trình</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up">
                <div class="value-item">
                    <i class="fas fa-handshake"></i>
                    <h4>Uy Tín</h4>
                    <p>Xây dựng niềm tin với khách hàng qua từng dự án</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up">
                <div class="value-item">
                    <i class="fas fa-clock"></i>
                    <h4>Đúng Tiến Độ</h4>
                    <p>Hoàn thành công trình đúng thời hạn cam kết</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up">
                <div class="value-item">
                    <i class="fas fa-leaf"></i>
                    <h4>Bền Vững</h4>
                    <p>Áp dụng giải pháp xây dựng thân thiện môi trường</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- History Timeline -->
<section class="history-timeline section bg-light">
    <div class="container">
        <h2 class="section-title text-center" data-aos="fade-up">Chặng Đường Phát Triển</h2>
        <div class="timeline">
            <div class="timeline-item" data-aos="fade-up">
                <div class="year">2010</div>
                <div class="content">
                    <h4>Thành Lập Công Ty</h4>
                    <p>Hoàng Gia Khánh được thành lập với đội ngũ 20 nhân viên</p>
                </div>
            </div>
            <div class="timeline-item" data-aos="fade-up">
                <div class="year">2015</div>
                <div class="content">
                    <h4>Mở Rộng Thị Trường</h4>
                    <p>Mở rộng hoạt động ra các tỉnh thành lớn trong cả nước</p>
                </div>
            </div>
            <div class="timeline-item" data-aos="fade-up">
                <div class="year">2020</div>
                <div class="content">
                    <h4>Phát Triển Vượt Bậc</h4>
                    <p>Trở thành một trong những công ty xây dựng hàng đầu khu vực</p>
                </div>
            </div>
            <div class="timeline-item" data-aos="fade-up">
                <div class="year">2025</div>
                <div class="content">
                    <h4>Hiện Tại</h4>
                    <p>Tiếp tục phát triển và mở rộng với nhiều dự án lớn</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../../includes/footer.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });

    // Counter animation for numbers
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const speed = 200;
        
        const updateCount = () => {
            const count = +counter.innerText;
            const inc = target / speed;

            if(count < target) {
                counter.innerText = Math.ceil(count + inc);
                setTimeout(updateCount, 1);
            } else {
                counter.innerText = target;
            }
        }

        updateCount();
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.header-slider .slide');
    const dots = document.querySelector('.slider-dots');
    const prevBtn = document.querySelector('.slider-nav.prev');
    const nextBtn = document.querySelector('.slider-nav.next');
    let currentSlide = 0;
    let slideInterval;

    // Create dots
    slides.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.classList.add('slider-dot');
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => goToSlide(index));
        dots.appendChild(dot);
    });

    // Show slide
    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        document.querySelectorAll('.slider-dot').forEach(dot => dot.classList.remove('active'));
        
        slides[index].classList.add('active');
        dots.children[index].classList.add('active');
    }

    // Next slide
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Previous slide
    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    // Go to specific slide
    function goToSlide(index) {
        currentSlide = index;
        showSlide(currentSlide);
        resetInterval();
    }

    // Reset interval
    function resetInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 5000);
    }

    // Event listeners
    prevBtn.addEventListener('click', () => {
        prevSlide();
        resetInterval();
    });

    nextBtn.addEventListener('click', () => {
        nextSlide();
        resetInterval();
    });

    // Initialize slider
    showSlide(0);
    slideInterval = setInterval(nextSlide, 5000);
});
</script>