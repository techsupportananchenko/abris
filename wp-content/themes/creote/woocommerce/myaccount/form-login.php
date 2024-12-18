<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.2.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>


<div class="whole_login_content">
<div class="register_login">
<?php if(!empty($creote_theme_mod['login_background_image']['url'])): ?> 
				<img src="<?php echo esc_url($creote_theme_mod['login_background_image']['url']); ?>" class="cover-parallax" alt="image" />
			<?php elseif(empty($creote_theme_mod['login_background_image']['url'])):
					$loginimage = get_template_directory_uri() . '/assets/images/login-min.jpg';
			?> 
				<img src="<?php echo esc_attr($loginimage); ?>" class="cover-parallax" alt="image" />
			<?php endif; ?>
	<div class="login_left_side">
		<div class="login_content_box">
			<?php if(!empty($creote_theme_mod['login_logo']['url'])): ?> 
				<a href="<?php echo esc_url(home_url()); ?>" class="login_logo"><img src="<?php echo esc_url($creote_theme_mod['login_logo']['url']); ?>"  alt="image" /></a>
				<?php elseif(empty($creote_theme_mod['login_logo']['url'])):
					$login_logo = get_template_directory_uri() . '/assets/images/logo-white.png';
			?> 
				<a href="<?php echo esc_url(home_url()); ?>" class="login_logo"><img src="<?php echo esc_attr($login_logo); ?>"  class="login_logo" alt="image" /></a>
			<?php endif; ?>
			


				<div class="login_forms_box">

		<?php if(!empty($creote_theme_mod['login_right_sm_text'])): ?> 
				<h6><?php echo wp_kses($creote_theme_mod['login_right_sm_text'] , wp_kses_allowed_html('post')); ?></h6>
		<?php elseif(empty($creote_theme_mod['login_right_sm_text'])):?> 
				<h6><?php echo wp_kses('Start For Free' , wp_kses_allowed_html('post')); ?></h6>
		<?php endif; ?>
		
		<?php if(!empty($creote_theme_mod['login_right_md_text'])): ?> 
				<h2><?php echo wp_kses($creote_theme_mod['login_right_md_text'] , wp_kses_allowed_html('post')); ?></h2>
		<?php elseif(empty($creote_theme_mod['login_right_md_text'])):?> 
				<h2><?php echo wp_kses('Create New Account' , wp_kses_allowed_html('post')); ?></h2>
		<?php endif; ?>

		<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
	<li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo esc_html('Login' , 'creote'); ?></button>
  </li>
  <li class="nav-item" role="presentation">
  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><?php echo esc_html('Register' , 'creote'); ?></button>
  </li>
 
</ul>
<?php endif; ?>

<div class="tab-content" id="pills-tabContent">



	<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

	<form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" required aria-required="true" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
			</p>
			<p class="woocommerce-LostPassword lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>
		
</div>
<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>



	<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

		

	<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

<?php do_action( 'woocommerce_register_form_start' ); ?>

<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
	</p>

<?php endif; ?>

<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
	<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
	<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
</p>

<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
		<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" required aria-required="true" />
	</p>

<?php else : ?>

	<p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_register_form' ); ?>

<p class="woocommerce-form-row form-row">
	<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
	<button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
</p>

<?php do_action( 'woocommerce_register_form_end' ); ?>

</form>


	</div>


<?php endif; ?>
</div>
</div>
		</div>
	</div>
	
</div>
</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
