<?php get_header(); ?>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>

<!-- inicia contenedor -->
<div class="pag-single container">
<?php  while ( have_posts() ) : the_post(); 
	$main_image_id = get_field('imagen_principal');
	$images_ids = get_field('imagenes_extra'); 
	$images_ids_array = explode(" ",$images_ids);
	$titulo = get_the_title();
	?>
	<div class="info-inmueble">
		<div class="info-inmueble__heading">
			<div class="info-inmueble__titulo-container">
				<h1 class="info-inmueble__titulo"><?php ucfirst(the_title());?></h1>
				<span class="info-inmueble__direccion">
					<img src="<?php echo $img_path; ?>/map.svg" alt="icono gps" class="propiedad__icono propiedad__icono--gps icon">
					<?php echo ucfirst(get_field('direccion')); if(get_field('barrio')) : echo " - " ; echo ucfirst(get_field('barrio')); endif;if(get_field('localidad')): echo " - " ;echo ucfirst(get_field('localidad')); endif;if(get_field('provincia')) : echo " - " ; echo ucfirst(get_field('provincia')); endif;?>
				</span>
			</div>
			<div class="info-inmueble__precio-container">
				
				<?php if(get_field('operacion') == 'alquiler'):?>
				<span class="info-inmueble__precio">$ <?php the_field('precio');?></span>
				<span class="info-inmueble__precio-criterio">Por mes</span>
				<?php else:?>
				<span class="info-inmueble__precio">U$S <?php the_field('precio');?></span>
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
				$extrasArray = explode("-",$extras);
				if ($extras):
				foreach($extrasArray as $extra):?>
				<span class="propiedad__dato">
					<img class="icon propiedad__icono" src="<?php echo $img_path; ?>/plus.svg" alt="icono auto"><span><?php echo ucfirst($extra); ?></span>
				</span>
				<?php endforeach;endif;?>
			</div>
			<a href="/SV/contacto?msg=Quiero%20más%20información%20sobre:%20<?php echo $titulo;?>" class="info-inmueble__mas-info">Quiero más información</a>
		</div>
	</div>
	
<?php endwhile; ?>


	<aside class="buscador-aside">
		<h1>búsqueda <span>avanzada</span></h1>
		<!-- hacemos query de inmuebles para obtener los valores de los campos del buscador -->
		<?php
			// arrays a los que se van a cargar los valores de los campos

			$campos = array('operacion','tipo','dormitorios','banos', 'provincia','area','precio','localidad');
			$campos_to_order = array('dormitorios', 'banos','area','precio');

			$operacion_array = array();
			$tipo_array = array();
			$dormitorios_array = array();
			$banos_array = array();
			$provincia_array = array();
			$area_array = array();
			$precio_array = array();
			$localidad_array = array();

			// args
			$args2 = array(
				'posts_per_page' => 200,
				'post_type'		=> 'inmuebles',
			);
			
			$the_query2 = new WP_Query( $args2 );
			if( $the_query2->have_posts() ): while ( $the_query2->have_posts() ) : $the_query2->the_post(); 
				
				foreach ($campos as $campo) {
					// Si el valor no esta en el array agregar con array_push
					if (!in_array(get_field($campo),${$campo . "_array"}) && get_field($campo)):
						array_push(${$campo . "_array"}, get_field($campo));
					endif;
				}
			
			endwhile; endif;

			foreach ($campos_to_order as $array) {
				asort(${$array . "_array"});
			}
		?>
		<form method="GET" action="/SV/inmuebles" class="buscador-aside__formulario">
			<select id="tipo" name="tipo" class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Tipo de inmueble</option>
				<option value="">Ninguno</option>
				<?php foreach ($tipo_array as $tipo): ?>
                    <option value="<?php echo $tipo;?>"><?php echo $tipo;?></option>
                <?php endforeach;?>
			</select>
			<select id="dormitorios" name="dormitorios" class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Dormitorios (mínimo)</option>
				<option value="">Ninguno</option>
				<?php foreach ($dormitorios_array as $dormitorios): ?>
                    <option value="<?php echo $dormitorios;?>">dormitorios: <?php echo $dormitorios;?></option>
                <?php endforeach;?>
			</select>
			<select id="banos" name="banos" class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Baños (mínimo)</option>
				<option value="">Ninguno</option>
				<?php foreach ($banos_array as $banos): ?>
                    <option value="<?php echo $banos;?>">baños: <?php echo $banos;?></option>
                <?php endforeach;?>
			</select>
			<select id="provincia" name="provincia" class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Provincia</option>
				<option value="">Ninguno</option>
				<?php foreach ($provincia_array as $provincia): ?>
                    <option value="<?php echo $provincia;?>"><?php echo $provincia;?></option>
                <?php endforeach;?>
			</select>
			<select id="localidad" name="localidad" class="buscador-aside__elemento-select">
                <option value="" selected disabled hidden>Localidad</option>
				<option value="">Ninguno</option>
                <?php foreach ($localidad_array as $localidad): ?>
                    <option value="<?php echo $localidad;?>"><?php echo $localidad;?></option>
                <?php endforeach;?>
            </select>
			<select id="area" name="area" class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Metros Cuad (mínimo)</option>
				<option value="">Ninguno</option>
				<?php foreach ($area_array as $area): ?>
                    <option value="<?php echo $area;?>">min: <?php echo $area;?> m2</option>
                <?php endforeach;?>
			</select>
			<select id="precio" name="precio" class="buscador-aside__elemento-select">
				<option value="" selected disabled hidden>Precio (mínimo)</option>
				<option value="">Ninguno</option>
				<?php foreach ($precio_array as $precio): ?>
                    <option value="<?php echo $precio;?>">min: $<?php echo $precio;?></option>
                <?php endforeach;?>
			</select>
			<button type="submit" class="buscador-aside__elemento-boton">BUSCAR</button>
		</form>
	</aside>

</div>
<!-- fin contenedor -->
<script src="<?php echo get_template_directory_uri();?>/js/slideshow.js"></script>
<script>
var titulo = "<?php echo $titulo;?>";
</script>
		
<?php get_footer();?>