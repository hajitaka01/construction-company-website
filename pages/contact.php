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
        <div class="contact-content">
            <div class="contact-info animate-in show">
                <h3>Thông Tin Liên Hệ</h3>
                <div class="row">
                    <div class="col-md-6 col-sm-6 mb-4">
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h4>Địa chỉ</h4>
                                <p>A7 - 9/8 Trung Tâm Đô Thị Chí Linh, Phường 10<br>TP. Vũng Tàu, Tỉnh Bà Rịa - Vũng Tàu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 mb-4">
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h4>Điện thoại</h4>
                                <p><a href="tel:0979596114">097 9596 114</a></p>
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
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Nội dung tin nhắn *" required></textarea>
                    </div>
                    <button type="submit" id="submitBtn" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Gửi tin nhắn
                    </button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="contact-map animate-in show">
                    <div class="map-overlay" id="mapOverlay">
                        <span><i class="fas fa-map-marked-alt me-2"></i>Xem bản đồ</span>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d33179.35913165699!2d107.08227093165421!3d10.375332167145713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTDCsDIyJzQzLjQiTiAxMDfCsDA2JzM3LjEiRQ!5e1!3m2!1svi!2s!4v1746761406742!5m2!1svi!2s"
                        width="100%" height="100%" style="border:0; min-height: 450px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            
            const formData = new FormData(contactForm);
            
            fetch('<?php echo BASE_URL; ?>/includes/send-mail.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(text => {
                try {
                    const data = JSON.parse(text);
                    const alertDiv = document.createElement('div');
                    alertDiv.className = `alert alert-${data.status === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
                    alertDiv.innerHTML = `
                        ${data.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    `;
                    contactForm.parentNode.insertBefore(alertDiv, contactForm);
                    if (data.status === 'success') {
                        contactForm.reset();
                    }
                    setTimeout(() => alertDiv.remove(), 5000);
                } catch (e) {
                    throw new Error(`Invalid JSON: ${text}`);
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                alertDiv.innerHTML = `
                    Có lỗi xảy ra trong quá trình gửi. Vui lòng thử lại sau. Chi tiết: ${error.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                contactForm.parentNode.insertBefore(alertDiv, contactForm);
            })
            .finally(() => {
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
            });
        });
    }

    const mapOverlay = document.getElementById('mapOverlay');
    if (mapOverlay) {
        mapOverlay.addEventListener('click', function() {
            this.classList.add('clicked');
        });
    }
    
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
    checkIfInView();
    window.addEventListener('scroll', checkIfInView);

    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
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

    const particles = document.createElement('div');
    particles.className = 'particles';
    document.querySelector('.page-header-slider').appendChild(particles);
    for (let i = 0; i < 50; i++) {
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