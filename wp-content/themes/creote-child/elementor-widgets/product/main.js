document.addEventListener("DOMContentLoaded", function () {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("animated", "fadeInUp");
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });

    const targets = document.querySelectorAll(
        ".our-products-section_content_title, " +
        ".our-products-section_content_description, " +
        ".our-products-section_content_products_product_title"
    );

    targets.forEach((target) => observer.observe(target));
});

document.addEventListener("DOMContentLoaded", function () {
    const sliderWrapper = document.querySelector(".hotspot-slider .swiper-wrapper");
    const points = document.querySelectorAll(".point_style");


    points.forEach((point, index) => {
        const contentHTML = point.getAttribute("data-html");
        const slide = document.createElement("div");
        slide.classList.add("swiper-slide");
        slide.innerHTML = contentHTML;
        sliderWrapper.appendChild(slide);


        point.addEventListener("click", () => {
            swiperInstance.slideTo(index);
        });
    });



    const swiperInstance = new Swiper(".hotspot-slider", {
        direction: "horizontal",
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            renderBullet: function (index, className) {

                return `<span class="${className}"></span>`;
            },
        },
    });
});
