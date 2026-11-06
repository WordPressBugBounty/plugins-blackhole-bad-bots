<?php // Blackhole for Bad Bots - Enqueue Resources

if (!defined('ABSPATH')) exit;

function blackhole_enqueue_resources_admin() {
	
	$screen_id = blackhole_get_current_screen_id();
	
	if (($screen_id === 'toplevel_page_blackhole_settings') || ($screen_id === 'blackhole_page_blackhole_badbots') || ($screen_id === 'blackhole_page_blackhole_upgrade')) {
		
		// wp_enqueue_style ( $handle, $src, $deps, $ver, $media )
		
		wp_enqueue_style('blackhole_admin', BBB_URL .'css/admin-styles.css', array(), BBB_VERSION);
		
		wp_enqueue_style('wp-jquery-ui-dialog');
		
		$js_deps = array('jquery', 'jquery-ui-core', 'jquery-ui-dialog');
		
		// wp_enqueue_script ( $handle, $src, $deps, $ver, $in_footer )
		
		wp_enqueue_script('blackhole_admin', BBB_URL .'js/admin-scripts.js', $js_deps, BBB_VERSION);
		
	}
	
}

function blackhole_print_js_vars_admin() {
	
	$screen_id = blackhole_get_current_screen_id();
	
	if (($screen_id === 'toplevel_page_blackhole_settings') || ($screen_id === 'blackhole_page_blackhole_badbots') || ($screen_id === 'blackhole_page_blackhole_upgrade')) :
	
	?>
	
	<script type="text/javascript">
		var 
		alert_reset_badbots_title   = '<?php esc_html_e('Confirm Reset', 'blackhole-bad-bots'); ?>',
		alert_reset_badbots_message = '<?php esc_html_e('Reset the list of bad bots?', 'blackhole-bad-bots'); ?>',
		alert_reset_badbots_true    = '<?php esc_html_e('Yes, make it so.', 'blackhole-bad-bots'); ?>',
		alert_reset_badbots_false   = '<?php esc_html_e('No, abort mission.', 'blackhole-bad-bots'); ?>',
		
		alert_reset_options_title   = '<?php esc_html_e('Confirm Reset', 'blackhole-bad-bots'); ?>',
		alert_reset_options_message = '<?php esc_html_e('Restore default options?', 'blackhole-bad-bots'); ?>',
		alert_reset_options_true    = '<?php esc_html_e('Yes, make it so.', 'blackhole-bad-bots'); ?>',
		alert_reset_options_false   = '<?php esc_html_e('No, abort mission.', 'blackhole-bad-bots'); ?>',
		
		alert_delete_bot_title      = '<?php esc_html_e('Confirm Delete', 'blackhole-bad-bots'); ?>',
		alert_delete_bot_message    = '<?php esc_html_e('Delete this bot?', 'blackhole-bad-bots'); ?>',
		alert_delete_bot_true       = '<?php esc_html_e('Yes, let him go.', 'blackhole-bad-bots'); ?>',
		alert_delete_bot_false      = '<?php esc_html_e('No, stay on the leader.', 'blackhole-bad-bots'); ?>';
	</script>
	
	<?php 
	
	endif;
	
}

function blackhole_get_current_screen_id() {
	
	if (!function_exists('get_current_screen')) require_once ABSPATH .'/wp-admin/includes/screen.php';
	
	$screen = get_current_screen();
	
	if ($screen && property_exists($screen, 'id')) return $screen->id;
	
	return false;
	
}
