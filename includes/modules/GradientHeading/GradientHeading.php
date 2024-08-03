<?php

class DINA_Gradient_Heading extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . 'modules/gradient-heading/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {
        $this->name        = esc_html__( 'Gradient Heading', 'divinationkit-for-divi' );
        $this->slug        = 'dina_gradient_heading';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';
        $this->icon_path   = $this->dina_module_icon( 'gradient-heading' );

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'content' => esc_html__( 'Content', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'gradient_text'  => esc_html__( 'Gradient Text', 'divinationkit-for-divi' ),
                    'gradient_color' => esc_html__( 'Gradient Color', 'divinationkit-for-divi' ),
                    'hover_effect'   => esc_html__( 'Hover Effect', 'divinationkit-for-divi' ),
                ),
            ),
        );
    }

    public function get_fields() {
        return array(
            'title'            => array(
                'label'           => esc_html__( 'Title', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define gradient heading text', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'dynamic_content' => 'text',
                'toggle_slug'     => 'content',
            ),

            'primary_color'    => array(
                'label'          => esc_html__( 'Primary Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change gradient primary color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#01564D',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'gradient_color',
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),
            'secondary_color'  => array(
                'label'          => esc_html__( 'Secondary Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change gradient secondary color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#111111',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'gradient_color',
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'gradient_type'    => array(
                'label'           => esc_html__( 'Select Gradient Type', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Select gradient type (linear/radial) for gradient heading', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'basic_option',
                'options'         => array(
                    'linear' => esc_html__( 'Leaner', 'divinationkit-for-divi' ),
                    'radial' => esc_html__( 'Radial', 'divinationkit-for-divi' ),
                ),
                'default'         => 'linear',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_color',
            ),

            'linear_direction' => array(
                'label'           => esc_html__( 'Gradient direction', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Adjust the direction of the gradient for the title text.', 'divinationkit-for-divi' ),
                'type'            => 'range',
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 360,
                ),
                'default'         => '90deg',
                'fixed_unit'      => 'deg',
                'validate_unit'   => true,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_color',
                'show_if'         => array(
                    'gradient_type' => 'linear',
                ),
            ),

            'radial_direction' => array(
                'label'       => esc_html__( 'Radial Direction', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Adjust the direction of the gradient for the title text.', 'divinationkit-for-divi' ),
                'type'        => 'select',
                'options'     => array(
                    'circle at center'       => esc_html__( 'Center', 'divinationkit-for-divi' ),
                    'circle at left'         => esc_html__( 'Top Left', 'divinationkit-for-divi' ),
                    'circle at top'          => esc_html__( 'Top', 'divinationkit-for-divi' ),
                    'circle at top right'    => esc_html__( 'Top Right', 'divinationkit-for-divi' ),
                    'circle at right'        => esc_html__( 'Right', 'divinationkit-for-divi' ),
                    'circle at bottom right' => esc_html__( 'Bottom Right', 'divinationkit-for-divi' ),
                    'circle at bottom'       => esc_html__( 'Bottom', 'divinationkit-for-divi' ),
                    'circle at bottom left'  => esc_html__( 'Bottom Left', 'divinationkit-for-divi' ),
                    'circle at left'         => esc_html__( 'Left', 'divinationkit-for-divi' ),

                ),
                'default'     => 'circle at center',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'gradient_color',
                'show_if'     => array(
                    'gradient_type_text' => 'radial-gradient',
                ),
            ),

            'start_position'   => array(
                'label'           => esc_html__( 'Start Position', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Adjust the position for the beginning of the gradient color.', 'divinationkit-for-divi' ),
                'type'            => 'range',
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '0%',
                'fixed_unit'      => '%',
                'validate_unit'   => true,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_color',
            ),

            'end_position'     => array(
                'label'           => esc_html__( 'End Position', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Adjust the position for the ending of the gradient color.', 'divinationkit-for-divi' ),
                'type'            => 'range',
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '100%',
                'fixed_unit'      => '%',
                'validate_unit'   => true,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_color',
            ),

            // Hover Effect
            'use_hover_effect' => array(
                'label'       => esc_html__( 'Use Hover Effect', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Select if you would like to use text hover effect', 'divinationkit-for-divi' ),
                'type'        => 'yes_no_button',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'hover_effect',
                'options'     => array(
                    'off' => esc_html__( 'Off', 'divinationkit-for-divi' ),
                    'on'  => esc_html__( 'On', 'divinationkit-for-divi' ),
                ),
                'default'     => 'off',

            ),

            'hover_effect'     => array(
                'label'           => esc_html__( 'Select Hover Effect', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Choose hover effect for gradient heading text', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'basic_option',
                'options'         => array(
                    'dina-hover-grow'                   => esc_html__( 'Grow', 'divinationkit-for-divi' ),
                    'dina-hover-shrink'                 => esc_html__( 'Shrink', 'divinationkit-for-divi' ),
                    'dina-hover-pulse'                  => esc_html__( 'Pulse', 'divinationkit-for-divi' ),
                    'dina-hover-pulse-grow'             => esc_html__( 'Pulse Gow', 'divinationkit-for-divi' ),
                    'dina-hover-pulse-shrink'           => esc_html__( 'Pulse Shrink', 'divinationkit-for-divi' ),
                    'dina-hover-pop'                    => esc_html__( 'Pop', 'divinationkit-for-divi' ),
                    'dina-hover-push'                   => esc_html__( 'Push', 'divinationkit-for-divi' ),
                    'dina-hover-bounce-in'              => esc_html__( 'Bounce In', 'divinationkit-for-divi' ),
                    'dina-hover-bounce-out'             => esc_html__( 'Bounce Out', 'divinationkit-for-divi' ),
                    'dina-hover-rotate'                 => esc_html__( 'Rotate', 'divinationkit-for-divi' ),
                    'dina-hover-rotate-grow'            => esc_html__( 'Rotate Grow', 'divinationkit-for-divi' ),
                    'dina-hover-float'                  => esc_html__( 'Float', 'divinationkit-for-divi' ),
                    'dina-hover-sink'                   => esc_html__( 'Sink', 'divinationkit-for-divi' ),
                    'dina-hover-bob'                    => esc_html__( 'Bob', 'divinationkit-for-divi' ),
                    'dina-hover-hang'                   => esc_html__( 'Hang', 'divinationkit-for-divi' ),
                    'dina-hover-skew-forward'           => esc_html__( 'Skew Forward', 'divinationkit-for-divi' ),
                    'dina-hover-skew-backward'          => esc_html__( 'Skew Backward', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-horizontal'      => esc_html__( 'Wobble Horizontal', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-vertical'        => esc_html__( 'Wobble Vertical', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-to-bottom-right' => esc_html__( 'Wobble to Bottom Right', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-to-top-right'    => esc_html__( 'Wobble to Top Right', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-top'             => esc_html__( 'Wobble Top', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-bottom'          => esc_html__( 'Wobble Bottom', 'divinationkit-for-divi' ),
                    'dina-hover-wobble-skew'            => esc_html__( 'Wobble Skew', 'divinationkit-for-divi' ),
                    'dina-hover-buzz'                   => esc_html__( 'Buzz', 'divinationkit-for-divi' ),
                    'dina-hover-buzz-out'               => esc_html__( 'Buzz Out', 'divinationkit-for-divi' ),
                    'dina-hover-forward'                => esc_html__( 'Forward', 'divinationkit-for-divi' ),
                    'dina-hover-backward'               => esc_html__( 'Backward', 'divinationkit-for-divi' ),
                ),
                'default'         => 'dina-hover-grow',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'hover_effect',
                'show_if'         => array(
                    'use_hover_effect' => 'on',
                ),
            ),

        );
    }

    public function get_advanced_fields_config() {

        $advanced_fields                = array();
        $advanced_fields['text']        = false;
        $advanced_fields['text_shadow'] = array();
        $advanced_fields['fonts']       = array();

        $advanced_fields['fonts']['title'] = array(
            'label'           => esc_html__( 'Title', 'divinationkit-for-divi' ),
            'css'             => array(
                'main'      => '%%order_class%% .dina_gradient_heading-title',
                'important' => false,
            ),
            'header_level'    => array(
                'default' => 'h3',
            ),
            'font_size'       => array(
                'default' => '22px',
            ),
            'hide_text_align' => true,
            'hide_text_color' => true,
            'tab_slug'        => 'advanced',
            'toggle_slug'     => 'gradient_text',
            'line_height'     => array(
                'default' => '1.5em',
            ),
        );

        return $advanced_fields;
    }

    public function render_title() {

        $heading       = $this->props['title'];
        $heading_level = et_pb_process_header_level( $this->props['title_level'], 'h3' );

        if ( !empty( $heading ) ) {

            return sprintf(
                '<%1$s class="dina_gradient_heading-title">%2$s</%1$s>',
                $heading_level,
                $heading
            );
        }
    }

    public function render( $attrs, $content, $render_slug ) {

        wp_enqueue_style( 'dina-2d-hover-effects' );
        $this->render_css( $render_slug );

        $is_hover_effect = $this->props['use_hover_effect'] === 'on' ? true : false;
        $hover_effect    = $this->props['hover_effect'];

        return sprintf(
            '<div class="dina_gradient_heading-container %2$s">
                %1$s
            </div>',
            $this->render_title(),
            $is_hover_effect ? $hover_effect : ''
        );

    }

    public function render_css( $render_slug ) {
        $gradient_type    = $this->props['gradient_type'];
        $linear_direction = $this->props['linear_direction'];
        $radial_direction = $this->props['radial_direction'];
        $start_position   = $this->props['start_position'];
        $end_position     = $this->props['end_position'];

        $primary_color   = $this->props['primary_color'];
        $secondary_color = $this->props['secondary_color'];

        $declaration = '';

        if ( $gradient_type === 'linear' ) {
            $declaration = "background: linear-gradient({$linear_direction}, {$primary_color} {$start_position}, {$secondary_color} {$end_position} );";
        }

        if ( $gradient_type === 'radial' ) {
            $declaration = "background: radial-gradient({$radial_direction}, {$primary_color} {$start_position}, {$secondary_color} {$end_position} );";
        }

        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => "%%order_class%% .dina_gradient_heading-title",
            'declaration' => "{$declaration} -webkit-background-clip: text; -webkit-text-fill-color: transparent;",
        ) );
    }
}

new DINA_Gradient_Heading();
