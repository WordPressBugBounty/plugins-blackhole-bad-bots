<?php // Blackhole for Bad Bots - Display Settings

if (!defined('ABSPATH')) exit;

function blackhole_menu_pages() {
	
	$icon = apply_filters('blackhole_dash_icon', 'dashicons-shield-alt');
	
	// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	add_menu_page(esc_html__('Blackhole for Bad Bots', 'blackhole-bad-bots'), esc_html__('Blackhole', 'blackhole-bad-bots'), 'manage_options', 'blackhole_settings', 'blackhole_display_settings', $icon); // avoid duplicate menu item: menu function = submenu function
	
	// add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
	add_submenu_page('blackhole_settings', esc_html__('Settings', 'blackhole-bad-bots'), esc_html__('Settings', 'blackhole-bad-bots'), 'manage_options', 'blackhole_settings', 'blackhole_display_settings'); // avoid duplicate menu item: parent slug = menu slug
	add_submenu_page('blackhole_settings', esc_html__('Bad Bots', 'blackhole-bad-bots'), esc_html__('Bad Bots', 'blackhole-bad-bots'), 'manage_options', 'blackhole_badbots',  'blackhole_display_badbots');
	
	add_submenu_page('blackhole_settings', esc_html__('Unlock Blackhole Pro', 'blackhole-bad-bots'), esc_html__('Upgrade to Pro', 'blackhole-bad-bots'), 'manage_options', 'blackhole_upgrade',  'blackhole_display_upgrade');
	
}

function blackhole_display_settings() { ?>
	
	<div class="wrap">
		<h1 class="bbb-title"><?php echo BBB_NAME; ?> <span><?php echo BBB_VERSION; ?></span></h1>
		<?php settings_errors(); ?>
		<form method="post" action="options.php">
			
			<?php 
				settings_fields('bbb_options');
				do_settings_sections('bbb_options');
				submit_button(); 
			?>
			
		</form>
	</div>
	
<?php }

function blackhole_display_badbots() { ?>
	
	<div class="wrap">
		<h1 class="bbb-title"><?php echo BBB_NAME; ?> <span><?php echo BBB_VERSION; ?></span></h1>
		<form method="post" action="options.php">
			
			<?php 				
				settings_fields('bbb_badbots');
				do_settings_sections('bbb_badbots');
				// submit_button(); 
			?>
			
		</form>
	</div>
	
<?php }

function blackhole_display_upgrade() { ?>
	
	<div class="wrap">
		<h1 class="bbb-title"><?php echo BBB_NAME; ?> <span><?php echo BBB_VERSION; ?></span></h1>
		<form method="post" action="options.php">
			
			<h2><?php esc_html_e('Upgrade to Pro..', 'blackhole-bad-bots'); ?></h2>
			
			<p>
				<strong><?php esc_html_e('Save 50%', 'blackhole-bad-bots'); ?></strong> <?php esc_html_e('when you upgrade to any', 'blackhole-bad-bots'); ?> 
				<strong><?php esc_html_e('Lifetime Pro', 'blackhole-bad-bots'); ?></strong> <?php esc_html_e('license.', 'blackhole-bad-bots'); ?>
			</p>
			
			<p>👾 <?php esc_html_e('Unlock all PRO features including:', 'blackhole-bad-bots'); ?></p>
			
			<ul style="margin:25px 0 25px 40px;list-style:disc outside;">
				<li><?php esc_html_e('Threshold control (number of allowed hits)', 'blackhole-bad-bots'); ?></li>
				<li><?php esc_html_e('Custom email alerts', 'blackhole-bad-bots'); ?></li>
				<li><?php esc_html_e('Custom messages for blocked bots', 'blackhole-bad-bots'); ?></li>
				<li><?php esc_html_e('Custom redirect for blocked bots', 'blackhole-bad-bots'); ?></li>
				<li><?php esc_html_e('Custom blackhole trigger links', 'blackhole-bad-bots'); ?></li>
				<li><?php esc_html_e('Blacklist/block bots based on user agent or IP address', 'blackhole-bad-bots'); ?></li>
				<li><?php esc_html_e('Whitelist/allow bots based on user agent or IP address', 'blackhole-bad-bots'); ?></li>
				<li><?php esc_html_e('Redirect whitelisted bots', 'blackhole-bad-bots'); ?></li>
				<li><?php esc_html_e('Set custom HTTP Status Code', 'blackhole-bad-bots'); ?></li>
				<li><?php esc_html_e('Full-featured Bad Bot Log with paging, sorting, and field search', 'blackhole-bad-bots'); ?></li>
				<li><?php esc_html_e('Manually add bad bots to the Bad Bot Log', 'blackhole-bad-bots'); ?></li>
				<li><?php esc_html_e('Geo/IP location lookups for each bad bot', 'blackhole-bad-bots'); ?></li>
				<li><?php esc_html_e('Plus everything free can do and more!', 'blackhole-bad-bots'); ?></li>
			</ul>
			
			<p>👾 <?php esc_html_e('Apply code', 'blackhole-bad-bots'); ?> <code>BLACKHOLE50</code> <?php esc_html_e('during checkout for instant savings.', 'blackhole-bad-bots'); ?></p>
			
			<p>👾 <a target="_blank" rel="noopener noreferrer" href="https://plugin-planet.com/blackhole-pro/"><?php esc_html_e('Upgrade to Blackhole Pro &raquo;', 'blackhole-bad-bots'); ?></a></p>
			
			<?php blackhole_callback_pro_banner(); ?>
			
			<?php blackhole_callback_pro_extra(); ?>
			
		</form>
	</div>
	
<?php }
