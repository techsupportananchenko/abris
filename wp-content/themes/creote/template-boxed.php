<?php
/*
** Template Name:  Boxed
** Template Post Type: post, page , project , service , product
** This is the most generic template file in a WordPress theme
** and one of the two required files for a theme (the other being style.css).
** It is used to display a page when nothing more specific matches a query.
** E.g., it puts together the home page when no home.php file exists.
** Learn more: http://codex.wordpress.org/Template_Hierarchy
** @package Nest Ecommerce Empty Page
*/
get_header(); ?>
<div class="full_width_box"> 
<?php
if(have_posts()) :
	while(have_posts()) : the_post();
		the_content();
	endwhile;
endif;
?>
</div>
<?php get_footer(); ?>