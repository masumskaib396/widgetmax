<?php 

use \Elementor\Plugin as Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Widgetmax_Extension {
	
	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.6.0';
	const MINIMUM_PHP_VERSION = '5.6';


	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	

	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	public function i18n() {
		load_plugin_textdomain( 'widgetmax' );
	}

	

	public function init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}
		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		//add_action( 'elementor/editor/after_enqueue_styles', array ( $this, 'pawelements_editor_styles' ) );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/elements/categories_registered',[$this,'register_new_category']);
		add_action('elementor/editor/after_enqueue_scripts', [$this, 'widgetmax_editor_scripts_js'], 100);
		add_action( 'wp_enqueue_scripts', array( $this, 'widgetmax_register_frontend_styles' ), 10 );
		add_action( 'elementor/frontend/before_register_scripts', [ $this, 'widgetmax_register_frontend_scripts' ] );
		
	}

	/**
	 * Load Frontend Script
	 *
	*/
	public function widgetmax_register_frontend_scripts(){
		wp_enqueue_style(
			'widgetmax-addons-style',
			WIDGETMAX_ASSETS_PUBLIC .'/css/widget-style.css',
			null,WIDGETMAX_VERSION,
		);

		wp_enqueue_style(
			'animate',
			WIDGETMAX_ASSETS_PUBLIC .'/css/animate.css',
			null,WIDGETMAX_VERSION,
		);

		wp_enqueue_script(
			'widgetmax-addons-js',
			WIDGETMAX_ASSETS_PUBLIC .'/js/widget.js',
			['jquery'], WIDGETMAX_VERSION, true
		);

		wp_enqueue_script(
			'waypoints',
			WIDGETMAX_ASSETS_PUBLIC .'/js/jquery.waypoints.min.js',
			['jquery'], WIDGETMAX_VERSION, true
		);

		wp_enqueue_script(
			'progress-bar',
			WIDGETMAX_ASSETS_PUBLIC .'/js/progress-bar-vendor.min.js',
			['jquery'], WIDGETMAX_VERSION, true
		);

		wp_enqueue_script(
			'typed',
			WIDGETMAX_ASSETS_PUBLIC .'/js/typed.min.js',
			['jquery'], WIDGETMAX_VERSION, true
		);

	}
	
	public function widgetmax_editor_scripts_js(){
		
		wp_enqueue_script(
			'widgetmax-addons-editor',
			WIDGETMAX_ASSETS_PUBLIC .'/js/editor.js',
			['jquery'], WIDGETMAX_VERSION, true
		);
	}

	
	/**
	 * Load Frontend Styles
	 *
	*/
	public function widgetmax_register_frontend_styles(){
        wp_enqueue_style( 'themify-icons',
             WIDGETMAX_ASSETS_PUBLIC . '/vendor/themify-icons/themify-icons.css',
              null, WIDGETMAX_VERSION 
        );

	}
	
	/**
	 * Widgets Catgory
	 *
	*/
	public function register_new_category($manager){
	   $manager->add_category('widgetmax',
			[
				'title' => __( 'Widgetmax Elementor Helper  Addons', 'widgetmax' ),
			]);
	}

	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'widgetmax' ),
			'<strong>' . esc_html__( 'Elementor Pawelements Extension', 'widgetmax' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'widgetmax' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'widgetmax' ),
			'<strong>' . esc_html__( 'Elementor widgetmax Extension', 'widgetmax' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'widgetmax' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'widgetmax' ),
			'<strong>' . esc_html__( 'Elementor Widgetmax Extension', 'widgetmax' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'widgetmax' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function init_widgets() {

		$widgets_manager = \Elementor\Plugin::instance()->widgets_manager;
		/* 
		* Extensions Include
		*/
		require_once( WIDGETMAX_WIDGET_EXTENSIONS . 'custom-css.php' );

		//Include Widget files
		require_once( WIDGETMAX_WIDGET_DIR . 'Button/widget.php' );
		require_once( WIDGETMAX_WIDGET_DIR . 'ContactForm7/widget.php' );
		require_once( WIDGETMAX_WIDGET_DIR . 'Breadcrumb/widget.php' );
		require_once( WIDGETMAX_WIDGET_DIR . 'DualHeading/widget.php' );
		require_once( WIDGETMAX_WIDGET_DIR . 'Pricing/widget.php' );
		require_once( WIDGETMAX_WIDGET_DIR . 'AnimatedText/widget.php' );
		require_once( WIDGETMAX_WIDGET_DIR . 'Progresbar/widget.php' );
	}
}
Widgetmax_Extension::instance();
