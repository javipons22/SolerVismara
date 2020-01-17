<?php 
/* 
	Template Name: Upload
*/
?>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>
<?php get_header(); ?>
<?php 

// These files need to be included as dependencies when on the front end.
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );

$args = array(
    'post_type' => 'caracteristicas',
    'posts_per_page'=> -1
);

// Query
$query = new WP_Query($args);
    if($query->have_posts() ) : while($query ->have_posts()) : $query->the_post();  
        
        $operaciones = explode("-", get_field('operacion'));
        $tipos = explode("-", get_field('tipo'));
        $extras = explode("-", get_field('extras'));
        $provincias = explode("-", get_field('provincias'));

    endwhile; endif; wp_reset_postdata(); ?>
    <?php
    // La funcion agrega el valor especificado en el input a la lista de opciones 
    function addFieldValue($button,& $array,$field){ // El & pasa el array 'by reference'

        if(isset($_POST[$button])) {
            if(isset($_POST[$field . '-add']) && $_POST[$field . '-add'] != '' ){
                array_push($array,$_POST[$field . '-add']);
                $to_update= implode("-",$array);
                update_field($field, $to_update, 32);
            }
        }

    }

    addFieldValue('button1',$operaciones,'operacion');
    addFieldValue('button2',$tipos,'tipo');
    addFieldValue('button3',$extras,'extras');
    addFieldValue('button4',$provincias,'provincias');

    
    ?>
