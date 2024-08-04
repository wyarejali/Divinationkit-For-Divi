<?php

class DINA_Progress_Bar_Child extends DINA_Module_Core {

    public function init() {
        $this->name                     = esc_html__( 'Progress Bar Item', 'divinationkit-for-divi' );
        $this->slug                     = 'dina_progress_bar_child';
        $this->vb_support               = 'on';
        $this->type                     = 'child';
        $this->main_css_element         = "%%order_class%%";
        $this->child_title_var          = 'name';
        $this->child_title_fallback_var = 'name';

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'content'  => esc_html__( 'Content', 'divinationkit-for-divi' ),
                    'settings' => esc_html__( 'Settings', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'progress_bar' => esc_html__( 'Progress Bar', 'divinationkit-for-divi' ),
                    'icon'         => esc_html__( 'Icon', 'divinationkit-for-divi' ),

                    'level'        => array(
                        'title'             => esc_html__( 'Level', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'design'     => array(
                                'name' => esc_html__( 'Design', 'divinationkit-for-divi' ),
                            ),
                            'level_text' => array(
                                'name' => esc_html__( 'Level Text', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),

                    'texts'        => array(
                        'title'             => esc_html__( 'Texts', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'name_text'   => array(
                                'name' => esc_html__( 'Name Text', 'divinationkit-for-divi' ),
                            ),
                            'description' => array(
                                'name' => esc_html__( 'Description Text', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),
                ),
            ),
        );
    }

    public function get_fields() {

        $content = array(
            'use_icon'    => array(
                'label'           => esc_html__( 'Use Icon', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Turn on if you want to icon for the progress bar', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'content',
            ),
            'icon'        => array(
                'label'       => esc_html__( 'Select Icon', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Select progress bar icon.', 'divinationkit-for-divi' ),
                'type'        => 'select_icon',
                'default'     => '&#xe105;||divi||400',
                'toggle_slug' => 'content',
                'show_if'     => array(
                    'use_icon' => 'on',
                ),
            ),
            'name'        => array(
                'label'       => esc_html__( 'Name', 'divinationkit-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'content',
            ),
            'description' => array(
                'label'           => esc_html__( 'Description', 'divinationkit-for-divi' ),
                'type'            => 'tiny_mce',
                'dynamic_content' => 'text',
                'toggle_slug'     => 'content',
            ),

            'level'       => array(
                'label'          => esc_html__( 'Level', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default'        => '90%',
                'default_unit'   => '%',
                'allowed_unit'   => array( '%' ),
                'validate_unit'  => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 100,
                ),
                'toggle_slug'    => 'content',
            ),

            'hide_name'   => array(
                'label'           => esc_html__( 'Hide Name Text', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Turn on if you want to hide all the name text', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'content',
            ),

            'hide_level'  => array(
                'label'           => esc_html__( 'Hide level Text', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Turn on if you want to hide all the level text', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'content',
            ),

        );

        $bar_bg = $this->dina_custom_background_fields(
            'bar',
            'Progress Bar',
            'advanced',
            'progress_bar',
            array( 'color', 'gradient' ),
            array(),
            ''
        );

        $level_bg = $this->dina_custom_background_fields(
            'level',
            'Level',
            'advanced',
            'progress_bar',
            array( 'color', 'gradient' ),
            array(),
            ''
        );

        $design = array(
            'bar_height'      => array(
                'label'          => esc_html__( 'Height', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the progress bar height', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'  => 1,
                    'step' => 1,
                    'max'  => 350,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'progress_bar',
                'mobile_options' => true,
            ),

            'border_round'    => array(
                'label'          => esc_html__( 'Corner Round', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the progress bar corner border radius', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'  => 1,
                    'step' => 1,
                    'max'  => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'progress_bar',
                'mobile_options' => true,
            ),

            'tooltip_bg'      => array(
                'label'          => esc_html__( 'Level Tooltip Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define level tooltip background color', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'level',
                'sub_toggle'     => 'design',
                'show_if_not'    => array(
                    'hide_level' => 'on',
                ),
                'mobile_options' => true,
            ),

            'tooltip_padding' => array(
                'label'          => esc_html__( 'Tooltip Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for level tooltip', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'level',
                'sub_toggle'     => 'design',
                'mobile_options' => true,
            ),

            'tooltip_round'   => array(
                'label'          => esc_html__( 'Tooltip Round', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the progress bar level tooltip border radius', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'  => 1,
                    'step' => 1,
                    'max'  => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'level',
                'sub_toggle'     => 'design',
                'mobile_options' => true,
            ),

            'offset_x'        => array(
                'label'          => esc_html__( 'Tooltip Vertical Offset', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the progress bar level tooltip vertical position', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'step' => 1,
                    'max'  => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'level',
                'sub_toggle'     => 'design',
            ),

            'icon_bg'         => array(
                'label'          => esc_html__( 'Icon Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon background color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_color'      => array(
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

            'icon_size'       => array(
                'label'          => esc_html__( 'Icon Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon size.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
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

            'icon_padding'    => array(
                'label'          => esc_html__( 'Icon Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),

            'icon_margin'     => array(
                'label'          => esc_html__( 'Icon Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin for icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => 'false',
                'mobile_options' => true,
            ),
        );

        $settings = array(

            'name_placement' => array(
                'label'       => esc_html__( 'Name Placement', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Define the position of progress bar Name position (outside or inside) progress bar', 'divinationkit-for-divi' ),
                'type'        => 'select',
                'options'     => array(
                    'outside' => esc_html__( 'Outside', 'divinationkit-for-divi' ),
                    'inside'  => esc_html__( 'Inside', 'divinationkit-for-divi' ),
                ),
                'default'     => 'outside',
                'toggle_slug' => 'content',
            ),
        );

        return array_merge( $content, $bar_bg, $level_bg, $design, $settings );
    }

    public function get_advanced_fields_config() {
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                = array();
        $advanced_fields['text']        = false;
        $advanced_fields['text_shadow'] = false;
        $advanced_fields['fonts']       = array();

        $advanced_fields['fonts']['name_text'] = array(
            'label'           => esc_html__( 'Name', 'divinationkit-for-divi' ),
            'css'             => array(
                'main'      => '.dina_progress_bar-container %%order_class%% .dina_progress_bar-name',
                'important' => 'all',
            ),
            'tab_slug'        => 'advanced',
            'toggle_slug'     => 'texts',
            'sub_toggle'      => 'name_text',
            'font_size'       => array(
                'default' => '16px',
            ),
            'hide_text_align' => true,
            'line_height'     => array(
                'default' => '1.3em',
            ),
        );
        $advanced_fields['fonts']['level_text'] = array(
            'label'           => esc_html__( 'Level', 'divinationkit-for-divi' ),
            'css'             => array(
                'main'      => '.dina_progress_bar-container %%order_class%% .dina_progress-level:before',
                'important' => 'all',
            ),
            'tab_slug'        => 'advanced',
            'toggle_slug'     => 'level',
            'sub_toggle'      => 'level_text',
            'font_size'       => array(
                'default' => '14px',
            ),
            'hide_text_align' => true,
            'line_height'     => array(
                'default' => '1.3em',
            ),
        );
        $advanced_fields['fonts']['description'] = array(
            'label'           => esc_html__( 'Level', 'divinationkit-for-divi' ),
            'css'             => array(
                'main'      => '.dina_progress_bar-container %%order_class%% .dina_progress_bar-description p',
                'important' => 'all',
            ),
            'tab_slug'        => 'advanced',
            'toggle_slug'     => 'texts',
            'sub_toggle'      => 'description',
            'font_size'       => array(
                'default' => '16px',
            ),
            'hide_text_align' => true,
            'line_height'     => array(
                'default' => '1.3em',
            ),
        );

        // Icon border
        $advanced_fields['borders']['icon'] = array(
            'label_prefix' => esc_html__( 'Icon', 'divinationkit-for-divi' ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'icon',
            'css'          => array(
                'main'      => array(
                    'border_radii'  => '.dina_progress_bar-container %%order_class%% .dina_progress-icon',
                    'border_styles' => '.dina_progress_bar-container %%order_class%% .dina_progress-icon',
                ),
                'important' => false,
            ),
            'defaults'     => array(
                'border_radii'  => 'on|0px|0px|0px|0px',
                'border_styles' => array(
                    'width' => '0px',
                    'color' => '#333333',
                    'style' => 'solid',
                ),
            ),
        );

        $advanced_fields['margin_padding'] = array(
            'css' => array(
                'important' => 'all',
            ),
        );

        return $advanced_fields;
    }

    public function render_icon() {
        $use_icon = $this->props['use_icon'];

        if ( $use_icon === 'on' ) {
            return sprintf(
                '<div class="dina_progress_bar-icon">
                     <i class="dina_icon">%1$s</i>
                </div>',
                $this->dina_render_icon( 'icon' )
            );
        }
    }

    public function render_name() {

        if ( $this->props['hide_name'] !== 'on' ) {
            return sprintf( '<span class="dina_progress_bar-name">%1$s</span>', $this->props['name'] );
        }
    }

    public function render_description() {
        $description = $this->props['description'];

        if ( $description !== '' ) {

            return sprintf(
                '<div class="dina_progress_bar-description">
                     %1$s
                </div>',
                $this->render_MCE( $description ),
            );
        }

    }

    public function render( $attrs, $content, $render_slug ) {

        $this->render_css( $render_slug );
        $name_placement = $this->props['name_placement'];

        return sprintf(
            '<div class="dina_progress_bar-item dina_progress_bar-%4$s">
                %1$s
                <div class="dina_progress_bar-wrapper">
                    %2$s
                    <div class="dina_progress">
                        <div class="dina_progress-level" data-per="%6$s">
                            %3$s
                        </div>
                    </div>
                    %5$s
                </div>
            </div>',
            $this->render_icon(),
            $name_placement === 'outside' ? $this->render_name() : '',
            $name_placement === 'inside' ? $this->render_name() : '',
            $this->props['hide_level'] === 'off' ? 'show-level' : '',
            $this->render_description(), // 5
            $this->props['level']
        );
    }

    public function render_css( $render_slug ) {

        $this->dina_custom_bg_style( $render_slug, 'bar', '.dina_progress_bar-container %%order_class%% .dina_progress', '' );
        $this->dina_custom_bg_style( $render_slug, 'level', '.dina_progress_bar-container %%order_class%% .dina_progress-level', '' );

        $this->dina_responsive_css( $render_slug, array(
            array(
                'option_slug' => 'icon_size',
                'property'    => 'font-size',
                'selector'    => '%%order_class%% .dina_progress_bar-icon i.dina_icon',
                'hover'       => '%%order_class%%:hover i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_color',
                'property'    => 'color',
                'selector'    => '%%order_class%% .dina_progress_bar-icon i.dina_icon',
                'hover'       => '%%order_class%%:hover i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_bg',
                'property'    => 'background',
                'selector'    => '%%order_class%% .dina_progress_bar-icon i.dina_icon',
                'hover'       => '%%order_class%%:hover i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_progress_bar-icon i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_margin',
                'property'    => 'margin',
                'selector'    => '%%order_class%% .dina_progress_bar-icon',
            ),

            array(
                'option_slug' => 'bar_height',
                'property'    => 'height',
                'selector'    => '.dina_progress_bar-container %%order_class%% .dina_progress, .dina_progress_bar-container %%order_class%% .dina_progress-level',
            ),
            array(
                'option_slug' => 'border_round',
                'property'    => 'border-radius',
                'selector'    => '.dina_progress_bar-container %%order_class%% .dina_progress, .dina_progress_bar-container %%order_class%% .dina_progress-level',
            ),
            array(
                'option_slug' => 'tooltip_bg',
                'property'    => 'background',
                'selector'    => '.dina_progress_bar-container %%order_class%% .dina_progress-level:before, .dina_progress_bar-container %%order_class%% .dina_progress-level:after',
            ),
            array(
                'option_slug' => 'tooltip_round',
                'property'    => 'border-radius',
                'selector'    => '.dina_progress_bar-container %%order_class%% .dina_progress-level:before',
            ),
            array(
                'option_slug' => 'tooltip_padding',
                'property'    => 'padding',
                'selector'    => '.dina_progress_bar-container %%order_class%% .dina_progress-level:before',
            ),
        ) );

        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => '.dina_progress_bar-container %%order_class%% .dina_progress-level:before',
            'declaration' => "bottom: calc( 100% + {$this->props['offset_x']});",
        ) );
        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => '.dina_progress_bar-container %%order_class%% .dina_progress-level:after',
            'declaration' => "top: calc( -5px - {$this->props['offset_x']});",
        ) );
    }
}

new DINA_Progress_Bar_Child();
