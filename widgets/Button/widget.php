<?php
/**
 * Button Widget.
 *
 *
 * @since 1.0.0
 */
namespace Widgetmax\Widgets\Elementor;

use  Elementor\Widget_Base;
use  Elementor\Controls_Manager;
use  Elementor\utils;
use  Elementor\Scheme_Color;
use  Elementor\Group_Control_Typography;
use  Elementor\Scheme_Typography;
use  Elementor\Group_Control_Box_Shadow;
use  Elementor\Group_Control_Background;
use  Elementor\Group_Control_Border;
use  Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widgetmax_Button extends \Elementor\Widget_Base {

	public function get_name() {
		return 'widgetmax_btutton';
	}
	
	public function get_title() {
		return __( 'Button', 'widgetmax' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'widgetmax' ];
	}

    public function get_keywords()
    {
        return ['btn', 'button', 'link', 'widgetkit'];
    }

	protected function _register_controls() {

		$this->start_controls_section('content_section',
			[
				'label' => __( 'Butoon', 'widgetmax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control('button_text',
			[
				'label' => __( 'Button Text', 'widgetmax' ),
				'type' => Controls_Manager::TEXT,
                'dynamic'    => [ 'active' => true ],
				'placeholder' => __( 'Button Text', 'widgetmax' ),
				'default' => __( 'Awsome Button', 'widgetmax' ),
				'label_block' => true,
			]
		);

       $this->add_control('widgetmax_button_link_selection', 
        [
            'label'         => __('Link Type', 'widgetmax'),
            'type'          => Controls_Manager::SELECT,
            'options'       => [
                'url'   => __('URL', 'premium-addons-for-elementor'),
                'link'  => __('Existing Page', 'widgetmax'),
            ],
            'default'       => 'url',
            'label_block'   => true,
        ]
        );
       $this->add_control('widgetmax_button_link',
            [
                'label'         => __('Link', 'widgetmax'),
                'type'          => Controls_Manager::URL,
                'default'       => [
                    'url'   => '#',
                    'is_external' => '',
                ],
                'show_external' => true,
                'placeholder'   => 'https://yourdomin.com/',
                'label_block'   => true,
                'condition'     => [
                    'widgetmax_button_link_selection' => 'url'
                ]
            ]
        );
        $this->add_control('widgetmax_button_existing_link',
            [
                'label'         => __('Existing Page', 'widgetmax'),
                'type'          => Controls_Manager::SELECT2,
                'options'       => widgetmax_get_all_pages(),
                'condition'     => [
                    'widgetmax_button_link_selection'     => 'link',
                ],
                'multiple'      => false,
                'separator'     => 'after',
                'label_block'   => true,
            ]
        );

        $this->add_responsive_control('widgetmax_button_align',
			[
				'label'             => __( 'Alignment', 'widgetmax' ),
				'type'              => Controls_Manager::CHOOSE,
				'options'           => [
					'left'    => [
						'title' => __( 'Left', 'widgetmax' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'widgetmax' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'widgetmax' ),
						'icon'  => 'fa fa-align-right',
					],
				],
                'selectors'         => [
                    '{{WRAPPER}} .sb_wraper' => 'text-align: {{VALUE}}',
                ],
				'default' => 'left',
			]
		);
		$this->add_control('widgetmax_button_size', 
        	[
            'label'         => __('Size', 'widgetmax'),
            'type'          => Controls_Manager::SELECT,
            'default'       => 'lg',
            'options'       => [
                    'sm'        => __('Small', 'widgetmax'),
                    'md'        => __('Regular', 'widgetmax'),
                    'lg'        => __('Large', 'widgetmax'),
                    'ex'        => __('Extra Large', 'widgetmax'),
                    'block'     => __('Block', 'widgetmax'),
                ],
            'label_block'   => true,
            'separator'     => 'after',
            ]
        );

        $this->add_control('widgetmax_icon_switcher',
	        [
	            'label'         => __('Icon', 'widgetmax'),
	            'type'          => Controls_Manager::SWITCHER,
	            'description'   => __('Enable or disable button icon','widgetmax'),
	        ]
        );

		$this->add_control(
			'widgetmax_button_icon',
			[
				'label' => __( 'Icon', 'widgetmax' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'condition'     => [
                    'widgetmax_icon_switcher'  => 'yes'
                ],
			]
		);
		$this->add_control(
            'widgetmax_button_icon_position',
            [
                'label' => __( 'Icon Position', 'widgetmax' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __( 'Before', 'widgetmax' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'widgetmax' ),
                        'icon' => 'eicon-h-align-right',
                    ]
                ],
                'toggle' => false,
                'default' => 'after',
                'condition' => [
                    'widgetmax_icon_switcher' => 'yes',
                    'widgetmax_button_icon!' => ''
                ]
            ]
        );

        $this->add_control(
			'button_css_id',
			[
				'label' => __( 'Button ID', 'widgetmax' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'title' => __( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'widgetmax' ),
				'label_block' => false,
				'description' => __( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows <code>A-z 0-9</code> & underscore chars without spaces.', 'themepaw-companion' ),
				'separator' => 'before',

			]
		);
		$this->end_controls_section();
		// End Content Section




		/*
		*Button Icon Style
		*/
		$this->start_controls_section(
            'icon_style',
            [
                'label' => __('Icon', 'widgetmax'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'widgetmax_icon_switcher' => 'yes',
                ]
            ]
        );
        $this->add_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'widgetmax'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .widgetmax-btn-cion i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .widgetmax-btn-cion svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_gap',
            [
                'label' => __('Icon gap', 'widgetmax'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .widgetmax-btn-cion .icon-before' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .widgetmax-btn-cion .icon-after ' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        //icon hover

        //btn normal hover style
        $this->start_controls_tabs(
            'icon_style_tabs'
        );
        // normal
        $this->start_controls_tab(
            'icon_normal',
            [
                'label' => __('Normal', 'widgetmax'),
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'widgetmax'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .widgetmax-btn-cion i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .widgetmax-btn-cion path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_stroke_color',
            [
                'label' => __('Icon Stroke Color', 'widgetmax'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .widgetmax-btn-cion i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .widgetmax-btn-cion path' => 'stroke: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_tab();

        // hover
        $this->start_controls_tab(
            'icon_hover',
            [
                'label' => __('Hover', 'widgetmax'),
            ]
        );

        $this->add_control(
            'hover_icon_color',
            [
                'label' => __('Icon Color', 'widgetmax'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .widgetmax-button:hover i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .widgetmax-button:hover path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'hover_icon_color_stock_hover',
            [
                'label' => __('Icon Stroke Color', 'widgetmax'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .widgetmax-button:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .widgetmax-button:hover path' => 'stroke: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

		/*
		*Button Style
		*/
		$this->start_controls_section('style_section',
			[
				'label' => __( 'Button Style', 'widgetmax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]

		);
        $this->add_control('button_gradient_background',
	        [
	            'label'         => __('Gradient Opction', 'widgetmax'),
	            'type'          => Controls_Manager::SWITCHER,
	            'description'   => __('Use Gradient Background','widgetmax'),
	        ]
        );
		$this->start_controls_tabs('button_style_tabs');

		//Button Tab Normal Start
		$this->start_controls_tab('style_normal_tab',
			[
				'label' => __( 'Normal', 'widgetmax' ),
			]
		);	
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'widgetmax_button_typo_normal',
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .widgetmax-button',

            ]
        );
		$this->add_control(
			'color',
			[
				'label' => __( 'Text Color', 'widgetmax' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1D263A',
				'selectors' => [
					'{{WRAPPER}} .widgetmax-button' => 'color: {{VALUE}}',
				],

			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'widgetmax_button_gradient_background_normal',
				'types' => [ 'gradient', 'classic' ],
				'selector' => '{{WRAPPER}} .widgetmax-button',
				'condition' => [
					'button_gradient_background' => 'yes'
				],
			]
		);
		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background', 'widgetmax' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#FFCD28',
				'selectors' => [
					'{{WRAPPER}} .widgetmax-button,
					 {{WRAPPER}} .widgetmax-button.widgetmax-button-style2-shutinhor:before,
					 {{WRAPPER}} .widgetmax-button.widgetmax-button-style2-shutinver:before,
					 {{WRAPPER}} .widgetmax-button.widgetmax-button-style3-radialin:before,
					 {{WRAPPER}} .widgetmax-button.widgetmax-button-style3-rectin:before'   => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'button_gradient_background!' => 'yes'
				],
			]
		);
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),[
				'name' => 'button_box_shadow',
				'label' => __( 'Box Shadow', 'widgetmax' ),
				'selector' => '{{WRAPPER}} .widgetmax-button',
			]
		);
		$this->add_group_control(
            Group_Control_Border::get_type(), 
            [
                'name'          => 'border_normal',
                'selector'      => '{{WRAPPER}} .widgetmax-button',
            ]

        );
        $this->add_control('border_radius_normal',
            [
                'label'         => __('Border Radius', 'widgetmax'),
                'type'          => Controls_Manager::DIMENSIONS,
                'separator' => 'before',
                'size_units'    => ['px', '%' ,'em'],
                'selectors'     => [
                    '{{WRAPPER}} .widgetmax-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
		$this->add_responsive_control('padding',
			[
				'label' => __( 'Padding', 'widgetmax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'label_block' => true,
				'size_units'    => ['px', 'em', '%'],
	            'selectors'     => [
	                '{{WRAPPER}} .widgetmax-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	            ]
				
			]
		);
		$this->add_responsive_control('margin',
			[
				'label' => __( 'Margin', 'widgetmax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'label_block' => true,
				'size_units'    => ['px', 'em', '%'],
	            'selectors'     => [
	                '{{WRAPPER}} .widgetmax-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	            ]
				
			]
		);
		$this->end_controls_tab();
		// Button Tab Normal End
		
		//Button Tab Hover Start
		$this->start_controls_tab('style_hover_tab',
			[
				'label' => __( 'Hover', 'widgetmax' ),
			]
		);
        

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'widgetmax_button_typo_hover',
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .widgetmax-button:hover',

            ]
        );
		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'widgetmax' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .widgetmax-button:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'widgetmax_button_gradient_background_hover',
				'types' => [ 'gradient', 'classic' ],
				'selector' => '{{WRAPPER}} .widgetmax-button:hover',
				'condition' => [
					'button_gradient_background' => 'yes'
				],
			]
		);
		$this->add_control(
			'background_hover_color',
			[
				'label' => __( 'Background', 'widgetmax' ),
				'type' => Controls_Manager::COLOR,
				'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_3
                ],
				'default' => '#222831',
				'selectors' => ['
					{{WRAPPER}} .widgetmax-button-none:hover,
					{{WRAPPER}} .widgetmax-button-style1-top:before,
					{{WRAPPER}} .widgetmax-button-style1-right:before,
					{{WRAPPER}} .widgetmax-button-style1-bottom:before,
					{{WRAPPER}} .widgetmax-button-style1-left:before,
					{{WRAPPER}} .widgetmax-button-style2-shutouthor:before,
					{{WRAPPER}} .widgetmax-button-style2-shutoutver:before,
					{{WRAPPER}} .widgetmax-button-style2-shutinhor,
					{{WRAPPER}} .widgetmax-button-style2-shutinver,
					{{WRAPPER}} .widgetmax-button-style2-dshutinhor:before,
					{{WRAPPER}} .widgetmax-button-style2-dshutinver:before,
					{{WRAPPER}} .widgetmax-button-style2-scshutouthor:before,
					{{WRAPPER}} .widgetmax-button-style2-scshutoutver:before,
					{{WRAPPER}} .widgetmax-button-style3-radialin,
					{{WRAPPER}} .widgetmax-button-style3-radialout:before,
					{{WRAPPER}} .widgetmax-button-style3-rectin:before,
					{{WRAPPER}} .widgetmax-button-style3-rectout:before' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'button_gradient_background!' => 'yes'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'selector' => '{{WRAPPER}} .widgetmax-button:hover',
			]
		);
		$this->add_group_control(
            Group_Control_Border::get_type(), 
            [
                'name'          => 'border_hover',
                'selector'      => '{{WRAPPER}} .widgetmax-button:hover',
            ]
        );

        
        //Animation Hover
        $this->add_control('widgetmax_button_hover_effect', 
            [
                'label'         => __('Hover Effect', 'widgetmax'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'none',
                'options'       => [
                    'none'          => __('None', 'widgetmax'),
                    'style1'        => __('Slide', 'widgetmax'),
                    'style2'        => __('Shutter', 'widgetmax'),
                    'style3'        => __('In & Out', 'widgetmax'),
                ],
                'label_block'   => true,
            ]
        );
		$this->add_control('widgetmax_button_style1_dir', 
        [
            'label'         => __('Slide Direction', 'widgetmax'),
            'type'          => Controls_Manager::SELECT,
            'default'       => 'bottom',
            'options'       => [
                'bottom'       => __('Top to Bottom', 'widgetmax'),
                'top'          => __('Bottom to Top', 'widgetmax'),
                'left'         => __('Right to Left', 'widgetmax'),
                'right'        => __('Left to Right', 'widgetmax'),
            ],
            'condition'     => [
                'widgetmax_button_hover_effect' => 'style1',
            ],
            'label_block'   => true,
            ]
        );
		$this->add_control('widgetmax_button_style2_dir', 
        [
            'label'         => __('Shutter Direction', 'widgetmax'),
            'type'          => Controls_Manager::SELECT,
            'default'       => 'shutouthor',
            'options'       => [
                'shutinhor'     => __('Shutter in Horizontal', 'widgetmax'),
                'shutinver'     => __('Shutter in Vertical', 'widgetmax'),
                'shutoutver'    => __('Shutter out Horizontal', 'widgetmax'),
                'shutouthor'    => __('Shutter out Vertical', 'widgetmax'),
                'scshutoutver'  => __('Scaled Shutter Vertical', 'widgetmax'),
                'scshutouthor'  => __('Scaled Shutter Horizontal', 'widgetmax'),
                'dshutinver'   => __('Tilted Left'),
                'dshutinhor'   => __('Tilted Right'),
            ],
            'condition'     => [
                'widgetmax_button_hover_effect' => 'style2',
            ],
            'label_block'   => true,
            ]
        );
		$this->end_controls_tabs();
		$this->end_controls_tab();
		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		//Button Text And Style
		$button_text = $settings['button_text'];
		$button_size = 'widgetmax-button-' . $settings['widgetmax_button_size'];
		$button_hover = $settings['widgetmax_button_hover_effect'];

		//Button Hover Effect
		if ($button_hover == 'none') {
			$button_hover_style = 'widgetmax-button-none';
		}elseif($button_hover == 'style1'){
			$button_hover_style = 'widgetmax-button-style1-' . $settings['widgetmax_button_style1_dir'];
		}elseif ($button_hover == 'style2') {
			$button_hover_style = 'widgetmax-button-style2-' . $settings['widgetmax_button_style2_dir'];
		}elseif ($button_hover == 'style3') {
			$button_hover_style = 'widgetmax-button-style3-' . $settings['widgetmax_button_style3_dir'];
		}

		//Butoon ID
		if ( ! empty( $settings['button_css_id'] ) ) {
			$this->add_render_attribute( 'widgetmax_button', 'id', $settings['button_css_id'] );
		}

        if( $settings['widgetmax_button_link_selection'] == 'url' ){
            $button_url = $settings['widgetmax_button_link']['url'];
        } else {
            $button_url = get_permalink( $settings['widgetmax_button_existing_link'] );
        }
		//Button Class Href
		$this->add_render_attribute( 'widgetmax_button', [
			'class'	=> ['widgetmax-button', esc_attr($button_size), esc_attr($button_hover_style) ],
			'href'	=> esc_attr($button_url),
		]);

        
		if( $settings['widgetmax_button_link']['is_external'] ) {
			$this->add_render_attribute( 'widgetmax_button', 'target', '_blank' );
		}
		if( $settings['widgetmax_button_link']['nofollow'] ) {
			$this->add_render_attribute( 'widgetmax_button', 'rel', 'nofollow');
		}

		$this->add_render_attribute( 'widgetmax_button', 'data-text', esc_attr($settings['button_text'] ));

		?>
		<div  class="sb_wraper">
			<a  <?php echo $this->get_render_attribute_string( 'widgetmax_button' ); ?>>

			 	<?php if ( $settings['widgetmax_button_icon_position'] == 'before' && !empty($settings['widgetmax_button_icon']['value']) ) : ?>
					<span class="widgetmax-btn-cion icon-before"><?php Icons_Manager::render_icon($settings['widgetmax_button_icon'], ['aria-hidden' => 'true']) ?></span>
                <?php endif; ?>

				<span><?php echo esc_html($button_text) ?></span>

				<?php if ( $settings['widgetmax_button_icon_position'] === 'after' && !empty($settings['widgetmax_button_icon']['value'])) : ?>
                    <span class="widgetmax-btn-cion icon-after"><?php Icons_Manager::render_icon($settings['widgetmax_button_icon'], ['aria-hidden' => 'true']) ?></span>
                <?php endif; ?>
			</a>
		</div>
		<?php
	}
}
$widgets_manager->register_widget_type( new \Widgetmax\Widgets\Elementor\Widgetmax_Button() );