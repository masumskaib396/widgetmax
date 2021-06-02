<?php
namespace widgetmax\Widgets\Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Widget_Base;

class Widgetmax_Dual_Heading extends Widget_Base {
	
	public function get_name() {
		return 'widgetmax-dual-headding';
	}

	public function get_title() {
		return esc_html__( 'Dual Heading', 'widgetmax' );
	}

	public function get_icon() {
		return 'eicon-t-letter';
	}

	public function get_categories() {
		return [ 'widgetmax' ];
	}

    public function get_keywords() {
        return [ 'widgetmax', 'multi', 'double' ];
    }

    protected function _register_controls() {

		/**
		* Dual Heading Content Section
		*/
		$this->start_controls_section(
			'widgetmax_dual_heading_content',
			[
				'label' => esc_html__( 'Content', 'widgetmax' )
			]
        );
        
        $this->add_control(
            'widgetmax_dual_first_heading',
            [
                'label'       => esc_html__( 'First Heading', 'widgetmax' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'First', 'widgetmax' )
            ]
        );
        $this->add_control(
            'widgetmax_dual_second_heading',
            [
                'label'       => esc_html__( 'Second Heading', 'widgetmax' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Second', 'widgetmax' )
            ]
        );

        $this->add_control(
            'widgetmax_dual_heading_title_link',
            [
                'label'       => __( 'Heading URL', 'widgetmax' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'widgetmax' ),
                'label_block' => true
            ]
        );
        $this->add_control(
            'widgetmax_sub_headding_show',
            [
                'label'        => esc_html__( 'Enable Sub Heading', 'widgetmax' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'widgetmax_dual_heading_description',
            [
                'label'       => __( 'Sub Heading', 'widgetmax' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'dynamic'     => [ 'active' => true ],
                'condition' => [
                    'widgetmax_sub_headding_show' => 'yes',
                ],
                'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'widgetmax' )
            ]
        );

        $this->add_control(
            'widgetmax_dual_heading_icon_show',
            [
                'label'        => esc_html__( 'Enable Icon', 'widgetmax' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'widgetmax_dual_heading_icon',
            [
                'label'   => __( 'Icon', 'widgetmax' ),
                'type'    => Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fab fa-wordpress-simple',
                    'library' => 'fa-brands'
                ],
                'condition' => [
                    'widgetmax_dual_heading_icon_show' => 'yes'
                ]
            ]
        );

        
        $this->end_controls_section();
            
        /*
        * Dual Heading Styling Section
        */
        $this->start_controls_section(
            'widgetmax_dual_heading_styles_general',
            [
                'label' => esc_html__( 'General Styles', 'widgetmax' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'widgetmax_dual_heading_alignment',
            [
                'label'       => esc_html__( 'Alignment', 'widgetmax' ),
                'type'        => Controls_Manager::CHOOSE,
                'toggle'      => false,
                'label_block' => true,
                'options'     => [
                    'left'      => [
                        'title' => esc_html__( 'Left', 'widgetmax' ),
                        'icon'  => 'eicon-text-align-left'
                    ],
                    'center'    => [
                        'title' => esc_html__( 'Center', 'widgetmax' ),
                        'icon'  => 'eicon-text-align-center'
                    ],
                    'right'     => [
                        'title' => esc_html__( 'Right', 'widgetmax' ),
                        'icon'  => 'eicon-text-align-right'
                    ]
                ],
                'default'       => 'center',
                'label_block'   => true,
                'selectors'     => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'widgetmax_dual_heading_icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'widgetmax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#132C47',
                'condition' => [
                    'widgetmax_dual_heading_icon_show'    => 'yes',
                    'widgetmax_dual_heading_icon[value]!' => ''
                ],
                'selectors' => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-icon i' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'widgetmax_dual_heading_icon_size',
            [
                'label'        => __( 'Icon Size', 'widgetmax' ),
                'type'         => Controls_Manager::SLIDER,
                'range'        => [
                    'px'       => [
                        'min'  => 10,
                        'max'  => 150,
                        'step' => 2
                    ]
                ],
                'default'      => [
                    'unit'     => 'px',
                    'size'     => 36
                ],
                'selectors'    => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-icon i' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
                'condition'    => [
                    'widgetmax_dual_heading_icon_show'    => 'yes',
                    'widgetmax_dual_heading_icon[value]!' => ''
                ]
            ]
        );        

        $this->add_responsive_control(
            'widgetmax_dual_heading_icon_margin',
            [
                'label'      => __('Icon Margin', 'widgetmax'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default'    => [
                    'top'    => '0',
                    'right'  => '0',
                    'bottom' => '15',
                    'left'   => '0'
                ],
                'selectors'  => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition' => [
                    'widgetmax_dual_heading_icon_show'    => 'yes',
                    'widgetmax_dual_heading_icon[value]!' => ''
                ]
            ]
        );

        $this->end_controls_section();

        /*
            * Dual Heading First Part Styling Section
            */
        $this->start_controls_section(
            'widgetmax_dual_first_heading_styles',
            [
                'label' => esc_html__( 'First Heading', 'widgetmax' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'widgetmax_dual_heading_first_text_color',
            [
                'label'     => esc_html__( 'Color', 'widgetmax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FF6C4B',
                'selectors' => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .first-heading, {{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title a .first-heading' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'            => 'widgetmax_dual_heading_first_bg_color',
                'types'           => [ 'classic', 'gradient' ],
                'default'         => '#222222',
                'selector'        => '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .first-heading, {{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title a .first-heading',
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'name'     => 'widgetmax_dual_first_heading_typography',
                'selector' => '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .first-heading'
			]
        );

        $this->add_responsive_control(
            'widgetmax_dual_first_heading_margin',
            [
                'label'      => __('Margin', 'widgetmax'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .first-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'widgetmax_dual_first_heading_padding',
            [
                'label'      => __('Padding', 'widgetmax'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .first-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'widgetmax_dual_first_heading_radius',
            [
                'label'      => __('Border radius', 'widgetmax'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .first-heading' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'widgetmax_dual_first_heading_border',
                'selector' => '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .first-heading'
            ]
        );

        $this->end_controls_section();

        /*
		* Dual Heading Second Part Styling Section
		*/
        $this->start_controls_section(
                'widgetmax_dual_second_heading_styles',
                [
                    'label' => esc_html__( 'Second Heading', 'widgetmax' ),
                    'tab'   => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'widgetmax_dual_heading_second_text_color',
                [
                    'label'     => esc_html__( 'Color', 'widgetmax' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#132C47',
                    'selectors' => [
                        '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .second-heading, {{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title a .second-heading' => 'color: {{VALUE}};'
                    ]
                ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'widgetmax_dual_heading_second_bg_color',
                'types'    => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .second-heading, {{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title a .second-heading'
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'widgetmax_dual_second_heading_typography',
                'selector' => '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .second-heading'
            ]
        );

        $this->add_responsive_control(
            'widgetmax_dual_second_heading_margin',
            [
                'label'      => __('Margin', 'widgetmax'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .second-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'widgetmax_dual_second_heading_padding',
            [
                'label'      => __('Padding', 'widgetmax'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .second-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'widgetmax_dual_second_heading_radius',
            [
                'label'      => __('Border radius', 'widgetmax'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .second-heading' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'widgetmax_dual_second_heading_border',
                'selector' => '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper .widgetmax-dual-heading-title .second-heading'
            ]
        );

        $this->end_controls_section();

        /*
            * Dual Heading description Styling Section
        */
        $this->start_controls_section(
            'widgetmax_dual_heading_description_styles',
            [
                'label' => esc_html__( 'Sub Heading', 'widgetmax' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );


        $this->add_control(
            'widgetmax_dual_heading_description_text_color',
            [
                'label'     => esc_html__( 'Color', 'widgetmax' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#989B9E',
                'selectors' => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper p.widgetmax-dual-heading-description' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'            => 'widgetmax_dual_heading_description_typography',
                'fields_options'  => [
                    'font_weight' => [
                        'default' => '400'
                    ]
                ],
                'selector'        => '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper p.widgetmax-dual-heading-description'
            ]
        );

        $this->add_responsive_control(
            'widgetmax_dual_heading_description_margin',
            [
                'label'      => __('Margin', 'widgetmax'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper p.widgetmax-dual-heading-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'widgetmax_dual_heading_description_padding',
            [
                'label'      => __('Padding', 'widgetmax'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .widgetmax-dual-heading .widgetmax-dual-heading-wrapper p.widgetmax-dual-heading-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
  
    protected function render() {
        $settings          = $this->get_settings_for_display();

        $this->add_render_attribute( 'widgetmax_dual_first_heading', 'class', 'first-heading' );
        $this->add_inline_editing_attributes( 'widgetmax_dual_first_heading', 'none' );

        $this->add_render_attribute( 'widgetmax_dual_second_heading', 'class', 'second-heading' );
        $this->add_inline_editing_attributes( 'widgetmax_dual_second_heading', 'none' );

        $this->add_render_attribute( 'widgetmax_dual_heading_description', 'class', 'widgetmax-dual-heading-description' );
        $this->add_inline_editing_attributes( 'widgetmax_dual_heading_description' );

        if( $settings['widgetmax_dual_heading_title_link']['url'] ) {
            $this->add_render_attribute( 'widgetmax_dual_heading_title_link', 'href', esc_url( $settings['widgetmax_dual_heading_title_link']['url'] ) );
            if( $settings['widgetmax_dual_heading_title_link']['is_external'] ) {
                $this->add_render_attribute( 'widgetmax_dual_heading_title_link', 'target', '_blank' );
            }
            if( $settings['widgetmax_dual_heading_title_link']['nofollow'] ) {
                $this->add_render_attribute( 'widgetmax_dual_heading_title_link', 'rel', 'nofollow' );
            }
        }

        echo '<div class="widgetmax-dual-heading">';
            echo '<div class="widgetmax-dual-heading-wrapper">';

                if ( 'yes' === $settings['widgetmax_dual_heading_icon_show'] && !empty( $settings['widgetmax_dual_heading_icon']['value'] ) ) :
                    echo '<span class="widgetmax-dual-heading-icon">';
                        Icons_Manager::render_icon( $settings['widgetmax_dual_heading_icon'] );
                    echo '</span>';
                endif;

                echo '<h1 class="widgetmax-dual-heading-title">';
                    if( !empty( $settings['widgetmax_dual_heading_title_link']['url'] ) ) :
                        echo '<a '.$this->get_render_attribute_string( 'widgetmax_dual_heading_title_link' ).'>';
                    endif;
                    echo '<span '.$this->get_render_attribute_string( 'widgetmax_dual_first_heading' ).'>'.$settings['widgetmax_dual_first_heading'].'</span>';
                    echo '<span '.$this->get_render_attribute_string( 'widgetmax_dual_second_heading' ).'>'.$settings['widgetmax_dual_second_heading'].'</span>';
                    if( !empty( $settings['widgetmax_dual_heading_title_link']['url'] ) ) {
                        echo '</a>';
                    }
                echo '</h1>';

                if ( !empty($settings['widgetmax_dual_heading_description'] ) ) :
                    echo '<p '.$this->get_render_attribute_string( 'widgetmax_dual_heading_description' ).'>'.wp_kses_post( $settings['widgetmax_dual_heading_description'] ).'</p>';
                endif;  

            echo '</div>';
        echo '</div>';
    }
}
$widgets_manager->register_widget_type( new \widgetmax\Widgets\Elementor\Widgetmax_Dual_Heading() );