<?php

class DINA_Icon_Box extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri'        => DINA_DIVINATIONKIT_WEBSITE . '/modules/icon-box/',
        'author'            => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri'        => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {

        $this->name        = esc_html__( 'Icon Box', 'divinationkit-for-divi' );
        $this->slug        = 'dina_icon_box';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';
        $this->icon_path   = $this->dina_module_icon('icon-box');

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => esc_html__( 'Content', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'alignment'         => esc_html__( 'Alignment', 'divinationkit-for-divi' ),
                    'icon'               => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                    'content'          => array(
                        'title'             => esc_html__( 'Icon Box Texts', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'title'          => array(
                                'name'      => esc_html__( 'Title', 'divinationkit-for-divi' ),
                            ),
                            'subtitle'         => array(
                                'name'      => esc_html__( 'Subtitle', 'divinationkit-for-divi' ),
                            ),
                            'description'         => array(
                                'name'      => esc_html__( 'Description', 'divinationkit-for-divi' ),
                            ),
                        )
                    ),
                ),
            ),
        );

        $this->custom_css_fields = array(
			'icon_wrapper'  => array(
				'label'        => esc_html__( 'Icon Wrapper', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_icon_box-icon',
            ),
			'icon'          => array(
				'label'        => esc_html__( 'Icon', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_icon_box-icon i.dina_icon',
            ),
			'title'         => array(
				'label'        => esc_html__( 'Icon Box Title', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_icon_box-content .dina_icon_box-title',
            ),
			'subtitle'         => array(
				'label'        => esc_html__( 'Icon Box Subtitle', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_icon_box-content .dina_icon_box-subtitle',
            ),
			'description'   => array(
				'label'        => esc_html__( 'Description', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_icon_box-content .dina_icon_box-description p',
            ),
			'button'   => array(
				'label'        => esc_html__( 'Description', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_icon_box-btn',
            ),
        );
    }

    public function get_fields() {
        
        $et_accent_color = et_builder_accent_color();

        $content = array(
            'icon'               => array(
                'label'                => esc_html__( 'Select Icon', 'divinationkit-for-divi' ),
                'description'          => esc_html__( 'Select front side icon.', 'divinationkit-for-divi' ),
                'type'                 => 'select_icon',
                'default'              => '&#xe105;||divi||400',
                'toggle_slug'          => 'content',
            ),

            'title'              => array(
                'label'                => esc_html__( 'Icon Box Title', 'divinationkit-for-divi' ),
                'description'          => esc_html__( 'Define the icon box title.', 'divinationkit-for-divi' ),
                'type'                 => 'text',
                'toggle_slug'          => 'content',
                'dynamic_content'      => 'text',
            ),

            'subtitle'           => array(
                'label'                => esc_html__( 'Icon  Box Subtitle', 'divinationkit-for-divi' ),
                'description'          => esc_html__( 'Define icon box subtitle.', 'divinationkit-for-divi' ),
                'type'                 => 'text',
                'toggle_slug'          => 'content',
                'dynamic_content'      => 'text',
            ),

            'description'        => array(
                'label'                => esc_html__( 'Front Description', 'divinationkit-for-divi' ),
                'description'          => esc_html__( 'Define the front side description text for your flip box.', 'divinationkit-for-divi' ),
                'type'                 => 'tiny_mce',
                'toggle_slug'          => 'content',
                'sub_toggle'           => 'side',
                'dynamic_content'      => 'text',
            ),

            'use_button'              => array(
                'label'               => esc_html__( 'Use Button', 'divinationkit-for-divi' ),
                'description'         => esc_html__( 'Here you can choose whether button should be used.', 'divinationkit-for-divi' ),
                'type'                => 'yes_no_button',
                'option_category'     => 'configuration',
                'options'             => array(
                    'on'              => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off'             => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'             => 'off',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
            ),

            'button_text'             => array(
                'label'               => esc_html__( 'Button Text', 'divinationkit-for-divi' ),
                'description'         => esc_html__( 'Here you can define the button text.', 'divinationkit-for-divi' ),
                'type'                => 'text',
                'default'             => '',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'dynamic_content'     => 'text',
                'show_if'             => array(
                    'use_button'      => 'on',
                ),
            ),

            'button_url'              => array(
                'label'               => esc_html__( 'Button Url', 'divinationkit-for-divi' ),
                'description'         => esc_html__( 'Define the button link url for your button.', 'divinationkit-for-divi' ),
                'type'                => 'text',
                'default'             => '',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'dynamic_content'     => 'url',
                'show_if'             => array(
                    'use_button'      => 'on',
                ),
            ),

            'url_new_window'          => array(
                'label'               => esc_html__( 'Open Button link in new window', 'divinationkit-for-divi' ),
                'description'         => esc_html__( 'Here you can choose whether button URL should be opened in new window.', 'divinationkit-for-divi' ),
                'type'                => 'select',
                'option_category'     => 'configuration',
                'options'             => array(
                    'off'             => esc_html__( 'In The Same Window', 'divinationkit-for-divi' ),
                    'on'              => esc_html__( 'In The New Tab', 'divinationkit-for-divi' ),
                ),
                'default'             => 'off',
                'toggle_slug'         => 'content',
                'sub_toggle'          => 'back_side',
                'show_if'             => array(
                    'use_button'      => 'on',
                ),
            ),
        );

        $design = array(
            'alignment'     => array(
                'label'           => esc_html__( 'Content Alignment', 'dina-divi-nations' ),
                'type'            => 'text_align',
                'option_category' => 'configuration',
                'options'         => et_builder_get_text_orientation_options(array('justified' )),
                'default'         => 'center',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'alignment',
                'mobile_options'  => true,
            ),

            'icon_bg'            => array(
                'label'          => esc_html__( 'Icon Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon background color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => $this->$et_accent_color,
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_color'         => array(
                'label'          => esc_html__( 'Icon Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#000000',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_size'          => array(
                'label'          => esc_html__( 'Icon Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon size.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '30px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 1000,
                ),
            ),

            'icon_padding'       => array(
                'label'          => esc_html__( 'Icon Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),

            'icon_margin'        => array(
                'label'          => esc_html__( 'Icon Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin for icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|10px|0px',
                'mobile_options' => true,
            ),
        );

        return array_merge($content, $design);
    }

    public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                   = array();
        $advanced_fields[ 'text' ]         = false;
        $advanced_fields[ 'text_shadow' ]  = array();
        $advanced_fields[ 'fonts' ]        = array();

        // Icon box border
        $advanced_fields[ 'borders' ][ 'icon_box' ] = array(
			'label_prefix'          => esc_html__( 'List Item', 'divinationkit-for-divi' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'list_item',
			'css'                   => array(
				'main'              => array(
					'border_radii'  => '%%order_class%% .dina_icon_box',
					'border_styles' => '%%order_class%% .dina_icon_box',
				),
				'important'         => false,
			),
			'defaults'              => array(
				'border_radii'      => 'on|0px|0px|0px|0px',
				'border_styles'     => array(
					'width'         => '0px',
					'color'         => '#333333',
					'style'         => 'solid',
				),
			),
		);

        // icon border
        $advanced_fields[ 'borders' ][ 'icon' ] = array(
            'label_prefix'          => esc_html__( 'Icon', 'divinationkit-for-divi' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'icon',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dina_icon_box-icon i.dina_icon',
                    'border_styles' => '%%order_class%% .dina_icon_box-icon i.dina_icon',
                ),
                'important'         => false,
            ),
            'depends_show_if'       => array(
                'media_type'        => 'icon',
            ),
            'defaults'              => array(
                'border_radii'      => 'on|0px|0px|0px|0px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'solid',
                ),
            ),
        );       

        $advanced_fields[ 'fonts' ][ 'title' ] = array(
            'label'                 => esc_html__('Title', 'divinationkit-for-divi'),
            'css'                   => array(
                'main'              => '%%order_class%% .dina_icon_box-title',
                'important'         => false,
            ),
            'header_level'          => array(
                'default'           => 'h3',
            ),
            'font_size'             => array(
                'default'           => '22px',
            ),
            'hide_text_align'   => true,
            'tab_slug'              => 'advanced',
            'toggle_slug'       => 'content',
            'sub_toggle'            => 'title',
            'line_height'           => array(
                'default'           => '1.5em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'subtitle' ] = array(
            'label'                 => esc_html__('Title', 'divinationkit-for-divi'),
            'css'                   => array(
                'main'              => '%%order_class%% .dina_icon_box-subtitle',
                'important'         => false,
            ),
            'header_level'          => array(
                'default'           => 'h4',
            ),
            'font_size'             => array(
                'default'           => '18px',
            ),
            'hide_text_align'   => true,
            'tab_slug'              => 'advanced',
            'toggle_slug'       => 'content',
            'sub_toggle'            => 'subtitle',
            'line_height'           => array(
                'default'           => '1.5em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'description' ] = array(
            'label'             => esc_html__( 'Description', 'divinationkit-for-divi' ),
            'css'               => array(
                'main'          => '%%order_class%% .dina_icon_box-description p',
                'important'     => false,
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'content',
            'sub_toggle'       => 'description',
            'font_size'         => array(
                'default'       => '14px',
            ),
            'hide_text_align'   => true,
            'line_height'       => array(
                'default'       => '1.2em',
            ),
        );

        $advanced_fields[ 'button' ][ 'button' ] = array(
            'label'             => esc_html__('Button', 'divinationkit-for-divi'),
            'toggle_slug'       => 'button',
            'css'               => array(
                'main'          => "$this->main_css_element .dina_icon_box-btn",
                'important'     => 'all',
            ),
            'use_alignment'     => true,
            'text_shadow'       => false,
            'box_shadow'        => array(
                'css'           => array(
                    'main'      => '%%order_class%% .dina_icon_box-btn',
                ),
            ),
            'borders'           => array(
                'css'           => array(
                    'important' => 'all',
                ),
            ),
            'margin_padding'    => array(
                'css'           => array(
                    'important' => 'all',
                ),
            ),
        );

        $advanced_fields[ 'background' ] = array(
            'css'           => array(
                'main'      => '%%order_class%%',
                'important' => false,
            ),         
            'options' => array(
                'background_color' => array(
                    'default'          => '#eaeaea',
                ),
            ),
        );

        return $advanced_fields;
    }

    public function render_icon() {

        return sprintf(
            '<div class="dina_icon_box-icon">
                <i class="dina_icon">%1$s</i>
            </div>',
            $this->dina_render_icon('icon')
        );
    }

    public function render_title() {

        $heading = $this->props[ 'title' ];
        $heading_level = et_pb_process_header_level($this->props[ 'title_level' ], 'h3' );

        if (!empty($heading)) {

            return sprintf(
                '<%1$s class="dina_icon_box-title">%2$s</%1$s>',
                $heading_level,
                $heading
            );
        }
    }

    public function render_subtitle() {

        $heading = $this->props[ 'subtitle' ];
        $heading_level = et_pb_process_header_level($this->props[ 'subtitle_level' ], 'h4' );

        if (!empty($heading)) {

            return sprintf(
                '<%1$s class="dina_icon_box-subtitle">%2$s</%1$s>',
                $heading_level,
                $heading
            );
        }
    }

    public function render_descrption() {

        return sprintf(
            '<div class="dina_icon_box-descripton">
                %1$s
            </div>', 
            $this->render_MCE($this->props[ 'description' ])
        );
    }

    // Render  content with condition if title, subtitle or description inserted
    public function render_content()  {
        if ($this->render_title() || $this->render_subtitle() || $this->render_MCE($this->props[ 'description' ])) {
            return sprintf(
                '<div class="dina_icon_box-content">
                    %1$s
                    %2$s
                    <div class="dina_icon_box-description">%3$s</div> 
                </div>',
                $this->render_title(), // 1
                $this->render_subtitle(), // 2
                $this->render_MCE($this->props[ 'description' ]) // 3
            );
        }
    }

    public function render_icon_box_button() {
        $multi_view     = et_pb_multi_view_options( $this );
		$button_url     = $this->props[ 'button_url' ];
		$button_rel     = $this->props[ 'button_rel' ];
		$button_text    = $this->_esc_attr( 'button_text', 'limited' );
		$url_new_window = $this->props[ 'url_new_window' ];
		$button_custom  = $this->props[ 'custom_button' ];

		$custom_icon_values = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon' );
		$custom_icon        = isset( $custom_icon_values[ 'desktop' ] ) ? $custom_icon_values[ 'desktop' ] : '';
		$custom_icon_tablet = isset( $custom_icon_values[ 'tablet' ] ) ? $custom_icon_values[ 'tablet' ] : '';
		$custom_icon_phone  = isset( $custom_icon_values[ 'phone' ] ) ? $custom_icon_values[ 'phone' ] : '';

		// Nothing to output if neither Button Text nor Button URL defined
		$button_url = trim( $button_url );

		if ( '' === $button_text && '' === $button_url ) {
			return '';
		}

		// Render Button
		$button = $this->render_button(
			array(
				'button_id'           => $this->module_id( false ),
				'button_classname'    => array('dina_icon_box-btn dina_btn'),
				'button_custom'       => $button_custom,
				'button_rel'          => $button_rel,
				'button_text'         => $button_text,
				'button_text_escaped' => true,
				'button_url'          => $button_url,
				'custom_icon'         => $custom_icon,
				'custom_icon_tablet'  => $custom_icon_tablet,
				'custom_icon_phone'   => $custom_icon_phone,
				'has_wrapper'         => false,
				'url_new_window'      => $url_new_window,
				'multi_view_data'     => $multi_view->render_attrs(
					array(
						'content'        => '{{button_text}}',
						'hover_selector' => '%%order_class%% .dina_icon_box-btn',
						'visibility'     => array(
							'button_text' => '__not_empty',
						),
					)
				),
			)
		);

        return sprintf(
            '<div class="dina_icon_box-btn-wrapper">
                %1$s
            </div>',
            $button
        );
    }

    public function render($attrs, $content, $render_slug) {

        $this->render_css($render_slug);

        return sprintf(
            '<div class="dina_icon_box-container">
                <div class="dina_icon_box-wrapper">
                    %1$s
                    %2$s
                    %3$s
                </div>
            </div>',
            $this->render_icon(),
            $this->render_content(),
            $this->render_icon_box_button()
        );
    }

    public function render_css($render_slug){

          // Gernerate icon style
          $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dina_icon_box-icon i.dina_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );

        $this->dina_responsive_css($render_slug, array(
            [
                'option_slug'       => 'alignment',
                'property'          => 'text-align',
                'selector'          => '%%order_class%% .dina_icon_box-wrapper'
            ],
            [
                'option_slug'       => 'icon_size',
                'property'          => 'font-size',
                'selector'          => '%%order_class%% .dina_icon_box-icon i.dina_icon',
                'hover'             => '%%order_class%%:hover i.dina_icon'
            ],
            [
                'option_slug'       => 'icon_color',
                'property'          => 'color',
                'selector'          => '%%order_class%% .dina_icon_box-icon i.dina_icon',
                'hover'             => '%%order_class%%:hover i.dina_icon'
            ],
            [
                'option_slug'       => 'icon_bg',
                'property'          => 'background',
                'selector'          => '%%order_class%% .dina_icon_box-icon i.dina_icon',
                'hover'             => '%%order_class%%:hover i.dina_icon'
            ],
            [
                'option_slug'       => 'icon_padding',
                'property'          => 'padding',
                'selector'          => '%%order_class%% .dina_icon_box-icon i.dina_icon'
            ],
            [
                'option_slug'       => 'icon_margin',
                'property'          => 'margin',
                'selector'          => '%%order_class%% .dina_icon_box-icon'
            ]
        ));
 
    }
}

new dina_Icon_Box();