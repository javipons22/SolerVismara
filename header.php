<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>
<body <?php body_class();?>>
<!-- header -->
<header class="header">
        <!-- top header -->
        <div class="top-header">
            <div class="top-header__container container">
                    <ul class="top-header__contact-info">
                        <li><a href="#"><img src="<?php echo $img_path; ?>/telephone.svg" alt="telephone icon" class="icon top-header__icon">351 6 879439</a></li>
                        <li><a href="#"><img src="<?php echo $img_path; ?>/telephone.svg" alt="telephone icon" class="icon top-header__icon">351 5 390280</a></li>
                        <li><a href="#"><img src="<?php echo $img_path; ?>/envelope.svg" alt="email icon" class="icon top-header__icon top-header__icon--envelope">soler.vismara@gmail.com</a></li>
                    </ul>
                    <ul class="top-header__contact-info top-header__contact-info--last">
                        <li><a href="/solervismarabienesinmuebles"><img src="<?php echo $img_path; ?>/facebook (1).svg" alt="facebook icon" class="icon top-header__icon"></a></li>
                        <li><a href="@solervismara"><img src="<?php echo $img_path; ?>/twitter.svg" alt="twitter icon" class="icon top-header__icon top-header__icon--twitter"></a></li>
                        <li><a href="https://instagram.com/soler_vismara_bienes_inmuebles"><img src="<?php echo $img_path; ?>/instagram (1).svg" alt="instagram icon" class="icon top-header__icon top-header__icon--instagram"></a></li>
                    </ul>
            </div>
        </div>
        <!-- fin top header -->
        <!-- main header -->
        <div class="main-header">
            <div class="main-header__container container">      
                <picture class="main-header__logo">
                    <source media="(min-width: 1025px)" srcset="<?php echo $img_path; ?>/logotexto.svg">
                    <img src="<?php echo $img_path; ?>/logo.svg" alt="logo empresa">
                </picture>
                <button class="main-header__button">
                    MENU
                    <div class="menu-wrapper">
                        <div class="hamburger-menu"></div>
                    </div>
                </button>
                <!-- inicio nav -->
                <nav class="navegacion">
                    <ul class="navegacion__contenedor">
                        <li class="navegacion__elemento navegacion__elemento--first"><a class="navegacion__link" href="/SV">INICIO</a></li>
                        <li class="navegacion__elemento"><a class="navegacion__link" href="/SV/inmuebles">INMUEBLES</a></li>
                        <li class="navegacion__elemento"><a class="navegacion__link" href="/SV/quienes-somos">QUIENES SOMOS</a></li>
                        <li class="navegacion__elemento"><a class="navegacion__link" href="/SV/contacto">CONTACTO</a></li>
                        <?php
                        if ( is_user_logged_in() ) :?>
                            <li class="navegacion__elemento navegacion__elemento--dash"><a class="navegacion__link" href="/SV/dashboard">ADMIN</a></li>
                            <li class="navegacion__elemento navegacion__elemento--cerrar"><a class="navegacion__link" href="<?php echo wp_logout_url();?>">CERRAR SESIÓN</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- fin nav -->
            </div>
        </div>
<!-- fin main header -->
</header>
<!-- fin header -->
<main class="contenido-main">