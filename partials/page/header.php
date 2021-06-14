<?php
/**
 * Partial for main page header
 * 
 * @package Emertech WordPress theme
 */


$video_id = get_theme_mod("emertech_logo_video"); 
$video_src = wp_get_attachment_url( $video_id );

$show_video = get_theme_mod("emertech_logo_video_show");
$show_video = ( $show_video == "all" || ( $show_video == "home" && is_front_page() ) ); 

if($show_video):
?>
<div class="overlay show-<?php echo $show_video; ?>" id="overlay_bg">
	<video id="over_video" autoplay muted>
		<source src="<?php echo $video_src; ?>" type="">
		<?php 
			// the_custom_logo();
		?>
	</video> 
</div>
<?php endif; ?>

<header class="navbar navbar-expand-lg pe-3 pe-lg-4 ps-0 py-3 text-light">
	<div data-aos="fade" class="container-fluid p-0">
		<div class="navbar-brand me-auto p-0">
			<!--
			<?php
				if($show_video == 1) {
					?>
						<a href="<?php echo home_url(); ?>">
							<video autoplay muted width="300">
								<source src="<?php echo $video_src; ?>" type="">
								<?php 
									// the_custom_logo();
								?>
							</video> 
						</a>
					<?php
				}
				else {
					the_custom_logo(); 
				}
			?> 
			-->
			
			<?php 
				the_custom_logo(); 
			?>
		</div>

		<button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenuDropdown" aria-controls="mainMenuDropdown" aria-expanded="false" aria-label="<?php echo __("Ativar Menu", "emertech") ?>">
			<!-- <span class="navbar-toggler-icon"></span> -->
			<span class="icon bi bi-list"></span>
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