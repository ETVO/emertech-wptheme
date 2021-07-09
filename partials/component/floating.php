<?php
/**
 * Partial for the floating button
 * 
 * @package Emertech WordPress theme
 */


$hide = get_theme_mod( 'emertech_floating_hide' );
$newtab = get_theme_mod( 'emertech_floating_newtab' );

$floating_icon = get_theme_mod( 'emertech_floating_icon' );
if($floating_icon == '') $floating_icon = 'chat-fill';
$floating_url = get_theme_mod( 'emertech_floating_url' );
$floating_text = get_theme_mod( 'emertech_floating_text' );

if(!$hide && $floating_url != ''):
?>
<a class="floating position-fixed d-flex rounded-pill"  
<?php if($newtab) echo 'target="_blank"'; ?>
href="<?php echo $floating_url; ?>" >
    <span class="bi bi-<?php echo $floating_icon; ?> m-auto"></span>
    <?php if($floating_text): ?>
        <h6 class="my-auto ms-2 text-uppercase fw-light">
            <?php echo $floating_text; ?>
        </h6>
    <?php endif; ?>
</a>
<?php endif; ?>