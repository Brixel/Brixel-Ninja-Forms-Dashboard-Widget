<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://vierpuntnul.be
 * @since      1.0.0
 *
 * @package    Brixel_Ninja_Forms_Dashboard_Widget
 * @subpackage Brixel_Ninja_Forms_Dashboard_Widget/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Brixel_Ninja_Forms_Dashboard_Widget
 * @subpackage Brixel_Ninja_Forms_Dashboard_Widget/admin
 * @author     Wouter Vandenneucker <hello@vierpuntnul.be>
 */
class Brixel_Ninja_Forms_Dashboard_Widget_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Brixel_Ninja_Forms_Dashboard_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Brixel_Ninja_Forms_Dashboard_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/brixel-ninja-forms-dashboard-widget-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Brixel_Ninja_Forms_Dashboard_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Brixel_Ninja_Forms_Dashboard_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/brixel-ninja-forms-dashboard-widget-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
         * Register the JavaScript for the admin area.
         *
         * @since    1.0.0
         */
	public function add_dashboard_widget() {

		wp_add_dashboard_widget(
			'Brixel Ninja forms dashboard widget',
			__( 'Meme Kitchen Reservations', 'brixel_ninja_forms_dashboard_widget' ),
			array( $this, 'render_dashboard_widget' )
		);

	}

	public function render_dashboard_widget() {
		/*
		$info = array(
			__( 'Site Name',          'brixel_ninja_forms_dashboard_widget') => get_bloginfo( 'name' ),
			__( 'Site Tagline',       'brixel_ninja_forms_dashboard_widget') => get_bloginfo( 'description' ),
			__( 'Site URL',           'brixel_ninja_forms_dashboard_widget') => get_bloginfo( 'url' ),
			__( 'Admin Email',        'brixel_ninja_forms_dashboard_widget') => get_bloginfo( 'admin_email' ),
			__( 'Admin Language',     'brixel_ninja_forms_dashboard_widget') => get_bloginfo( 'language' ),
			__( 'Text Direction',     'brixel_ninja_forms_dashboard_widget') => get_bloginfo( 'text_direction' ),
			__( 'PHP Version',        'brixel_ninja_forms_dashboard_widget') => PHP_VERSION,
			__( 'MySQL Version',      'brixel_ninja_forms_dashboard_widget') => MYSQL_VERSION,
			__( 'WordPress Version',  'brixel_ninja_forms_dashboard_widget') => get_bloginfo( 'version' ),
		);

		echo '<table>';
		foreach ( $info as $key => $value ) {
			echo '<tr><td><strong>' . $key . ' :</strong></td><td>' . $value . '</td></tr>';
		}
		echo '</table>';
		*/

		//$custom_post_type = 'nf_sub';
		//$args=array(
		//  'post_type' => $custom_post_type,
		//  'post_status' => 'publish',
		//  'posts_per_page' => -1,
		//  'caller_get_posts'=> 1
		//);
		//$my_query = null;
		//$my_query = new WP_Query($args);
		//if( $my_query->have_posts() ) {
		//  echo 'List of Submissions';
		//  while ($my_query->have_posts()) : $my_query->the_post();
		//   echo <p>print_r($my_query);</p>
		//    
		//  endwhile;
		//}
		//wp_reset_query();  // Restore global post data stomped by the_post().
		$form_id = 6;
		$args = array(
  			'form_id'   => $form_id,
			//'user_id'   => $user_id,
 			'fields'    => array(
    				//'34'      => 'checked',
    				//'54'      => 'Hello World',
  			),
		);
		// This will return an array of sub objects.
		$subs = Ninja_Forms()->subs()->get( $args );
		// This is a basic example of how to interact with the returned objects.
		// See other documentation for all the methods and properties of the submission object.
		foreach ( $subs as $sub ) {
  			$form_id = $sub->form_id;
  			$user_id = $sub->user_id;
  			// Returns an array of [field_id] => [user_value] pairs
  			$all_fields = $sub->get_all_fields();
 	 		// Echoes out the submitted value for a field
  			echo $sub->get_field( 34 );
		}
	}
}
