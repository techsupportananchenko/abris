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
        ".product-front-hero, " +
        ".our-products-section_content_products_product_title"
    );

    targets.forEach((target) => observer.observe(target));
});
