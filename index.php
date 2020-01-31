<?php get_header(); ?>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>

    <!-- inicio banner -->
    <section class="banner">
        <img class="banner__imagen" src="<?php echo $img_path; ?>/banner.jpg" alt="imagen banner">
        <div class="banner__info">
            <h1 class="banner__titulo">Tus <strong>asesores inmobiliarios</strong> de confianza”, “Trabajamos por y para tu <strong>tranquilidad</strong>.</h1>
            <p class="banner__descripcion"></p>    
        </div>
    </section>
    <!-- fin banner -->
    <!-- inicio servicios -->
    <section class="servicios">
        <ul class="servicios__contenedor container">
            <li class="servicios__elemento servicios__elemento--first">
                <a href="/inmuebles?tipo=departamento" class="servicios__link">
                    <img class="servicios__imagen icon" src="<?php echo $img_path; ?>/building.svg" alt="icono departamento">
                    <h2 class="servicios__titulo">DEPARTAMENTO</h2>
                </a>
            </li>
            <li class="servicios__elemento">
                <a href="/inmuebles?tipo=casa" class="servicios__link">
                    <img class="servicios__imagen icon" src="<?php echo $img_path; ?>/home.svg" alt="icono casa">
                    <h2 class="servicios__titulo">CASA</h2>
                </a>
            </li>
            <li class="servicios__elemento">
                <a href="/inmuebles?tipo=oficina" class="servicios__link">
                    <img class="servicios__imagen icon" src="<?php echo $img_path; ?>/building2.svg" alt="icono oficina">
                    <h2 class="servicios__titulo">OFICINA</h2>
                </a>
            </li>
            <li class="servicios__elemento">
                <a href="/inmuebles?tipo=local" class="servicios__link">
                    <img class="servicios__imagen icon" src="<?php echo $img_path; ?>/shop.svg" alt="icono local">
                    <h2 class="servicios__titulo">LOCAL</h2>
                </a>
            </li>
            <li class="servicios__elemento">
                <a href="/inmuebles?tipo=campo" class="servicios__link">
                    <img class="servicios__imagen icon" src="<?php echo $img_path; ?>/farm.svg" alt="icono campos">
                    <h2 class="servicios__titulo">CAMPO</h2>
                </a>
            </li>
            <li class="servicios__elemento">
                <a href="/inmuebles?tipo=terreno" class="servicios__link">
                    <img class="servicios__imagen icon" src="<?php echo $img_path; ?>/terrain.svg" alt="icono terrenos">
                    <h2 class="servicios__titulo">TERRENO</h2>
                </a>
            </li>   
        </ul>
    </section>
    <!-- fin servicios -->

    <!-- hacemos query de inmuebles para obtener los valores de los campos del buscador -->
    <?php
        // arrays a los que se van a cargar los valores de los campos

        $campos = array('operacion','tipo','dormitorios','banos', 'provincia','area','precio');
        $campos_to_order = array('dormitorios', 'banos','area','precio');

        $operacion_array = array();
        $tipo_array = array();
        $dormitorios_array = array();
        $banos_array = array();
        $provincia_array = array();
        $area_array = array();
        $precio_array = array();

        // args
        $args = array(
            'posts_per_page' => -1,
            'post_type'		=> 'inmuebles',
        );
        
        // query
        global $the_query;
        $the_query = new WP_Query( $args );
        if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post(); 
            
            foreach ($campos as $campo) {
                // Si el valor no esta en el array agregar con array_push
                if (!in_array(get_field($campo),${$campo . "_array"})):
                    array_push(${$campo . "_array"}, get_field($campo));
                endif;
            }
        
        endwhile; endif;

        foreach ($campos_to_order as $array) {
            asort(${$array . "_array"});
        }
    ?>
    <!-- buscador index -->
    <section class="buscador">
        <button class="buscador__boton">
            <img class="buscador__icono icon" src="<?php echo $img_path; ?>/magnifier.svg" alt="lupa icono">
            <span class="buscador__texto">buscar inmueble por caracteristicas</span>
        </button>
        <form method="GET" action="<?php echo get_site_url(); ?>/inmuebles" class="buscador__formulario container">
            <select name="operacion" class="buscador__elemento-select">
                <option value="" selected disabled hidden>Operación</option>
                <?php foreach ($operacion_array as $operacion): ?>
                    <option value="<?php echo $operacion;?>"><?php echo $operacion;?></option>
                <?php endforeach;?>
            </select>
            <select name="tipo" class="buscador__elemento-select">
                <option value="" selected disabled hidden>Tipo de inmueble</option>
                <?php foreach ($tipo_array as $tipo): ?>
                    <option value="<?php echo $tipo;?>"><?php echo $tipo;?></option>
                <?php endforeach;?>
            </select>
            <select name="dormitorios" class="buscador__elemento-select">
                <option value="" selected disabled hidden>Dormitorios (mínimo)</option>
                <?php foreach ($dormitorios_array as $dormitorio): ?>
                    <option value="<?php echo $dormitorio;?>">dormitorios: <?php echo $dormitorio;?></option>
                <?php endforeach;?>
            </select>
            <select name="banos" class="buscador__elemento-select">
                <option value="" selected disabled hidden>Baños (mínimo)</option>
                <?php foreach ($banos_array as $bano): ?>
                    <option value="<?php echo $bano;?>">baños: <?php echo $bano;?></option>
                <?php endforeach;?>
            </select>
            <select name="provincia" class="buscador__elemento-select">
                <option value="" selected disabled hidden>Provincia</option>
                <?php foreach ($provincia_array as $provincia): ?>
                    <option value="<?php echo $provincia;?>"><?php echo $provincia;?></option>
                <?php endforeach;?>
            </select>
            <select name="area" class="buscador__elemento-select">
                <option value="" selected disabled hidden>Metros Cuadrados (mínimo)</option>
                <?php foreach ($area_array as $area): ?>
                    <option value="<?php echo $area;?>">min: <?php echo $area;?> m2</option>
                <?php endforeach;?>
            </select>
            <select name="precio" class="buscador__elemento-select">
                <option value="" selected disabled hidden>Precio (mínimo)</option>
                <?php foreach ($precio_array as $precio): ?>
                    <option value="<?php echo $precio;?>">min: $ <?php echo $precio;?></option>
                <?php endforeach;?>
            </select>
            <button type="submit" class="buscador__elemento-boton">BUSCAR</button>
        </form>
    </section>
    <!-- fin buscador index -->
    <!-- seccion destacados -->
    <section class="destacados">
        <h1 class="destacados__titulo-seccion">propiedades destacadas</h1>
        <div class="destacados__container container">
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
            $cantidad_destacados = 0;
        ?>
        <?php if( $the_query2->have_posts() ): ?>
		<?php while ( $the_query2->have_posts() ) : $the_query2->the_post(); ?>
		<article>
			<a href="<?php echo get_post_permalink();?>" class="propiedad propiedad-index">
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
						<img class="icon propiedad__icono propiedad__icono--fecha" src="<?php echo $img_path; ?>/calendar.svg" alt="icono fecha"><span><?php echo get_the_date();?></span>
					</div>
				</div>
			</a> 
		</article>
        <?php 
        endwhile;  endif;?>
        <!-- fin destacados container -->
        </div>
        <!-- fin destacados container -->
    </section>
    <!-- fin seccion destacados -->
    <!-- seccion tasaciones -->
    <section class="tasaciones">
        <div class="container tasaciones__contenedor">
            <img class="tasaciones__imagen" src="<?php echo $img_path; ?>/logo.svg" alt="logo empresa">
            <div class="tasaciones__contenido">
                <h2 class="tasaciones__titulo">¿Estas buscando <strong>vender</strong> tu propiedad?</h2>
                <a href="<?php echo get_site_url(); ?>/contacto" class="tasaciones__cta">CONTACTANOS</a>
            </div>
        </div>
    </section>
    <!-- fin seccion tasaciones -->

<?php get_footer(); ?>