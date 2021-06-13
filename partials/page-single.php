<?php
/**
 * Partial for the single post page
 * 
 * @package Emertech WordPress theme
 */

        
$permalink = esc_url(get_the_permalink());
                    
$has_image = has_post_thumbnail();
$image_url = get_the_post_thumbnail_url();
$image_alt = get_the_post_thumbnail_caption();

$date = get_the_date();

$title = get_the_title();
$excerpt = get_the_excerpt();
$content = get_the_content();

?>


<div class="single-wrap py-4">
    <div class="single col-12 col-sm-11 col-md-9 col-lg-7 m-auto">
        <div class="heading mb-2">
            <h2 class="m-0">
                <?php echo $title; ?>
            </h2>
            <small class="fw-lighter">
                <?php echo $date; ?>
            </small>
        </div>
        <div class="excerpt mb-3"> 
            <p>
                <?php echo $excerpt; ?>
            </p>
        </div>
        <div class="image mb-3">
            <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid rounded">
        </div>
        <div class="content">
            <?php echo $content; ?>
        </div>
    </div>
</div>