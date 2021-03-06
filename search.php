<?php
/**
 * Theme search results page template
 * 
 * @package Emertech WordPress theme
 */

get_header();

$results_title = __("Resultados da pesquisa por", "emertech");
$search_query = get_search_query();

$blog_id = get_option('page_for_posts');
$blog_title = get_the_title( $blog_id );
$blog_url = get_the_permalink( $blog_id );

$results_title .= " <b>\"$search_query\"</b>";

$title_aos = 'data-aos="fade" data-aos-delay="0"';
$form_aos = 'data-aos="fade" data-aos-delay="100"';
$results_aos = 'data-aos="fade" data-aos-delay="200"';
?>

<div class="search-results-wrap py-2 py-md-4">

    <div class="m-auto col-12 col-sm-11 col-md-10 col-lg-9 px-4 px-md-0">
        <div class="heading row mb-3 mb-md-0">
            <div class="title col-12 mb-3 col-md-auto mb-md-0" <?php echo $title_aos; ?>>
                <h2 class="fw-light">
                    <?php echo $results_title; ?>
                </h2>
                <a class="eb-link left fw-light light" href="<?php echo $blog_url; ?>">
                    <?php echo $blog_title; ?>
                </a>
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