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

<?php
function my_pre_get_posts( $query ) {
	
	// do not modify queries in the admin
	if( is_admin() ) {
		
		return $query;
		
	}
	
	
	// only modify queries for 'inm' post type
	if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'inm' ) {
		
		// allow the url to alter the query
		if( isset($_GET['operacion']) ) {
			$operacion = array(
				'key'=> 'operacion',
				'value'=> $_GET['operacion'],
				'compare' => '='
			);
			// 'meta_query'	=> array(
			// 	'relation'		=> 'OR',
			// 	array(
			// 		'key'		=> 'location',
			// 		'value'		=> 'Melbourne',
			// 		'compare'	=> 'LIKE'
			// 	),
			// 	array(
			// 		'key'		=> 'location',
			// 		'value'		=> 'Sydney',
			// 		'compare'	=> 'LIKE'
			// 	)
			// )	
		}
		if( isset($_GET['banos']) ) {
			$banos = array(
				'key'=> 'banos',
				'value'=> $_GET['banos'],
				'compare' => '='
			);
		}
		$query->set('meta_query', array('relation' =>'ASDF' , $operacion,$banos)); 
		
	}
	
	
	// return
	return $query;

}

add_action('pre_get_posts', 'my_pre_get_posts');

?>