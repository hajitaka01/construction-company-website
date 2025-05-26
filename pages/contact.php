<?php 
require_once '../includes/config.php';
include '../includes/header.php';
include '../includes/navbar.php';
?>

<!-- Page Header -->
<section class="page-header-slider">
    <div class="slider-overlay"></div>
    <div class="slider-container">
        <div class="slide active" style="background-image: url('<?php echo BASE_URL; ?>/assets/images/contact/header-bg.jpg');">
            <div class="container">
                <div class="slide-content">
                    <h1 class="animate-in">Liên Hệ</h1>
                   
                    <div class="header-stats animate-in">
                        <div class="stat-box">
                            <span class="counter" data-count="24">0</span>
                            <span class="stat-label">Giờ Hỗ Trợ</span>
                        </div>
                        <div class="stat-box">
                            <span class="counter" data-count="98">0</span>
                            <span class="stat-label">% Khách Hài Lòng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-section section">
    <div class="container">
        <!-- Thông tin liên hệ và Form liên hệ cùng một hàng -->
        <div class="contact-content">
            <div class="contact-info animate-in show">
                    <h3>Thông Tin Liên Hệ</h3>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 mb-4">
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <h4>Địa chỉ</h4>
                                    <p>123 Nguyễn Huệ, Phường Phước Trung<br>TP. Bà Rịa, Tỉnh Bà Rịa - Vũng Tàu</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 mb-4">
                            <div class="info-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <h4>Điện thoại</h4>
                                    <p><a href="tel:0909999999">0909 999 999</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 mb-4">
                            <div class="info-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <h4>Email</h4>
                                    <p><a href="mailto:contact@hoanggiakhanh.com">contact@hoanggiakhanh.com</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <div class="info-item">
                                <i class="far fa-clock"></i>
                                <div>
                                    <h4>Giờ làm việc</h4>
                                    <p>Thứ 2 - Thứ 7: 8:00 - 17:30<br>Chủ nhật: Nghỉ</p>
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
                    </div>
                    
                    <div class="form-group">
                        <textarea class="form-control" id="message" name="message" placeholder="Nội dung tin nhắn *" required></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">Gửi tin nhắn</button>
                </form>
            </div>
        </div>

        <!-- Google Maps - Nằm dưới cả hai form, chiếm toàn bộ chiều rộng -->
        <div class="row">
            <div class="col-12">
                <div class="contact-map animate-in show">
                    <div class="map-overlay" id="mapOverlay">
                        <span><i class="fas fa-map-marked-alt me-2"></i>Xem bản đồ</span>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d33179.35913165699!2d107.08227093165421!3d10.375332167145713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTDCsDIyJzQzLjQiTiAxMDfCsDA2JzM3LjEiRQ!5e1!3m2!1svi!2s!4v1746761406742!5m2!1svi!2s"
                        width="100%" 
                        height="100%" 
                        style="border:0; min-height: 450px;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const contactForm = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual AJAX in production)
            setTimeout(function() {
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
                
                // Show success message (in real implementation, check response from server)
                successMessage.classList.remove('d-none');
                successMessage.classList.add('show');
                
                // Reset form
                contactForm.reset();
                
                // Hide success message after 5 seconds
                setTimeout(function() {
                    successMessage.classList.add('d-none');
                    successMessage.classList.remove('show');
                }, 5000);
            }, 1500);
        });
    }
    
    // Map overlay functionality
    const mapOverlay = document.getElementById('mapOverlay');
    if (mapOverlay) {
        mapOverlay.addEventListener('click', function() {
            this.classList.add('clicked');
        });
    }
    
    // Animation on scroll
    const animateElements = document.querySelectorAll('.animate-in');
    
    function checkIfInView() {
        animateElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementTop < windowHeight - 100) {
                element.classList.add('show');
            }
        });
    }
    
    // Initial check
    checkIfInView();
    
    // Check on scroll
    window.addEventListener('scroll', checkIfInView);
});

// Add this to each page or in a common JS file
document.addEventListener('DOMContentLoaded', function() {
    // Counter animation
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000; // 2 seconds
        const step = target / (duration / 16); // 60fps

        let current = 0;
        const updateCounter = () => {
            current += step;
            if (current < target) {
                counter.textContent = Math.round(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };
        updateCounter();
    });

    // Add particles effect
    const particles = document.createElement('div');
    particles.className = 'particles';
    document.querySelector('.page-header-slider').appendChild(particles);

    // Create particles
    for(let i = 0; i < 50; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 20 + 's';
        particle.style.animationDuration = 15 + Math.random() * 10 + 's';
        particles.appendChild(particle);
    }
});
</script>

<?php include '../includes/footer.php'; ?>