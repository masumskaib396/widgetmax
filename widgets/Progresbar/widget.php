<?php
namespace widgetmax\Widgets\Elementor;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Widget_Base;

class widgetmax_Progress_Bar extends Widget_Base {
	
	public function get_name() {
		return 'widgetmax-progress-bar';
	}

	public function get_title() {
		return esc_html__( 'Progress Bar', 'widgetmax' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ 'widgetmax' ];
	}

	public function get_script_depends() {
		return [ 'widgetmax-waypoints', 'widgetmax-progress-bar' ];
	}

	public function get_keywords() {
		return [ 'widgetmax', 'skill', 'circle', 'bars' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'widgetmax_progress_bar_section_content',
			[
				'label' => __('Content', 'widgetmax')
			]
		);
					
		$this->add_control(
			'widgetmax_progress_bar_title',
			[
				'label'     => __('Title', 'widgetmax'),
				'type'      => Controls_Manager::TEXT,
				'default'   => __('Progress Bar', 'widgetmax'),
                'label_block' => true,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'widgetmax_progress_bar_value',
			[
				'label'   => __( 'Percentage Value', 'widgetmax' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'default' => 60
			]
		);
			
		$this->end_controls_section();
				
		$this->start_controls_section(
			'widgetmax_section_progress_bar_styles_preset',
			[
				'label' => __('General Styles', 'widgetmax'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'widgetmax_progress_bar_preset',
			[
				'label'   => __('Style Presets', 'widgetmax'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'line'        => __('Line', 'widgetmax'),
					'line-bubble' => __('Line Bubble', 'widgetmax'),
					'circle'      => __('Circle', 'widgetmax'),
					'fan'         => __('Half Circle', 'widgetmax')
				],
				'default' => 'line'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'widgetmax_progress_bar_title_styles',
			[
				'label' => __('Title', 'widgetmax'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'widgetmax_progress_bar_title_color',
			[
				'label'     => __( 'Color', 'widgetmax' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .widgetmax-progress-bar-title' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'widgetmax_progress_bar_title_typography',
					'fields_options'   => [
			            'font_size'    => [
			                'default'  => [
			                    'unit' => 'px',
			                    'size' => 16
			                ]
			            ],
			            'font_weight'  => [
			                'default'  => '600'
			            ]
		            ],
					'selector' => '{{WRAPPER}} .widgetmax-progress-bar-title'
				]
		);

		$this->add_responsive_control(
            'widgetmax_progress_bar_title_margin',
            [
                'label'        => __('Margin', 'widgetmax'),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => ['px', '%'],
                'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '10',
					'left'     => '0',
					'unit'     => 'px',
					'isLinked' => false
                ],
                'selectors'    => [
                    '{{WRAPPER}} .widgetmax-progress-bar-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'widgetmax_progress_bar_front_style',
			[
				'label' => __('Front Bar', 'widgetmax'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'widgetmax_progress_bar_stroke_color',
			[
				'label'   => __( 'Color', 'widgetmax' ),
				'type'    => Controls_Manager::COLOR,
                'default' => "#222"
			]
		);

		$this->add_control(
			'widgetmax_progress_bar_stroke_width',
			[
				'label'   => __( 'Width', 'widgetmax' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'default' => 15
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'widgetmax_progress_bar_back_style',
			[
				'label' => __('Back Bar', 'widgetmax'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'widgetmax_progress_bar_trail_color',
			[
				'label'   => __( 'Color', 'widgetmax' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#ddd'
			]
		);

		$this->add_control(
			'widgetmax_progress_bar_trail_width',
			[
				'label'   => __( 'Width', 'widgetmax' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'default' => 15
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'widgetmax_progress_bar_value_styles',
			[
				'label' => __('Percentage Value', 'widgetmax'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'widgetmax_progress_bar_value_position',
			[
				'label'      => __( 'Position', 'widgetmax' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range'      => [
					'px'       => [
						'min'  => 0,
						'max'  => 50,
						'step' => 1
					]
				],
				'default'    => [
					'unit'   => '%',
					'size'   => 7
				],
				'selectors'  => [
					'{{WRAPPER}} [class*="widgetmax-progress-bar-"].fan .ldBar-label' => 'bottom: {{SIZE}}{{UNIT}};'
				],
				'condition'  => [
					'widgetmax_progress_bar_preset' => 'fan'
				]
			]
		);

		$this->add_control(
			'widgetmax_progress_bar_value_color',
			[
				'label'     => __( 'Text Color', 'widgetmax' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .widgetmax-progress-bar .ldBar-label' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'widgetmax_progress_bar_value_value_typography',
					'selector' => '{{WRAPPER}} .widgetmax-progress-bar .ldBar-label'
				]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'widgetmax_progress_bar_background',
				'types'    => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .widgetmax-progress-bar .ldBar-label'
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'widgetmax_progress_bar_border',
				'selector' => '{{WRAPPER}} .widgetmax-progress-bar .ldBar-label'
			]
		);

		$this->add_responsive_control(
			'widgetmax_progress_bar_radius',
			[
				'label'      => __( 'Border Radius', 'widgetmax' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '50',
					'right'  => '50',
					'bottom' => '50',
					'left'   => '50',
					'unit'   => '%'
				],
				'selectors'  => [
					'{{WRAPPER}} .widgetmax-progress-bar .ldBar-label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'widgetmax_progress_bar_padding_style',
			[
				'label'      => __( 'Padding', 'widgetmax' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '10',
					'right'  => '10',
					'bottom' => '10',
					'left'   => '10'
				],
				'selectors'  => [
					'{{WRAPPER}} .widgetmax-progress-bar .ldBar-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'widgetmax_progress_bar_box_shadow',
				'selector' => '{{WRAPPER}} .widgetmax-progress-bar .ldBar-label'
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title    = $settings['widgetmax_progress_bar_title'];
		
		$this->add_render_attribute( 
			'widgetmax-progress-bar', 
			[ 
				'class' => [ 
					esc_attr( $settings['widgetmax_progress_bar_preset'] ), 
					'widgetmax-progress-bar', 
					'widgetmax-progress-bar-'.$this->get_id() 
				],
				'data-id'                              => $this->get_id(),
				'data-type'                            => esc_attr( $settings['widgetmax_progress_bar_preset'] ),
				'data-progress-bar-value'              => esc_attr( $settings['widgetmax_progress_bar_value'] ),
				'data-stroke-color'                    => esc_attr( $settings['widgetmax_progress_bar_stroke_color'] ),
				'data-progress-bar-stroke-width'       => esc_attr( $settings['widgetmax_progress_bar_stroke_width'] ),
				'data-stroke-trail-color'              => esc_attr( $settings['widgetmax_progress_bar_trail_color'] ),
				'data-progress-bar-stroke-trail-width' => esc_attr( $settings['widgetmax_progress_bar_trail_width'] )
			]
		);

		$this->add_render_attribute( 'widgetmax_progress_bar_title', 'class', 'widgetmax-progress-bar-title' );
        $this->add_inline_editing_attributes( 'widgetmax_progress_bar_title', 'none' );

		if ( 'line' === $settings['widgetmax_progress_bar_preset'] || 'line-bubble' === $settings['widgetmax_progress_bar_preset'] ) {
			$this->add_render_attribute(
				'widgetmax-progress-bar',
				[
					'data-preset' => 'line',
					'style'       => 'width: 100%; height: 100px'
				]
			);
		}

		if ( 'circle' === $settings['widgetmax_progress_bar_preset'] ) {
			$this->add_render_attribute(
				'widgetmax-progress-bar',
				[
					'data-preset' => 'circle',
					'style'       => 'width: 100%; height: 100%'
				]
			);
		}

		if ( 'fan' === $settings['widgetmax_progress_bar_preset'] ) {
			$this->add_render_attribute(
				'widgetmax-progress-bar',
				[
					'data-preset' => 'fan',
					'style'       => 'width: 100%; height: 100%'
				]
			);
		}
		
		echo '<div '.$this->get_render_attribute_string('widgetmax-progress-bar').' data-progress-bar>';
			echo $title ? '<h6 '.$this->get_render_attribute_string( 'widgetmax_progress_bar_title' ).'>'.$title.'</h6>' : '';
		echo '</div>';
	}
}
$widgets_manager->register_widget_type( new \widgetmax\Widgets\Elementor\widgetmax_Progress_Bar() );