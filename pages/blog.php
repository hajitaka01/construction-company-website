<?php 
require_once '../includes/config.php';
include '../includes/header.php';
include '../includes/navbar.php';
?>

<!-- Page Header -->
<section class="page-header-slider">
    <div class="slider-overlay"></div>
    <div class="slider-container">
        <div class="slide active" style="background-image: url('<?php echo BASE_URL; ?>/assets/images/blog/header-bg.jpg');">
            <div class="container">
                <div class="slide-content">
                    <h1 class="animate-in">Tin Tức & Bài Viết</h1>
                    
                    <div class="header-stats animate-in">
                        <div class="stat-box">
                            <span class="counter" data-count="150">0</span>
                            <span class="stat-label">Bài viết</span>
                        </div>
                        <div class="stat-box">
                            <span class="counter" data-count="5000">0</span>
                            <span class="stat-label">Lượt đọc</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Content Section -->
<section class="article-section section">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="article-content animate-in show">
                    <!-- Article Header -->
                    <div class="article-header">
                        <div class="article-meta">
                            <span class="article-date"><i class="far fa-calendar-alt me-2"></i>12/05/2025</span>
                            <span class="article-category"><i class="fas fa-hard-hat me-2"></i>Thiết Kế Kiến Trúc</span>
                            <span class="article-author"><i class="far fa-user me-2"></i>Nguyễn Văn Xây</span>
                        </div>
                        <div class="article-featured-image">
                            <img src="<?php echo BASE_URL; ?>/assets/images/projects/modern-building-design.jpg" alt="Thiết kế xây dựng hiện đại" class="img-fluid">
                        </div>
                    </div>
                    
                    <!-- Article Body -->
                    <div class="article-body">
                        <h2>Xu Hướng Thiết Kế Xây Dựng Bền Vững Trong Năm 2025</h2>
                        
                        <p class="lead">Trong bối cảnh biến đổi khí hậu và nhu cầu phát triển bền vững ngày càng cấp thiết, các giải pháp thiết kế xây dựng xanh đang được ưu tiên áp dụng rộng rãi tại Việt Nam và trên toàn thế giới.</p>
                        
                        <p>Công ty Xây dựng Hoàng Gia Khánh tự hào là đơn vị tiên phong trong việc áp dụng các giải pháp thiết kế bền vững, kết hợp hài hòa giữa yếu tố thẩm mỹ, công năng và thân thiện với môi trường. Bài viết này sẽ giới thiệu đến quý khách hàng những xu hướng thiết kế xây dựng bền vững đang được ưa chuộng hiện nay.</p>
                        
                        <h3>1. Kiến trúc xanh và vật liệu bền vững</h3>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p>Kiến trúc xanh không chỉ là xu hướng mà đã trở thành tiêu chuẩn trong ngành xây dựng hiện đại. Các công trình được thiết kế theo hướng tối ưu hóa việc sử dụng năng lượng, tận dụng ánh sáng và thông gió tự nhiên, đồng thời giảm thiểu tác động đến môi trường.</p>
                                
                                <p>Việc sử dụng các vật liệu bền vững, thân thiện với môi trường như gỗ tái chế, bê tông nhẹ, tấm pin năng lượng mặt trời tích hợp, vật liệu cách nhiệt cao cấp không chỉ góp phần bảo vệ môi trường mà còn giúp giảm chi phí vận hành dài hạn cho công trình.</p>
                            </div>
                            <div class="col-md-6">
                                <img src="<?php echo BASE_URL; ?>/assets/images/articles/green-materials.jpg" alt="Vật liệu xây dựng xanh" class="img-fluid rounded">
                                <p class="image-caption text-center mt-2">Vật liệu xây dựng xanh được sử dụng trong dự án của chúng tôi</p>
                            </div>
                        </div>
                        
                        <h3>2. Không gian đa chức năng và linh hoạt</h3>
                        
                        <p>Xu hướng thiết kế không gian đa chức năng đang được ưa chuộng, đặc biệt trong các dự án nhà ở và văn phòng. Đây là giải pháp hiệu quả giúp tối ưu hóa diện tích sử dụng, đáp ứng nhu cầu đa dạng của cuộc sống hiện đại.</p>
                        
                        <div class="highlight-box mb-4">
                            <h4>Lợi ích của không gian đa chức năng:</h4>
                            <ul>
                                <li>Tối ưu hóa diện tích sử dụng</li>
                                <li>Tiết kiệm chi phí xây dựng</li>
                                <li>Dễ dàng thay đổi công năng theo nhu cầu</li>
                                <li>Tạo cảm giác không gian rộng rãi, thoáng đãng</li>
                            </ul>
                        </div>
                        
                        <h3>3. Tích hợp công nghệ thông minh</h3>
                        
                        <p>Công nghệ nhà thông minh (Smart Home) đã trở thành một phần không thể thiếu trong các dự án xây dựng hiện đại. Các hệ thống quản lý năng lượng, điều khiển ánh sáng, nhiệt độ, an ninh thông minh không chỉ mang lại sự tiện nghi mà còn góp phần tiết kiệm năng lượng đáng kể.</p>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <img src="<?php echo BASE_URL; ?>/assets/images/articles/smart-home.jpg" alt="Nhà thông minh" class="img-fluid rounded">
                            </div>
                            <div class="col-md-6">
                                <img src="<?php echo BASE_URL; ?>/assets/images/articles/smart-office.jpg" alt="Văn phòng thông minh" class="img-fluid rounded">
                            </div>
                            <p class="image-caption text-center mt-2">Các giải pháp nhà thông minh được ứng dụng trong dự án của Hoàng Gia Khánh</p>
                        </div>
                        
                        <h3>4. Thiết kế hướng đến sức khỏe và tiện nghi</h3>
                        
                        <p>Sau đại dịch COVID-19, các yếu tố liên quan đến sức khỏe và tiện nghi trong thiết kế xây dựng ngày càng được chú trọng. Các giải pháp như hệ thống lọc không khí tiên tiến, không gian xanh trong nhà, thiết kế tối ưu cho ánh sáng tự nhiên, và các khu vực thư giãn đang trở thành tiêu chuẩn mới trong các dự án xây dựng.</p>
                        
                        <blockquote class="blockquote">
                            <p>"Thiết kế xây dựng không chỉ là tạo ra không gian sống và làm việc, mà còn là kiến tạo môi trường thúc đẩy sức khỏe và hạnh phúc cho con người."</p>
                            <footer class="blockquote-footer">KTS. Hoàng Gia Khánh, <cite title="Source Title">Giám đốc Công ty Xây dựng Hoàng Gia Khánh</cite></footer>
                        </blockquote>
                        
                        
                        
                        <h3>Kết luận</h3>
                        
                        <p>Xu hướng thiết kế xây dựng hiện đại đang hướng tới sự cân bằng giữa thẩm mỹ, công năng và tính bền vững. Tại Công ty Xây dựng Hoàng Gia Khánh, chúng tôi không ngừng cập nhật và áp dụng những giải pháp thiết kế tiên tiến nhất để mang đến cho khách hàng những công trình chất lượng, bền vững và thân thiện với môi trường.</p>
                        
                        <p>Nếu quý khách hàng đang có nhu cầu tư vấn thiết kế và xây dựng, hãy liên hệ với chúng tôi để được hỗ trợ tốt nhất!</p>
                        
                        <!-- Call to Action -->
                        <div class="cta-box">
                            <h4>Bạn đang có dự án cần tư vấn?</h4>
                            <p>Hãy liên hệ với chúng tôi để được tư vấn miễn phí về giải pháp thiết kế xây dựng phù hợp với nhu cầu của bạn.</p>
                            <a href="<?php echo BASE_URL; ?>/lien-he" class="btn btn-primary">
                                <i class="fas fa-phone-alt me-2"></i>Liên hệ ngay
                            </a>
                        </div>
                    </div>
                    
                    <!-- Article Footer -->
                    <div class="article-footer">
                        <div class="article-tags">
                            <span><i class="fas fa-tags me-2"></i>Tags:</span>
                            <a href="#">Thiết kế xanh</a>
                            <a href="#">Xây dựng bền vững</a>
                            <a href="#">Kiến trúc hiện đại</a>
                            <a href="#">Smart Home</a>
                        </div>
                        
                        <div class="article-share">
                            <span>Chia sẻ:</span>
                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Author Box -->
                <div class="author-box animate-in">
                    <div class="author-avatar">
                        <img src="<?php echo BASE_URL; ?>/assets/images/team/author.jpg" alt="Tác giả" class="img-fluid rounded-circle">
                    </div>
                    <div class="author-info">
                        <h4>KTS. Nguyễn Văn Xây</h4>
                        <p class="author-bio">Kiến trúc sư với hơn 15 năm kinh nghiệm trong lĩnh vực thiết kế và xây dựng công trình hiện đại. Chuyên gia về thiết kế xanh và giải pháp bền vững.</p>
                        <div class="author-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>     
    </div>
</section>
<?php
include '../includes/footer.php';?>

<script>
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