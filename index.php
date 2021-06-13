<?php
/**
 * Theme index template
 * 
 * @package Emertech WordPress theme
 */


get_header();


if (have_posts()) {
    while (have_posts()) {
        the_post();

        get_template_part("partials/page-content");
    }
}

get_footer();