<?php 
require_once '../includes/config.php';
include '../includes/header.php';
include '../includes/navbar.php';
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>Liên Hệ</h1>
        <nav aria-label="breadcrumb">
            
        </nav>
    </div>
</section>

<section class="contact-section section">
    <div class="container">
        <!-- Thông tin liên hệ và Form liên hệ cùng một hàng -->
        <div class="row mb-5">
            <!-- Thông tin liên hệ -->
            <div class="col-lg-6 mb-4 mb-lg-0">
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
            </div>

            <!-- Form liên hệ -->
            <div class="col-lg-6">
                <div class="contact-form-container animate-in show">
                    <h3>Gửi Thông Tin Liên Hệ</h3>
                    <p class="mb-4">Vui lòng điền đầy đủ thông tin, chúng tôi sẽ liên hệ lại sớm nhất.</p>
                    
                    <form id="contactForm" method="POST" action="<?php echo BASE_URL; ?>/process/contact.php" class="contact-form">
                        <div class="form-group">
                            <label for="fullname">Họ và tên *</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required 
                                   pattern="^[a-zA-ZÀ-ỹ\s]{3,50}$" 
                                   placeholder="Nhập họ và tên của bạn"
                                   title="Họ tên phải từ 3-50 ký tự và không chứa số">
                            <span class="error-message">Họ tên phải từ 3-50 ký tự và không chứa số</span>
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại *</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required
                                   pattern="^(0|\+84)[0-9]{9}$"
                                   placeholder="VD: 0909123456"
                                   title="Số điện thoại không hợp lệ">
                            <span class="error-message">Vui lòng nhập đúng định dạng số điện thoại Việt Nam</span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="example@email.com"
                                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                            <span class="error-message">Vui lòng nhập đúng định dạng email</span>
                        </div>

                        <div class="form-group">
                            <label for="subject">Chủ đề *</label>
                            <select class="form-control" id="subject" name="subject" required>
                                <option value="" selected disabled>Chọn chủ đề</option>
                                <option value="tu-van">Tư vấn dịch vụ</option>
                                <option value="bao-gia">Yêu cầu báo giá</option>
                                <option value="khieu-nai">Khiếu nại/Góp ý</option>
                                <option value="khac">Khác</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message">Nội dung *</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required
                                      minlength="10" maxlength="500" 
                                      placeholder="Nhập nội dung liên hệ của bạn"></textarea>
                            <span class="error-message">Nội dung phải từ 10-500 ký tự</span>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-paper-plane me-2"></i>Gửi Liên Hệ
                        </button>

                        <div class="alert alert-success mt-4 d-none" id="successMessage">
                            Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.
                        </div>
                        <div class="alert alert-danger mt-4 d-none" id="errorMessage">
                            Có lỗi xảy ra. Vui lòng thử lại sau!
                        </div>
                    </form>
                </div>
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
</script>

<?php include '../includes/footer.php'; ?>