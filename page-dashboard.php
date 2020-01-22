<?php 
/* 
	Template Name: Dashboard
*/
?>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>
<?php get_header(); ?>

<div class="pag-inmuebles container">
    <aside class="buscador-aside">
        <a class="link-subir" href="/SV/upload">CARGAR INMUEBLE AL SISTEMA</a>
		<div class="recientes recientes--dark">
			<h2 class="recientes__titulo">DESTACADOS EN PAGINA INICIO</h2>
			<ul class="recientes__info">
			<?php
				$args2 = array(
					'posts_per_page' => 4,
					'post_type'		=> 'inmuebles',
					'meta_key'		=> 'destacado',
					'meta_value'	=> true
				);
				// Para que ande la paginacion (esto reemplaza el wp_query original)
				//$wp_query = new WP_Query($args);

				// query
				$the_query2 = new WP_Query( $args2 );
				$destacados_array = array();
			?>
			<?php if( $the_query2->have_posts() ): ?>
				<?php while ( $the_query2->have_posts() ) : $the_query2->the_post(); ?>
				<?php array_push($destacados_array, get_the_ID());?>
				<li class="propiedad-reciente">
					<?php
						$image = get_field('imagen_principal');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						$class= array( "class" => "propiedad-reciente__imagen" );
						if( $image ) {
							echo wp_get_attachment_image( $image, $size, false ,$class );
						}
					?>
					<div class="propiedad-reciente__contenido">
						<h2 class="propiedad-reciente__titulo"><?php the_title();?></h2>
						<span class="propiedad-reciente__fecha"><?php echo get_the_date();?></span>
						<a class="propiedad-reciente__borrar" href="/SV/dashboard-handler?action=borrar&id=<?php echo get_the_ID(); ?>">QUITAR DE DESTACADOS</a>
					</div>
				</li>
			<?php endwhile; endif;?>
			</ul>
    </aside>
    <section class="inmuebles">
		<div class="inmuebles__container">
            <div class="inmuebles__top-bar">
                <img class="icon inmuebles__icono" src="<?php echo $img_path; ?>/list.svg" alt="icono lista">
                <h1 class="inmuebles__titulo">Administrador de Inmuebles</h1>
			</div>
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
						$extrasArray = explode("-",$extras);
						if ($extras):
						foreach($extrasArray as $extra):?>
						<span class="propiedad__dato">
							<img class="icon propiedad__icono" src="<?php echo $img_path; ?>/plus.svg" alt="icono auto"><span><?php echo ucfirst($extra); ?></span>
						</span>
						<?php endforeach;endif;?>
					</div>
					<div class="propiedad__fecha">
						<?php if (count($destacados_array) < 4 && !in_array(get_the_ID(), $destacados_array) ) :?>
							<a class="propiedad__destacar" href="/SV/dashboard-handler?action=agregar&id=<?php echo get_the_ID(); ?>">Destacar</a>
						<?php endif;?>
                        <a class="propiedad__modificar" href="/SV/edit?id=<?php echo get_the_ID(); ?>">Modificar</a>
                        <a class="propiedad__borrar" href="/SV/delete?id=<?php echo get_the_ID(); ?>">Eliminar</a>
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