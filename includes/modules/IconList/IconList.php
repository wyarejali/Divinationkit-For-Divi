<?php

class DINA_Icon_List extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . '/modules/icon-list/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {

        $this->name        = esc_html__( 'Icon List', 'divinationkit-for-divi' );
        $this->slug        = 'dina_icon_list';
        $this->child_slug  = 'dina_icon_list_child';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';
        $this->icon_path   = $this->dina_module_icon( 'icon-list' );

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'content' => esc_html__( 'Content', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'layout'      => esc_html__( 'Layout', 'divinationkit-for-divi' ),
                    'icon'        => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                    'title'       => esc_html__( 'Title', 'divinationkit-for-divi' ),
                    'description' => esc_html__( 'Description', 'divinationkit-for-divi' ),
                    'tooltip'     => esc_html__( 'Tooltip', 'divinationkit-for-divi' ),
                    'list_item'   => esc_html__( 'List Item', 'divinationkit-for-divi' ),
                ),
            ),
        );
    }

    public function get_fields() {

        $et_accent_color = et_builder_accent_color();

        $layout = array(

            'horizontal_align' => array(
                'label'           => esc_html__( 'Horizontal Align', 'divinationkit-for-divi' ),
                'type'            => 'text_align',
                'option_category' => 'configuration',
                'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
                'default'         => 'left',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'layout',
                'mobile_options'  => true,
            ),

            'vertical_align'   => array(
                'label'          => esc_html__( 'Vertical Align', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the content vertical alignment', 'divinationkit-for-divi' ),
                'type'           => 'select',
                'options'        => array(
                    'flex-start' => esc_html__( 'Top', 'divinationkit-for-divi' ),
                    'center'     => esc_html__( 'Vertically Center', 'divinationkit-for-divi' ),
                    'flex-end'   => esc_html__( 'Bottom', 'divinationkit-for-divi' ),
                ),
                'default'        => 'center',
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
            ),

            'icon_gap'         => array(
                'label'          => esc_html__( 'Icon Gap', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define space between media and content', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '5px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
            ),
        );

        $design = array(
            'icon_bg'              => array(
                'label'          => esc_html__( 'Icon Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon background color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => $this->$et_accent_color,
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'mobile_options' => true,
            ),

            'icon_color'           => array(
                'label'          => esc_html__( 'Icon Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#000000',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'mobile_options' => true,
            ),

            'icon_size'            => array(
                'label'          => esc_html__( 'Icon Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon size.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '20px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 1000,
                ),
            ),

            'icon_padding'         => array(
                'label'          => esc_html__( 'Icon Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),

            'icon_margin'          => array(
                'label'          => esc_html__( 'Icon Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin for icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),

            'tooltip_bg'           => array(
                'label'          => esc_html__( 'Tooltip Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change tooltip background color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#333333',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'tooltip',
                'mobile_options' => true,
            ),

            'tooltip_text_color'   => array(
                'label'          => esc_html__( 'Tooltip Text Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change tooltip text color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#ffffff',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'tooltip',
                'mobile_options' => true,
            ),

            'tooltip_button_color' => array(
                'label'          => esc_html__( 'Tooltip Button Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change tooltip button color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#ffffff',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'tooltip',
                'mobile_options' => true,
            ),

            'tooltip_font_size'    => array(
                'label'          => esc_html__( 'Tooltip Font Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define tooltip font size', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '12px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'tooltip',
            ),

            'tooltip_button_size'  => array(
                'label'          => esc_html__( 'Tooltip button Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define tooltip button size', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '14px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'tooltip',
            ),

            'tooltip_padding'      => array(
                'label'          => esc_html__( 'Tooltip Wrapper Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for flip card tooltip wrapper', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'tooltip',
                'default'        => '2px|10px|2px|10px',
                'mobile_options' => true,
            ),
        );

        $items = array(
            'item_margin'  => array(
                'label'          => esc_html__( 'Item Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin for price image', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'list_item',
                'default'        => '0px|0px|10px|0px',
                'mobile_options' => true,
            ),

            'item_padding' => array(
                'label'          => esc_html__( 'Item Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for price image', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'list_item',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),
        );

        return array_merge( $layout, $design, $items );
    }

    public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                = array();
        $advanced_fields['text']        = false;
        $advanced_fields['text_shadow'] = array();
        $advanced_fields['fonts']       = array();

        // Flip card border
        $advanced_fields['borders']['list_item'] = array(
            'label_prefix' => esc_html__( 'List Item', 'divinationkit-for-divi' ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'list_item',
            'css'          => array(
                'main'      => array(
                    'border_radii'  => '%%order_class%% .dina_icon_list-item',
                    'border_styles' => '%%order_class%% .dina_icon_list-item',
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

        // icon border
        $advanced_fields['borders']['icon'] = array(
            'label_prefix'    => esc_html__( 'Icon', 'divinationkit-for-divi' ),
            'tab_slug'        => 'advanced',
            'toggle_slug'     => 'icon',
            'css'             => array(
                'main'      => array(
                    'border_radii'  => '%%order_class%% .dina_icon_list-icon i.dina_icon',
                    'border_styles' => '%%order_class%% .dina_icon_list-icon i.dina_icon',
                ),
                'important' => false,
            ),
            'depends_show_if' => array(
                'media_type' => 'icon',
            ),
            'defaults'        => array(
                'border_radii'  => 'on|0px|0px|0px|0px',
                'border_styles' => array(
                    'width' => '0px',
                    'color' => $et_accent_color,
                    'style' => 'solid',
                ),
            ),
        );

        $advanced_fields['fonts']['title'] = array(
            'label'            => esc_html__( 'Title', 'divinationkit-for-divi' ),
            'css'              => array(
                'main'      => '%%order_class%% .dina_icon_list-title',
                'important' => false,
            ),
            'header_level'     => array(
                'default' => 'h5',
            ),
            'font_size'        => array(
                'default' => '18px',
            ),
            'options_priority' => array(
                'header_text_color' => 9,
            ),
            'tab_slug'         => 'advanced',
            'sub_toggle'       => 'title',
            'line_height'      => array(
                'default' => '1.5em',
            ),
        );

        $advanced_fields['fonts']['description'] = array(
            'label'       => esc_html__( 'Description', 'divinationkit-for-divi' ),
            'css'         => array(
                'main'      => '%%order_class%% .dina_icon_list-description p',
                'important' => false,
            ),
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'description',
            'font_size'   => array(
                'default' => '14px',
            ),
            'line_height' => array(
                'default' => '1.2em',
            ),
        );

        return $advanced_fields;
    }

    public function render( $attrs, $content, $render_slug ) {

        $this->render_css( $render_slug );

        return sprintf(
            '<div class="dina_icon_list-container">
                <div class="dina_icon_list-items-wrapper">
                    %1$s
                </div>
            </div>',
            $this->content
        );
    }

    public function render_css( $render_slug ) {

        $this->dina_responsive_css( $render_slug, array(
            array(
                'option_slug' => 'horizontal_align',
                'property'    => 'justify-content',
                'selector'    => '%%order_class%% .dina_icon_list-item',
            ),

            array(
                'option_slug' => 'vertical_align',
                'property'    => 'align-items',
                'selector'    => '%%order_class%% .dina_icon_list-item',
            ),

            array(
                'option_slug' => 'icon_gap',
                'property'    => 'gap',
                'selector'    => '%%order_class%% .dina_icon_list-item',
            ),

            // Icon
            array(
                'option_slug' => 'icon_size',
                'property'    => 'font-size',
                'selector'    => '%%order_class%% .dina_icon_list-icon i.dina_icon',
            ),

            array(
                'option_slug' => 'icon_color',
                'property'    => 'color',
                'selector'    => '%%order_class%% .dina_icon_list-icon i.dina_icon',
            ),

            array(
                'option_slug' => 'icon_bg',
                'property'    => 'background',
                'selector'    => '%%order_class%% .dina_icon_list-icon i.dina_icon',
            ),

            array(
                'option_slug' => 'icon_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_icon_list-icon i.dina_icon',
            ),

            array(
                'option_slug' => 'icon_margin',
                'property'    => 'margin',
                'selector'    => '%%order_class%% .dina_icon_list-icon',
            ),

            array(
                'option_slug' => 'item_margin',
                'property'    => 'margin',
                'selector'    => '%%order_class%% .dina_icon_list_child',
                'important'   => true,
            ),

            array(
                'option_slug' => 'item_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_icon_list_child',
                'important'   => true,
            ),

            array(
                'option_slug' => 'tooltip_bg',
                'property'    => 'background',
                'selector'    => '%%order_class%% .dina_tooltip-wrapper',
            ),
            array(
                'option_slug' => 'tooltip_bg',
                'property'    => 'border-top-color',
                'selector'    => '%%order_class%% .dina_tooltip-wrapper::after',
            ),
            array(
                'option_slug' => 'tooltip_text_color',
                'property'    => 'color',
                'selector'    => '%%order_class%% .dina_tooltip-wrapper',
            ),
            array(
                'option_slug' => 'tooltip_font_size',
                'property'    => 'font-size',
                'selector'    => '%%order_class%% .dina_tooltip-wrapper',
            ),
            array(
                'option_slug' => 'tooltip_button_color',
                'property'    => 'color',
                'selector'    => '%%order_class%% .dina_tooltip-trigger::after',
            ),
            array(
                'option_slug' => 'tooltip_button_size',
                'property'    => 'font-size',
                'selector'    => '%%order_class%% .dina_tooltip-trigger::after',
            ),
            array(
                'option_slug' => 'tooltip_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_tooltip-wrapper',
            ),
        ) );

    }
}

new dina_Icon_List();