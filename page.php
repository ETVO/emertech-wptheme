<?php 

    get_header();

    if(!is_front_page()):
        ?>
        <!-- <div class="page-title content-max-width px-md-5 py-4 mt-2 border-bottom text-center">
            <h1 class="m-auto text-uppercase">
                <?php the_title(); ?>
            </h1>
            <p class="m-auto">
                <?php the_excerpt(); ?>
            </p>
        </div> -->
        <?php
    endif;
    
    the_content();

    get_footer();

?>