document.addEventListener('DOMContentLoaded', function () {
    // =========================
    // Hero Slider functionality
    // =========================
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slider-dot');
    let currentSlide = 0;
    let slideInterval;

    function showSlide(n) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        slides[n].classList.add('active');
        dots[n].classList.add('active');
        currentSlide = n;
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function startSlideShow() {
        slideInterval = setInterval(nextSlide, 5000);
    }

    function stopSlideShow() {
        clearInterval(slideInterval);
    }

    startSlideShow();

    // Manual slide control via dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            stopSlideShow();
            startSlideShow();
        });
    });

    // =========================
    // Testimonial Slider
    // =========================
    const testimonialSlides = document.querySelectorAll('.testimonial-slide');
    const prevTestimonial = document.querySelector('.prev-testimonial');
    const nextTestimonial = document.querySelector('.next-testimonial');
    let currentTestimonial = 0;

    function showTestimonial(n) {
        testimonialSlides.forEach(slide => slide.classList.remove('active'));
        currentTestimonial = (n + testimonialSlides.length) % testimonialSlides.length;
        testimonialSlides[currentTestimonial].classList.add('active');
    }

    if (prevTestimonial && nextTestimonial) {
        nextTestimonial.addEventListener('click', () => {
            showTestimonial(currentTestimonial + 1);
        });

        prevTestimonial.addEventListener('click', () => {
            showTestimonial(currentTestimonial - 1);
        });
    }

    // =========================
    // Project filter
    // =========================
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.getAttribute('data-filter');
            projectCards.forEach(card => {
                const category = card.getAttribute('data-category');
                if (filter === 'all' || category === filter) {
                    card.style.display = 'block';
                    card.classList.add('fade-in');
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // =========================
    // Mobile Navigation
    // =========================
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const closeNavBtn = document.querySelector('.close-nav');
    const mainNav = document.querySelector('.main-nav');
    const body = document.body;
    const overlay = document.createElement('div');
    overlay.className = 'nav-overlay';
    body.appendChild(overlay);

    function toggleMenu() {
        mainNav.classList.toggle('active');
        mobileMenuBtn.classList.toggle('active');
        overlay.classList.toggle('active');
        body.classList.toggle('menu-open');
    }

    mobileMenuBtn.addEventListener('click', toggleMenu);
    closeNavBtn.addEventListener('click', toggleMenu);
    overlay.addEventListener('click', toggleMenu);

    // Fix: Correctly handle link clicks
    const dropdownItems = document.querySelectorAll('.has-dropdown > a');
    dropdownItems.forEach(item => {
        item.addEventListener('click', function(e) {
            const dropdown = this.nextElementSibling;
            if (window.innerWidth <= 768 && dropdown && dropdown.classList.contains('dropdown')) {
                e.preventDefault();
                this.parentElement.classList.toggle('active');
                dropdown.style.maxHeight = dropdown.style.maxHeight ? null : `${dropdown.scrollHeight}px`;
            } else {
                // Allow normal link behavior if not a dropdown or on desktop
                window.location.href = this.href;
            }
        });
    });

    const menuLinks = mainNav.querySelectorAll('a');
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (mainNav.classList.contains('active')) {
                toggleMenu();
            }
        });
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            mainNav.classList.remove('active');
            overlay.classList.remove('active');
            body.classList.remove('menu-open');
            mobileMenuBtn.classList.remove('active');
            dropdownItems.forEach(item => {
                item.classList.remove('active');
                const dropdown = item.querySelector('.dropdown');
                if (dropdown) dropdown.style.maxHeight = null;
            });
        }
    });

    // =========================
    // Dropdown functionality
    // =========================
    const dropdownLinks = document.querySelectorAll('.main-nav ul li a');
    dropdownLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            if (this.nextElementSibling && this.nextElementSibling.classList.contains('dropdown')) {
                e.preventDefault();
                const dropdown = this.nextElementSibling;
                dropdown.classList.toggle('dropdown-active');
                dropdown.style.maxHeight = dropdown.style.maxHeight ? null : dropdown.scrollHeight + 'px';
            }
        });
    });

    // Keep dropdown open when hovered
    mainNav.addEventListener('mouseover', function (e) {
        const target = e.target.closest('li');
        if (target && target.querySelector('.dropdown')) {
            const dropdown = target.querySelector('.dropdown');
            dropdown.classList.add('dropdown-active');
        }
    });

    mainNav.addEventListener('mouseleave', function () {
        const openDropdowns = mainNav.querySelectorAll('.dropdown-active');
        openDropdowns.forEach(dropdown => {
            dropdown.classList.remove('dropdown-active');
        });
    });

    // =========================
    // Form submission alert
    // =========================
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Cảm ơn bạn đã gửi tin nhắn! Chúng tôi sẽ liên hệ với bạn sớm nhất có thể.');
            contactForm.reset();
        });
    }

    // =========================
    // AOS Initialization (if available)
    // =========================
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true
        });
    }
});
// Dropdown giữ trạng thái khi hover
document.addEventListener('DOMContentLoaded', function () {
    const mainNav = document.querySelector('.main-nav');
    const dropdownLinks = document.querySelectorAll('.main-nav ul li');

    dropdownLinks.forEach(link => {
        link.addEventListener('mouseenter', function () {
            const dropdown = this.querySelector('.dropdown');
            if (dropdown) {
                dropdown.style.opacity = '1';
                dropdown.style.visibility = 'visible';
                dropdown.style.transform = 'translateY(0)';
                dropdown.style.pointerEvents = 'auto';
            }
        });

        link.addEventListener('mouseleave', function () {
            const dropdown = this.querySelector('.dropdown');
            if (dropdown) {
                dropdown.style.opacity = '0';
                dropdown.style.visibility = 'hidden';
                dropdown.style.transform = 'translateY(15px)';
                dropdown.style.pointerEvents = 'none';
            }
        });
    });
});

