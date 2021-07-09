<?php
/**
 * Partial for the page bottom strip, with Copyright and authorship info
 * 
 * @package Emertech WordPress theme
 */

$common_aos = ' data-aos-offset="0"';

$text_aos = 'data-aos="fade" data-aos-delay="200"' . $common_aos;

$title = get_theme_mod( 'emertech_footer_title' );
$show_title = get_theme_mod( 'emertech_footer_title_show_bottom' );

$name = ($show_title) ? $title : get_bloginfo( 'name' );

$theme = wp_get_theme(); 
$author = esc_html($theme->get('Author'));
$author_uri = esc_html($theme->get('AuthorURI'));
?>
<div class="page-bottom d-flex py-2 p-md-1">
    <small class="m-auto text-center text" <?php echo $text_aos; ?>>
        <?php echo do_shortcode('[year]'); ?> © <strong><?php echo $name; ?></strong>. <br class="d-block d-md-none">
        <?php echo __('Desenvolvido por'); ?> 
        <a href="<?php echo $author_uri; ?>" target="_blank"><?php echo $author; ?></a>.
    </small>
</div>