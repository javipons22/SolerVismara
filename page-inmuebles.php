<?php 
/* 
	Template Name: Todos Buscador
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

// query
global $the_query;
$the_query = new WP_Query( $args );
?>
<div class="pag-inmuebles container">
	<aside class="buscador-aside">
		<h1>búsqueda <span>avanzada</span></h1>
		<form class="buscador-aside__formulario">
			<select class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Operación</option>
				<option value="compra">Compra</option>
				<option value="alquiler">Alquiler</option>
			</select>
			<select class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Tipo de inmueble</option>
				<option value="casa">Casa</option>
				<option value="departamento">Departamento</option>
			</select>
			<select class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Dormitorios</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<select class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Baños</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<select class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Provincia</option>
				<option value="Cordoba">Cordoba</option>
				<option value="Buenos Aires">Buenos Aires</option>
			</select>
			<select class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Metros Cuadrados</option>
			</select>
			<select class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Precio</option>
			</select>
			<button type="submit" class="buscador-aside__elemento-boton">BUSCAR</button>
		</form>
	</aside>
	<section class="inmuebles">
		<div class="inmuebles__container">
			<div class="inmuebles__top-bar">
				<img class="icon inmuebles__icono" src="<?php echo $img_path; ?>/list.svg" alt="icono lista">
				<h1 class="inmuebles__titulo">Lista de Inmuebles</h1>
				<form class="inmuebles__formulario" id="formulario-order" method="GET">
					<select name="order" class="inmuebles__elemento-select" onchange="function(e){this.submit();}">
						<option value="reciente" selected>Más recientes primero</option>
						<option id="alto" value="alto">Precio más alto primero</option>
						<option id="bajo" value="bajo">Precio más bajo primero</option>
					</select>
			</div>
			<!-- propiedad 1 -->

	<?php if( $the_query->have_posts() ): ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<article >
			<a href="<?php echo get_post_permalink();?>"	class="propiedad">
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
						<img class="icon propiedad__icono propiedad__icono--fecha" src="<?php echo $img_path; ?>/calendar.svg" alt="icono fecha"><span><?php echo get_the_date();?></span>
					</div>
				</div>
			</a> 
		</article>
	<?php 
	endwhile;?>
	<?php //wp_reset_postdata(); ?>
	 <?php endif;?>
	<!-- fin propiedad 1 -->
		<!-- fin destacados container -->
		</div>
	<!-- fin destacados container -->
	</section>
</div>


<?php get_footer(); ?>