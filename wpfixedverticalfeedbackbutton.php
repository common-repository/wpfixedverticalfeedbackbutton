<?php

	/**
	 * The plugin bootstrap file
	 *
	 * This file is read by WordPress to generate the plugin information in the plugin
	 * admin area. This file also includes all of the dependencies used by the plugin,
	 * registers the activation and deactivation functions, and defines a function
	 * that starts the plugin.
	 *
	 * @link              https://codeboxr.com
	 * @since             1.0.0
	 * @package           Wpfixedverticalfeedbackbutton
	 *
	 * @wordpress-plugin
	 * Plugin Name:       CBX Feedback Button
	 * Plugin URI:        https://codeboxr.com/product/fixed-vertical-feedback-button-for-wordpress/
	 * Description:       Fixed vertical Feedback button with and popular Forms Integration customs Forms
	 * Version:           4.0.5
	 * Author:            Codeboxr
	 * Author URI:        https://codeboxr.com
	 * License:           GPL-2.0+
	 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
	 * Text Domain:       wpfixedverticalfeedbackbutton
	 * Domain Path:       /languages
	 */

// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}


	defined( 'WPFIXEDVERTICALFEEDBACKBUTTON_VERSION' ) or define( 'WPFIXEDVERTICALFEEDBACKBUTTON_VERSION', '4.0.5' );
	defined( 'WPFIXEDVERTICALFEEDBACKBUTTON_PLUGIN_NAME' ) or define( 'WPFIXEDVERTICALFEEDBACKBUTTON_PLUGIN_NAME', 'wpfixedverticalfeedbackbutton' );
	defined( 'WPFIXEDVERTICALFEEDBACKBUTTON_BASE_NAME' ) or define( 'WPFIXEDVERTICALFEEDBACKBUTTON_BASE_NAME', plugin_basename( __FILE__ ) );
	defined( 'WPFIXEDVERTICALFEEDBACKBUTTON_ROOT_PATH' ) or define( 'WPFIXEDVERTICALFEEDBACKBUTTON_ROOT_PATH', plugin_dir_path( __FILE__ ) );
	defined( 'WPFIXEDVERTICALFEEDBACKBUTTON_ROOT_URL' ) or define( 'WPFIXEDVERTICALFEEDBACKBUTTON_ROOT_URL', plugin_dir_url( __FILE__ ) );


	/**
	 * The code that runs during plugin activation.
	 * This action is documented in includes/class-wpfixedverticalfeedbackbutton-activator.php
	 */
	function activate_wpfixedverticalfeedbackbutton() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpfixedverticalfeedbackbutton-activator.php';
		Wpfixedverticalfeedbackbutton_Activator::activate();
	}

	/**
	 * The code that runs during plugin deactivation.
	 * This action is documented in includes/class-wpfixedverticalfeedbackbutton-deactivator.php
	 */
	function deactivate_wpfixedverticalfeedbackbutton() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpfixedverticalfeedbackbutton-deactivator.php';
		Wpfixedverticalfeedbackbutton_Deactivator::deactivate();
	}

	register_activation_hook( __FILE__, 'activate_wpfixedverticalfeedbackbutton' );
	register_deactivation_hook( __FILE__, 'deactivate_wpfixedverticalfeedbackbutton' );

	/**
	 * The core plugin class that is used to define internationalization,
	 * admin-specific hooks, and public-facing site hooks.
	 */

	require plugin_dir_path( __FILE__ ) . 'includes/class-mobiledetect.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-wpfixedverticalfeedbackbutton-helper.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-wpfixedverticalfeedbackbutton.php';

	/**
	 * Begins execution of the plugin.
	 *
	 * Since everything within the plugin is registered via hooks,
	 * then kicking off the plugin from this point in the file does
	 * not affect the page life cycle.
	 *
	 * @since    1.0.0
	 */
	function run_wpfixedverticalfeedbackbutton() {

		$plugin_base = plugin_basename( __FILE__ );
		$plugin      = new Wpfixedverticalfeedbackbutton( $plugin_base );
		$plugin->run();

	}

	run_wpfixedverticalfeedbackbutton();
