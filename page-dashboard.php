<?php 
/* 
	Template Name: Dashboard
*/
?>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>
<?php get_header(); ?>
<?php
// args
$args = array(
	'posts_per_page' => -1,
	'post_type'		=> 'inmuebles',
);
// Para que ande la paginacion (esto reemplaza el wp_query original)
//$wp_query = new WP_Query($args);

$the_query = new WP_Query( $args );
?>
<div class="pag-inmuebles container">
    <aside class="buscador-aside">
        <a class="link-subir" href="/SV/upload">CARGAR INMUEBLE AL SISTEMA</a>
    </aside>
    <section class="inmuebles">
		<div class="inmuebles__container">
            <div class="inmuebles__top-bar">
                <img class="icon inmuebles__icono" src="<?php echo $img_path; ?>/list.svg" alt="icono lista">
                <h1 class="inmuebles__titulo">Administrador de Inmuebles</h1>
            </div>
<?php if( $the_query->have_posts() ): ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<article class="propiedad">
				<div class="propiedad__contenedor-imagen">
				<?php
					$image = get_field('imagen_principal');
					$size = 'full'; // (thumbnail, medium, large, full or custom size)
					$class= array( "class" => "propiedad__imagen" );
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, false ,$class );
					}
				?>
				</div>
				<div class="propiedad__info">
					<div class="propiedad__contenedor-titulo">
						<h1 class="propiedad__titulo"><?php the_title();?></h1>
						<span class="propiedad__direccion"><img src="<?php echo $img_path; ?>/map.svg" alt="icono gps" class="propiedad__icono propiedad__icono--gps icon"><?php the_field('direccion')?><?php if(get_field('barrio')): echo " - " ;echo ucfirst(get_field('barrio')); endif;?><?php if(get_field('provincia')): echo " - " ;echo ucfirst(get_field('provincia')) ;endif;?></span>
					</div>
					<div class="propiedad__caracteristicas">
						<span class="propiedad__dato">
							<img class="icon propiedad__icono" src="<?php echo $img_path; ?>/area.svg" alt="icono area"><span><?php the_field('area');?> m<sup>2</sup></span>
						</span>
						<?php if(get_field('dormitorios') || get_field('dormitorios') > 0):?>
						<span class="propiedad__dato">
							<img class="icon propiedad__icono" src="<?php echo $img_path; ?>/bed.svg" alt="icono cama"><span><?php the_field('dormitorios');?> Dormitorios</span>
						</span>
						<?php endif;?>
						<?php if(get_field('banos') || get_field('banos') > 0):?>
						<span class="propiedad__dato">
							<img class="icon propiedad__icono" src="<?php echo $img_path; ?>/shower.svg" alt="icono baño"><span><?php the_field('banos');?> Baños</span>
						</span>
						<?php endif;?>
						<?php 
						$extras = get_field('extra');
						$extrasArray = explode(" ",$extras);
						if ($extras):
						foreach($extrasArray as $extra):?>
						<span class="propiedad__dato">
							<img class="icon propiedad__icono" src="<?php echo $img_path; ?>/plus.svg" alt="icono auto"><span><?php echo ucfirst($extra); ?></span>
						</span>
						<?php endforeach;endif;?>
					</div>
					<div class="propiedad__fecha">
                        <a class="propiedad__modificar" href="/SV/edit?id=<?php echo get_the_ID(); ?>">Modificar propiedad</a>
                        <a class="propiedad__borrar" href="/SV/delete?id=<?php echo get_the_ID(); ?>">Eliminar propiedad</a>
						<img class="icon propiedad__icono propiedad__icono--fecha" src="<?php echo $img_path; ?>/calendar.svg" alt="icono fecha"><span><?php echo get_the_date();?></span>
					</div>
				</div>
		</article>
	<?php 
	endwhile;?>
	<?php else: ?>
						No hay resultados
	<?php endif;?>
        </div>
    </section>
</div>
<?php get_footer(); ?>