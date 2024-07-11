<?php

class DINA_Dual_Button extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . '/moduless/dual-button/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {

        $this->name        = esc_html__( 'Dual Button', 'divinationkit-for-divi' );
        $this->slug        = 'dina_dual_button';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';
        $this->icon_path   = $this->dina_module_icon( 'dual-button' );

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'buttons'             => array(
                        'title'             => esc_html__( 'Buttons', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'button_one'         => array(
                                'name' => esc_html__( 'Button One', 'divinationkit-for-divi' ),
                            ),
                            'button_two'          => array(
                                'name' => esc_html__( 'Button Two', 'divinationkit-for-divi' ),
                            ),
                        )
                    ),
                    'separator' => esc_html__( 'Separator', 'dina-divinationkit' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'layout'         => esc_html__( 'Layout', 'divinationkit-for-divi' ),
                    'separator_icon' => esc_html__( 'Separator Icon', 'divinationkit-for-divi' ),
                    'separator_text' => esc_html__( 'Separator Text', 'divinationkit-for-divi' ),
                    'button_one'     => esc_html__( 'Button One', 'divinationkit-for-divi' ),
                    'button_two'     => esc_html__( 'Button Two', 'divinationkit-for-divi' ),
                ),
            ),
        );
    }

    public function get_fields() {

        $layout = array(
            'layout'            => array(
                'label'   => esc_html__( 'Layout', 'dina-divinationkit' ),
                'type'    => 'select',
                'options' => array(
                    'column' => esc_html__( 'Block', 'dina-divinationkit' ),
                    'row'  => esc_html__( 'Inline', 'dina-divinationkit' ),
                ),
                'default'           => 'row',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'mobile_options' => true,
            ),

            'alignment'             => array(
                'label'           => esc_html__( 'Alignment', 'divinationkit-for-divi' ),
                'type'            => 'text_align',
                'option_category' => 'configuration',
                'options'         => et_builder_get_text_orientation_options(array('justified' )),
                'default'           => 'left',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
                'default'         => 'left',
                'show_if'           => array(
                    'layout'        => 'row',
                ),
                'mobile_options'  => true,
            ),

            'alignment_col'        => array(
                'label'             => esc_html__( 'Alignment', 'dina-divinationkit' ),
                'type'              => 'select',
                'options'           => array(
                    'flex-start'    => esc_html__( 'Left', 'dina-divinationkit' ),
                    'center'    => esc_html__( 'Center', 'dina-divinationkit' ),
                    'flex-end'    => esc_html__( 'Right', 'dina-divinationkit' ),
                ),
                'defalut'          => 'flex-start',
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'layout',
                'mobile_options'    => true,
                'show_if'           => array(
                    'layout'        => 'column',
                ),
            ),      

            'space'          => array(
                'label'          => esc_html__( 'Space Between Buttons', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define space between button and separator.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '10px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 500,
                ),
            )

        );

        $button_one = array(
            'button_one_text'             => array(
                'label'           => esc_html__( 'Button Text', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can define the button text.', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'default'         => '',
                'toggle_slug'     => 'buttons',
                'sub_toggle'      => 'button_one',
                'dynamic_content' => 'text',
            ),

            'button_one_url'              => array(
                'label'           => esc_html__( 'Button Url', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define the button link url for your button.', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'default'         => '',
                'toggle_slug'     => 'buttons',
                'sub_toggle'      => 'button_one',
                'dynamic_content' => 'url',
            ),

            'url_new_window_one'          => array(
                'label'           => esc_html__( 'Open Button link in new window', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can choose whether button URL should be opened in new window.', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__( 'In The Same Window', 'divinationkit-for-divi' ),
                    'on'  => esc_html__( 'In The New Tab', 'divinationkit-for-divi' ),
                ),
                'default'     => 'off',
                'toggle_slug' => 'buttons',
                'sub_toggle'  => 'button_one',
            ),
        );

        $separator = array(
            'use_separator'             => array(
                'label'       => esc_html__( 'Use Separator', 'dina-divinationkit' ),
                'description' => esc_html__( 'Here you can define weather you want to use separator or not between buttons', 'dina-divinationkit' ),
                'type'        => 'yes_no_button',
                'options'     => array(
                    'on'  => esc_html__( 'Yes', 'dina-divinationkit' ),
                    'off' => esc_html__( 'No', 'dina-divinationkit' ),
                ),
                'default'     => 'on',
                'toggle_slug' => 'separator',
            ),

            'separator_type'            => array(
                'label'   => esc_html__( 'Select Separator Type', 'dina-divinationkit' ),
                'type'    => 'select',
                'options' => array(
                    'icon' => esc_html__( 'Icon', 'dina-divinationkit' ),
                    'text' => esc_html__( 'Text', 'dina-divinationkit' ),
                ),
                'default'     => 'icon',
                'toggle_slug' => 'separator',
                'show_if'       => array(
                    'use_separator' => 'on',
                )
            ),

            'separator_icon'               => array(
                'label'       => esc_html__( 'Select Icon', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Select separator icon.', 'divinationkit-for-divi' ),
                'type'        => 'select_icon',
                'toggle_slug' => 'separator',
                'show_if'     => array(
                    'separator_type' => 'icon',
                    'use_separator'     => 'on'
                ),
            ),

            'separator_text'              => array(
                'label'           => esc_html__( 'Separator Text', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define text that will display between buttons', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'default'           => 'Or',
                'toggle_slug'     => 'separator',
                'dynamic_content' => 'text',
                'show_if'         => array(
                    'separator_type' => 'text',
                    'use_separator'     => 'on'
                ),
            ),
        );

        $button_two = array(
            'button_two_text'             => array(
                'label'           => esc_html__( 'Button Text', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can define the button text.', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'default'         => '',
                'toggle_slug'     => 'buttons',
                'sub_toggle'      => 'button_two',
                'dynamic_content' => 'text',
            ),

            'button_two_url'              => array(
                'label'           => esc_html__( 'Button Url', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define the button link url for your button.', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'default'         => '',
                'toggle_slug'     => 'buttons',
                'sub_toggle'      => 'button_two',
                'dynamic_content' => 'url',
            ),

            'url_new_window_two'          => array(
                'label'           => esc_html__( 'Open Button link in new window', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can choose whether button URL should be opened in new window.', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__( 'In The Same Window', 'divinationkit-for-divi' ),
                    'on'  => esc_html__( 'In The New Tab', 'divinationkit-for-divi' ),
                ),
                'default'     => 'off',
                'toggle_slug' => 'buttons',
                'sub_toggle'  => 'button_two',
            ),
        );

        $design = array(
            'text_bg'            => array(
                'label'        => esc_html__( 'Separator Background', 'divinationkit-for-divi' ),
                'description'  => esc_html__( 'Here you can change your front side icon background color.', 'divinationkit-for-divi' ),
                'type'         => 'color-alpha',
                'default'      => '',
                'custom_color' => true,
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'separator_text',
                'show_if'      => array(
                    'separator_type' => 'text',
                ),
                'mobile_options' => true,
            ),

            'icon_bg'            => array(
                'label'        => esc_html__( 'Icon Background', 'divinationkit-for-divi' ),
                'description'  => esc_html__( 'Here you can change your front side icon background color.', 'divinationkit-for-divi' ),
                'type'         => 'color-alpha',
                'default'      => '',
                'custom_color' => true,
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'separator_icon',
                'show_if'      => array(
                    'separator_type' => 'icon',
                ),
                'mobile_options' => true,
                'hover'         => 'tabs'
            ),

            'icon_color'         => array(
                'label'        => esc_html__( 'Icon Color', 'divinationkit-for-divi' ),
                'description'  => esc_html__( 'Here you can change your front side icon color.', 'divinationkit-for-divi' ),
                'type'         => 'color-alpha',
                'default'      => '#333333',
                'custom_color' => true,
                'tab_slug'     => 'advanced',
                'toggle_slug'  => 'separator_icon',
                'show_if'      => array(
                    'separator_type' => 'icon',
                ),
                'mobile_options' => true,
            ),

            'icon_size'          => array(
                'label'          => esc_html__( 'Icon Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change your front side icon size.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '20px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator_icon',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 1000,
                ),
                'show_if'              => array(
                    'separator_type' => 'icon',
                ),
            ),

            'icon_padding'       => array(
                'label'          => esc_html__( 'Icon Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator_icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
                'show_if'           => array(
                    'separator_type'   => 'icon',
                )
            ),
            'text_padding'       => array(
                'label'          => esc_html__( 'Separator Text Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator_text',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
                'show_if'           => array(
                    'separator_type'   => 'text',
                )
            ),
        );

        return array_merge( $layout, $button_one, $separator, $button_two, $design );
    }

    public function get_advanced_fields_config() {
        
          // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                   = array();
        $advanced_fields[ 'text' ]         = false;
        $advanced_fields[ 'filters' ]      = false;
        $advanced_fields[ "link_options" ] = false;
        $advanced_fields[ 'text_shadow' ]  = array();
        $advanced_fields[ 'fonts' ]        = array();

        $advanced_fields[ 'button' ][ 'button_one' ] = array(
            'label'       => esc_html__('Button One', 'divinationkit-for-divi'),
            'toggle_slug' => 'button_one',
            'css'         => array(
                'main'      => "%%order_class%% .dina_dual_button-one",
                'important' => 'all',
            ),
            'use_alignment' => false,
            'text_shadow'   => false,
            'box_shadow'    => array(
                'css'           => array(
                    'main' => '%%order_class%% .dina_dual_button-one',
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

        $advanced_fields[ 'borders' ][ 'separator_icon' ] = array(
            'label_prefix'          => esc_html__( 'Separator Icon', 'divinationkit-for-divi' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'separator_icon',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dina_dual_button-separator-icon',
                    'border_styles' => '%%order_class%% .dina_dual_button-separator-icon',
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

        $advanced_fields[ 'fonts' ][ 'separator_text' ] = array(
            'label'             => esc_html__('Separator', 'divinationkit-for-divi'),
            'css'               => array(
                'main'          => '%%order_class%% .dina_dual_button-separator-text span',
                'important'     => false,
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'separator_text',
            'font_size'         => array(
                'default'       => '14px',
            ),
            'line_height'       => array(
                'default'       => '1.2em',
            ),
        );

        $advanced_fields[ 'button' ][ 'button_two' ] = array(
            'label'       => esc_html__('Button Two', 'divinationkit-for-divi'),
            'toggle_slug' => 'button_two',
            'css'         => array(
                'main'      => "%%order_class%% .dina_dual_button-two",
                'important' => 'all',
            ),
            'use_alignment' => false,
            'text_shadow'   => false,
            'box_shadow'    => array(
                'css'           => array(
                    'main' => '%%order_class%% .dina_dual_button-two',
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

        return $advanced_fields;
    }

      // Render Button one
    public function render_button_one() {
        
		$multi_view     = et_pb_multi_view_options( $this );
		$button_url     = $this->props[ 'button_one_url' ];
		$button_rel     = $this->props[ 'button_one_rel' ];
		$button_text    = $this->_esc_attr( 'button_one_text', 'limited' );
		$url_new_window = $this->props[ 'url_new_window_one' ];
		$button_custom  = $this->props[ 'custom_button_one' ];

		$custom_icon_values = et_pb_responsive_options()->get_property_values( $this->props, 'button_one_icon' );
		$custom_icon        = isset( $custom_icon_values[ 'desktop' ] ) ? $custom_icon_values[ 'desktop' ] : '';
		$custom_icon_tablet = isset( $custom_icon_values[ 'tablet' ] ) ? $custom_icon_values[ 'tablet' ] : '';
		$custom_icon_phone  = isset( $custom_icon_values[ 'phone' ] ) ? $custom_icon_values[ 'phone' ] : '';

		// Nothing to output if neither Button Text nor Button URL defined
		$button_url = trim( $button_url );

		if ( '' === $button_text && '' === $button_url ) {
			return;
		}

		  // Render Button
		$button = $this->render_button(
			array(
				'button_id'           => $this->module_id( false ),
				'button_classname'    => array('dina_dual_button-one'),
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
						'hover_selector' => '%%order_class%% .dina_dual_button-one',
						'visibility'     => array(
							'button_text' => '__not_empty',
						),
					)
				),
			)
		);

        return sprintf(
            '<div class="dina_dual_button-one-wrapper">
                %1$s
            </div>',
            $button
        );
    }

    // Render Button two
    public function render_button_two() {
        
		$multi_view     = et_pb_multi_view_options( $this );
		$button_url     = $this->props[ 'button_two_url' ];
		$button_rel     = $this->props[ 'button_two_rel' ];
		$button_text    = $this->_esc_attr( 'button_two_text', 'limited' );
		$url_new_window = $this->props[ 'url_new_window_two' ];
		$button_custom  = $this->props[ 'custom_button_two' ];

		$custom_icon_values = et_pb_responsive_options()->get_property_values( $this->props, 'button_two_icon' );
		$custom_icon        = isset( $custom_icon_values[ 'desktop' ] ) ? $custom_icon_values[ 'desktop' ] : '';
		$custom_icon_tablet = isset( $custom_icon_values[ 'tablet' ] ) ? $custom_icon_values[ 'tablet' ] : '';
		$custom_icon_phone  = isset( $custom_icon_values[ 'phone' ] ) ? $custom_icon_values[ 'phone' ] : '';

		// Nothing to output if neither Button Text nor Button URL defined
		$button_url = trim( $button_url );

		if ( '' === $button_text && '' === $button_url ) {
			return;
		}

		  // Render Button
		$button = $this->render_button(
			array(
				'button_id'           => $this->module_id( false ),
				'button_classname'    => array('dina_dual_button-two'),
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
						'hover_selector' => '%%order_class%% .dina_dual_button-two',
						'visibility'     => array(
							'button_text' => '__not_empty',
						),
					)
				),
			)
		);

        return sprintf(
            '<div class="dina_dual_button-two-wrapper">
                %1$s
            </div>',
            $button
        );
    }

    public function render_serparator() {

        $separator_type = $this->props[ 'separator_type' ];
        $use_separator  = $this->props[ 'use_separator' ];

        if( $use_separator !== 'on' ) return;

        if( $separator_type === 'icon' ) {
            return sprintf(
                '<div class="dina_dual_button-separator-icon">
                    <i class="dina_icon">
                        %1$s
                    </i>
                </div>',
                $this->dina_render_icon( 'separator_icon' ),
            );
        }

        if( $separator_type === 'text' ) {
            return sprintf(
                '<div class="dina_dual_button-separator-text">
                    <span>
                        %1$s
                    </span>
                </div>',
                $this->props[ 'separator_text' ]
            );
        }
    }

    public function render($attrs, $content, $render_slug) {

        $this->render_css( $render_slug );

        return sprintf(
            '<div class="dina_dual_button-container">
                %1$s
                %2$s
                %3$s
            </div>',
            $this->render_button_one(),
            $this->render_serparator(),
            $this->render_button_two(),
        );
    }

    public function render_css( $render_slug) {

          // Gernerate icon style
          $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'separator_icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dina_dual_button-separator-icon i.dina_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );

        if( $this->props[ 'layout' ] === 'row' ) {
            $this->dina_responsive_css( $render_slug, array(
                [
                    'option_slug' => 'alignment',
                    'property'    => 'justify-content',
                    'selector'    => '%%order_class%% .dina_dual_button-container'
                ],
            ));
        }

        if( $this->props[ 'layout' ] === 'column' ) {
            $this->dina_responsive_css( $render_slug, array(
                [
                    'option_slug' => 'alignment_col',
                    'property'    => 'align-items',
                    'selector'    => '%%order_class%% .dina_dual_button-container'
                ],
            ));
        }

        $this->dina_responsive_css( $render_slug, array(
            [
                'option_slug' => 'layout',
                'property'    => 'flex-direction',
                'selector'    => '%%order_class%% .dina_dual_button-container'
            ],
            [
                'option_slug' => 'space',
                'property'    => 'gap',
                'selector'    => '%%order_class%% .dina_dual_button-container'
            ],
            

            [
                'option_slug' => 'text_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_dual_button-separator-text'
            ],

            [
                'option_slug' => 'icon_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_dual_button-separator-icon'
            ],
            [
                'option_slug' => 'icon_bg',
                'property'    => 'background',
                'selector'    => '%%order_class%% .dina_dual_button-separator-icon',
                'hover'    => '%%order_class%% .dina_dual_button-separator-icon:hover'
            ],
            [
                'option_slug' => 'text_bg',
                'property'    => 'background',
                'selector'    => '%%order_class%% .dina_dual_button-separator-text'
            ],
            [
                'option_slug' => 'icon_color',
                'property'    => 'color',
                'selector'    => '%%order_class%% .dina_dual_button-separator-icon i.dina_icon'
            ],
            [
                'option_slug' => 'icon_size',
                'property'    => 'font-size',
                'selector'    => '%%order_class%% .dina_dual_button-separator-icon i.dina_icon'
            ],
        ));
    }        
}

new DINA_Dual_Button();