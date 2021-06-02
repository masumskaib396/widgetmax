<?php
namespace Widgetmax\Widgets\Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Widget_Base;

class Widgetmax_Animated_Text extends Widget_Base {

	public function get_name() {
		return 'widgetmax-animated';
	}

	public function get_title() {
		return esc_html__( 'Widgetmax Animated Text', 'widgetmax' );
	}

	public function get_icon() {
		return 'eicon-animated-headline';
	}

   	public function get_categories() {
		return [ 'widgetmax' ];
	}
	  
	public function get_keywords() {
        return [ 'widgetmax', 'fancy', 'heading', 'animate', 'animation' ];
    } 
    
 	public function get_script_depends() {
		return [ 'widgetmax-animated-text' ];
	}

	protected function _register_controls() {
		
	    /*
	    * Animated Text Content
	    */
	    $this->start_controls_section(
	        'widgetmax_section_animated_text_content',
	        [
	            'label' => esc_html__( 'Content', 'widgetmax' )
	        ]
		);
		
		$this->add_control(
	        'widgetmax_animated_text_before_text',
	        [
				'label'   => esc_html__( 'Before Text', 'widgetmax' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'This is', 'widgetmax' )
	        ]
		);

		$this->add_control(
			'widgetmax_animated_text_animated_heading',
			[
				'label'       => esc_html__( 'Animated Text', 'widgetmax' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter your animated text with comma separated.', 'widgetmax' ),
				'description' => __( '<b>Write animated heading with comma separated. Example: Exclusive, Addons, Elementor</b>', 'widgetmax' ),
				'default'     => esc_html__( 'Widgetmax, Addons, Elementor', 'widgetmax' ),
				'dynamic'     => [ 'active' => true ]
			]
		);
		
		$this->add_control(
	        'widgetmax_animated_text_after_text',
	        [
				'label'   => esc_html__( 'After Text', 'widgetmax' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'For You.', 'widgetmax' )
	        ]
		);

		$this->add_control(
			'widgetmax_animated_text_animated_heading_tag',
			[
				'label'   => esc_html__( 'HTML Tag', 'widgetmax' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'h3',
				'toggle'  => false,
				'options' => [
					'h1'  => [
						'title' => __( 'H1', 'widgetmax' ),
						'icon'  => 'eicon-editor-h1'
					],
					'h2'  => [
						'title' => __( 'H2', 'widgetmax' ),
						'icon'  => 'eicon-editor-h2'
					],
					'h3'  => [
						'title' => __( 'H3', 'widgetmax' ),
						'icon'  => 'eicon-editor-h3'
					],
					'h4'  => [
						'title' => __( 'H4', 'widgetmax' ),
						'icon'  => 'eicon-editor-h4'
					],
					'h5'  => [
						'title' => __( 'H5', 'widgetmax' ),
						'icon'  => 'eicon-editor-h5'
					],
					'h6'  => [
						'title' => __( 'H6', 'widgetmax' ),
						'icon'  => 'eicon-editor-h6'
					]
				]
			]
		);

		$this->add_control(
			'widgetmax_animated_text_animated_heading_alignment',
			[
				'label'   => esc_html__( 'Alignment', 'widgetmax' ),
				'type'    => Controls_Manager::CHOOSE,
				'toggle'  => false,
				'options' => [
					'widgetmax-animated-text-align-left'   => [
						'title' => __( 'Left', 'widgetmax' ),
						'icon'  => 'eicon-text-align-left'
					],
					'widgetmax-animated-text-align-center' => [
						'title' => __( 'Center', 'widgetmax' ),
						'icon'  => 'eicon-text-align-center'
					],
					'widgetmax-animated-text-align-right'  => [
						'title' => __( 'Right', 'widgetmax' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'default' => 'widgetmax-animated-text-align-center'
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text Container Style
	    */
	    $this->start_controls_section(
	        'widgetmax_section_animated_text_animation_tyle',
	        [
				'label' => esc_html__( 'Animation', 'widgetmax' ),
				'tab'   => Controls_Manager::TAB_STYLE
	        ]
		);

		$this->add_control(
			'widgetmax_animated_text_animated_heading_animated_type',
			[
				'label'   => esc_html__( 'Animation Type', 'widgetmax' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'widgetmax-typed-animation',
				'options' => [
					'widgetmax-typed-animation'   => __( 'Typed', 'widgetmax' ),
					'widgetmax-morphed-animation' => __( 'Animate', 'widgetmax' )
				]
			]
		);

		$this->add_control(
			'widgetmax_animated_text_animated_heading_animation_style',
			[
				'label'   => esc_html__( 'Animation Style', 'widgetmax' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'fadeIn',
				'options' => [
					'fadeIn'            => __( 'Fade In', 'widgetmax' ),
					'fadeInUp'          => __( 'Fade In Up', 'widgetmax' ),
					'fadeInDown'        => __( 'Fade In Down', 'widgetmax' ),
					'fadeInLeft'        => __( 'Fade In Left', 'widgetmax' ),
					'fadeInRight'       => __( 'Fade In Right', 'widgetmax' ),
					'zoomIn'            => __( 'Zoom In', 'widgetmax' ),
					'zoomInUp'          => __( 'Zoom In Up', 'widgetmax' ),
					'zoomInDown'        => __( 'Zoom In Down', 'widgetmax' ),
					'zoomInLeft'        => __( 'Zoom In Left', 'widgetmax' ),
					'zoomInRight'       => __( 'Zoom In Right', 'widgetmax' ),
					'slideInDown'       => __( 'Slide In Down', 'widgetmax' ),
					'slideInUp'         => __( 'Slide In Up', 'widgetmax' ),
					'slideInLeft'       => __( 'Slide In Left', 'widgetmax' ),
					'slideInRight'      => __( 'Slide In Right', 'widgetmax' ),
					'bounce'            => __( 'Bounce', 'widgetmax' ),
					'bounceIn'          => __( 'Bounce In', 'widgetmax' ),
					'bounceInUp'        => __( 'Bounce In Up', 'widgetmax' ),
					'bounceInDown'      => __( 'Bounce In Down', 'widgetmax' ),
					'bounceInLeft'      => __( 'Bounce In Left', 'widgetmax' ),
					'bounceInRight'     => __( 'Bounce In Right', 'widgetmax' ),
					'flash'             => __( 'Flash', 'widgetmax' ),
					'pulse'             => __( 'Pulse', 'widgetmax' ),
					'rotateIn'          => __( 'Rotate In', 'widgetmax' ),
					'rotateInDownLeft'  => __( 'Rotate In Down Left', 'widgetmax' ),
					'rotateInDownRight' => __( 'Rotate In Down Right', 'widgetmax' ),
					'rotateInUpRight'   => __( 'rotate In Up Right', 'widgetmax' ),
					'rotateIn'          => __( 'Rotate In', 'widgetmax' ),
					'rollIn'            => __( 'Roll In', 'widgetmax' ),
					'lightSpeedIn'      => __( 'Light Speed In', 'widgetmax' )
				],
				'condition' => [
					'widgetmax_animated_text_animated_heading_animated_type' => 'widgetmax-morphed-animation'
				]
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text Settings
	    */
	    $this->start_controls_section(
	        'widgetmax_section_animated_text_settings',
	        [
				'label' => esc_html__( 'Settings', 'widgetmax' ),
				'tab'   => Controls_Manager::TAB_STYLE
	        ]
		);

		$this->add_control(
			'widgetmax_animated_text_animation_speed',
			[
				'label'     => __( 'Animation Speed', 'widgetmax' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1000,
				'min'       => 100,
				'max'       => 10000,
				'condition' => [
					'widgetmax_animated_text_animated_heading_animated_type' => 'widgetmax-morphed-animation'
				]
			]
		);

		$this->add_control(
			'widgetmax_animated_text_type_speed',
			[
				'label'   => __( 'Type Speed', 'widgetmax' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 60,
				'min'     => 10,
				'max'     => 200,
				'step'    => 10,
				'condition' => [
					'widgetmax_animated_text_animated_heading_animated_type' => 'widgetmax-typed-animation'
				]
			]
		);

		$this->add_control(
			'widgetmax_animated_text_start_delay',
			[
				'label'     => __( 'Start Delay', 'widgetmax' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1000,
				'min'       => 1000,
				'max'       => 10000,
				'condition' => [
					'widgetmax_animated_text_animated_heading_animated_type' => 'widgetmax-typed-animation'
				]
			]
		);

		$this->add_control(
			'widgetmax_animated_text_back_type_speed',
			[
				'label'     => __( 'Back Type Speed', 'widgetmax' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 60,
				'min'       => 10,
				'max'       => 200,
				'step'      => 10,
				'condition' => [
					'widgetmax_animated_text_animated_heading_animated_type' => 'widgetmax-typed-animation'
				]
			]
		);

		$this->add_control(
			'widgetmax_animated_text_back_delay',
			[
				'label'     => __( 'Back Delay', 'widgetmax' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1000,
				'min'       => 1000,
				'max'       => 10000,
				'condition' => [
					'widgetmax_animated_text_animated_heading_animated_type' => 'widgetmax-typed-animation'
				]
			]
		);

		$this->add_control(
			'widgetmax_animated_text_loop',
			[
				'label'        => __( 'Loop', 'widgetmax' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'widgetmax' ),
				'label_off'    => __( 'OFF', 'widgetmax' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'widgetmax_animated_text_animated_heading_animated_type' => 'widgetmax-typed-animation'
				]
			]
		);

		$this->add_control(
			'widgetmax_animated_text_show_cursor',
			[
				'label'        => __( 'Show Cursor', 'widgetmax' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'widgetmax' ),
				'label_off'    => __( 'OFF', 'widgetmax' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'widgetmax_animated_text_animated_heading_animated_type' => 'widgetmax-typed-animation'
				]
			]
		);

		$this->add_control(
			'widgetmax_animated_text_fade_out',
			[
				'label'        => __( 'Fade Out', 'widgetmax' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'widgetmax' ),
				'label_off'    => __( 'OFF', 'widgetmax' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'widgetmax_animated_text_animated_heading_animated_type' => 'widgetmax-typed-animation'
				]
			]
		);

		$this->add_control(
			'widgetmax_animated_text_smart_backspace',
			[
				'label'        => __( 'Smart Backspace', 'widgetmax' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'widgetmax' ),
				'label_off'    => __( 'OFF', 'widgetmax' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'widgetmax_animated_text_animated_heading_animated_type' => 'widgetmax-typed-animation'
				]
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text pre animated Text Style
		*/
	    $this->start_controls_section(
	        'widgetmax_pre_animated_text_style',
	        [
				'label'     => esc_html__( 'Pre Animated text', 'widgetmax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'widgetmax_animated_text_before_text!' => ''
				]
	        ]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'widgetmax_pre_animated_text_typography',
				'fields_options'   => [
		            'font_size'    => [
		                'default'  => [
		                    'unit' => 'px',
		                    'size' => 30
		                ]
		            ],
		            'font_weight'  => [
		                'default'  => '600'
		            ]
	            ],
				'selector' => '{{WRAPPER}} .widgetmax-animated-text-pre-heading',
			]
		);

		$this->add_control(
			'widgetmax_pre_animated_text_color',
			[
				'label'     => esc_html__( 'Color', 'widgetmax' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222222',
				'selectors' => [
					'{{WRAPPER}} .widgetmax-animated-text-pre-heading' => 'color: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text animated Text Style
	    */
	    $this->start_controls_section(
	        'widgetmax_animated_text_style',
	        [
				'label' => esc_html__( 'Animated text', 'widgetmax' ),
				'tab'   => Controls_Manager::TAB_STYLE
	        ]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'widgetmax_animated_text_typography',
				'fields_options'   => [
		            'font_size'    => [
		                'default'  => [
		                    'unit' => 'px',
		                    'size' => 30
		                ]
		            ],
		            'font_weight'  => [
		                'default'  => '600'
		            ]
	            ],
				'selector' => '{{WRAPPER}} .widgetmax-animated-text-animated-heading, {{WRAPPER}} span.typed-cursor'
			]
		);

		$this->add_control(
			'widgetmax_animated_text_color',
			[
				'label'     => esc_html__( 'Color', 'widgetmax' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222',
				'selectors' => [
					'{{WRAPPER}} .widgetmax-animated-text-animated-heading, {{WRAPPER}} span.typed-cursor' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'widgetmax_animated_text_spacing',
			[
				'label'      => __( 'Spacing', 'widgetmax' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'default'    => [
                    'unit'   => 'px',
                    'size'   => 8
                ],
				'range'      => [
					'px'     => [
						'min' => 0,
						'max' => 50
					]
				],
				'selectors'  => [
					'{{WRAPPER}} .widgetmax-animated-text-animated-heading' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text post animated Text Style
	    */
	    $this->start_controls_section(
	        'widgetmax_post_animated_text_style',
	        [
				'label'     => esc_html__( 'Post Animated text', 'widgetmax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'widgetmax_animated_text_after_text!' => ''
				]
	        ]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'widgetmax_post_animated_text_typography',
				'fields_options'   => [
		            'font_size'    => [
		                'default'  => [
		                    'unit' => 'px',
		                    'size' => 30
		                ]
		            ],
		            'font_weight'  => [
		                'default'  => '600'
		            ]
	            ],
				'selector' => '{{WRAPPER}} .widgetmax-animated-text-post-heading'
			]
		);

		$this->add_control(
			'widgetmax_post_animated_text_color',
			[
				'label'     => esc_html__( 'Color', 'widgetmax' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222222',
				'selectors' => [
					'{{WRAPPER}} .widgetmax-animated-text-post-heading' => 'color: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();
	
	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$id            = substr( $this->get_id_int(), 0, 3 );
		$type_heading  = explode( ',', $settings['widgetmax_animated_text_animated_heading'] );
		$before_text   = $settings['widgetmax_animated_text_before_text'];
		$heading_text  = $settings['widgetmax_animated_text_animated_heading'];
		$after_text    = $settings['widgetmax_animated_text_after_text'];
		$heading_tag   = $settings['widgetmax_animated_text_animated_heading_tag'];
		$heading_align = $settings['widgetmax_animated_text_animated_heading_alignment'];

		$this->add_render_attribute( 'widgetmax_typed_animated_string', 'class', 'widgetmax-typed-strings' );
		$this->add_render_attribute( 'widgetmax_typed_animated_string',
			[
				'data-type_string'       => esc_attr(json_encode($type_heading)),
				'data-heading_animation' => esc_attr( $settings['widgetmax_animated_text_animated_heading_animated_type'] )
			]
		);

		if($settings['widgetmax_animated_text_animated_heading_animated_type'] === 'widgetmax-typed-animation'){
			$this->add_render_attribute( 'widgetmax_typed_animated_string',
				[
					'data-type_speed'      => esc_attr( $settings['widgetmax_animated_text_type_speed'] ),
					'data-back_type_speed' => esc_attr( $settings['widgetmax_animated_text_back_type_speed'] ),
					'data-loop'            => esc_attr( $settings['widgetmax_animated_text_loop'] ),
					'data-show_cursor'     => esc_attr( $settings['widgetmax_animated_text_show_cursor'] ),
					'data-fade_out'        => esc_attr( $settings['widgetmax_animated_text_fade_out'] ),
					'data-smart_backspace' => esc_attr( $settings['widgetmax_animated_text_smart_backspace'] ),
					'data-start_delay'     => esc_attr( $settings['widgetmax_animated_text_start_delay'] ),
					'data-back_delay'      => esc_attr( $settings['widgetmax_animated_text_back_delay'] )
				]
			);
		}

		if($settings['widgetmax_animated_text_animated_heading_animated_type'] === 'widgetmax-morphed-animation'){
			$this->add_render_attribute( 'widgetmax_typed_animated_string',
				[
					'data-animation_style' => esc_attr( $settings['widgetmax_animated_text_animated_heading_animation_style'] ),
					'data-animation_speed' => esc_attr( $settings['widgetmax_animated_text_animation_speed'] )
				]
			);
		}

		$this->add_render_attribute( 'widgetmax_animated_text_animated_heading',
			[
				'id'    => 'widgetmax-animated-text-'.$id,
				'class' => 'widgetmax-animated-text-animated-heading'
			]
		);

		$this->add_render_attribute( 'widgetmax_animated_text_before_text', 'class', 'widgetmax-animated-text-pre-heading' );
        $this->add_inline_editing_attributes( 'widgetmax_animated_text_before_text' );

		$this->add_render_attribute( 'widgetmax_animated_text_after_text', 'class', 'widgetmax-animated-text-post-heading' );
        $this->add_inline_editing_attributes( 'widgetmax_animated_text_after_text' );

		echo '<div class="widgetmax-animated-text '.esc_attr($heading_align).'">';

			do_action( 'widgetmax_animated_text_wrapper_before' );

			echo '<'.esc_attr($heading_tag).' '.$this->get_render_attribute_string( 'widgetmax_typed_animated_string' ).'>';

				do_action( 'widgetmax_animated_text_content_before' );

				$before_text ? printf( '<span '.$this->get_render_attribute_string( 'widgetmax_animated_text_before_text' ).'>%s</span>', wp_kses_post($before_text) ) : '';

				if( 'widgetmax-typed-animation' === $settings['widgetmax_animated_text_animated_heading_animated_type'] ) {
					echo '<span id="widgetmax-animated-text-'.esc_attr($id).'" class="widgetmax-animated-text-animated-heading"></span>';
				}

				if( 'widgetmax-morphed-animation' === $settings['widgetmax_animated_text_animated_heading_animated_type'] ) {
					echo '<span '.$this->get_render_attribute_string( 'widgetmax_animated_text_animated_heading' ).'>'.wp_kses_post($heading_text).'</span>';
				}

				$after_text ? printf( '<span '.$this->get_render_attribute_string( 'widgetmax_animated_text_after_text' ).'>%s</span>', wp_kses_post($after_text) ) : '';

				do_action( 'widgetmax_animated_text_content_after' );

			echo '</'.esc_attr($heading_tag).'>';

			do_action( 'widgetmax_animated_text_wrapper_after' );

		echo '</div>';
	}
}
$widgets_manager->register_widget_type(new \Widgetmax\Widgets\Elementor\Widgetmax_Animated_Text());