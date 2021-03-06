<?php
/**
 * Partial for the single post page
 * 
 * @package Emertech WordPress theme
 */


// Initialize meta data array
$meta = array(
    "date" => array(
        "name" => __("Data", "emertech"), 
        "value" => "", 
        "show" => true, 
    ),
    "category" => array(
        "name" => __("Categoria", "emertech"), 
        "value" => "", 
        "show" => true, 
    ),
);

// Get theme mod for meta separator 
$separator = get_theme_mod("emertech_blog_feed_meta_separator", "•");

// Get the blog information 
$blog_id = get_option('page_for_posts');
$blog_title = get_the_title( $blog_id );
$blog_url = get_the_permalink( $blog_id );
        

// Get the post information
$post = get_post();
                    
$permalink = esc_url(get_the_permalink());

$show_image = get_post_meta($post->ID, 'et_post_show_image', true) == 'yes';

$has_image = has_post_thumbnail() && $show_image;
$image_url = get_the_post_thumbnail_url($post->ID, 'medium_large');
$image_alt = get_the_post_thumbnail_caption();

$title = get_the_title();
$excerpt = get_the_excerpt();

$date = get_the_date();
$categories = get_the_category();

$category = "";

for($i = 0; $i < count($categories); $i++) {
    if($i > 0) $category .= ", ";
    $category_link = $blog_url . "?category=" . $categories[$i]->slug;
    $category .= "<a class=\"onhover\" href=\"$category_link\">";
    $category .= $categories[$i]->name;
    $category .= "</a>";
}

// Set meta properties to meta array
$meta["date"]["value"] = $date;
$meta["category"]["value"] = $category;

// Generate meta HTML
$meta_html = "";
$i = 0;
$show_separator = false;
foreach($meta as $property) {

    if($property["show"]) {
        if($i > 0 && $show_separator) $meta_html .= "&nbsp;$separator&nbsp;";
        if($property["value"] != "") {
            $meta_html .= "<small aria-label=\"{$property["name"]}\">";
            $meta_html .= $property["value"];
            $meta_html .= "</small>";
        }
        $show_separator = true;
    }

    $i++;
}

?>


<div class="single-wrap py-4">
    <div class="single col-12 col-sm-11 col-md-9 col-lg-7 m-auto px-4 px-md-0">
        <div class="heading mb-2">
            <a class="back eb-link left fw-light light" href="<?php echo $blog_url; ?>">
                <?php echo $blog_title; ?>
            </a>
            <h2 class="title mb-0 mt-2">
                <?php echo $title; ?>
            </h2>
            <div class="meta fw-lighter">
                <?php echo $meta_html; ?>
            </div>
        </div>
        <div class="excerpt mb-3"> 
            <p>
                <?php echo $excerpt; ?>
            </p>
        </div>
        <?php if($has_image): ?>
            <div class="image mb-3">
                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid rounded">
            </div>
        <?php endif; ?>
        <div class="content">
            <?php the_content(); ?>
        </div>
        <div class="after-content">
        </div>
    </div>
</div>