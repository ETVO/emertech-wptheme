<?php
/**
 * Theme search results page template
 * 
 * @package Emertech WordPress theme
 */

get_header();

// $title = __("Notícias", "emertech");

$home_id = get_option('page_for_posts');
$title = get_the_title( $home_id );

$categories_label = __("Categorias");

$title_aos = 'data-aos="fade" data-aos-delay="0"';
$form_aos = 'data-aos="fade" data-aos-delay="100"';
$results_aos = 'data-aos="fade" data-aos-delay="200"';
?>

<div class="search-results-wrap py-2 py-md-4">

    <div class="m-auto col-12 col-sm-11 col-md-10 col-lg-9 px-4 px-md-0">
        <div class="heading row mb-3 mb-md-0">
            <div class="title row col-12 mb-3 col-md-auto mb-md-0" <?php echo $title_aos; ?>>
                <div class="col-auto">
                    <h2 class=""><?php echo $title; ?></h2>
                </div>
                <div class="col-auto">
                    <div class="categories">
                        <?php get_template_part("partials/component/categories"); ?>
                    </div>
                </div>
            </div>
            <div class="form col-auto ms-auto" <?php echo $form_aos; ?>>
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="results" <?php echo $results_aos; ?>>
            <?php get_template_part("partials/component/feed"); ?>
        </div>
    </div>
</div>

<?php

get_footer();