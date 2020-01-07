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
            <p><strong>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit sint eligendi nemo, labore recusandae fuga numquam.</strong><br></br> Velit consequuntur accusantium aliquam, veritatis distinctio, dicta sint suscipit reiciendis ipsum ad alias voluptate. Doloribus, soluta. Debitis alias itaque aliquam architecto hic sequi et iste saepe sed rem molestiae incidunt aspernatur quibusdam, enim impedit ab inventore sit cupiditate suscipit exercitationem corrupti expedita ipsum, modi aperiam? Quod fugiat quam consectetur sit non id impedit, nulla quis atque tempore magnam labore rem incidunt placeat nobis aut ut in debitis, beatae eius architecto. Earum voluptatibus, quo similique laborum ratione quaerat quibusdam exercitationem ipsa consectetur beatae sit quod, a distinctio facilis laudantium. Minima, in fuga. Amet, quos qui.</p>
        </div>  
    </div>
    <div class="staff">
        <article class="staff__contenedor">
            <div class="staff__contenedor-imagen">
                <img class="staff__imagen" src="<?php echo $img_path?>/fotos oficina/3.jpg">
            </div>
            <div class="staff__info">
                <div class="staff__titulo-contenedor">
                    <span class="staff__cargo">Martillero Público</span>
                    <span class="staff__nombre">RICARDO SOLER</span>
                </div>
                <div class="staff__datos-contenedor">
                    <span class="staff__email"><strong>Email:</strong> ricardosoler@gmail.com</span>
                    <span class="staff__tel"><strong>Cel:</strong> +54 351 5 309656</span>
                </div>
            </div>
        </article>
        <article class="staff__contenedor">
            <div class="staff__contenedor-imagen">
                <img class="staff__imagen" src="<?php echo $img_path?>/fotos oficina/2.jpg">
            </div>
            <div class="staff__info">
                <div class="staff__titulo-contenedor">
                    <span class="staff__cargo">Martillero Público</span>
                    <span class="staff__nombre">SANTIAGO VISMARA</span>
                </div>
                <div class="staff__datos-contenedor">
                    <span class="staff__email"><strong>Email:</strong> santiagovismara@gmail.com</span>
                    <span class="staff__tel"><strong>Cel:</strong> +54 351 5 151705</span>
                </div>
            </div>
        </article>
    </div>

</div>
<?php get_footer(); ?>