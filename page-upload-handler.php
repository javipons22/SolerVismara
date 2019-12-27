<?php 
/* 
	Template Name: Upload-handler
*/
?>

<form id="form-return" method="POST" action="/SV/upload?error=true">
	<?php 
		foreach ($_POST as $name => $val) 
		{
		?>
		<input type="hidden" name="<?php echo $name?>" value="<?php echo $val?>">
		<?php
		}
	?>
</form>

<?php

	// Inicializamos las variables para usarlas en la pagina
	$titulo = $_POST['titulo'];
	$operacion = $_POST['operacion'];
	$tipo = $_POST['tipo'];
	$extra = $_POST['extra'];
	$provincia = $_POST['provincia'];
	$barrio = $_POST['barrio'];
	$direccion = $_POST['direccion'];
	$dormitorios = $_POST['dormitorios'];
	$baños = $_POST['banos'];
	$area = $_POST['area'];
	$precio = $_POST['precio'];

	$my_post = array(
		'post_title' => $titulo,
		'post_type' => 'inm',
		'post_status' => 'publish',
	);

	// Insert the post into the database
	$post_id = wp_insert_post($my_post);

	$camposTodos = array('titulo','operacion','tipo','extras','provincia','barrio','direccion','dormitorios','area','precio');

	// Controlamos que todas las variables tengan valor , si no es asi redireccionamos
	$camposValidar = array('titulo','operacion','tipo','provincia','area','precio','direccion');
	foreach ($_POST as $name => $val)
	{
		if (in_array($name,$camposValidar) && !$val)
		{
			?>
			<script>
				document.getElementById("form-return").submit();
			</script> 
			<?php
			exit();
			//echo "El valor : " . $name . " no esta completado \n";
			//header("Location: " . get_site_url() . "/upload?error=true");
		}
		if ($name == 'extra') {

			$extrasArray = array();
			foreach ($val as $extra) {
				$extrasArray[] = $extra;
			}
			$extrasEndValue = implode(" ",$extrasArray);
			//echo $extrasEndValue;
			update_field($name, $extrasEndValue, $post_id);

		} else {

			update_field($name, $val, $post_id);

		}
		//update_field('imagen_principal', $attachment_id, $post_id);
	}

?>

<?php
// ----------------------
// SUBIR IMAGENES FUNCIONES ( PRIMERA SINGLE Y SEGUNDA MULTIPLES IMAGENES)
// ----------------------
// AGREGAR POST ID EDIT POST CURRENT_USER_CAN

// Check that the nonce is valid, and the user can edit this post.
if ( 
	isset( $_POST['my_image_upload_nonce'], $_POST['post_id'] ) 
	&& wp_verify_nonce( $_POST['my_image_upload_nonce'], 'my_image_upload' )
) {
	// The nonce was valid and the user has the capabilities, it is safe to continue.

	// These files need to be included as dependencies when on the front end.
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	require_once( ABSPATH . 'wp-admin/includes/media.php' );
	
	// Let WordPress handle the upload.
	// Remember, 'my_image_upload' is the name of our file input in our form above.
	$attachment_id = media_handle_upload( 'my_image_upload', 0 );
	
	if ( is_wp_error( $attachment_id ) ) {
        // There was an error uploading the image.
        echo "Hubo un error al cargar la imagen.";
	} else {
		// The image was uploaded successfully!
		update_field('imagen_principal', $attachment_id, $post_id);
		echo "SUCCESS: " . $attachment_id;
		
	}

} else {

    // The security check failed, maybe show the user an error.
    echo "Error de seguridad.";
}

$imagenes_multiples_subidas = "";

if( 'POST' == $_SERVER['REQUEST_METHOD']  ) {
	if ( $_FILES ) { 
		$files = $_FILES["my_image_upload2"];  
		foreach ($files['name'] as $key => $value) {            
			if ($files['name'][$key]) { 
				$file = array( 
					'name' => $files['name'][$key],
					'type' => $files['type'][$key], 
					'tmp_name' => $files['tmp_name'][$key], 
					'error' => $files['error'][$key],
					'size' => $files['size'][$key]
				); 
				$_FILES = array ("my_image_upload2" => $file); 
				foreach ($_FILES as $file => $array) {              
					$newupload = my_handle_attachment($file,0); 
					echo $newupload;
					$imagenes_multiples_subidas .= $newupload . " ";
				}
				
			} 
		} 
		update_field('imagenes_extra', $imagenes_multiples_subidas, $post_id);
	}
	
}

?>