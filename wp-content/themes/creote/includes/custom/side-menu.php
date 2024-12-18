<?php
/*
**
creote side menu
**
*/

function creote_menu_display_arear(){
    if(is_singular('mega_menu') || is_post_type_archive('mega_menu')):
        return false;
    endif;
 global $creote_theme_mod;
$side_menu_display_area = '';
if(!empty($creote_theme_mod['side_menu_display_area'])):
    $side_menu_display_area = $creote_theme_mod['side_menu_display_area'];
endif;
?>

 

<div class="sidemenu_area">
    <div class="side_menu_content">
        <a href="#" id="side_menu_toggle_btn_close"><i class="fas fa-close"></i></a>
        <?php  if(!empty($creote_theme_mod['side_menu_display_area'])): ?>
        <div class="position-relative">
            <?php  echo do_shortcode('[creote-mega-menu id="' . $side_menu_display_area . '"]'); ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php }