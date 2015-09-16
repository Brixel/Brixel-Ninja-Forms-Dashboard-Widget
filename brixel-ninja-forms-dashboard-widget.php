<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://vierpuntnul.be
 * @since             1.0.0
 * @package           Brixel_Ninja_Forms_Dashboard_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       Brixel Ninja Forms Dashboard Widget
 * Plugin URI:        http://vierpuntnul.be
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Wouter Vandenneucker
 * Author URI:        http://vierpuntnul.be
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       brixel-ninja-forms-dashboard-widget
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-brixel-ninja-forms-dashboard-widget-activator.php
 */
function activate_brixel_ninja_forms_dashboard_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-brixel-ninja-forms-dashboard-widget-activator.php';
	Brixel_Ninja_Forms_Dashboard_Widget_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-brixel-ninja-forms-dashboard-widget-deactivator.php
 */
function deactivate_brixel_ninja_forms_dashboard_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-brixel-ninja-forms-dashboard-widget-deactivator.php';
	Brixel_Ninja_Forms_Dashboard_Widget_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_brixel_ninja_forms_dashboard_widget' );
register_deactivation_hook( __FILE__, 'deactivate_brixel_ninja_forms_dashboard_widget' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-brixel-ninja-forms-dashboard-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_brixel_ninja_forms_dashboard_widget() {

	$plugin = new Brixel_Ninja_Forms_Dashboard_Widget();
	$plugin->run();

}
run_brixel_ninja_forms_dashboard_widget();
