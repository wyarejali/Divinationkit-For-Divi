<?php

class DINA_Progress_Bar extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . 'modules/progress-bar?ref="divinationkit-module"/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {
        $this->name        = esc_html__( 'Skill Progress Bar', 'divinationkit-for-divi' );
        $this->slug        = 'dina_progress_bar';
        $this->child_slug  = 'dina_progress_bar_child';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';
        $this->icon_path   = $this->dina_module_icon( 'progress-bar' );

        $this->settings_modal_toggles = array(

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

        $this->custom_css_fields = array(
            'name_text'     => array(
                'label'    => esc_html__( 'Name Text', 'divinationkit-for-divi' ),
                'selector' => '%%order_class%% .dina_progress_bar-name',
            ),
            'level_text'    => array(
                'label'    => esc_html__( 'Level Text', 'divinationkit-for-divi' ),
                'selector' => '%%order_class%% .dina_progress_bar-level',
            ),
            'progress_item' => array(
                'label'    => esc_html__( 'Progress Bar Item', 'divinationkit-for-divi' ),
                'selector' => '%%order_class%% .dina_progress_bar-item',
            ),
        );
    }

    public function get_fields() {
        $bar_bg = $this->dina_custom_background_fields(
            'bar',
            'Progress Bar',
            'advanced',
            'progress_bar',
            array( 'color', 'gradient' ),
            array(),
            '#E8F0EF'
        );

        $level_bg = $this->dina_custom_background_fields(
            'level',
            'Level',
            'advanced',
            'progress_bar',
            array( 'color', 'gradient' ),
            array(),
            '#01564D'
        );

        $design = array(
            'bar_height'      => array(
                'label'          => esc_html__( 'Height', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the progress bar height', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '10px',
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
                'default'        => '10px',
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
                'default'        => '#01564D',
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
                'default'        => '4px|10px|4px|10px',
                'mobile_options' => true,
            ),

            'tooltip_round'   => array(
                'label'          => esc_html__( 'Tooltip Round', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the progress bar level tooltip border radius', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '5px',
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
                'default'        => '10px',
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
                'default'        => '20px',
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
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),
        );

        return array_merge( $bar_bg, $level_bg, $design );
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
                'main'      => '%%order_class%% .dina_progress_bar-name',
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
                'main'      => '%%order_class%% .dina_progress-level:before',
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
                'main'      => '%%order_class%% .dina_progress_bar-description p',
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
                    'border_radii'  => '%%order_class%% .dina_progress-icon',
                    'border_styles' => '%%order_class%% .dina_progress-icon',
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

        return $advanced_fields;
    }

    public function render( $attrs, $content, $render_slug ) {

        wp_enqueue_script( 'dina-progress-bar' );

        $this->render_css( $render_slug );

        return sprintf(
            '<div class="dina_progress_bar-container">
                <div class="dina_progress_bar-wrapper">
                    %1$s
                </div>
            </div>',
            $this->content,
        );
    }

    public function render_css( $render_slug ) {

        $this->dina_custom_bg_style( $render_slug, 'bar', '%%order_class%% .dina_progress', '' );
        $this->dina_custom_bg_style( $render_slug, 'level', '%%order_class%% .dina_progress-level', '' );

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
                'selector'    => '%%order_class%% .dina_progress, %%order_class%% .dina_progress-level',
            ),
            array(
                'option_slug' => 'border_round',
                'property'    => 'border-radius',
                'selector'    => '%%order_class%% .dina_progress, %%order_class%% .dina_progress-level',
            ),
            array(
                'option_slug' => 'tooltip_bg',
                'property'    => 'background',
                'selector'    => '%%order_class%% .dina_progress-level:before, %%order_class%% .dina_progress-level:after',
            ),
            array(
                'option_slug' => 'tooltip_round',
                'property'    => 'border-radius',
                'selector'    => '%%order_class%% .dina_progress-level:before',
            ),
            array(
                'option_slug' => 'tooltip_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_progress-level:before',
            ),
        ) );

        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => '%%order_class%% .dina_progress-level:before',
            'declaration' => "bottom: calc( 100% + {$this->props['offset_x']});",
        ) );
        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => '%%order_class%% .dina_progress-level:after',
            'declaration' => "top: calc( -5px - {$this->props['offset_x']});",
        ) );
    }
}

new DINA_Progress_Bar();
