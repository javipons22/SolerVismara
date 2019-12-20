<?php $img_path = get_site_url() . "/wp-content/uploads/img";?>
</main>
<!-- footer -->
<footer class="footer">
        <div class="footer__container container">
            <div class="recientes">
                <h2 class="recientes__titulo">LO MÁS RECIENTE</h2>
                <ul class="recientes__info">
                    <li class="propiedad-reciente">
                        <a href="#1" class="propiedad-reciente__link">
                            <img class="propiedad-reciente__imagen" src="<?php echo $img_path; ?>/1.jpg">
                            <div class="propiedad-reciente__contenido">
                                <h2 class="propiedad-reciente__titulo">Beautiful Single Home 1</h2>
                                <span class="propiedad-reciente__fecha">19 de Diciembre 2019</span>
                                <span class="propiedad-reciente__precio">$250000</span>
                            </div>
                        </a>
                    </li>
                    <li class="propiedad-reciente">
                        <a href="#2" class="propiedad-reciente__link">
                            <img class="propiedad-reciente__imagen" src="<?php echo $img_path; ?>/2.jpg">
                            <div class="propiedad-reciente__contenido">
                                <h2 class="propiedad-reciente__titulo">Departamento 2</h2>
                                <span class="propiedad-reciente__fecha">10 de Diciembre 2019</span>
                                <span class="propiedad-reciente__precio">$2500000</span>
                            </div>
                        </a>
                    </li>
                    <li class="propiedad-reciente">
                        <a href="#3" class="propiedad-reciente__link">
                            <img class="propiedad-reciente__imagen" src="<?php echo $img_path; ?>/3.jpg">
                            <div class="propiedad-reciente__contenido">
                                <h2 class="propiedad-reciente__titulo">Campo 1</h2>
                                <span class="propiedad-reciente__fecha">19 de Octubre 2019</span>
                                <span class="propiedad-reciente__precio">$150000</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="links">
                <h2 class="links__titulo">LINKS</h2>
                <ul class="links__info">
                    <li><a href="#">Inicio</a></li>
                    <li>
                        <a href="#">Inmuebles</a>
                        <ul>
                            <li>Departamento</li>
                            <li>Casa</li>
                            <li>Oficina</li>
                            <li>Local</li>
                            <li>Campo</li>
                            <li>Terreno</li>
                        </ul>
                    </li>
                    <li><a href="#">Quienes Somos</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
            <div class="contacto">
                <h2 class="contacto__titulo">CONTACTO</h2>
                <p class="contacto__descripcion">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt aspernatur laboriosam hic, rerum molestias facilis quibusdam voluptate quis harum asperiores!</p>
                <ul class="contacto__info">
                    <li><img class="contacto__icono icon" src="<?php echo $img_path; ?>/map.svg" alt="icono gps">Av. Colon 168 - Piso 3 - Oficina G</li>
                    <li><img class="contacto__icono icon" src="<?php echo $img_path; ?>/envelope.svg" alt="icono gps">info@solervismara.com</li>
                    <li><img class="contacto__icono icon" src="<?php echo $img_path; ?>/telephone.svg" alt="icono gps">0351 4589652</li>
                </ul>
                <iframe  class="contacto__mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3405.0428677821155!2d-64.18736968445977!3d-31.412944981405214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9432a2829c01190d%3A0xb3dbb12bee9d3a8f!2sAv.%20Col%C3%B3n%20168%2C%20X5022%20C%C3%B3rdoba!5e0!3m2!1sen!2sar!4v1576180339294!5m2!1sen!2sar" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>  
        <div class="copyright">	&copy; Copyright 2019 . Sitio Desarrollado por <a target="_blank" href="https://www.facebook.com/Ghipsio-111415540321377">Ghipsio Web Design</a></div>
    </footer>
    <?php wp_footer(); ?>
    <script>
        SVGInject(document.querySelectorAll("img.icon"));
    </script>
</body>
</html>