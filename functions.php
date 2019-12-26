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
	wp_enqueue_script('upload_js', get_template_directory_uri() . '/js/upload.js', array('jquery') , '' , true);
	//wp_enqueue_script('upload_js', get_template_directory_uri() . '/js/upload.js', array('jquery') , '' , true);
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
		
		function setCustomQuery($key,$compare) {
			if( isset($_GET[$key]) ) {
				$operacion = array(
					'key'=> $key,
					'value'=> $_GET[$key],
					'compare' => $compare
				);
				return $operacion;
			}
		}
		$query->set('meta_query', 
			array(
				'relation' =>'ASDF' ,
				setCustomQuery('operacion','='),
				setCustomQuery('banos','='),
				setCustomQuery('dormitorios','=')
				)
		); 
		
	}
	
	
	// return
	return $query;

}

add_action('pre_get_posts', 'my_pre_get_posts');

?>

<?php 
// Imagenes Multiples funcion
function my_handle_attachment($file_handler,$post_id,$set_thu=false) {
	// check to make sure its a successful upload
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
  
	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');
  
	$attach_id = media_handle_upload( $file_handler, $post_id );
	return $attach_id;
}
?>