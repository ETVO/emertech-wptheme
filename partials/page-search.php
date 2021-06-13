<?php
/**
 * Partial for the search results page
 * 
 * @package Emertech WordPress theme
 */

$action_text = __("Ler Mais", "emertech")

?>

<div class="search-results">
    <div class="posts-wrap">
        <div class="posts mx-3 py-2 py-md-4 m-auto">
            <?php 
                while(have_posts()):
                    the_post();
        
                    $permalink = esc_url(get_the_permalink());
                    
                    $has_image = has_post_thumbnail();
                    $image_url = get_the_post_thumbnail_url();
                    $image_alt = get_the_post_thumbnail_caption();
                    
                    $date = get_the_date();
                    
                    $title = get_the_title();
                    $excerpt = get_the_excerpt();

                    ?>
                        <div class="result py-4 px-1 p-md-4">
                            <?php if($has_image): ?>
                                    <div class="image mb-3">
                                        <a href="<?php echo $permalink; ?>">
                                            <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="rounded">
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="title mb-1">
                                    <h3 class="mb-0">
                                        <a href="<?php echo $permalink; ?>" class="fw-normal">
                                            <?php echo $title; ?>
                                        </a>
                                    </h3>
                                </div>

                                <div class="date mb-2 fw-lighter">
                                    <small>
                                        <?php echo $date; ?>
                                    </small>
                                </div>
                                <div class="excerpt mb-2 fw-light">
                                    <?php echo $excerpt; ?>
                                </div>

                                <div class="action mt-1">
                                    <a href="<?php echo $permalink; ?>" class="eb-link light text-uppercase fs-6 fw-light">
                                        <?php echo $action_text; ?>
                                    </a>
                                </div>
                        </div>
        
                    <?php
        
        
                endwhile;
            ?>
        </div>
    </div>

    <?php
        get_template_part("partials/component-pagination");
    ?>
</div>