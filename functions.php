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
	//wp_enqueue_script('slideshow_js', get_template_directory_uri() . '/js/slideshow.js', array('jquery') , '' , true);
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
	
	
	// only modify queries for 'inmuebles' post type 
	// para que carge solo el query necesitado usamos una variable del query para que se modifique solo ese ($query->query_vars['posts_per_page'] == -1)
	if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'inmuebles' && ($query->query_vars['posts_per_page'] !== 4 && $query->query_vars['posts_per_page'] !== 200) ) { 
		
		function setCustomQuery($key,$compare) {
			if( isset($_GET[$key]) ) {
				if ($_GET[$key] == 'precio' || $_GET[$key] == 'area') :
					$operacion = array(
						'key'=> $key,
						'value'=> (int) $_GET[$key],
						'compare' => $compare
					);
					return $operacion;
				else: 
					$operacion = array(
						'key'=> $key,
						'value'=> $_GET[$key],
						'compare' => $compare
					);
					return $operacion;
				endif;
			}
		}
		if (isset($_GET['order'])) {
			if ($_GET['order'] == 'bajo') {
				$query->set('meta_key', 'precio' );
				$query->set('orderby', array('meta_value_num' => 'ASC'));
			} else if($_GET['order'] == 'alto') {
				$query->set('meta_key', 'precio' );
				$query->set('orderby', array('meta_value_num' => 'DESC'));
			} else {
				$query->set('orderby', array('date' => 'DESC'));
			}
			
		}
		$query->set('meta_query', 
			array(
				'relation' =>'AND' ,
				setCustomQuery('operacion','='),
				setCustomQuery('banos','>='),
				setCustomQuery('dormitorios','>='),
				setCustomQuery('tipo','='),
				setCustomQuery('provincia','='),
				setCustomQuery('area','>='),
				setCustomQuery('precio','>=')

				)
		); 
		
	}
	
	// return
	return $query;

}

add_action('pre_get_posts', 'my_pre_get_posts');

?>
<?php 
function hs_image_editor_default_to_gd( $editors ) {
	$gd_editor = 'WP_Image_Editor_GD';
	$editors = array_diff( $editors, array( $gd_editor ) );
	array_unshift( $editors, $gd_editor );
	return $editors;
}
add_filter( 'wp_image_editors', 'hs_image_editor_default_to_gd' );
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
<?php
// Que se vea la barra de wordpress (top bar) solo para admin
add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	show_admin_bar(false);
	}
}
?>
<?php
add_action('wp_logout','ps_redirect_after_logout');
function ps_redirect_after_logout(){
         wp_redirect( get_site_url() );
         exit();
}

?>