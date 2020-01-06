<?php get_header(); ?>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>

<!-- inicia contenedor -->
<div class="pag-single container">
<?php  while ( have_posts() ) : the_post(); 
	$main_image_id = get_field('imagen_principal');
	$images_ids = get_field('imagenes_extra'); 
	$images_ids_array = explode(" ",$images_ids);?>
	<div class="info-inmueble">
		<div class="info-inmueble__heading">
			<div class="info-inmueble__titulo-container">
				<h1 class="info-inmueble__titulo"><?php the_title();?></h1>
				<span class="info-inmueble__direccion">
					<img src="<?php echo $img_path; ?>/map.svg" alt="icono gps" class="propiedad__icono propiedad__icono--gps icon">
					<?php echo ucfirst(get_field('direccion')); if(get_field('barrio')) : echo " - " ; echo ucfirst(get_field('barrio')); endif;if(get_field('provincia')) : echo " - " ; echo ucfirst(get_field('provincia')); endif;?>
				</span>
			</div>
			<div class="info-inmueble__precio-container">
				<span class="info-inmueble__precio">$<?php the_field('precio');?></span>
				<?php if(get_field('operacion') == 'alquiler'):?>
				<span class="info-inmueble__precio-criterio">Por mes</span>
				<?php endif;?>
			</div>
		</div>
		<div id="slider">
			<a class="control_next">></a>
			<a class="control_prev"><</a>
			<ul>
				<?php
							$size1 = 'full'; // (thumbnail, medium, large, full or custom size)
							$class1= array( "class" => "slider__imagen" );
							if( strlen($main_image_id) > 0 ):?>
								<li>
									<?php echo wp_get_attachment_image( $main_image_id, $size1,false,$class1); ?>
								</li>
							<?php endif;?>
				<?php
				foreach ($images_ids_array as $image): ?>
					<?php
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						$class= array( "class" => "slider__imagen" );
						if( strlen($image) > 0 ):?>
							<li>
								<?php echo wp_get_attachment_image( $image, $size,false,$class); ?>
							</li>
						<?php endif;?>
				<?php endforeach; ?>
			</ul>  
		</div>
		<div class="info-inmueble__descripcion">
			<h1 class="info-inmueble__descripcion-titulo">Información <span>del inmueble</span></h1>
			<p class="info-inmueble__descripcion-texto"><?php the_field('descripcion');?></p>
			<div class="propiedad__caracteristicas propiedad__caracteristicas--sized">
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
			<a href="#" class="info-inmueble__mas-info">Quiero más información</a>
		</div>
	</div>
	
<?php endwhile; ?>


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

</div>
<!-- fin contenedor -->
<script src="<?php echo get_template_directory_uri();?>/js/slideshow.js"></script>
		
<?php get_footer();?>