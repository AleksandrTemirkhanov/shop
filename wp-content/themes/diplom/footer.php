<?php

?>
<!-- Start Footer Area -->
<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer about">
                        <div class="logo">
                            <a href="index.html"><img src="<?= get_stylesheet_directory_uri()?>/images/logo.png" alt="#"></a>
                        </div>
                        <p class="call">У вас есть вопрос? Мы работаем 24/7<span><a href="tel:123456789">+7(999)999-99-99</a></span></p>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <ul>
                            <br>
                            <li><a href="/">Главная</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <ul>
                            <br>
                            <li><a href="/kontakty/">Контакты</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <ul>
                            <br>
                            <li><a href="/korzina/">Корзина</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>

                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="left">
                            <p>© 2021 - Все права защищены ООО"АртПланшет"</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /End Footer Area -->

<!-- Jquery -->
<script src="<?= get_stylesheet_directory_uri()?>/js/jquery.min.js"></script>
<script src="<?= get_stylesheet_directory_uri()?>/js/jquery-migrate-3.0.0.js"></script>
<script src="<?= get_stylesheet_directory_uri()?>/js/jquery-ui.min.js"></script>
<!-- Popper JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/bootstrap.min.js"></script>
<!-- Slicknav JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/magnific-popup.js"></script>
<!-- Waypoints JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/waypoints.min.js"></script>
<!-- Countdown JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/finalcountdown.min.js"></script>
<!-- Nice Select JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/nicesellect.js"></script>
<!-- Flex Slider JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/easing.js"></script>
<!-- Active JS -->
<script src="<?= get_stylesheet_directory_uri()?>/js/active.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
<script>

    var swiper = new Swiper(".Carousel", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>