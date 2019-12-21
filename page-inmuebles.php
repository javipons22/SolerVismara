<?php 
/* 
	Template Name: Inmuebles
*/
?>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>
<?php get_header(); ?>
<?php
// args
$args = array(
	'numberposts'	=> -1,
	'post_type'		=> 'inm',
);

// query
$the_query = new WP_Query( $args );
?>

<section class="destacados">
	<h1 class="destacados__titulo-seccion">propiedades destacadas</h1>
	<div class="destacados__container container">
		<!-- propiedad 1 -->

<?php if( $the_query->have_posts() ): ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<article class="propiedad">
			<div class="propiedad__contenedor-imagen">
				<img src="<?php echo $img_path; ?>/1.jpg" class="propiedad__imagen" alt="imagen propiedad">
			</div>
			<div class="propiedad__info">
				<div class="propiedad__contenedor-titulo">
					<h1 class="propiedad__titulo"><?php the_title();?></h1>
					<span class="propiedad__direccion"><img src="<?php echo $img_path; ?>/map.svg" alt="icono gps" class="propiedad__icono propiedad__icono--gps icon"><?php the_field('direccion');?></span>
				</div>
				<div class="propiedad__caracteristicas">
					<span class="propiedad__dato">
						<img class="icon propiedad__icono" src="<?php echo $img_path; ?>/area.svg" alt="icono area"><span><?php the_field('metros');?>m<sup>2</sup></span>
					</span>
					<span class="propiedad__dato">
						<img class="icon propiedad__icono" src="<?php echo $img_path; ?>/bed.svg" alt="icono cama"><span><?php the_field('dormitorios');?> Dormitorios</span>
					</span>
					<span class="propiedad__dato">
						<img class="icon propiedad__icono" src="<?php echo $img_path; ?>/shower.svg" alt="icono baño"><span><?php the_field('banos');?> Baños</span>
					</span>
					<span class="propiedad__dato">
						<img class="icon propiedad__icono" src="<?php echo $img_path; ?>/car.svg" alt="icono auto"><span>Garage</span>
					</span>
				</div>
				<div class="propiedad__fecha">
					<img class="icon propiedad__icono propiedad__icono--fecha" src="<?php echo $img_path; ?>/calendar.svg" alt="icono fecha"><span><?php echo get_the_date();?></span>
				</div>
			</div> 
		</article>
<?php endwhile; endif;?>
<!-- fin propiedad 1 -->
	<!-- fin destacados container -->
	</div>
<!-- fin destacados container -->
</section>

		
		
<?php get_footer(); ?>