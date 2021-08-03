<?php

/**
 * Functions to configure metabox in post
 * 
 * @package Emertech WordPress theme
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Emertech setup for metabox in post
 */
class Emertech_Metabox_Post
{

	/**
	 * Add hooks
	 * 
	 * @since 4.0
	 */
	public function __construct()
	{
		add_action('add_meta_boxes', array($this, 'add'));
		add_action('save_post',      array($this, 'save'));
	}

	/**
	 * Adds the meta box container.
	 * 
	 * @since 4.0
	 */
	public function add()
	{
		// Limit meta box to certain post types.
		$screens = [ 'post' ];

		foreach($screens as $screen) 
		{
			add_meta_box(
				'et_post_meta',
				'Opções Customizadas',
				[$this, 'render'],
				$screen,
				'advanced',
				'high'
			);
		}
	}

	/**
	 * Render Meta Box content.
	 *
	 * @param WP_Post $post The post object.
	 * @since 4.0
	 */
	public function render(WP_Post $post)
	{

		// Add an nonce field so we can check for it later.
		wp_nonce_field('et_post_meta_nonce', 'et_post_meta_nonce');

		// Use get_post_meta to retrieve an existing value from the database.
		$hide_image = get_post_meta($post->ID, 'et_post_show_image', true);

		$hide_image = esc_attr($hide_image);

		// Display the form, using the current value.
		if($hide_image == "yes") $hide_image_checked = 'checked="checked"'; ?>
			<input type="checkbox" id="et_post_show_image" name="et_post_show_image" value="yes" 
			<?php echo $hide_image_checked; ?> />
		<?php
?>
		<label for="et_post_show_image">
			<?php _e('Exibir imagem de destaque'); ?>
		</label>
		<!-- <select name="et_post_show_image" id="et_post_show_image" value="<?php echo esc_attr($hide_image); ?>">
			<option value="0">Ocultar</option>
			<option value="1">Exibir</option>
		</select> -->
<?php
	}


	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 * @since 4.0
	 */
	public function save(int $post_id)
	{
        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set
        if (!isset($_POST['et_post_meta_nonce'])) {
            return $post_id;
        }

        $nonce = $_POST['et_post_meta_nonce'];

        // Verify that the nonce is valid
        if (!wp_verify_nonce($nonce, 'et_post_meta_nonce')) {
            return $post_id;
        }

		
		/* OK, now it's safe for us to save the data. */
		if (isset($_POST['et_post_show_image'])) {
			// Sanitize the user input.
			$value = sanitize_text_field($_POST['et_post_show_image']);

			// Update the meta field.
			update_post_meta($post_id, 'et_post_show_image', $value);
		}
		else {
			// Delete the meta field.
			delete_post_meta($post_id, 'et_post_show_image');
		}
	}

	/**
	 * Check if saving can be done safely
	 *
	 * @param string $nonce Nonce action and name
	 * @param string $post_type Post type name
	 * @param integer $post_id The id of the current post
	 * @return boolean
	 * @since 4.0
	 */
	public function is_save_safe(string $nonce, string $post_type, int $post_id = null) {
		/*
		* We need to verify this came from the our screen and with proper authorization,
		* because save_post can be triggered at other times.
		*/

		// Check if our nonce is set.
		if (!isset($_POST[$nonce])) {
			return false;
		}

		$nonce = $_POST[$nonce];

		// Verify that the nonce is valid.
		if (!wp_verify_nonce($nonce, $nonce)) {
			return false;
		}

		// Check the user's permissions.
		if (isset($_POST['post_type']) && $_POST['post_type'] == $post_type) {
			
			if (!current_user_can('edit_page', $post_id)) {
				return false;
			}
		} 
		else {
			if (!current_user_can('edit_post', $post_id)) {
				return false;
			}
		}

		return true;
	}
}

new Emertech_Metabox_Post();