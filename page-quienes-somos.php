<?php 
/* 
	Template Name: Quienes Somos
*/
?>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>
<?php get_header(); ?>
<div class="pag-compania container">
    <h1 class="pag-compania__titulo">¿<span>Quiénes</span> somos?</h1>
    <div class="pag-compania__info-principal">
        <div class="pag-compania__imagen-contenedor">
            <img class="pag-compania__imagen" src="<?php echo $img_path?>/fotos oficina/1.jpg">
        </div>
        <div class="pag-compania__descripcion">
            <p><strong>Somos una empresa inmobiliaria joven orientada a la captación y comercialización de inmuebles que presenten gran potencial para el desarrollo de proyectos inmobiliarios , a fin de satisfacer la creciente demanda de todo tipo de inversores.</strong><br><br>

Nuestros servicios abarcan la coordinación y la unión entre la oferta y la demanda , y la compra-venta de inmuebles, hasta el desarrollo de la publicidad del emprendimiento dotándolo de las mejores posibilidades para arribar a un exitoso proceso de venta.<br><br>

Nuestra misión es ser referentes en nuestro mercado inmobiliario, transformando pequeñas oportunidades en grandes proyectos de inversión. Buscamos personalizar nuestros servicios articulando los requerimientos de los clientes a las ofertas de un mercado en constante transformación.<br><br>

Nuestros valores son el compromiso: con el trabajo, con nuestros clientes. Dedicación: trabajando con pasión , respeto y profesionalismo. Credibilidad: el cumplimiento de la palabra dada sustenta nuestra confianza.</p>
        </div>  
    </div>
    <div class="staff">
        <article class="staff__contenedor">
            <div class="staff__contenedor-imagen">
                <img class="staff__imagen" src="<?php echo $img_path?>/fotos oficina/3.jpg">
            </div>
            <div class="staff__info">
                <div class="staff__titulo-contenedor">
                    <span class="staff__nombre">RICARDO SOLER</span>
                    <span class="staff__cargo">Titulo Universitario otorgado por la UES Siglo XXI</span>
                    <span class="staff__cargo">Martillero Público MP:053360</span>
                    <span class="staff__cargo">Martillero Judicial MP:01-2741</span>
                    <span class="staff__cargo">Corredor Público MP:045039</span>
                </div>
                <div class="staff__datos-contenedor">
                    <span class="staff__email"><strong>Email:</strong> ricardosolermartillero@gmail.com</span>
                    <span class="staff__tel"><strong>Cel:</strong> +54 351 6 879439</span>
                </div>
            </div>
        </article>
        <article class="staff__contenedor">
            <div class="staff__contenedor-imagen">
                <img class="staff__imagen" src="<?php echo $img_path?>/fotos oficina/2.jpg">
            </div>
            <div class="staff__info">
                <div class="staff__titulo-contenedor">
                    <span class="staff__nombre">SANTIAGO VISMARA</span>
                    <span class="staff__cargo">Titulo Universitario otorgado por la UNC</span>
                    <span class="staff__cargo">Martillero Judicial MP:01-2746</span>
                    <span class="staff__cargo">Corredor Público MP:04-4578</span>
                </div>
                <div class="staff__datos-contenedor">
                    <span class="staff__email"><strong>Email:</strong> santivismara66@gmail.com</span>
                    <span class="staff__tel"><strong>Cel:</strong> +54 351 5 390280</span>
                </div>
            </div>
        </article>
    </div>

</div>
<?php get_footer(); ?>