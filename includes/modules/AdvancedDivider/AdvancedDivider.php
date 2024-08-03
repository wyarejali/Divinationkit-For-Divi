<?php

class DINA_Divider extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . 'modules/advanced-divider/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {
        $this->name        = esc_html__( 'Advanced Divider', 'divinationkit-for-divi' );
        $this->slug        = 'dina_divider';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';
        $this->icon_path   = $this->dina_module_icon( 'divider' );

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'content' => esc_html__( 'Content', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'divider'      => esc_html__( 'Divider', 'divinationkit-for-divi' ),
                    'divider_text' => array(
                        'title'             => esc_html__( 'Divider Text', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'text'  => array(
                                'name' => esc_html__( 'Text', 'divinationkit-for-divi' ),
                            ),
                            'style' => array(
                                'name' => esc_html__( 'Style', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),
                    'icon'         => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                ),
            ),
        );

        $this->custom_css_fields = array(
            'divider'      => array(
                'label'    => esc_html__( 'Divider', 'divinationkit-for-divi' ),
                'selector' => '%%order_class%% .dina_divider_wrapper .dina_divider',
            ),
            'icon'         => array(
                'label'    => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                'selector' => '%%order_class%% .dina_divider_icon i.dina_icon',
            ),
            'divider_text' => array(
                'label'    => esc_html__( 'Divider Text', 'divinationkit-for-divi' ),
                'selector' => '%%order_class%% .dina_divider-title',
            ),
        );
    }

    public function get_fields() {
        $et_accent_color = et_builder_accent_color();

        $content = array(
            'use_text'     => array(
                'label'           => esc_html__( 'Use Text', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define content type icon/text', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'toggle_slug'     => 'content',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
            ),

            'divider_icon' => array(
                'label'       => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Define divider icon', 'divinationkit-for-divi' ),
                'type'        => 'select_icon',
                'toggle_slug' => 'content',
                'show_if'     => array(
                    'use_text' => 'off',
                ),
            ),

            'divider_text' => array(
                'label'       => esc_html__( 'Divider Text', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Enter your divider text here', 'divinationkit-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'content',
                'show_if'     => array(
                    'use_text' => 'on',
                ),
            ),

        );

        $styles = array(
            'icon_color'       => array(
                'label'          => esc_html__( 'Icon Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define divider icon color', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => $et_accent_color,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'show_if'        => array(
                    'use_text' => 'off',
                ),
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_bg'          => array(
                'label'          => esc_html__( 'Icon Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define divider icon background color', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'show_if'        => array(
                    'use_text' => 'off',
                ),
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_size'        => array(
                'label'          => esc_html__( 'Icon Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change your divider icon size.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '30px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 10,
                    'step' => 1,
                    'max'  => 250,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'show_if'        => array(
                    'use_text' => 'off',
                ),
            ),

            'icon_padding'     => array(
                'label'          => esc_html__( 'Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for divider icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '10px|10px|10px|10px',
                'mobile_options' => true,
                'show_if'        => array(
                    'use_text' => 'off',
                ),
            ),

            'divider_color'    => array(
                'label'       => esc_html__( 'Divider Color', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Define the divi line color', 'divinationkit-for-divi' ),
                'type'        => 'color-alpha',
                'default'     => $et_accent_color,
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'divider',
                'default'     => '#0dc8f1',

            ),

            'divider_style'    => array(
                'label'          => esc_html__( 'Divider Style', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the divider style', 'divinationkit-for-divi' ),
                'type'           => 'select',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'options'        => array(
                    'dotted' => esc_html__( 'Dotted', 'divinationkit-for-divi' ),
                    'dashed' => esc_html__( 'Dashed', 'divinationkit-for-divi' ),
                    'solid'  => esc_html__( 'Solid', 'divinationkit-for-divi' ),
                    'double' => esc_html__( 'Double', 'divinationkit-for-divi' ),
                    'groove' => esc_html__( 'Groove', 'divinationkit-for-divi' ),
                    'ridge'  => esc_html__( 'Ridge', 'divinationkit-for-divi' ),
                    'inset'  => esc_html__( 'Inset', 'divinationkit-for-divi' ),
                    'outset' => esc_html__( 'Outset', 'divinationkit-for-divi' ),
                    'none'   => esc_html__( 'None', 'divinationkit-for-divi' ),
                ),
                'default'        => 'solid',
                'mobile_options' => true,
            ),
            'divider_position' => array(
                'label'          => esc_html__( 'Divider Postions', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the divider positions', 'divinationkit-for-divi' ),
                'type'           => 'select',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'options'        => array(
                    'flex-start' => esc_html__( 'Top', 'divinationkit-for-divi' ),
                    'center'     => esc_html__( 'Vertically Center', 'divinationkit-for-divi' ),
                    'flex-end'   => esc_html__( 'Bottom', 'divinationkit-for-divi' ),
                ),
                'default'        => 'center',
                'mobile_options' => true,
            ),
            'divider_weight'   => array(
                'label'          => esc_html__( 'Divider Weight', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define space between divider and text/icon', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 250,
                ),
                'default'        => '1px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'mobile_options' => true,
            ),
            'divider_gap'      => array(
                'label'          => esc_html__( 'Divider Space', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define space between divider and text/icon', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 250,
                ),
                'default'        => '15px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'mobile_options' => true,
            ),

            'text_bg'          => array(
                'label'          => esc_html__( 'Text Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define divider text background color', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider_text',
                'sub_toggle'     => 'style',
                'show_if'        => array(
                    'use_text' => 'on',
                ),
                'mobile_options' => true,
            ),

            'text_padding'     => array(
                'label'          => esc_html__( 'Text Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for divider text', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider_text',
                'sub_toggle'     => 'style',
                'default'        => '6px|10px|6px|10px',
                'mobile_options' => true,
                'show_if'        => array(
                    'use_text' => 'on',
                ),
            ),

        );

        return array_merge( $content, $styles );
    }

    public function get_advanced_fields_config() {

        $et_accent_color = et_builder_accent_color();

        $advanced_fields                = array();
        $advanced_fields['text']        = false;
        $advanced_fields['text_shadow'] = false;
        $advanced_fields['fonts']       = array();

        $advanced_fields['fonts']['divider_text'] = array(
            'label'        => esc_html__( 'Divider', 'divinationkit-for-divi' ),
            'css'          => array(
                'main'      => '%%order_class%% .dina_divider_wrapper .dina_divider-title',
                'important' => 'all',
            ),
            'header_level' => array(
                'default' => 'h3',
            ),
            'font_size'    => array(
                'default' => '26px',
            ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'divider_text',
            'sub_toggle'   => 'text',
            'show_if'      => array(
                'use_text' => 'on',
            ),
        );

        $advanced_fields['borders']['divider_icon'] = array(
            'label_prefix' => esc_html__( 'Icon', 'divinationkit-for-divi' ),
            'toggle_slug'  => 'icon',
            'css'          => array(
                'main'      => array(
                    'border_radii'  => '%%order_class%% .dina_divider_icon',
                    'border_styles' => '%%order_class%% .dina_divider_icon',
                ),
                'important' => 'all',
            ),
            'defaults'     => array(
                'border_radii'  => 'on|0px|0px|0px|0px',
                'border_styles' => array(
                    'width' => '0px',
                    'color' => $et_accent_color,
                    'style' => 'none',
                ),
            ),
            'show_if'      => array(
                'use_text' => 'off',
            ),
        );
        $advanced_fields['borders']['divider_text'] = array(
            'label_prefix' => esc_html__( 'Divider Text', 'divinationkit-for-divi' ),
            'toggle_slug'  => 'divider_text',
            'sub_toggle'   => 'style',
            'css'          => array(
                'main'      => array(
                    'border_radii'  => '%%order_class%% .dina_divider-title',
                    'border_styles' => '%%order_class%% .dina_divider-title',
                ),
                'important' => 'all',
            ),
            'defaults'     => array(
                'border_radii'  => 'on|0px|0px|0px|0px',
                'border_styles' => array(
                    'width' => '0px',
                    'color' => $et_accent_color,
                    'style' => 'none',
                ),
            ),
        );

        return $advanced_fields;
    }

    public function render_icon() {

        return sprintf(
            '<div class="dina_divider_icon">
                <i class="dina_icon">%1$s</i>
            </div>',
            $this->dina_render_icon( 'divider_icon' )
        );
    }

    public function render_heading() {

        $heading       = $this->props['divider_text'];
        $heading_level = et_pb_process_header_level( $this->props['divider_text_level'], 'h3' );

        return sprintf(
            '<%1$s class="dina_divider-title">%2$s</%1$s>',
            $heading_level,
            $heading
        );
    }

    public function render_content() {

        $is_text = $this->props['use_text'];

        if ( $is_text === 'on' ) {
            return $this->render_heading();
        }

        return $this->render_icon();
    }

    public function render( $attrs, $content, $render_slug ) {

        $this->render_css( $render_slug );
        $dividier_position = $this->props['divider_position'];
        $classes           = array();
        array_push( $classes, 'dina_divider-' . $dividier_position );

        return sprintf(
            '<div class="dina_divider_wrapper %1$s">
                <div class="dina_divider-before dina_divider"></div>
                %2$s
                <div class="dina_divider-after dina_divider"></div>
            </div>',
            join( ' ', $classes ), // 1
            $this->render_content(), // 2
        );
    }

    public function render_css( $render_slug ) {

        $divider_style  = $this->props['divider_style'];
        $divider_weight = $this->props['divider_weight'];
        $divider_color  = $this->props['divider_color'];

        $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'divider_icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dina_divider_icon .dina_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );

        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector'    => '%%order_class%% .dina_divider',
                'declaration' => sprintf(
                    'border-top-style: %1$s; border-top-width: %2$s; border-top-color: %3$s',
                    $divider_style,
                    $divider_weight,
                    $divider_color
                ),
            )
        );

        $this->dina_responsive_css( $render_slug, array(
            array(
                'option_slug' => 'icon_color',
                'property'    => 'color',
                'selector'    => '%%order_class%% .dina_divider_icon i.dina_icon',
                'hover'       => '%%order_class%% .dina_divider_icon:hover i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_bg',
                'property'    => 'background',
                'selector'    => '%%order_class%% .dina_divider_icon i.dina_icon',
                'hover'       => '%%order_class%% .dina_divider_icon:hover i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_size',
                'property'    => 'font-size',
                'selector'    => '%%order_class%% .dina_divider_icon i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_divider_icon i.dina_icon',
            ),
            array(
                'option_slug' => 'text_bg',
                'property'    => 'background',
                'selector'    => '%%order_class%% .dina_divider-title',
            ),
            array(
                'option_slug' => 'text_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_divider-title',
            ),
            array(
                'option_slug' => 'divider_gap',
                'property'    => 'gap',
                'selector'    => '%%order_class%% .dina_divider_wrapper',
            ),
        ) );

    }
}

new dina_Divider();
