<?php

class DINA_Business_Hour_Child extends DINA_Module_Core {

    public function init() {
        $this->name                     = esc_html__( 'Business Hour', 'divinationkit-for-divi' );
        $this->slug                     = 'dina_business_hour_child';
        $this->vb_support               = 'on';
        $this->main_css_element         = '%%order_class%%';
        $this->type                     = 'child';
        $this->child_title_var          = 'admin_title';
        $this->child_title_fallback_var = 'day';

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'content' => esc_html__( 'Content', 'divinationkit-for-divi' ),
                ),
            ),
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
                    'border'    => esc_html__( 'Border', 'divinationkit-for-divi' ),
                ),
            ),
        );
    }

    public function get_fields() {
        $content = array(
            'day'  => array(
                'label'       => esc_html__( 'Day', 'addons-for-divi' ),
                'description' => esc_html__( 'Define the day your for business hour.', 'addons-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'content',
            ),

            'time' => array(
                'label'       => esc_html__( 'Time', 'addons-for-divi' ),
                'description' => esc_html__( 'Define the time your for business hour.', 'addons-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'content',
            ),
        );

        $separator = array(
            'hide_separator'     => array(
                'label'           => esc_html__( 'Hide Separator', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'content',
            ),

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
                'show_if'        => array(
                    'hide_separator' => 'off',
                ),
            ),

            'separator_color'    => array(
                'label'          => esc_html__( 'Separator Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the separator color', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'hover'          => 'tabs',
                'mobile_options' => true,
                'show_if'        => array(
                    'hide_separator' => 'off',
                ),

            ),

            'separator_weight'   => array(
                'label'          => esc_html__( 'Separator Weight', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define separator weight', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'  => 1,
                    'step' => 1,
                    'max'  => 25,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'mobile_options' => true,
                'show_if'        => array(
                    'hide_separator' => 'off',
                ),
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
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'mobile_options' => true,
                'show_if'        => array(
                    'hide_separator' => 'off',
                ),
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
                'show_if'        => array(
                    'hide_separator' => 'off',
                ),
            ),
        );

        return array_merge( $content, $separator );
    }

    public function get_advanced_fields_config() {
        $advanced_fields            = array();
        $advanced_fields['text']    = false;
        $advanced_fields['filters'] = false;

        $advanced_fields['fonts']['day'] = array(
            'label_prefix' => esc_html__( 'Day', 'divinationkit-for-divi' ),
            'css'          => array(
                'main'      => '.dina_business_hour-container %%order_class%% .dina_business_hour-day',
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
                'main'      => '.dina_business_hour-container %%order_class%% .dina_business_hour-time',
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

        $advanced_fields['margin_padding'] = array(
            'css' => array(
                'important' => 'all',
            ),
        );

        return $advanced_fields;

    }

    public function render_separator() {

        if ( $this->props['hide_separator'] === 'off' ) {
            return '<div class="dina_business_hour-separator"></div>';
        }
    }

    public function render( $attrs, $content, $render_slug ) {

        $separator_style  = $this->props['separator_style'];
        $separator_weight = $this->props['separator_weight'];
        $separator_color  = $this->props['separator_color'];
        $hide_separator   = $this->props['hide_separator'];

        if ( $hide_separator === 'off' ) {
            ET_Builder_Element::set_style(
                $render_slug,
                array(
                    'selector'    => '.dina_business_hour-container %%order_class%% .dina_business_hour-separator',
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
                    'selector'    => '.dina_business_hour-container %%order_class%% .dina_business_hour-item',
                ),
                array(
                    'option_slug' => 'separator_position',
                    'property'    => 'align-items',
                    'selector'    => '.dina_business_hour-container %%order_class%% .dina_business_hour-item',
                ),
            ) );
        }

        return sprintf(
            '<div class="dina_business_hour-item">
                <div class="dina_business_hour-day">%1$s</div>
                %2$s
                <div class="dina_business_hour-time">%3$s</div>
            </div>',
            $this->props['day'],
            $this->render_separator(),
            $this->props['time'],
        );

    }

}

new DINA_Business_Hour_Child();