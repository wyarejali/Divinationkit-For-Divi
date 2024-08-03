<?php

class DINA_PriceList extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . 'modules/price-list/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {

        $this->name        = esc_html__( 'Price List', 'divinationkit-for-divi' );
        $this->icon_path   = $this->dina_module_icon('price-list');
        $this->slug        = 'dina_pricelist';
        $this->child_slug  = 'dina_pricelist_child';
        $this->child_item_text = esc_html__( 'Price Item', 'divinationkit-for-divi' );
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => esc_html__( 'Content', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'layout'                => esc_html__( 'Layout', 'divinationkit-for-divi' ),
                    'icon'                  => esc_html__( 'Price Icon', 'divinationkit-for-divi' ),
                    'image'                 => esc_html__( 'Price Image', 'divinationkit-for-divi' ),
                    'item'                  => esc_html__( 'List Item', 'divinationkit-for-divi' ),
                    'content'               => array(
                        'title'             => esc_html__( 'Price List Texts', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'title'         => array(
                                'name'      => esc_html__( 'Title', 'divinationkit-for-divi' ),
                            ),
                            'description'   => array(
                                'name'      => esc_html__( 'Description', 'divinationkit-for-divi' ),
                            ),
                            'price'         => array(
                                'name'      => esc_html__( 'Price', 'divinationkit-for-divi' ),
                            ),
                        )
                    ),
                ),
            ),
        );

        $this->custom_css_fields = array(
			'separator'     => array(
				'label'        => esc_html__( 'Divider', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_pricelist-content .dina_pricelist-divider',
            ),
			'icon_wrapper'  => array(
				'label'        => esc_html__( 'Icon Wrapper', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_pricelist-icon',
            ),
			'icon'          => array(
				'label'        => esc_html__( 'Icon', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_pricelist-icon i.dina_icon',
            ),
			'image_wrapper' => array(
				'label'        => esc_html__( 'Image Wrapper', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_pricelist-image',
            ),
			'image'         => array(
				'label'        => esc_html__( 'Image', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_pricelist-image img',
            ),
			'title'         => array(
				'label'        => esc_html__( 'Price Title', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_pricelist-content .dina_pricelist-title',
            ),
			'price'         => array(
				'label'        => esc_html__( 'Price', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_pricelist-content .dina_pricelist-price',
            ),
			'description'   => array(
				'label'        => esc_html__( 'Description', 'divinationkit-for-divi' ),
				'selector'     => '%%order_class%% .dina_pricelist-content .dina_pricelist-description p',
            ),
        );
    }

    public function get_fields() {
         
        $layout = array(
            'layout'             => array(
                'label'          => esc_html__( 'Choose Layout', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can choose different type of style', 'divinationkit-for-divi' ),
                'type'           => 'select',
                'options'        => array(
                    'flex'       => esc_html__( 'Media position left', 'divinationkit-for-divi' ),
                    'block'      => esc_html__( 'Media position top', 'divinationkit-for-divi' ),
                ),
                'default'        => 'flex',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'mobile_options' => true,
            ),

            'content_position'   => array(
                'label'          => esc_html__( 'Content alignement', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the content vertical alignement', 'divinationkit-for-divi' ),
                'type'           => 'select',
                'options'        => array(
                    'flex-start' => esc_html__( 'Top', 'divinationkit-for-divi' ),
                    'center'     => esc_html__( 'Vertically Center', 'divinationkit-for-divi' ),
                    'flex-end'   => esc_html__( 'Bottom', 'divinationkit-for-divi' ),
                ),
                'default'        => 'flex-start',
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'show_if'        => array(
                    'layout'     => 'flex',
                ),
            ),

            'content_gap'        => array(
                'label'          => esc_html__( 'Content space', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define space between media and content', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '15px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'show_if'        => array(
                    'layout'     => 'flex',
                ),
            )
        );

        $icon_design = array(
            'icon_bg'            => array(
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

            'icon_color'         => array(
                'label'          => esc_html__( 'Icon Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#333333',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_size'          => array(
                'label'          => esc_html__( 'Icon Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon size.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '30px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 1000,
                ),
            ),

            'icon_padding'       => array(
                'label'          => esc_html__( 'Image/Icon Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for divider icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),

            'icon_margin'        => array(
                'label'          => esc_html__( 'Image/Icon Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin for divider icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),
        );

        $image_design = array(
            'image_align'         => array(
                'label'           => esc_html__( 'Image Alignment', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'configuration',
                'options'         => array(
                    'flex-start'  => esc_html__( 'Left', 'divinationkit-for-divi' ),
                    'center'      => esc_html__( 'Center', 'divinationkit-for-divi' ),
                    'flex-end'    => esc_html__( 'Right', 'divinationkit-for-divi' ),
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'default'         => 'flex-start',
                'mobile_options'  => true
            ),

            'image_width'         => array(
                'label'           => esc_html__( 'Image Width', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can change image width.', 'divinationkit-for-divi' ),
                'type'            => 'range',
                'default_unit'    => '%',
                'default'         => '50%',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'mobile_options'  => true,
                'range_settings'  => array(
                    'min'         => 0,
                    'step'        => 1,
                    'max'         => 100,
                ),
            ),

            'image_margin'        => array(
                'label'           => esc_html__( 'Image Margin', 'divinationkit-for-divi' ),
                'descripton'      => esc_html__( 'Define custom margin for price iamge', 'divinationkit-for-divi' ),
                'type'            => 'custom_margin',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'default'         => '0px|0px|0px|0px',
                'mobile_options'  => true,
            ),

            'image_padding'       => array(
                'label'           => esc_html__( 'Image Padding', 'divinationkit-for-divi' ),
                'descripton'      => esc_html__( 'Define custom padding for price iamge', 'divinationkit-for-divi' ),
                'type'            => 'custom_padding',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'default'         => '0px|0px|0px|0px',
                'mobile_options'  => true,
            ),
        );

        $divider = array(
            'divider_color'      => array(
                'label'          => esc_html__( 'Divider Color', 'divinationkit-for-divi' ),
                'discription'    => esc_html__( 'Define the divi line color', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#333333',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'default'        => '#0dc8f1',
                'hover'          => 'tabs',
                'mobile_options' => true,

            ),

            'divider_style'      => array(
                'label'          => esc_html__( 'Divider Style', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the divider style', 'divinationkit-for-divi' ),
                'type'           => 'select',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'options'        => array(
                    'dotted'     => esc_html__( 'Dotted', 'divinationkit-for-divi' ),
                    'dashed'     => esc_html__( 'Dashed', 'divinationkit-for-divi' ),
                    'solid'      => esc_html__( 'Solid', 'divinationkit-for-divi' ),
                    'double'     => esc_html__( 'Double', 'divinationkit-for-divi' ),
                    'groove'     => esc_html__( 'Groove', 'divinationkit-for-divi' ),
                    'ridge'      => esc_html__( 'Ridge', 'divinationkit-for-divi' ),
                    'inset'      => esc_html__( 'Inset', 'divinationkit-for-divi' ),
                    'outset'     => esc_html__( 'Outset', 'divinationkit-for-divi' ),
                    'none'       => esc_html__( 'None', 'divinationkit-for-divi' ),
                ),
                'default'        => 'solid',
                'mobile_options' => true,
            ),

            'divider_position'   => array(
                'label'          => esc_html__( 'Divider Vertical Align', 'divinationkit-for-divi' ),
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

            'divider_weight'     => array(
                'label'          => esc_html__( 'Divider Weight', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define space between divider and text/icon', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 25,
                ),
                'default'        => '1px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'mobile_options' => true,
            ),

            'divider_gap'        => array(
                'label'          => esc_html__( 'Divider Space', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define space between divider and text/icon', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 250,
                ),
                'default'        => '15px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'mobile_options' => true,
            ),
        );

        $custom_spacing = array(
            'item_margin'        => array(
                'label'           => esc_html__( 'Item Margin', 'divinationkit-for-divi' ),
                'descripton'      => esc_html__( 'Define custom margin for price iamge', 'divinationkit-for-divi' ),
                'type'            => 'custom_margin',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'item',
                'default'         => '0px|0px|20px|0px',
                'mobile_options'  => true,
            ),

            'item_padding'       => array(
                'label'           => esc_html__( 'Item Padding', 'divinationkit-for-divi' ),
                'descripton'      => esc_html__( 'Define custom padding for price iamge', 'divinationkit-for-divi' ),
                'type'            => 'custom_padding',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'item',
                'default'         => '0px|0px|0px|0px',
                'mobile_options'  => true,
            ),
        );


        return array_merge( $layout, $icon_design, $image_design, $divider, $custom_spacing );
    }

     // Modify existing functionalities and add new functionalities
     public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                   = array();
        $advanced_fields[ 'text' ]         = false;
        $advanced_fields[ 'text_shadow' ]  = array();
        $advanced_fields[ 'fonts' ]        = array();

        // Flip card border
        $advanced_fields[ 'borders' ][ 'list_item' ] = array(
			'label_prefix'          => esc_html__( 'Price item', 'divinationkit-for-divi' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'item',
			'css'                   => array(
				'main'              => array(
					'border_radii'  => '%%order_class%% .dina_pricelist-item-wrapper',
					'border_styles' => '%%order_class%% .dina_pricelist-item-wrapper',
				),
				'important'         => false,
			),
			'defaults'              => array(
				'border_radii'      => 'on|0px|0px|0px|0px',
				'border_styles'     => array(
					'width'         => '0px',
					'color'         => '#333333',
					'style'         => 'solid',
				),
			),
		);

        // icon border
        $advanced_fields[ 'borders' ][ 'icon' ] = array(
            'label_prefix'          => esc_html__( 'Icon', 'divinationkit-for-divi' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'icon',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dina_pricelist-icon i.dina_icon',
                    'border_styles' => '%%order_class%% .dina_pricelist-icon i.dina_icon',
                ),
                'important'         => false,
            ),
            'depends_show_if'       => array(
                'media_type'        => 'icon',
            ),
            'defaults'              => array(
                'border_radii'      => 'on|0px|0px|0px|0px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'solid',
                ),
            ),
        );

        // Image border
        $advanced_fields[ 'borders' ][ 'image' ] = array(
            'label_prefix'          => esc_html__( 'Image', 'divinationkit-for-divi' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'image',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dina_pricelist-image',
                    'border_styles' => '%%order_class%% .dina_pricelist-image',
                ),
                'important'         => false,
            ),
            'depends_show_if'       => array(
                'media_type'        => 'icon',
            ),
            'defaults'              => array(
                'border_radii'      => 'on|0px|0px|0px|0px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'solid',
                ),
            ),
        );        

        $advanced_fields[ 'fonts' ][ 'title' ] = array(
            'label'             => esc_html__( 'Title', 'divinationkit-for-divi' ),
            'css'               => array(
                'main'          => '%%order_class%% .dina_pricelist-title',
                'important'     => false,
            ),
            'font_size'         => array(
                'default'       => '18px',
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'content',
            'sub_toggle'        => 'title',
            'line_height'       => array(
                'default'       => '1.5em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'price' ] = array(
            'label'             => esc_html__( 'Price', 'divinationkit-for-divi' ),
            'css'               => array(
                'main'          => '%%order_class%% .dina_pricelist-price',
                'important'     => false,
            ),
            'font_size'         => array(
                'default'       => '18px',
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'content',
            'sub_toggle'        => 'price',
            'line_height'       => array(
                'default'       => '1.3em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'description' ] = array(
            'label'             => esc_html__( 'Description', 'divinationkit-for-divi' ),
            'css'               => array(
                'main'          => '%%order_class%% .dina_pricelist-description p',
                'important'     => false,
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'content',
            'sub_toggle'        => 'description',
            'font_size'         => array(
                'default'       => '14px',
            ),
            'line_height'       => array(
                'default'       => '1.2em',
            ),
        );

        return $advanced_fields;
    }

    public function render($attrs, $content, $render_slug)
    {

        $this->render_css($render_slug);      

        return sprintf(
            '<div class="dina_pricelist-container">
                <div class="dina_pricelist-wrapper">
                    %1$s
                </div>
            </div>',
            $this->content,
            $this->props[ 'layout' ]
        );
    }

    public function render_css($render_slug) {

        $this->dina_responsive_css($render_slug, array(
            [
                'option_slug'       => 'layout',
                'property'          => 'display',
                'selector'          => '%%order_class%% .dina_pricelist-item-wrapper'
            ],
            [
                'option_slug'       => 'content_position',
                'property'          => 'align-items',
                'selector'          => '%%order_class%% .dina_pricelist-item-wrapper'
            ],
            [
                'option_slug'       => 'content_gap',
                'property'          => 'gap',
                'selector'          => '%%order_class%% .dina_pricelist-item-wrapper'
            ],
            [
                'option_slug'       => 'icon_size',
                'property'          => 'font-size',
                'selector'          => '%%order_class%% .dina_pricelist-icon i.dina_icon',
                'hover'             => '%%order_class%% .dina_pricelist_child:hover .dina_pricelist-icon i.dina_icon'
            ],
            [
                'option_slug'       => 'icon_color',
                'property'          => 'color',
                'selector'          => '%%order_class%% .dina_pricelist-icon i.dina_icon',
                'hover'             => '%%order_class%% .dina_pricelist_child:hover .dina_pricelist-icon i.dina_icon'
            ],
            [
                'option_slug'       => 'icon_bg',
                'property'          => 'background',
                'selector'          => '%%order_class%% .dina_pricelist-icon i.dina_icon',
                'hover'             => '%%order_class%% .dina_pricelist_child:hover .dina_pricelist-icon i.dina_icon'
            ],
            [
                'option_slug'       => 'icon_padding',
                'property'          => 'padding',
                'selector'          => '%%order_class%% .dina_pricelist-icon i.dina_icon'
            ],
            [
                'option_slug'       => 'icon_margin',
                'property'          => 'margin',
                'selector'          => '%%order_class%% .dina_pricelist-icon'
            ],
            [
                'option_slug'       => 'image_width',
                'property'          => 'width',
                'selector'          => '%%order_class%% .dina_pricelist-image-wrapper'
            ],
            [
                'option_slug'       => 'image_margin',
                'property'          => 'margin',
                'selector'          => '%%order_class%% .dina_pricelist-image'
            ],
            [
                'option_slug'       => 'image_padding',
                'property'          => 'padding',
                'selector'          => '%%order_class%% .dina_pricelist-image'
            ],
            [
                'option_slug'       => 'image_align',
                'property'          => 'justify-content',
                'selector'          => '%%order_class%% .dina_pricelist-image-wrapper'
            ],
            [
                'option_slug'       => 'divider_color',
                'property'          => 'border-color',
                'selector'          => '%%order_class%% .dina_pricelist-divider',
                'hover'             => '%%order_class%% .dina_pricelist_child:hover .dina_pricelist-divider',
            ],
            [
                'option_slug'       => 'divider_style',
                'property'          => 'border-style',
                'selector'          => '%%order_class%% .dina_pricelist-divider'
            ],
            [
                'option_slug'       => 'divider_weight',
                'property'          => 'border-bottom-width',
                'selector'          => '%%order_class%% .dina_pricelist-divider'
            ],
            [
                'option_slug'       => 'divider_gap',
                'property'          => 'gap',
                'selector'          => '%%order_class%% .dina_pricelist-heading'
            ],
            [
                'option_slug'       => 'divider_position',
                'property'          => 'align-items',
                'selector'          => '%%order_class%% .dina_pricelist-heading'
            ],
            [
                'option_slug'       => 'item_margin',
                'property'          => 'margin',
                'selector'          => '%%order_class%% .dina_pricelist_item',
                'important'         => true,
            ],
            [
                'option_slug'       => 'item_padding',
                'property'          => 'padding',
                'selector'          => '%%order_class%% .dina_pricelist_item',
                'important'         => true,
            ],
        ));

        
    }

}

new dina_PriceList();