<?php

class DINA_Rating extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . '/modules/rating/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {

        $this->name        = esc_html__( 'Rating', 'divinationkit-for-divi' );
        $this->slug        = 'dina_rating';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';
        $this->icon_path   = $this->dina_module_icon( 'rating' );

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'content' => esc_html__( 'Content', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'star'          => esc_html__( 'Stars', 'divinationkit-for-divi' ),
                    'rating_number' => esc_html__( 'Rating Number', 'divinationkit-for-divi' ),
                    'rating_title'  => esc_html__( 'Rating Title', 'divinationkit-for-divi' ),
                ),
            ),
        );
    }

    public function get_fields() {

        $rating = array(
            'rating_style' => array(
                'label'       => esc_html__( 'Choose Rating Style', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Here you can choose different kind of styles', 'divinationkit-for-divi' ),
                'type'        => 'select',
                'options'     => array(
                    'only_star'   => esc_html__( 'Only Stars', 'divinationkit-for-divi' ),
                    'only_number' => esc_html__( 'Only Number', 'divinationkit-for-divi' ),
                    'both'        => esc_html__( 'Both Start and Number', 'divinationkit-for-divi' ),
                ),
                'default'     => 'both',
                'toggle_slug' => 'content',
            ),

            'rating_scale' => array(
                'label'          => esc_html__( 'Rating Scale', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default'        => '5',
                'default_unit'   => '',
                'allowed_units'  => array( '' ),
                'validate_unit'  => false,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 10,
                ),
                'toggle_slug'    => 'content',
            ),

            'rating'       => array(
                'label'          => esc_html__( 'Rating', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default'        => '5',
                'default_unit'   => '',
                'allowed_units'  => array( '' ),
                'validate_unit'  => false,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => '.1',
                    'max'  => 10,
                ),
                'toggle_slug'    => 'content',
            ),

            'use_title'    => array(
                'label'           => esc_html__( 'Use Title', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can choose whether rating title will be display or not', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'on',
                'toggle_slug'     => 'content',
            ),

            'rating_title' => array(
                'label'       => esc_html__( 'Rating Title', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Define rating title', 'divinationkit-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'content',
                'show_if'     => array(
                    'use_title' => 'on',
                ),
            ),
        );

        $design = array(
            'star_color'      => array(
                'label'          => esc_html__( 'Star Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change star color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#a5a5a5',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'star',
                'mobile_options' => true,
                'hover'          => 'tabs',
            ),

            'fill_star_color' => array(
                'label'          => esc_html__( 'Active Star Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change filled/active star color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#ffb600',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'star',
                'mobile_options' => true,
                'hover'          => 'tabs',
            ),

            'star_size'       => array(
                'label'          => esc_html__( 'star Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change your back side star size.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '20px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'star',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 1000,
                ),
            ),
        );

        return array_merge( $rating, $design );
    }

    public function get_advanced_fields_config() {
        $advanced_fields            = array();
        $advanced_fields['text']    = false;
        $advanced_fields['filters'] = false;

        $advanced_fields['fonts']['rating_number'] = array(
            'label'       => esc_html__( 'Rating Number', 'divinationkit-for-divi' ),
            'css'         => array(
                'main'      => '%%order_class%% .dina_rating-number',
                'important' => true,
            ),
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'rating_number',
            'font_size'   => array(
                'default' => '16px',
            ),
            'line_height' => array(
                'default' => '1.2em',
            ),
        );

        $advanced_fields['fonts']['rating_title'] = array(
            'label'           => esc_html__( 'Rating Title', 'divinationkit-for-divi' ),
            'css'             => array(
                'main'      => '%%order_class%% .dina_rating-title',
                'important' => true,
            ),
            'header_level'    => array(
                'default' => 'h5',
            ),
            'hide_text_align' => true,
            'font_size'       => array(
                'default' => '16px',
            ),
            'tab_slug'        => 'advanced',
            'toggle_slug'     => 'rating_title',
            'line_height'     => array(
                'default' => '1.5em',
            ),
        );

        return $advanced_fields;
    }

    public function render_rating() {

        $rating_style = $this->props['rating_style'];

        $rating_scale = $this->props['rating_scale'];
        $rating       = $this->props['rating'];

        if ( $rating_style === 'only_star' ) {
            return sprintf(
                '<div class="dina_rating-wrapper">
                    <div class="dina_rating-star-wrapper">
                        %1$s
                    </div>
                </div>',
                $this->render_stars( $rating, $rating_scale ),
            );
        }

        if ( $rating_style === 'only_number' ) {
            return sprintf(
                '<div class="dina_rating-wrapper">
                    <div class="dina_rating-number">
                        (%1$s/%2$s ★)
                    </div>
                </div>',
                $rating,
                $rating_scale
            );
        }

        if ( $rating_style === 'both' ) {

            return sprintf(
                '<div class="dina_rating-wrapper">
                    <div class="dina_rating-star-wrapper">
                        %1$s
                    </div>
                    <div class="dina_rating-number">
                        (%2$s/%3$s)
                    </div>
                </div>',
                $this->render_stars( $rating, $rating_scale ),
                $rating,
                $rating_scale,
            );
        }
    }

    public function render_rating_title() {

        $use_title     = $this->props['use_title'];
        $heading       = $this->props['rating_title'];
        $heading_level = et_pb_process_header_level( $this->props['rating_title_level'], 'h5' );

        if ( !empty( $heading ) && $use_title === 'on' ) {

            return sprintf(
                '<%1$s class="dina_rating-title">%2$s</%1$s>',
                $heading_level,
                $heading
            );
        }
    }

    public function render( $attrs, $content, $render_slug ) {

        $this->render_css( $render_slug );

        return sprintf(
            '<div class="dina_rating-container">
                %1$s
                %2$s
            </div>',
            $this->render_rating(),
            $this->render_rating_title(),
        );
    }

    public function render_css( $render_slug ) {

        $rating_scale = $this->props['rating_scale'];
        $rating       = $this->props['rating'];
        $fill_star    = ( 100 * floatval( $rating ) ) / floatval( $rating_scale );

        ET_Builder_Element::set_style( $render_slug, array(
            'selector'    => '%%order_class%% .dina_rating-star-filled',
            'declaration' => "width: {$fill_star}%;",
        ) );

        $this->dina_responsive_css( $render_slug, array(
            array(
                'option_slug' => 'star_color',
                'property'    => 'color',
                'selector'    => '%%order_class%% .dina_rating-star',
            ),
            array(
                'option_slug' => 'star_size',
                'property'    => 'font-size',
                'selector'    => '%%order_class%% .dina_rating-star',
            ),
            array(
                'option_slug' => 'fill_star_color',
                'property'    => 'color',
                'selector'    => '%%order_class%% .dina_rating-star-full, %%order_class%% .dina_rating-star-1::before, %%order_class%% .dina_rating-star-2::before, %%order_class%% .dina_rating-star-3::before, %%order_class%% .dina_rating-star-4::before, %%order_class%% .dina_rating-star-5::before, %%order_class%% .dina_rating-star-6::before, %%order_class%% .dina_rating-star-7::before, %%order_class%% .dina_rating-star-8::before, %%order_class%% .dina_rating-star-9::before, %%order_class%% .dina_rating-star-10::before',
                'important'   => true,
            ),
        ) );
    }
}

new DINA_Rating();