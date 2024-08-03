<?php

class DINA_Business_Hour extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . '/modules/business-hour/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {

        $this->name        = esc_html__( 'Business Hour', 'divinationkit-for-divi' );
        $this->plural      = esc_html__( 'Business Hours', 'divinationkit-for-divi' );
        $this->slug        = 'dina_business_hours';
        $this->child_slug  = 'dina_business_hour_child';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';
        $this->icon_path   = $this->dina_module_icon( 'business-hour' );

        $this->settings_modal_toggles = array(

            'advanced' => array(
                'toggles' => array(
                    'texts'     => array(
                        'title'             => esc_html__( 'Day & Time', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'day'  => array(
                                'name' => esc_html__( 'Day', 'divinationkit-for-divi' ),
                            ),
                            'time' => array(
                                'name' => esc_html__( 'Time', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),
                    'separator' => esc_html__( 'Separator', 'divinationkit-for-divi' ),
                    'item'      => esc_html__( 'Business Hour Item', 'divinationkit-for-divi' ),
                ),
            ),
        );
    }

    public function get_fields() {
        $separator = array(
            'separator_style'    => array(
                'label'          => esc_html__( 'Separator Style', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the separator style', 'divinationkit-for-divi' ),
                'type'           => 'select',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
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

            'separator_color'    => array(
                'label'          => esc_html__( 'Separator Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the separator color', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#333333',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'hover'          => 'tabs',
                'mobile_options' => true,

            ),

            'separator_weight'   => array(
                'label'          => esc_html__( 'Separator Weight', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define separator weight', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '1px',
                'range_settings' => array(
                    'min'  => 1,
                    'step' => 1,
                    'max'  => 25,
                ),
                'default'        => '1px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'mobile_options' => true,
            ),

            'separator_gap'      => array(
                'label'          => esc_html__( 'Separator Space', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define space between day, time and separator', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 250,
                ),
                'default'        => '15px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'mobile_options' => true,
            ),

            'separator_position' => array(
                'label'          => esc_html__( 'Separator Vertical Align', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the separator positions', 'divinationkit-for-divi' ),
                'type'           => 'select',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'options'        => array(
                    'flex-start' => esc_html__( 'Top', 'divinationkit-for-divi' ),
                    'center'     => esc_html__( 'Vertically Center', 'divinationkit-for-divi' ),
                    'flex-end'   => esc_html__( 'Bottom', 'divinationkit-for-divi' ),
                ),
                'default'        => 'center',
                'mobile_options' => true,
            ),
        );

        return array_merge( $separator );
    }

    public function get_advanced_fields_config() {
        $advanced_fields            = array();
        $advanced_fields['text']    = false;
        $advanced_fields['filters'] = false;

        $advanced_fields['fonts']['day'] = array(
            'label_prefix' => esc_html__( 'Day', 'divinationkit-for-divi' ),
            'css'          => array(
                'main'      => '%%order_class%% .dina_business_hour-day',
                'important' => 'all',
            ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'texts',
            'sub_toggle'   => 'day',
            'font_size'    => array(
                'default' => '14px',
            ),
            'line_height'  => array(
                'default' => '1.2em',
            ),
        );

        $advanced_fields['fonts']['time'] = array(
            'label'       => esc_html__( 'Description', 'divinationkit-for-divi' ),
            'css'         => array(
                'main'      => '%%order_class%% .dina_business_hour-time',
                'important' => 'all',
            ),
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'texts',
            'sub_toggle'  => 'time',
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

        $separator_style  = $this->props['separator_style'];
        $separator_weight = $this->props['separator_weight'];
        $separator_color  = $this->props['separator_color'];

        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector'    => '%%order_class%% .dina_business_hour-separator',
                'declaration' => sprintf(
                    'border-top-style: %1$s; border-top-width: %2$s; border-top-color: %3$s',
                    $separator_style,
                    $separator_weight,
                    $separator_color
                ),
            )
        );

        $this->dina_responsive_css( $render_slug, array(
            array(
                'option_slug' => 'separator_gap',
                'property'    => 'gap',
                'selector'    => '%%order_class%% .dina_business_hour-item',
            ),
            array(
                'option_slug' => 'separator_position',
                'property'    => 'align-items',
                'selector'    => '%%order_class%% .dina_business_hour-item',
            ),

        ) );

        return sprintf(
            '<div class="dina_business_hour-container">
                <div class="dina_business_hour-wrapper">
                    %1$s
                </div>
            </div>',
            $this->content,
        );
    }
}

new DINA_Business_Hour();