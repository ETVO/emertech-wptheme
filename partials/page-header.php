<?php
/**
 * Partial for main page header
 * 
 * @package Emertech WordPress theme
 */
?>
<header class="navbar navbar-expand-lg pe-3 pe-lg-4 ps-0 py-3 text-light">
	<div data-aos="fade" class="container-fluid p-0">
		<div class="navbar-brand me-auto p-0">
			<?php the_custom_logo(); ?>
		</div>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenuDropdown" aria-controls="mainMenuDropdown" aria-expanded="false" aria-label="<?php echo __("Ativar Menu", "emertech") ?>">
			<!-- <span class="navbar-toggler-icon"></span> -->
			<i class="fas fa-lg fa-bars"></i>
		</button>

		<?php
		wp_nav_menu(
			array(
				'menu' => 'main_menu',
				'depth' => 2,
				'container_class' => 'collapse navbar-collapse',
				'container_id' => 'mainMenuDropdown',
				'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',
				'fallback_cb' => 'Emertech_Custom_Walker::fallback',
				'walker' => new Emertech_Custom_Walker(),
			)
		);
		?>
	</div>
</header>