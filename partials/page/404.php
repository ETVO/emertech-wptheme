<?php
/**
 * Partial for the 404 error page
 * 
 * @package Emertech WordPress theme
 */

$error_code = "404";
$error_message = __("Nenhuma página foi encontrada!", "emertech");
$search_message = __("Pesquise pelo que precisa", "emertech");

$title_aos = 'data-aos="fade-right" data-aos-delay="0"';
$message_aos = 'data-aos="fade-right" data-aos-delay="100"';
$search_aos = 'data-aos="fade-right" data-aos-delay="200"';
?>

<div class="page404 d-flex">
    <div class="text-center m-auto px-2">
        <div class="title" <?php echo $title_aos; ?>>
            <h1>
                <?php echo $error_code; ?>
            </h1>
        </div>
        <div class="message" <?php echo $message_aos; ?>>
            <p>
                <?php echo $error_message; ?>
            </p>
        </div>
        <div class="search" <?php echo $search_aos; ?>>
            <!-- <small>
                <?php echo $search_message; ?>
            </small> -->
            <?php get_search_form(); ?>
        </div>
    </div>
</div>