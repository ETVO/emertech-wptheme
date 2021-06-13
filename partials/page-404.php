<?php
/**
 * Partial for the 404 error page
 * 
 * @package Emertech WordPress theme
 */

$error_code = "404";
$error_message = __("Nenhuma página foi encontrada!", "emertech");
$search_message = __("Pesquise pelo que precisa", "emertech");

?>

<div class="page404 d-flex">
    <div class="text-center m-auto col-12 col-sm-11 col-md-10 col-lg-9 px-2">
        <div class="title">
            <h1>
                <?php echo $error_code; ?>
            </h1>
        </div>
        <div class="message">
            <p>
                <?php echo $error_message; ?>
            </p>
        </div>
        <div class="search">
            <!-- <small>
                <?php echo $search_message; ?>
            </small> -->
            <?php get_search_form(); ?>
        </div>
    </div>
</div>