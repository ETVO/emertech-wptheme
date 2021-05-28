<?php
/**
 * Partial for the page bottom strip, with Copyright and authorship info
 * 
 * @package Emertech WordPress theme
 */

$common_aos = ' data-aos-offset="0"';

$text_aos = 'data-aos="fade" data-aos-delay="200"' . $common_aos;
?>
<div class="page-bottom d-flex py-2 p-md-1">
    <small class="m-auto text-center text" <?php echo $text_aos; ?>>
        2021 © <strong>Emertech Project</strong>. <br class="d-block d-md-none">
        Desenvolvido por <a href="https://www.linkedin.com/in/estevaoprolim/">Estevão Rolim</a>.
    </small>
</div>