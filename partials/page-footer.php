<?php
/**
 * Partial for main page footer
 * 
 * @package Emertech WordPress theme
 */

$common_aos = ' data-aos-offset="100"';

$nav_aos = 'data-aos="fade" data-aos-delay="100"' . $common_aos;
$contact_aos = 'data-aos="fade" data-aos-delay="300"' . $common_aos;
$map_aos = 'data-aos="fade" data-aos-delay="400"' . $common_aos;

?>
<footer>
    <div class="container-fluid py-4 py-md-4 px-lg-5 text-light">
        <div class="col-12 col-lg-10 m-auto px-lg-5">
            <div class="d-flex m-auto pb-3">
                    <nav class="navbar navbar-expand-lg m-auto d-none d-lg-block"
                    <?php echo $nav_aos; ?>>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenuDropdown" aria-controls="mainMenuDropdown" aria-expanded="false" aria-label="<?php echo __("Ativar Menu", "emertech") ?>">
                            <i class="fas fa-lg fa-bars"></i>
                        </button>

                        <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'main_menu',
                                'depth' => 2,
                                'container_class' => '',
                                'container_id' => 'mainMenuDropdown',
                                'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',
                                'fallback_cb' => 'Emertech_Custom_Walker::fallback',
                                'walker' => new Emertech_Custom_Walker(),
                            )
                        );
                        ?>
                    </nav>
                    <div class="backtotop d-block d-lg-none m-auto text-uppercase">
                        <a href="#head" class="eb-link up">
                            Voltar ao Topo
                        </a>
                    </div>
            </div>
            <div class="row m-auto">
                <div class="col-12 col-md-6 contact px-2 px-md-3"
                <?php echo $contact_aos; ?>>
                    <div class="title">
                        <h2 class="fs-4 fw-normal">EMERTECH PROJECT</h2>
                    </div>
                    <div class="list fw-light pt-1">
                        <div class="list-item d-flex">
                            <div class="icon text-primary pe-1">
                                <!-- <div class="fas fa-sm fa-phone-alt"></div> -->
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="text ps-2 ps-md-1">
                                <a href="tel:+351256991045"
                                target="_blank">
                                    +351 256 991 045
                                </a>
                            </div>
                        </div>
                        <div class="list-item d-flex">
                            <div class="icon text-primary pe-1">
                                <!-- <div class="fas fa-sm fa-envelope"></div> -->
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div class="text ps-2 ps-md-1">
                                <a href="mailto:geral@emertech.pt"
                                target="_blank">
                                    geral@emertech.pt
                                </a>
                            </div>
                        </div>
                        <div class="list-item d-flex">
                            <div class="icon text-primary pe-1">
                                <!-- <div class="fas fa-sm fa-map-marker-alt"></div> -->
                                <i class="bi bi-pin-angle-fill"></i>
                            </div>
                            <div class="text ps-2 ps-md-1">
                                <a href="https://www.google.com/maps/place/R.+Prof.+Dr.+Egas+Moniz+269,+3860-078+Avanca"
                                target="_blank">
                                    R. Prof. Dr. Egas Moniz 269, 3860-078 Avanca
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="social d-flex pt-3">
                        <div class="icon pe-3">
                            <a href="https://www.facebook.com/emertechproject"
                            target="_blank">
                                <!-- <i class="fab fa-lg fa-facebook-f"></i> -->
                                <i class="bi bi-facebook"></i>
                            </a>
                        </div>
                        <div class="icon">
                            <a href="https://www.instagram.com/emertechproject/"
                            target="_blank">
                                <!-- <i class="fab fa-lg fa-instagram"></i> -->
                                <i class="bi bi-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-none d-md-block map p-0"
                <?php echo $map_aos; ?>>
                    <iframe frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=Emertech Project,+R.+Prof.+Dr.+Egas+Moniz+269,+3860-078+Avanca&t=m&z=13&output=embed&iwloc=near" title="Emertech Project - R. Prof. Dr. Egas Moniz 269, 3860-078 Avanca" aria-label="Emertech Project - R. Prof. Dr. Egas Moniz 269, 3860-078 Avanca"></iframe>
                </div>
            </div>
        </div>
    </div>
</footer>