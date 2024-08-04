<?php

class DINA_PriceList_item extends DINA_Module_Core {

    public function init() {
        $this->name                     = esc_html__( 'Price Item', 'divinationkit-for-divi' );
        $this->slug                     = 'dina_pricelist_child';
        $this->vb_support               = 'on';
        $this->type                     = 'child';
        $this->main_css_element         = "%%order_class%%";
        $this->child_title_var          = 'admin_title';
        $this->child_title_fallback_var = 'title';

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'content' => esc_html__( 'Content', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'layout'  => esc_html__( 'Layout', 'divinationkit-for-divi' ),
                    'icon'    => esc_html__( 'Price Icon', 'divinationkit-for-divi' ),
                    'image'   => esc_html__( 'Price Image', 'divinationkit-for-divi' ),
                    'item'    => esc_html__( 'List Item', 'divinationkit-for-divi' ),
                    'content' => array(
                        'title'             => esc_html__( 'Price List Texts', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'title'       => array(
                                'name' => esc_html__( 'Title', 'divinationkit-for-divi' ),
                            ),
                            'description' => array(
                                'name' => esc_html__( 'Description', 'divinationkit-for-divi' ),
                            ),
                            'price'       => array(
                                'name' => esc_html__( 'Price', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),
                    'border'  => esc_html__( 'Border', 'divinationkit-for-divi' ),
                ),
            ),
        );
    }

    public function get_fields() {

        $content = array(
            'media_type'  => array(
                'label'       => esc_html__( 'Media Type', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Select front side media type.', 'divinationkit-for-divi' ),
                'type'        => 'select',
                'tab_slug'    => 'general',
                'toggle_slug' => 'content',
                'options'     => array(
                    'none'  => esc_html__( 'None', 'divinationkit-for-divi' ),
                    'icon'  => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                    'image' => esc_html__( 'Image', 'divinationkit-for-divi' ),
                ),
                'default'     => 'none',
            ),

            'icon'        => array(
                'label'       => esc_html__( 'Select Icon', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Select front side icon.', 'divinationkit-for-divi' ),
                'type'        => 'select_icon',
                'toggle_slug' => 'content',
                'tab_slug'    => 'general',
                'show_if'     => array(
                    'media_type' => 'icon',
                ),
            ),

            'image'       => array(
                'label'              => esc_html__( 'Upload Image', 'divinationkit-for-divi' ),
                'description'        => esc_html__( 'Upload an image you would like to display for the price list.', 'divinationkit-for-divi' ),
                'type'               => 'upload',
                'upload_button_text' => esc_attr__( 'Upload an image', 'divinationkit-for-divi' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'divinationkit-for-divi' ),
                'update_text'        => esc_attr__( 'Set As Image', 'divinationkit-for-divi' ),
                'toggle_slug'        => 'content',
                'show_if'            => array(
                    'media_type' => 'image',
                ),
            ),

            'image_alt'   => array(
                'label'       => esc_html__( 'Image Alt Text', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Define the front side image alt text for your flip box.', 'divinationkit-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'content',
                'show_if'     => array(
                    'media_type' => 'image',
                ),
            ),

            'title'       => array(
                'label'           => esc_html__( 'Title', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define the price list title.', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'toggle_slug'     => 'content',
                'dynamic_content' => 'text',
            ),

            'price'       => array(
                'label'           => esc_html__( 'price', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define the front side sub-title for your flip box.', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'default'         => '$0',
                'toggle_slug'     => 'content',
                'dynamic_content' => 'text',
            ),

            'description' => array(
                'label'           => esc_html__( 'Description', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define the price description', 'divinationkit-for-divi' ),
                'type'            => 'tiny_mce',
                'toggle_slug'     => 'content',
                'dynamic_content' => 'text',
            ),
        );

        $layout = array(
            'layout'           => array(
                'label'          => esc_html__( 'Choose Layout', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can choose different type of style', 'divinationkit-for-divi' ),
                'type'           => 'select',
                'options'        => array(
                    'flex'  => esc_html__( 'Media position left', 'divinationkit-for-divi' ),
                    'block' => esc_html__( 'Media position top', 'divinationkit-for-divi' ),
                ),
                'default'        => 'flex',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'mobile_options' => true,
            ),

            'content_position' => array(
                'label'          => esc_html__( 'Content alignment', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the content vertical alignment', 'divinationkit-for-divi' ),
                'type'           => 'select',
                'options'        => array(
                    'flex-start' => esc_html__( 'Top', 'divinationkit-for-divi' ),
                    'center'     => esc_html__( 'Vertically Center', 'divinationkit-for-divi' ),
                    'flex-end'   => esc_html__( 'Bottom', 'divinationkit-for-divi' ),
                ),
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'show_if'        => array(
                    'layout' => 'flex',
                ),
            ),

            'content_gap'      => array(
                'label'          => esc_html__( 'Content space', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define space between media and content', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'show_if'        => array(
                    'layout' => 'flex',
                ),
            ),
        );

        $icon_design = array(
            'icon_bg'      => array(
                'label'          => esc_html__( 'Icon Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon background color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_color'   => array(
                'label'          => esc_html__( 'Icon Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'hover'          => 'tabs',
                'mobile_options' => true,
            ),

            'icon_size'    => array(
                'label'          => esc_html__( 'Icon Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change icon size.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
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

            'icon_padding' => array(
                'label'          => esc_html__( 'Image/Icon Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for divider icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'mobile_options' => true,
            ),

            'icon_margin'  => array(
                'label'          => esc_html__( 'Image/Icon Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin for divider icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'mobile_options' => true,
            ),
        );

        $image_design = array(
            'image_align'   => array(
                'label'           => esc_html__( 'Image Alignment', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'configuration',
                'options'         => array(
                    'flex-start' => esc_html__( 'Left', 'divinationkit-for-divi' ),
                    'center'     => esc_html__( 'Center', 'divinationkit-for-divi' ),
                    'flex-end'   => esc_html__( 'Right', 'divinationkit-for-divi' ),
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'show_if'         => array(
                    'layout' => 'flex',
                ),
                'mobile_options'  => true,
            ),

            'image_width'   => array(
                'label'          => esc_html__( 'Image Width', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change image width.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => '%',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'image',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 100,
                ),
            ),

            'image_margin'  => array(
                'label'          => esc_html__( 'Image Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin for price image', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'image',
                'mobile_options' => true,
            ),

            'image_padding' => array(
                'label'          => esc_html__( 'Image Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for price image', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'image',
                'mobile_options' => true,
            ),
        );

        $divider = array(
            'divider_color'    => array(
                'label'          => esc_html__( 'Divider Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define the divi line color', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#333333',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'default'        => '#0dc8f1',
                'hover'          => 'tabs',
                'mobile_options' => true,

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
                    'max'  => 25,
                ),
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
        );

        return array_merge( $content, $layout, $icon_design, $image_design, $divider );

    }

    // Modify existing functionalities and add new functionalities
    public function get_advanced_fields_config() {
        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                = array();
        $advanced_fields['text']        = false;
        $advanced_fields['text_shadow'] = false;
        $advanced_fields['fonts']       = false;

        $advanced_fields['borders'] = array(
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'border',
            'default'     => array(
                'css'      => array(
                    'main'      => array(
                        'border_radii'  => '.dina_pricelist-container %%order_class%% .dina_pricelist_child',
                        'border_styles' => '.dina_pricelist-container %%order_class%% .dina_pricelist_child',
                    ),
                    'important' => false,
                ),
                'defaults' => array(
                    'border_radii'  => 'on|0px|0px|0px|0px',
                    'border_styles' => array(
                        'width' => '0px',
                        'color' => $et_accent_color,
                        'style' => 'solid',
                    ),
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
                    'border_radii'  => '.dina_pricelist-container %%order_class%% .dina_pricelist-icon i.dina_icon',
                    'border_styles' => '.dina_pricelist-container %%order_class%% .dina_pricelist-icon i.dina_icon',
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

        // Image border
        $advanced_fields['borders']['image'] = array(
            'label_prefix'    => esc_html__( 'Image', 'divinationkit-for-divi' ),
            'tab_slug'        => 'advanced',
            'toggle_slug'     => 'image',
            'css'             => array(
                'main'      => array(
                    'border_radii'  => '.dina_pricelist-container %%order_class%% .dina_pricelist-image',
                    'border_styles' => '.dina_pricelist-container %%order_class%% .dina_pricelist-image',
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
                'main'      => '.dina_pricelist-container %%order_class%% .dina_pricelist-title',
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
            'toggle_slug'      => 'content',
            'sub_toggle'       => 'title',
            'line_height'      => array(
                'default' => '1.5em',
            ),
        );

        $advanced_fields['fonts']['price'] = array(
            'label'        => esc_html__( 'Price', 'divinationkit-for-divi' ),
            'css'          => array(
                'main'      => '.dina_pricelist-container %%order_class%% .dina_pricelist-price',
                'important' => false,
            ),
            'header_level' => array(
                'default' => 'h4',
            ),
            'font_size'    => array(
                'default' => '18px',
            ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'content',
            'sub_toggle'   => 'price',
            'line_height'  => array(
                'default' => '1.3em',
            ),
        );

        $advanced_fields['margin_padding'] = array(
            'css' => array(
                'important' => 'all',
            ),
        );

        $advanced_fields['filters'] = array(
            'child_filters_target' => array(
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'image',
            ),
            'css'                  => array(
                'main' => '.dina_pricelist-container %%order_class%% .dina_pricelist-image img',
            ),
        );

        return $advanced_fields;
    }

    public function render_icon() {

        if ( !empty( $this->props['icon'] ) ) {

            return sprintf(
                '<div class="dina_pricelist-icon">
                    <i class="dina_icon">%1$s</i>
                </div>',
                $this->dina_render_icon( 'icon' )
            );
        }
    }

    public function render_photo() {

        if ( !empty( $this->props['image'] ) ) {
            return sprintf(
                '<div class="dina_pricelist-image-wrapper">
                    <div class="dina_pricelist-image">
                        <img src="%1$s" alt="%2$s" />
                    </div>
                </div>',
                $this->props['image'],
                $this->props['image_alt'],
            );
        }
    }

    public function render_media() {

        $media_type = $this->props['media_type'];

        if ( $media_type === 'none' ) {
            return;
        }

        if ( $media_type === 'icon' ) {
            return $this->render_icon();
        }

        if ( $media_type === 'image' ) {
            return $this->render_photo();
        }
    }

    public function render_title() {

        $heading       = $this->props['title'];
        $heading_level = et_pb_process_header_level( $this->props['title_level'], 'h4' );

        return sprintf(
            '<%1$s class="dina_pricelist-title">%2$s</%1$s>',
            $heading_level,
            $heading
        );
    }

    public function render_price() {

        $heading       = $this->props['price'];
        $heading_level = et_pb_process_header_level( $this->props['price_level'], 'h4' );

        return sprintf(
            '<%1$s class="dina_pricelist-price">%2$s</%1$s>',
            $heading_level,
            $heading
        );
    }

    public function render( $attrs, $content, $render_slug ) {

        $this->render_css( $render_slug );
        $description = $this->props['description'];

        return sprintf(
            '<div class="dina_pricelist-item-wrapper">
                %1$s
                <div class="dina_pricelist-content">
                    <div class="dina_pricelist-heading">
                        %2$s
                        <span class="dina_pricelist-divider"></span>
                        %3$s
                    </div>
                    <div class="dina_pricelist-description">%4$s</div>
                </div>
            </div>',
            $this->render_media(),
            $this->render_title(),
            $this->render_price(),
            $this->render_MCE( $description ),
        );
    }

    public function render_css( $render_slug ) {
        // Generate Icon style
        $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'icon',
                'important'      => true,
                'selector'       => '.dina_pricelist-container %%order_class%% .dina_pricelist-icon .dina_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );

        $this->dina_responsive_css( $render_slug, array(
            array(
                'option_slug' => 'layout',
                'property'    => 'display',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-item-wrapper',
            ),
            array(
                'option_slug' => 'content_position',
                'property'    => 'align-items',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-item-wrapper',
            ),
            array(
                'option_slug' => 'content_gap',
                'property'    => 'gap',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-item-wrapper',
            ),
            array(
                'option_slug' => 'icon_size',
                'property'    => 'font-size',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-icon i.dina_icon',
                'hover'       => '.dina_pricelist-container %%order_class%% .dina_pricelist_child:hover .dina_pricelist-icon i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_color',
                'property'    => 'color',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-icon i.dina_icon',
                'hover'       => '.dina_pricelist-container %%order_class%% .dina_pricelist_child:hover .dina_pricelist-icon i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_bg',
                'property'    => 'background',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-icon i.dina_icon',
                'hover'       => '.dina_pricelist-container %%order_class%% .dina_pricelist_child:hover .dina_pricelist-icon i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_padding',
                'property'    => 'padding',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-icon i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_margin',
                'property'    => 'margin',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-icon',
            ),

            array(
                'option_slug' => 'image_margin',
                'property'    => 'margin',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-image',
            ),
            array(
                'option_slug' => 'image_padding',
                'property'    => 'padding',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-image',
            ),
            array(
                'option_slug' => 'image_align',
                'property'    => 'justify-content',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-image-wrapper',
            ),
            array(
                'option_slug' => 'divider_color',
                'property'    => 'border-color',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-divider',
                'hover'       => '.dina_pricelist-container %%order_class%% .dina_pricelist_child:hover .dina_pricelist-divider',
            ),
            array(
                'option_slug' => 'divider_style',
                'property'    => 'border-style',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-divider',
            ),
            array(
                'option_slug' => 'divider_weight',
                'property'    => 'border-bottom-width',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-divider',
            ),
            array(
                'option_slug' => 'divider_gap',
                'property'    => 'gap',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-heading',
            ),
            array(
                'option_slug' => 'divider_position',
                'property'    => 'align-items',
                'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-heading',
            ),

        ) );

        $layout = $this->props['layout'];

        if ( $layout === 'flex' ) {
            $this->dina_responsive_css( $render_slug, array(
                array(
                    'option_slug' => 'image_width',
                    'property'    => 'width',
                    'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-image-wrapper',
                ),
            ) );
        } else {
            $this->dina_responsive_css( $render_slug, array(
                array(
                    'option_slug' => 'image_width',
                    'property'    => 'width',
                    'selector'    => '.dina_pricelist-container %%order_class%% .dina_pricelist-image',
                ),
            ) );
        }
    }
}

new dina_PriceList_item();