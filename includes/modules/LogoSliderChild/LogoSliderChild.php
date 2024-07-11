<?php

class DINA_Logo_Slider_Child extends DINA_Module_Core {

    public function init() {
        $this->name                     = esc_html__( 'Price Item', 'divinationkit-for-divi' );
        $this->type                     = 'child';
        $this->slug                     = 'dina_logo_slider_child';
        $this->child_title_var          = 'Slider Item';
        $this->child_title_fallback_var = 'Slider Item';
        $this->vb_support               = 'on';

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => esc_html__( 'Content', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'image'                     => esc_html__( 'Logo Settings', 'divinationkit-for-divi' ),
                ),
            ),
        );
    }

    public function get_fields() {
        return array(
            'image'                  => array(
                'label'              => esc_html__( 'Image', 'divinationkit-for-divi' ),
                'description'        => esc_html__( 'Select your logo image as a slider child', 'divinationkit-for-divi' ),
                'type'               => 'upload',
				'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'divinationkit-for-divi' ),
                'choose_text'        => esc_attr__('Choose an Image', 'divinationkit-for-divi' ),
                'update_text'        => esc_attr__('Update Image', 'divinationkit-for-divi' ),
                'toggle_slug'        => 'content',
                'dynamic_content'    => 'image',
                'data_type'          => 'image',
                'mobile_options'     => true,
            ),

            'image_alt'              => array(
                'label'              => esc_html__( 'Image Alt Text', 'divinationkit-for-divi' ),
                'description'        => esc_html__( 'Define the front side image alt text for your flip box.', 'divinationkit-for-divi' ),
                'type'               => 'text',
                'toggle_slug'        => 'content',
            ),

            'image_settings'         => array(
                'label'              => esc_html__('Logo Width', 'divinationkit-for-divi'),
                'description'        => esc_html__('Adjust the width of the image.', 'divinationkit-for-divi'),
                'type'               => 'range',
                'option_category'    => 'layout',
                'tab_slug'           => 'advanced',
                'toggle_slug'        => 'image',
                'allowed_units'      => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default_unit'       => '%',
                'allow_empty'        => true,
                'range_settings'     => array(
                    'min'            => '0',
                    'max'            => '100',
                    'step'           => '1',
                ),
                'mobile_options'     => true,
            )

        );
    }

    public function get_advanced_fields_config() {
        $advanced_fields                   = array();
        $advanced_fields[ 'text' ]         = false;
        $advanced_fields[ 'text_shadow' ]  = false;
        $advanced_fields[ 'fonts' ]        = false;

        // Flip card border
        $advanced_fields['borders']['card'] = array(
			'toggle_slug' => 'border',
			'css'         => array(
				'main'      => array(
					'border_radii'  => '%%order_class%% .dina_logo_slider-item',
					'border_styles' => '%%order_class%% .dina_logo_slider-item',
				),
				'important' => false,
			),
			'defaults'    => array(
				'border_radii'  => 'on|0px|0px|0px|0px',
				'border_styles' => array(
					'width' => '0px',
					'color' => '#333333',
					'style' => 'solid',
				),
			),
		);
    }

    public function render($attrs, $render_slug, $content) {

        return sprintf(
            '<div class="dina_logo_slider-img-wrapper">
                <img class="dina_logo_slider-item" src="%1$s" alt="%2$s"/>
            </div>',
            $this->props['image'],
            $this->props['image_alt']
        );
    }
}

new dina_Logo_Slider_Child();