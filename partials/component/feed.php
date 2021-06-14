<?php
/**
 * Partial for the posts feed component
 * 
 * @package Emertech WordPress theme
 */

$action_text = __("Leia Mais", "emertech"); 

// Initialize meta data array
$meta = array(
    "date" => array(
        "name" => __("Data", "emertech"), 
        "value" => "", 
        "show" => get_theme_mod("emertech_blog_feed_show_date"), 
    ),
    "category" => array(
        "name" => __("Categoria", "emertech"), 
        "value" => "", 
        "show" => get_theme_mod("emertech_blog_feed_show_category"), 
    ),
);

// Get theme mod for meta separator 
$separator = get_theme_mod("emertech_blog_feed_meta_separator", "•");

?>

<div class="feed">
    <div class="posts-wrap">
        <div class="posts mx-3 py-2 py-md-4 m-auto">
            <?php 
                while(have_posts()):
                    the_post();
                    $post = get_post();
        
                    $permalink = esc_url(get_the_permalink());
                    
                    $has_image = has_post_thumbnail();
                    $image_url = get_the_post_thumbnail_url($post->ID, 'medium');
                    $image_alt = get_the_post_thumbnail_caption();
                    
                    $date = get_the_date();
                    $categories = get_the_category();

                    $category = "";
                    
                    for($i = 0; $i < count($categories); $i++) {
                        if($i > 0) $category .= ", ";
                        $category .= $categories[$i]->name;
                    }

                    $meta["date"]["value"] = $date;
                    $meta["category"]["value"] = $category;
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
                    
                    $title = get_the_title();
                    $excerpt = get_the_excerpt();

                    ?>
                        <div class="post row py-3">
                            <div class="col-12 col-md-3">
                                <?php if($has_image): ?>
                                    <div class="image mb-3">
                                        <a href="<?php echo $permalink; ?>">
                                            <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="rounded">
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-12 col-md-9">
                                <div class="title mb-1">
                                    <h3 class="mb-0">
                                        <a href="<?php echo $permalink; ?>" class="fw-normal">
                                            <?php echo $title; ?>
                                        </a>
                                    </h3>
                                </div>

                                <?php if($meta_html != ""): ?>
                                    <div class="meta mb-2 fw-lighter">
                                        <?php echo $meta_html; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="excerpt mb-2 fw-light">
                                    <?php echo $excerpt; ?>
                                </div>

                                <div class="action mt-1">
                                    <a href="<?php echo $permalink; ?>" class="eb-link light text-uppercase fs-6 fw-light">
                                        <?php echo $action_text; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
        
                    <?php
        
        
                endwhile;
            ?>
        </div>
    </div>

    <?php
        get_template_part("partials/component/pagination");
    ?>
</div>