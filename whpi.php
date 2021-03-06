<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ridwan-arifandi
 * @since             1.0.0
 * @package           Whpi
 *
 * @wordpress-plugin
 * Plugin Name:       WuoyMembership - HPI
 * Plugin URI:        https://ridwan-arifandi.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ridwan Arifandi
 * Author URI:        https://ridwan-arifandi
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       whpi
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WHPI_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-whpi-activator.php
 */
function activate_whpi() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-whpi-activator.php';
	Whpi_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-whpi-deactivator.php
 */
function deactivate_whpi() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-whpi-deactivator.php';
	Whpi_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_whpi' );
register_deactivation_hook( __FILE__, 'deactivate_whpi' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-whpi.php';

if(!function_exists('__debug')) :
function __debug()
{
	$bt     = debug_backtrace();
	$caller = array_shift($bt);
	?><pre><?php
	print_r([
		"file"  => $caller["file"],
		"line"  => $caller["line"],
		"args"  => func_get_args()
	]);
	?></pre><?php
}
endif;

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_whpi() {

	$plugin = new Whpi();
	$plugin->run();

}
run_whpi();
