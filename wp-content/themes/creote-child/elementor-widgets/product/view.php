<?php
/**
 * @var array $args Section fields
 */

[
    'title' => $title,
    'sub_title' => $sub_title,
    'background_image' => $background_image,
    'products' => $products,
] = $args;

$background_url = !empty($background_image['url']) ? esc_url($background_image['url']) : get_stylesheet_directory_uri() .'/assets/img/bg-1.webp';

?>

<div class="our-products-section" id="products">
    <img src="<?php echo $background_url; ?>" alt="our products" class="our-products-section_bg" loading="lazy">
    <div class="our-products-section_content">
        <h2 class="our-products-section_content_title"><?php echo esc_html($title); ?></h2>
        <p class="our-products-section_content_description"><?php echo esc_html($sub_title); ?></p>
        <div class="our-products-section_content_products">
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <div class="our-products-section_content_products_product">
                        <div class="our-products-section_content_products_product-inner">
                            <div class="product-front">
                                <img
                                        src="<?php echo esc_url($product['bg_image']['url']); ?>"
                                        alt="<?php echo esc_attr($product['product_title']); ?>" class="product-front-hero">
                                <h4 class="our-products-section_content_products_product_title">
                                    <?php echo esc_html($product['product_title']); ?>
                                </h4>
                                <?php
                                $icon_url = !empty($product['product_icon']['url'])
                                    ? esc_url($product['product_icon']['url'])
                                    : get_stylesheet_directory_uri() . '/assets/img/icon-product.svg';
                                ?>
                                <img src="<?php echo $icon_url; ?>" alt="icon" class="our-products-section_content_products_product_icon">
                            </div>
                            <div class="product-back">
                                <div class="product-back-description">
                                    <?php echo esc_html($product['product_description']); ?>
                                </div>
                                <a
                                        href="<?php echo esc_url($product['product_link']['url']); ?>"
                                        class="product-back-link">
                                    <?php esc_html_e('More details', 'textdomain'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
