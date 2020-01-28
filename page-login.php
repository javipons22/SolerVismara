<?php
/*
Template Name: LOGIN
 */
get_header();

?>
<div class="container">
    <section class="upload">
<?php 
    $args = array('form_id' => 'form-login');
    wp_login_form($args);
?>
    </section>
</div>


<?php get_footer(); ?>