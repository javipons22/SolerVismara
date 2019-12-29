<?php get_header(); ?>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		//
		the_title();
		//
	} // end while
} // end if
?>
<?php get_footer();?>