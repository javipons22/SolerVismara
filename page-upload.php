<?php 
/* 
	Template Name: Upload
*/
?>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>
<?php get_header(); ?>
<?php 
$args = array(
    'post_type' => 'caracteristicas',
    'posts_per_page'=> -1
);

// Query
$query = new WP_Query($args);
    if($query->have_posts() ) : while($query ->have_posts()) : $query->the_post();  
        $operaciones = explode(" ", get_field('operacion'));
        $tipos = explode(" ", get_field('tipo'));
        $extras = explode(" ", get_field('extras'));

    endwhile; endif; wp_reset_postdata(); ?>
    <?php
    if(isset($_POST['button1'])) {
        if(isset($_POST['operacion-agregada'])){
            array_push($operaciones,$_POST['operacion-agregada']);
            $to_update= implode(" ",$operaciones);
            update_field('operacion', $to_update, 32);
        }
    } 
    if(isset($_POST['button2'])) {
        if(isset($_POST['tipo-agregado'])){
            array_push($tipos,$_POST['tipo-agregado']);
            $to_update= implode(" ",$tipos);
            update_field('tipo', $to_update, 32);
        }
    } 
    ?>
<div class="container">
    <form method="POST" class="upload-form">
        <div class="operaciones">
            <h2>OPERACION</h2>
            <span>Elige uno</span>
            <br>
            <?php 
            foreach ($operaciones as $operacion) {
                echo '<input type="radio" name="operacion" value=' . $operacion .'>' . $operacion . '<br>';
            }   
            ?>
            <input type="text" name="operacion-agregada" placeholder="Agregar opción...">
            <input type="submit" name="button1" value="agregar">
        </div>
        <div class="tipos">
            <h2>TIPO DE INMUEBLE</h2>
            <span>Elige uno</span>
            <br>
            <?php
            foreach ($tipos as $tipo) {
                echo '<input type="radio" name="tipo" value=' . $tipo .'>' . $tipo . '<br>';
            }   
            ?>
            <input type="text" name="tipo-agregado" placeholder="Agregar opción...">
            <input type="submit" name="button2" value="agregar">
        </div>
        
    </form>
</div>
<?php get_footer(); ?>