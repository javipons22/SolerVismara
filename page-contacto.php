<?php 
/* 
	Template Name: Contacto
*/
?>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>
<?php get_header(); ?>
<div class="pag-contacto container">
    <h1 class="pag-contacto__titulo">CONTACTANOS</h1>
    <div class="pag-contacto__wrapper">
        <form class="pag-contacto__formulario">
            <input class="pag-contacto__elemento-input" type="text" name="nombre" placeholder="Escribe tu nombre">
            <input class="pag-contacto__elemento-input" type="text" name="apellido" placeholder="Escribe tu apellido">
            <input class="pag-contacto__elemento-input" type="email" name="email" placeholder="Escribe tu e-mail">
            <input class="pag-contacto__elemento-input" type="text" name="telefono" placeholder="Escribe tu teléfono">
            <textarea class="pag-contacto__elemento-area" name="mensaje" placeholder="Escribe el mensaje"></textarea>
            <button type="submit" class="pag-contacto__elemento-boton">ENVIAR MENSAJE</button>
        </form>
        <div class="pag-contacto__info-contacto">
            <h1 class="pag-contacto__titulo">OTRA FORMA DE <span>CONTACTARNOS</span></h1>
            <div class="pag-contacto__social">
                <div class="pag-contacto__social-elemento">
                    <a href="www.facebook.com"><img src="<?php echo $img_path; ?>/facebook (1).svg" alt="facebook icon" class="icon pag-contacto__social-icon"></a>
                </div>  
                <div class="pag-contacto__social-elemento">
                    <a href="www.twitter.com"><img src="<?php echo $img_path; ?>/twitter.svg" alt="twitter icon" class="icon pag-contacto__social-icon"></a>
                </div>  
                <div class="pag-contacto__social-elemento">
                    <a href="www.instagram.com"><img src="<?php echo $img_path; ?>/instagram (1).svg" alt="instagram icon" class="icon pag-contacto__social-icon"></a>
                </div>  
            </div>
            <div class="pag-contacto__telefono">
                <a href="#"><img src="<?php echo $img_path; ?>/telephone.svg" alt="phone icon" class="icon pag-contacto__telefono-icon"></a>
                <div class="pag-contacto__telefono-info">
                    <span><strong>Teléfono de contacto:</strong></span>
                    <span>351 5 309656</span>
                </div>
            </div>
            <div class="pag-contacto__telefono">
                <a href="#"><img src="<?php echo $img_path; ?>/envelope.svg" alt="email icon" class="icon pag-contacto__telefono-icon"></a>
                <div class="pag-contacto__telefono-info">
                    <span><strong>Email de contacto:</strong></span>
                    <span>info@solervismara.com</span>
                </div>
            </div>
        </div>
    </div>
    
</div>
<?php get_footer(); ?>