<?php 
function wpt_theme_styles() { //wpt es un nombre dado por nosotros para diferenciar con otros plugins
    wp_enqueue_style( 'fuentegoogle1' , 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap' );
    wp_enqueue_style( 'fuentegoogle2' , 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );

?>
<?php
function wpt_theme_js() {
	wp_enqueue_script( 'svgInject_js', get_template_directory_uri() . '/js/svg-inject.min.js', '' , '' , true );//el ultimo parametro es dependence , version y si debe aparecer en el footer(false)
	wp_enqueue_script('main_js', get_template_directory_uri() . '/js/script.js', array('jquery') , '' , true);
}
add_action( 'wp_enqueue_scripts', 'wpt_theme_js' );

?>