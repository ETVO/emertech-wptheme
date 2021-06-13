<?php
/**
 * Theme search results page template
 * 
 * @package Emertech WordPress theme
 */

get_header();

?>

<div class="search-results-wrap py-2 py-md-4">
    <div class="m-auto col-12 col-sm-11 col-md-10 col-lg-9">
        <?php get_template_part("partials/page-search"); ?>
    </div>
</div>

<?php

get_footer();