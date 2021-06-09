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

$contact_no = get_theme_mod("emertech_footer_contact");
$contact_no_url = "tel:$contact_no";

$email = get_theme_mod("emertech_footer_email");
$email_url = "mailto:$email";

$address = get_theme_mod("emertech_footer_address");
$address_url = "https://www.google.com/maps/place/" . str_replace(" ", "+", $address);

$zoom = get_theme_mod( "emertech_footer_map_zoom", 13 );

$show_map = get_theme_mod("emertech_footer_map_show");
$map = get_theme_mod("emertech_footer_map", $address);
$map_url = "https://maps.google.com/maps?q=" . str_replace(" ", "+", $map) . "&t=m&z=$zoom&output=embed&iwloc=near"; 

$contact_title = get_theme_mod( 'emertech_footer_title', 'EMERTECH PROJECT' );

$contact_items = array(
    array(
        'icon' => 'telephone-fill',
        'text' => $contact_no,
        'url' => $contact_no_url,
    ),
    array(
        'icon' => 'envelope-fill',
        'text' => $email,
        'url' => $email_url,
    ),
    array(
        'icon' => 'pin-angle-fill',
        'text' => $address,
        'url' => $address_url,
    ),
);

$social_icons = get_theme_mod("emertech_social_icons");

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
                        <h2 class="fs-4 fw-normal"><?php echo $contact_title; ?></h2>
                    </div>
                    <div class="list fw-light pt-1">

                        <?php
                            foreach($contact_items as $item): 

                                if($item['text'] != ''):
                                    ?>
                                        <div class="list-item d-flex">
                                            <div class="icon text-primary pe-1">
                                                <i class="bi bi-<?php echo $item['icon']; ?>"></i>
                                            </div>
                                            <div class="text ps-2 ps-md-1">
                                                <a href="<?php echo $item['url']; ?>"
                                                target="_blank">
                                                    <?php echo $item['text']; ?>
                                                </a>
                                            </div>
                                        </div>
                                    <?php
                                endif;

                            endforeach; 
                        ?>

                    </div>
                    <div class="social d-flex pt-3">
                        
                        <?php
                            foreach($social_icons as $icon): 

                                if($icon['url'] != ''):
                                    ?><div class="icon pe-3">
                                            <a href="<?php echo $icon['url']; ?>"
                                            target="_blank">
                                                <i class="bi bi-<?php echo $icon['icon']; ?>"></i>
                                            </a>
                                        </div>
                                    <?php
                                endif;

                            endforeach; 
                        ?>
                    </div>
                </div>
                <?php if($show_map): ?>
                    <div class="col-6 d-none d-md-block map p-0"
                    <?php echo $map_aos; ?>>
                        <iframe frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" 
                        src="<?php echo $map_url; ?>" 
                        title="<?php echo $map; ?>" 
                        aria-label="<?php echo $map ?>"></iframe>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>