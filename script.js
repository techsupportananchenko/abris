document.addEventListener('DOMContentLoaded', function() {
    // Get all tab items and content items
    const tabItems = document.querySelectorAll('.tabs-settings_item');
    const contentItems = document.querySelectorAll('.capabilities_tabs_item');

    // Set first tab and content as active by default
    contentItems[0].classList.add('active');

    // Add click event listener to each tab
    tabItems.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            // Remove active class from all tabs and content
            tabItems.forEach(item => item.classList.remove('active'));
            contentItems.forEach(item => item.classList.remove('active'));

            // Add active class to clicked tab and corresponding content
            tab.classList.add('active');
            contentItems[index].classList.add('active');
        });
    });

    // Initialize Swiper
    const swiper = new Swiper('.partners-section_content_partners-slider', {
        // Optional parameters
        loop: true,
        slidesPerView: 5,
        spaceBetween: 24,
        
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 2,
                spaceBetween: 24
            },
            // when window width is >= 768px
            768: {
                slidesPerView: 3,
                spaceBetween: 24
            },
            // when window width is >= 1024px
            1024: {
                slidesPerView: 4,
                spaceBetween: 24
            },
            // when window width is >= 1280px
            1380: {
                slidesPerView: 5,
                spaceBetween: 24
            }
        }
    });
});