<div class="container">
    
    <form method="POST" id="upload-form" class="upload-form" enctype="multipart/form-data">
        <?php if($_SERVER['QUERY_STRING'] == "error=true"): ?>
        <div class="error">
            <p><strong>Error:</strong> Completa todos los campos requeridos, marcados con (*)</p>
        </div>
        <?php endif; ?>
        <div class="upload-form__elemento upload-form__elemento--titulo">
            <h2>TITULO(*)</h2>
            <span>Escribe el titulo que quieres que aparezca. Ej. "Lindo departamento en el centro"</span>
            <br>
            <input type="text" id="titulo" name="titulo" placeholder="Escribe Titulo...">
        </div>
        <div class="upload-form__elemento upload-form__elemento--operaciones">
            <h2>OPERACION(*)</h2>
            <span>Elige uno</span>
            <br>
            <div>
                <input name="operacion" value="0" type="hidden">
                <?php 
                foreach ($operaciones as $operacion) {
                    echo '<input id="'. $operacion .'" type="radio" name="operacion" value=' . $operacion .'>' . $operacion . '<br>';
                }   
                ?>
            </div>
            <div>
                <input type="text" name="operacion-add" placeholder="Agregar nueva opción...">
                <input type="submit" name="button1" value="+">
            </div>
            
        </div>
        <div class="upload-form__elemento upload-form__elemento--tipos">
            <h2>TIPO DE INMUEBLE(*)</h2>
            <span>Elige uno</span>
            <br>
            <div>
                <input name="tipo" value="0" type="hidden">
                <?php
                foreach ($tipos as $tipo) {
                    echo '<input id="'. $tipo .'" type="radio" name="tipo" value=' . $tipo .'>' . $tipo . '<br>';
                }   
                ?>
            </div>
            <div>
                <input type="text" name="tipo-add" placeholder="Agregar nueva opción...">
                <input type="submit" name="button2" value="+">
            </div>
        </div>
        <div class="upload-form__elemento upload-form__elemento--extras">
            <h2>EXTRAS</h2>
            <span>Elige extras</span>
            <br>
            <div>
                <?php
                foreach ($extras as $extra) {
                    echo '<input id="'. $extra .'" type="checkbox" name="extra[]" value=' . $extra .'>' . $extra . '<br>';
                }   
                ?>
            </div>
            <div>
                <input type="text" name="extras-add" placeholder="Agregar nueva opción...">
                <input type="submit" name="button3" value="+">
            </div>
        </div>
        <div class="upload-form__elemento upload-form__elemento--provincia">
            <h2>PROVINCIA(*)</h2>
            <span>Elige la provincia</span>
            <br>
            <div>
                <input name="provincia" value="0" type="hidden">
                <?php 
                foreach ($provincias as $provincia) {
                    echo '<input id="'. $provincia .'" type="radio" name="provincia" value=' . $provincia .'>' . $provincia . '<br>';
                }   
                ?>
            </div>
            <div>
                <input type="text" name="provincias-add" placeholder="Agregar nueva opción...">
                <input type="submit" name="button4" value="+">
            </div>
        </div>
        <div class="upload-form__elemento upload-form__elemento--barrio">
            <h2>BARRIO</h2>
            <span>Escribe el barrio en el que se ubica el inmueble</span>
            <br>
            <input id="barrio" type="text" name="barrio" placeholder="Escribe barrio...">
        </div>
        <div class="upload-form__elemento upload-form__elemento--direccion">
            <h2>DIRECCION(*)</h2>
            <span>Escribe la dirección del inmueble</span>
            <br>
            <input name="direccion" value="0" type="hidden">
            <input id="direccion" type="text" name="direccion" placeholder="Escribe dirección...">
        </div>
        <div class="upload-form__elemento upload-form__elemento--dormitorios">
            <h2>DORMITORIOS</h2>
            <span>Selecciona la cantidad de dormitorios (si no tiene dejar 0)</span>
            <br>
            <input id="dormitorios" type="number" name="dormitorios" value="0" min="0" max="10">
        </div>
        <div class="upload-form__elemento upload-form__elemento--banos">
            <h2>BAÑOS</h2>
            <span>Selecciona la cantidad de baños (si no tiene dejar 0)</span>
            <br>
            <input id="banos" type="number" name="banos" value="0" min="0" max="10">
        </div>
        <div class="upload-form__elemento upload-form__elemento--area">
            <h2>AREA(*)</h2>
            <span>Metros cuadrados de area</span>
            <br>
            <input name="area" value="0" type="hidden">
            <input id="area" type="number" name="area" min="0" max="100000">
            m<sup>2</sup>
        </div>
        <div class="upload-form__elemento upload-form__elemento--area">
            <h2>PRECIO(*)</h2>
            <span>Precio del inmueble</span>
            <br>
            $<input id="precio" type="number" name="precio">
        </div>
        <div class="upload-form__elemento upload-form__elemento--descripcion">
            <h2>DESCRIPCION</h2>
            <span>Descripcion del inmueble</span>
            <br>
            <textarea id="descripcion" rows="4" cols="50" name="descripcion"></textarea>
        </div>
        <div class="upload-form__elemento upload-form__elemento--imagen">
            <h2>IMAGEN PRINCIPAL(*)</h2>
            <span>Imagen principal</span>
            <input type="file" name="my_image_upload" id="my_image_upload" />
	        <input type="hidden" name="post_id" id="post_id" value="55" />
	        <?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
	        <!-- <input id="submit_my_image_upload" name="submit_my_image_upload" type="submit" value="Upload" /> -->
        </div>
        <div class="upload-form__elemento upload-form__elemento--imagen">
            <h2>IMAGENES EXTRA</h2>
            <span>Imagenes extra</span>
            <input type="file" name="my_image_upload2[]" id="my_image_upload2[]"  multiple="multiple"/>
	        <input type="hidden" name="post_id2" id="post_id2" value="55" />
	        <?php //wp_nonce_field( 'my_image_upload2', 'my_image_upload_nonce' ); ?>
	        <!-- <input id="submit_my_image_upload" name="submit_my_image_upload" type="submit" value="Upload" /> -->
        </div>
        <div class="upload-form__elemento upload-form__elemento--boton-final">
	        <input id="submit_form" name="submit_form" type="button" value="SUBIR PROPIEDAD" />
        </div>
        

        
    </form>
</div>

<script type="text/javascript">
    let seleccionados = <?php echo json_encode($_POST); ?>;
    console.log(seleccionados);
</script>
<?php get_footer(); ?>