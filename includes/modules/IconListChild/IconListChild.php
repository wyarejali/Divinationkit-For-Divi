<?php

class DINA_Icon_List_Child extends DINA_Module_Core {

    public function init() {

        $this->name                     = esc_html__( 'Icon List Item', 'divinationkit-for-divi' );
        $this->type                     = 'child';
        $this->slug                     = 'dina_icon_list_child';
        $this->child_title_var          = 'title';
        $this->child_title_fallback_var = 'title';
        $this->vb_support               = 'on';

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'content' => esc_html__( 'Content', 'divinationkit-for-divi' ),
                    'tooltip' => esc_html__( 'Tooltip', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'icon' => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                    'text' => esc_html__( 'Description', 'divinationkit-for-divi' ),
                ),
            ),
        );
    }

    public function get_fields() {

        return array(
            'icon'             => array(
                'label'       => esc_html__( 'Select Icon', 'divinationkit-for-divi' ),
                'type'        => 'select_icon',
                'toggle_slug' => 'content',
                'tab_slug'    => 'general',
            ),

            'title'            => array(
                'label'           => esc_html__( 'Title', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define icon list title.', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'toggle_slug'     => 'content',
                'dynamic_content' => 'text',
            ),

            'description'      => array(
                'label'           => esc_html__( 'Description', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define icon list description', 'divinationkit-for-divi' ),
                'type'            => 'tiny_mce',
                'toggle_slug'     => 'content',
                'dynamic_content' => 'text',
            ),

            'use_tooltip'      => array(
                'label'           => esc_html__( 'Use Tooltip', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can choose whether tooltip will be display or not', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'tooltip',
            ),

            'tooltip_text'     => array(
                'label'           => esc_html__( 'Tooltip Text', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define tooltip text and this will display whenever hover the info icon', 'divinationkit-for-divi' ),
                'type'            => 'textarea',
                'toggle_slug'     => 'tooltip',
                'dynamic_content' => 'text',
                'show_if'         => array(
                    'use_tooltip' => 'on',
                ),
            ),

            'tooltip_position' => array(
                'label'       => esc_html__( 'Tooltip Position', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Here you can define tooltip position like (top, bottom, left, right)', 'divinationkit-for-divi' ),
                'type'        => 'select',
                'options'     => array(
                    'top'    => esc_html__( 'Top', 'divinationkit-for-divi' ),
                    'right'  => esc_html__( 'Right', 'divinationkit-for-divi' ),
                    'bottom' => esc_html__( 'Bottom', 'divinationkit-for-divi' ),
                    'left'   => esc_html__( 'Left', 'divinationkit-for-divi' ),
                ),
                'default'     => 'top',
                'toggle_slug' => 'tooltip',
                'show_if'     => array(
                    'use_tooltip' => 'on',
                ),
            ),

        );
    }

    public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields = array();

        $advanced_fields['fonts']['title'] = array(
            'label'            => esc_html__( 'Title', 'divinationkit-for-divi' ),
            'css'              => array(
                'main'      => '%%order_class%% .dina_icon_list-title',
                'important' => false,
            ),
            'header_level'     => array(
                'default' => 'h4',
            ),
            'font_size'        => array(
                'default' => '18px',
            ),
            'options_priority' => array(
                'header_text_color' => 9,
            ),
            'tab_slug'         => 'advanced',
            'toggle_slug'      => 'title',
            'line_height'      => array(
                'default' => '1.5em',
            ),
        );

        $advanced_fields['fonts']['description'] = array(
            'label'       => esc_html__( 'Description', 'divinationkit-for-divi' ),
            'css'         => array(
                'main'      => '%%order_class%% .dina_icon_list-description p',
                'important' => true,
            ),
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'text',
            'font_size'   => array(
                'default' => '16px',
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

    public function render_tooltip() {

        $tooltip_text     = $this->props['tooltip_text'];
        $tooltip_position = $this->props['tooltip_position'];

        return sprintf(
            '<div class="dina_tooltip_container">
                <span class="dina_tooltip-trigger"></span>
                <div class="dina_tooltip-wrapper dina_tooltip-%2$s">
                    <div class="dina_tooltip-text">%1$s</div>
                </div>
            </div>',
            $tooltip_text,
            $tooltip_position,
        );

    }

    public function render_icon() {

        return sprintf(
            '<div class="dina_icon_list-icon">
                <i class="dina_icon">%1$s</i>
            </div>',
            $this->dina_render_icon( 'icon' )
        );

    }

    public function render_title() {

        $heading       = $this->props['title'];
        $heading_level = et_pb_process_header_level( $this->props['title_level'], 'h5' );
        $content       = '';

        // If use tooltip
        $use_tooltip = $this->props['use_tooltip'];

        if ( !empty( $heading ) ) {

            if ( $use_tooltip === 'on' ) {
                $content = sprintf(
                    '<div class="dina_icon_list-use-tooltip">
                        <%1$s class="dina_icon_list-title">%2$s</%1$s>
                        %3$s
                    </div>',
                    $heading_level,
                    $heading,
                    $this->render_tooltip(),
                );
            } else {
                $content = sprintf(
                    '<%1$s class="dina_icon_list-title">%2$s</%1$s>',
                    $heading_level,
                    $heading,
                );
            }

        }

        return $content;
    }

    public function render_description() {

        return sprintf(
            '<div class="dina_icon_list-description">
                %1$s
            </div>',
            $this->render_MCE( $this->props['description'] )
        );
    }

    public function render( $attrs, $content, $render_slug ) {

        $this->render_css( $render_slug );

        return sprintf(
            '<div class="dina_icon_list-item">
                %1$s
                <div class="dina_icon_list-content">
                    %2$s
                    %3$s
                </div>
            </div>',
            $this->render_icon(),
            $this->render_title(),
            $this->render_description()
        );
    }

    public function render_css( $render_slug ) {
        // Generate icon style
        $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dina_icon_list-icon i.dina_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );

    }
}

new dina_Icon_List_Child();