document.addEventListener('DOMContentLoaded', function() {
    // Get all tab items and content items
    const desktopTabs = document.querySelectorAll('.tabs-settings .tabs-settings_item');
    const mobileTabs = document.querySelectorAll('.tabs-settings-mobile .tabs-settings_item');
    const contentItems = document.querySelectorAll('.capabilities_tabs_item');

    // Set first tab and content as active by default
    if (contentItems.length > 0) {
        contentItems[0].classList.add('active');
    }

    function handleTabClick(clickedTab, index) {
        // Remove active class from all tabs
        desktopTabs.forEach(tab => tab.classList.remove('active'));
        mobileTabs.forEach(tab => tab.classList.remove('active'));
        contentItems.forEach(item => item.classList.remove('active'));

        // Add active class to corresponding tabs and content
        clickedTab.classList.add('active');
        if (contentItems[index]) {
            contentItems[index].classList.add('active');
        }

        // Sync other tab set
        const isMobileTab = clickedTab.closest('.tabs-settings-mobile');
        if (isMobileTab && desktopTabs[index]) {
            desktopTabs[index].classList.add('active');
        } else if (!isMobileTab && mobileTabs[index]) {
            mobileTabs[index].classList.add('active');
        }
    }

    // Add click event listeners
    desktopTabs.forEach((tab, index) => {
        tab.addEventListener('click', () => handleTabClick(tab, index));
    });

    mobileTabs.forEach((tab, index) => {
        tab.addEventListener('click', () => handleTabClick(tab, index));
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
                slidesPerView: 1,
                spaceBetween: 24
            },
            // when window width is >= 768px
            768: {
                slidesPerView: 1,
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

    // Mobile Menu functionality
    const burgerIcon = document.querySelector('.burger-icon');
    const closeIcon = document.querySelector('.close-icon');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileMenuItems = document.querySelectorAll('.mobile-menu_item');
    const body = document.body;

    function toggleMenu() {
        mobileMenu.classList.toggle('active');
        body.classList.toggle('menu-open');
    }

    burgerIcon.addEventListener('click', toggleMenu);
    closeIcon.addEventListener('click', toggleMenu);

    // Close menu when clicking on menu items
    mobileMenuItems.forEach(item => {
        item.addEventListener('click', () => {
            toggleMenu();
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (mobileMenu.classList.contains('active') && 
            !e.target.closest('.mobile-menu') && 
            !e.target.closest('.header_content_menu_mobile')) {
            toggleMenu();
        }
    });

    // Initialize D-Section Mobile Slider
    const dSectionMobileSlider = new Swiper('.d-section-mobile-slider', {
        slidesPerView: 1,
        spaceBetween: 16,
        initialSlide: 0, // Start with first slide
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 16
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 16
            }
        }
    });

    // D-Section Circle Points Interaction
    const dSectionItems = document.querySelectorAll('.d-section_item');
    const dSectionCircles = document.querySelectorAll('.d-section_item_circle');
    
    // Set first circle as active by default
    if (dSectionCircles.length > 0) {
        dSectionCircles[0].classList.add('active');
    }

    dSectionItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            // Remove active class from all circles
            dSectionCircles.forEach(circle => circle.classList.remove('active'));
            
            // Add active class to clicked circle
            item.querySelector('.d-section_item_circle').classList.add('active');
            
            // Sync with mobile slider
            if (dSectionMobileSlider) {
                dSectionMobileSlider.slideTo(index);
            }
        });
    });

    // Sync circles when mobile slider changes
    dSectionMobileSlider.on('slideChange', function () {
        const activeIndex = dSectionMobileSlider.activeIndex;
        
        // Remove active class from all circles
        dSectionCircles.forEach(circle => circle.classList.remove('active'));
        
        // Add active class to corresponding circle
        if (dSectionCircles[activeIndex]) {
            dSectionCircles[activeIndex].classList.add('active');
        }
    });

    const anchors = document.querySelectorAll('a[href^="#"]');
    
    anchors.forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            
            if (targetId !== '#') {
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    const targetPosition = targetElement.offsetTop;
                    const startPosition = window.pageYOffset;
                    const distance = targetPosition - startPosition;
                    const duration = 1000; // animation duration in ms
                    let start = null;
                    
                    function animation(currentTime) {
                        if (start === null) start = currentTime;
                        const timeElapsed = currentTime - start;
                        const run = ease(timeElapsed, startPosition, distance, duration);
                        window.scrollTo(0, run);
                        if (timeElapsed < duration) requestAnimationFrame(animation);
                    }
                    
                    // easing function
                    function ease(t, b, c, d) {
                        t /= d / 2;
                        if (t < 1) return c / 2 * t * t + b;
                        t--;
                        return -c / 2 * (t * (t - 2) - 1) + b;
                    }
                    
                    requestAnimationFrame(animation);
                }
            }
        });
    });

    // Add fade-in class to elements that need to be animated
    const elementsToAnimate = document.querySelectorAll('.content_image_img-top, .content_image_img-bottom, .content_text_title, .content_text_description');
    elementsToAnimate.forEach(element => {
        element.classList.add('fade-in');
    });

    // Function to check if element is in viewport
    function checkVisibility() {
        elementsToAnimate.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementBottom = element.getBoundingClientRect().bottom;
            
            // Determine when element should become visible
            const isVisible = (elementTop < window.innerHeight - 100) && (elementBottom > 0);
            
            if (isVisible) {
                element.classList.add('active');
            }
        });
    }

    // Check visibility on load and scroll
    window.addEventListener('scroll', checkVisibility);
    checkVisibility(); // Check immediately after loading

    // Animation for capabilities section
    function initCapabilitiesAnimation() {
        const title = document.querySelector('.capabilities-section_content_title');
        const description = document.querySelector('.capabilities-section_content_description');
        const tabsSettings = document.querySelector('.tabs-settings');
        const mobileTabsSettings = document.querySelector('.tabs-settings-mobile');
        const tabsItems = document.querySelectorAll('.capabilities_tabs_item');

        function checkCapabilitiesVisibility() {
            const section = document.querySelector('.capabilities-section');
            const sectionTop = section.getBoundingClientRect().top;
            const triggerPoint = window.innerHeight - 100;

            if (sectionTop < triggerPoint) {
                // Animate title and description with delay
                setTimeout(() => {
                    title.classList.add('active');
                }, 200);
                
                setTimeout(() => {
                    description.classList.add('active');
                }, 400);

                // Animate tabs
                setTimeout(() => {
                    tabsSettings.classList.add('active');
                    mobileTabsSettings.classList.add('active');
                }, 600);

                // Animate tab content
                tabsItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.add('fade-active');
                    }, 800 + (index * 100));
                });

                // Remove event listener after animation triggers
                window.removeEventListener('scroll', checkCapabilitiesVisibility);
            }
        }

        window.addEventListener('scroll', checkCapabilitiesVisibility);
        // Check position on load
        checkCapabilitiesVisibility();
    }

    // Initialize capabilities animation
    initCapabilitiesAnimation();

    function initFieldsAnimation() {
        const title = document.querySelector('.fields-section_content_title');
        const description = document.querySelector('.fields-section_content_fields');
        const items = document.querySelectorAll('.fields-section_content_fields_list_item');

        function checkFieldsVisibility() {
            const section = document.querySelector('.fields-section');
            const sectionTop = section.getBoundingClientRect().top;
            const triggerPoint = window.innerHeight - 100;

            if (sectionTop < triggerPoint) {
                // Animate title
                setTimeout(() => {
                    title.classList.add('active');
                }, 200);

                // Animate description
                setTimeout(() => {
                    description.classList.add('active');
                }, 400);

                // Animate each list item with delay
                items.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.add('active');
                    }, 600 + (index * 100)); // Each next item appears 100ms later
                });

                // Remove event listener after animation triggers
                window.removeEventListener('scroll', checkFieldsVisibility);
            }
        }

        window.addEventListener('scroll', checkFieldsVisibility);
        // Check position on load
        checkFieldsVisibility();
    }

    // Initialize fields animation
    initFieldsAnimation();

    function initFooterAnimation() {
        const footerItems = document.querySelectorAll('.footer_item');
        const footerIcons = document.querySelectorAll('.footer_icons');
        const footerCopyright = document.querySelector('.footer_copyright');

        function checkFooterVisibility() {
            const footer = document.querySelector('footer');
            const footerTop = footer.getBoundingClientRect().top;
            const triggerPoint = window.innerHeight - 100;

            if (footerTop < triggerPoint) {
                // Animate footer items
                footerItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.add('active');
                    }, 200 + (index * 200));
                });

                // Animate icons
                footerIcons.forEach((icons, index) => {
                    setTimeout(() => {
                        icons.classList.add('active');
                    }, 600 + (index * 100));
                });

                // Animate copyright
                setTimeout(() => {
                    footerCopyright.classList.add('active');
                }, 800);

                // Remove event listener after animation triggers
                window.removeEventListener('scroll', checkFooterVisibility);
            }
        }

        window.addEventListener('scroll', checkFooterVisibility);
        // Check position on load
        checkFooterVisibility();
    }

    // Initialize footer animation
    initFooterAnimation();
});
