<?php get_header(); ?>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>
<main class="contenido-main">
    <!-- inicio banner -->
    <section class="banner">
        <img class="banner__imagen" src="<?php echo $img_path; ?>/banner.jpg" alt="imagen banner">
        <div class="banner__info">
            <h1 class="banner__titulo"><strong>Capacidad</strong>, Transparencia, <strong>Eficiencia</strong>, Tranquilidad"</h1>
            <p class="banner__descripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic id eveniet dolorem officia eum eaque eligendi officiis itaque nesciunt. Omnis?</p>    
        </div>
    </section>
    <!-- fin banner -->
    <!-- inicio servicios -->
    <section class="servicios">
        <ul class="servicios__contenedor container">
            <li class="servicios__elemento servicios__elemento--first">
                <a href="#test" class="servicios__link">
                    <img class="servicios__imagen icon" src="<?php echo $img_path; ?>/building.svg" alt="icono departamento">
                    <h2 class="servicios__titulo">DEPARTAMENTO</h2>
                </a>
            </li>
            <li class="servicios__elemento">
                <a href="#test" class="servicios__link">
                    <img class="servicios__imagen icon" src="<?php echo $img_path; ?>/home.svg" alt="icono casa">
                    <h2 class="servicios__titulo">CASA</h2>
                </a>
            </li>
            <li class="servicios__elemento">
                <a href="#test" class="servicios__link">
                    <img class="servicios__imagen icon" src="<?php echo $img_path; ?>/building2.svg" alt="icono oficina">
                    <h2 class="servicios__titulo">OFICINA</h2>
                </a>
            </li>
            <li class="servicios__elemento">
                <a href="#test" class="servicios__link">
                    <img class="servicios__imagen icon" src="<?php echo $img_path; ?>/shop.svg" alt="icono local">
                    <h2 class="servicios__titulo">LOCAL</h2>
                </a>
            </li>
            <li class="servicios__elemento">
                <a href="#test" class="servicios__link">
                    <img class="servicios__imagen icon" src="<?php echo $img_path; ?>/farm.svg" alt="icono campos">
                    <h2 class="servicios__titulo">CAMPO</h2>
                </a>
            </li>
            <li class="servicios__elemento">
                <a href="#test" class="servicios__link">
                    <img class="servicios__imagen icon" src="<?php echo $img_path; ?>/terrain.svg" alt="icono terrenos">
                    <h2 class="servicios__titulo">TERRENO</h2>
                </a>
            </li>   
        </ul>
    </section>
    <!-- fin servicios -->
    <!-- buscador index -->
    <section class="buscador">
        <button class="buscador__boton">
            <img class="buscador__icono icon" src="<?php echo $img_path; ?>/magnifier.svg" alt="lupa icono">
            <span class="buscador__texto">buscar inmueble por caracteristicas</span>
        </button>
        <form class="buscador__formulario container">
            <select class="buscador__elemento-select">
                <option value="" selected disabled hidden>Operación</option>
                <option value="compra">Compra</option>
                <option value="alquiler">Alquiler</option>
            </select>
            <select class="buscador__elemento-select">
                <option value="" selected disabled hidden>Tipo de inmueble</option>
                <option value="casa">Casa</option>
                <option value="departamento">Departamento</option>
            </select>
            <select class="buscador__elemento-select">
                <option value="" selected disabled hidden>Dormitorios</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <select class="buscador__elemento-select">
                <option value="" selected disabled hidden>Baños</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <select class="buscador__elemento-select">
                <option value="" selected disabled hidden>Provincia</option>
                <option value="Cordoba">Cordoba</option>
                <option value="Buenos Aires">Buenos Aires</option>
            </select>
            <select class="buscador__elemento-select">
                <option value="" selected disabled hidden>Metros Cuadrados</option>
            </select>
            <select class="buscador__elemento-select">
                <option value="" selected disabled hidden>Precio</option>
            </select>
            <button type="submit" class="buscador__elemento-boton">BUSCAR</button>
        </form>
    </section>
    <!-- fin buscador index -->
    <!-- seccion destacados -->
    <section class="destacados">
        <h1 class="destacados__titulo-seccion">propiedades destacadas</h1>
        <div class="destacados__container container">
            <!-- propiedad 1 -->
            <article class="propiedad">
                <div class="propiedad__contenedor-imagen">
                    <span class="propiedad__badge-destacado">destacado</span>
                    <img src="<?php echo $img_path; ?>/1.jpg" class="propiedad__imagen" alt="imagen propiedad">
                </div>
                <div class="propiedad__info">
                    <div class="propiedad__contenedor-titulo">
                        <h1 class="propiedad__titulo">Beautiful Single Home</h1>
                        <span class="propiedad__direccion"><img src="<?php echo $img_path; ?>/map.svg" alt="icono gps" class="propiedad__icono propiedad__icono--gps icon">Av.Colón 168 - Centro Cordoba</span>
                    </div>
                    <div class="propiedad__caracteristicas">
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/area.svg" alt="icono area"><span>120m<sup>2</sup></span>
                        </span>
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/bed.svg" alt="icono cama"><span>3 Dormitorios</span>
                        </span>
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/toilet.svg" alt="icono baño"><span>2 Baños</span>
                        </span>
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/car.svg" alt="icono auto"><span>Garage</span>
                        </span>
                    </div>
                    <div class="propiedad__fecha">
                        <img class="icon propiedad__icono propiedad__icono--fecha" src="<?php echo $img_path; ?>/calendar.svg" alt="icono fecha"><span>Hace 5 días</span>
                    </div>
                </div> 
            </article>
            <!-- fin propiedad 1 -->
            <article class="propiedad">
                <div class="propiedad__contenedor-imagen">
                    <span class="propiedad__badge-destacado">destacado</span>
                    <img src="<?php echo $img_path; ?>/1.jpg" class="propiedad__imagen" alt="imagen propiedad">
                </div>
                <div class="propiedad__info">
                    <div class="propiedad__contenedor-titulo">
                        <h1 class="propiedad__titulo">Beautiful Single Home</h1>
                        <span class="propiedad__direccion"><img src="<?php echo $img_path; ?>/map.svg" alt="icono gps" class="propiedad__icono propiedad__icono--gps icon">Av.Colón 168 - Centro Cordoba</span>
                    </div>
                    <div class="propiedad__caracteristicas">
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/area.svg" alt="icono area"><span>120m<sup>2</sup></span>
                        </span>
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/bed.svg" alt="icono cama"><span>3 Dormitorios</span>
                        </span>
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/toilet.svg" alt="icono baño"><span>2 Baños</span>
                        </span>
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/car.svg" alt="icono auto"><span>Garage</span>
                        </span>
                    </div>
                    <div class="propiedad__fecha">
                        <img class="icon propiedad__icono propiedad__icono--fecha" src="<?php echo $img_path; ?>/calendar.svg" alt="icono fecha"><span>Hace 5 días</span>
                    </div>
                </div> 
            </article>
            <article class="propiedad">
                <div class="propiedad__contenedor-imagen">
                    <span class="propiedad__badge-destacado">destacado</span>
                    <img src="<?php echo $img_path; ?>/1.jpg" class="propiedad__imagen" alt="imagen propiedad">
                </div>
                <div class="propiedad__info">
                    <div class="propiedad__contenedor-titulo">
                        <h1 class="propiedad__titulo">Beautiful Single Home</h1>
                        <span class="propiedad__direccion"><img src="<?php echo $img_path; ?>/map.svg" alt="icono gps" class="propiedad__icono propiedad__icono--gps icon">Av.Colón 168 - Centro Cordoba</span>
                    </div>
                    <div class="propiedad__caracteristicas">
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/area.svg" alt="icono area"><span>120m<sup>2</sup></span>
                        </span>
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/bed.svg" alt="icono cama"><span>3 Dormitorios</span>
                        </span>
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/toilet.svg" alt="icono baño"><span>2 Baños</span>
                        </span>
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/car.svg" alt="icono auto"><span>Garage</span>
                        </span>
                    </div>
                    <div class="propiedad__fecha">
                        <img class="icon propiedad__icono propiedad__icono--fecha" src="<?php echo $img_path; ?>/calendar.svg" alt="icono fecha"><span>Hace 5 días</span>
                    </div>
                </div> 
            </article>
            <article class="propiedad propiedad--last">
                <div class="propiedad__contenedor-imagen">
                    <span class="propiedad__badge-destacado">destacado</span>
                    <img src="<?php echo $img_path; ?>/1.jpg" class="propiedad__imagen" alt="imagen propiedad">
                </div>
                <div class="propiedad__info">
                    <div class="propiedad__contenedor-titulo">
                        <h1 class="propiedad__titulo">Beautiful Single Home</h1>
                        <span class="propiedad__direccion"><img src="<?php echo $img_path; ?>/map.svg" alt="icono gps" class="propiedad__icono propiedad__icono--gps icon">Av.Colón 168 - Centro Cordoba</span>
                    </div>
                    <div class="propiedad__caracteristicas">
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/area.svg" alt="icono area"><span>120m<sup>2</sup></span>
                        </span>
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/bed.svg" alt="icono cama"><span>3 Dormitorios</span>
                        </span>
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/toilet.svg" alt="icono baño"><span>2 Baños</span>
                        </span>
                        <span class="propiedad__dato">
                            <img class="icon propiedad__icono" src="<?php echo $img_path; ?>/car.svg" alt="icono auto"><span>Garage</span>
                        </span>
                    </div>
                    <div class="propiedad__fecha">
                        <img class="icon propiedad__icono propiedad__icono--fecha" src="<?php echo $img_path; ?>/calendar.svg" alt="icono fecha"><span>Hace 5 días</span>
                    </div>
                </div> 
            </article>
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
                <button class="tasaciones__cta">CONTACTANOS</button>
            </div>
        </div>
    </section>
    <!-- fin seccion tasaciones -->
</main>
<?php get_footer(); ?>