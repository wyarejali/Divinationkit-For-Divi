<?php

class DINA_Dual_Button extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . '/modules/dual-button/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {

        $this->name        = esc_html__( 'Dual Button', 'divinationkit-for-divi' );
        $this->slug        = 'dina_dual_button';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';
        $this->icon_path   = $this->dina_module_icon( 'dual-button' );

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'content' => array(
                        'title'             => esc_html__( 'Content', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'button_one' => array(
                                'name' => esc_html__( 'Button One', 'divinationkit-for-divi' ),
                            ),
                            'separator'  => array(
                                'name' => esc_html__( 'Separator', 'divinationkit-for-divi' ),
                            ),
                            'button_two' => array(
                                'name' => esc_html__( 'Button Two', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),

                    'background_',
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'general'                 => esc_html__( 'General', 'divinationkit-for-divi' ),
                    'global_style'            => esc_html__( 'Global Style', 'divinationkit-for-divi' ),
                    'button_one_design'       => esc_html__( 'Button One Design', 'divinationkit-for-divi' ),
                    'button_two_design'       => esc_html__( 'Button Two Design', 'divinationkit-for-divi' ),

                    'button_texts'            => array(
                        'title'             => esc_html__( 'Button Texts', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'button_one_text' => array(
                                'name' => esc_html__( 'Button One', 'divinationkit-for-divi' ),
                            ),
                            'button_two_text' => array(
                                'name' => esc_html__( 'Button Two', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),
                    'separator'               => array(
                        'title'             => esc_html__( 'Separator', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'separator_icon' => array(
                                'name' => esc_html__( 'Icon', 'divinationkit-for-divi' ),
                            ),
                            'separator_text' => array(
                                'name' => esc_html__( 'Text', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),
                    'button_one_hover_effect' => array(
                        'title'             => esc_html__( 'Button One Hover', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            '2d'     => array(
                                'name' => esc_html__( '2D', 'divinationkit-for-divi' ),
                            ),
                            'border' => array(
                                'name' => esc_html__( 'Border', 'divinationkit-for-divi' ),
                            ),
                            'bg'     => array(
                                'name' => esc_html__( 'BG', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),
                    'button_two_hover_effect' => array(
                        'title'             => esc_html__( 'Button Two Hover', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            '2d'     => array(
                                'name' => esc_html__( '2D', 'divinationkit-for-divi' ),
                            ),
                            'border' => array(
                                'name' => esc_html__( 'Border', 'divinationkit-for-divi' ),
                            ),
                            'bg'     => array(
                                'name' => esc_html__( 'BG', 'divinationkit-for-divi' ),
                            ),
                        ),
                    ),
                ),
            ),
        );
    }

    public function get_fields() {

        $button_one_hover_effect = array(
            'button_one_2d_hover_effect'        => array(
                'label'           => esc_html__( 'Select 2D Hover Effect', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'basic_option',
                'options'         => array(
                    ''                                  => esc_html__( 'Select', 'divinationkit-for-divi' ),
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
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_one_hover_effect',
                'sub_toggle'      => '2d',
            ),
            'button_one_border_hover_effect'    => array(
                'label'           => esc_html__( 'Select Border Hover Effect', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'basic_option',
                'options'         => array(
                    ''                           => esc_html__( 'Select', 'divinationkit-for-divi' ),
                    'dina-ripple-in'             => esc_html__( 'Ripple In', 'divinationkit-for-divi' ),
                    'dina-ripple-out'            => esc_html__( 'Ripple Out', 'divinationkit-for-divi' ),
                    'dina-outline-in'            => esc_html__( 'Outline In', 'divinationkit-for-divi' ),
                    'dina-outline-out'           => esc_html__( 'Outline Out', 'divinationkit-for-divi' ),
                    'dina-underline-from-left'   => esc_html__( 'Underline From Left', 'divinationkit-for-divi' ),
                    'dina-underline-from-center' => esc_html__( 'Underline From Center', 'divinationkit-for-divi' ),
                    'dina-underline-from-right'  => esc_html__( 'Underline From Right', 'divinationkit-for-divi' ),
                    'dina-overline-from-left'    => esc_html__( 'Overline From Left', 'divinationkit-for-divi' ),
                    'dina-overline-from-center'  => esc_html__( 'Overline From Center', 'divinationkit-for-divi' ),
                    'dina-overline-from-right'   => esc_html__( 'Overline From Right', 'divinationkit-for-divi' ),
                    'dina-underline-reveal'      => esc_html__( 'Underline Reveal', 'divinationkit-for-divi' ),
                    'dina-overline-reveal'       => esc_html__( 'Overline Reveal', 'divinationkit-for-divi' ),
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_one_hover_effect',
                'sub_toggle'      => 'border',
            ),

            'button_one_hover_border_color'     => array(
                'label'          => esc_html__( 'Border Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Choose hover effect border color', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#01564d',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'button_one_hover_effect',
                'sub_toggle'     => 'border',
                'show_if'        => array(
                    'button_one_border_hover_effect' => array( 'dina-ripple-in', 'dina-ripple-out', 'dina-outline-in', 'dina-outline-out' ),
                ),
                'mobile_options' => true,
            ),

            'button_one_hover_border_width'     => array(
                'label'          => esc_html__( 'Border Width', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Choose hover effect border width', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default'        => '4px',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'  => 1,
                    'step' => 1,
                    'max'  => 100,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'button_one_hover_effect',
                'sub_toggle'     => 'border',
                'show_if'        => array(
                    'button_one_border_hover_effect' => array( 'dina-ripple-in', 'dina-ripple-out', 'dina-outline-in', 'dina-outline-out' ),
                ),
                'mobile_options' => true,
            ),

            'button_one_hover_border_bg_color'  => array(
                'label'          => esc_html__( 'Line Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Choose hover effect border color', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#01564d',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'button_one_hover_effect',
                'sub_toggle'     => 'border',
                'show_if_not'    => array(
                    'button_one_border_hover_effect' => array( 'dina-ripple-in', 'dina-ripple-out', 'dina-outline-in', 'dina-outline-out' ),
                ),
                'show_if'        => array(
                    'button_one_border_hover_effect' => array( 'dina-underline-from-left', 'dina-underline-from-center', 'dina-underline-from-right', 'dina-overline-from-left', 'dina-overline-from-center', 'dina-overline-from-right', 'dina-underline-reveal', 'dina-overline-reveal' ),
                ),
                'mobile_options' => true,
            ),

            'button_one_hover_border_bg_height' => array(
                'label'          => esc_html__( 'Line Height', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Choose hover effect border height', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default'        => '4px',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'  => 1,
                    'step' => 1,
                    'max'  => 100,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'button_one_hover_effect',
                'sub_toggle'     => 'border',
                'show_if_not'    => array(
                    'button_one_border_hover_effect' => array( 'dina-ripple-in', 'dina-ripple-out', 'dina-underline-in', 'dina-underline-out' ),
                ),
                'show_if'        => array(
                    'button_one_border_hover_effect' => array( 'dina-underline-from-left', 'dina-underline-from-center', 'dina-underline-from-right', 'dina-overline-from-left', 'dina-overline-from-center', 'dina-overline-from-right', 'dina-underline-reveal', 'dina-overline-reveal' ),
                ),
                'mobile_options' => true,
            ),

            'button_one_bg_hover_effect'        => array(
                'label'           => esc_html__( 'Select Background Hover Effect', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'basic_option',
                'options'         => array(
                    ''                            => esc_html__( 'Select', 'divinationkit-for-divi' ),
                    'dina-swipe-to-right'         => esc_html__( 'Swipe To Right', 'divinationkit-for-divi' ),
                    'dina-swipe-to-left'          => esc_html__( 'Swipe To Left', 'divinationkit-for-divi' ),
                    'dina-swipe-to-bottom'        => esc_html__( 'Swipe To Bottom', 'divinationkit-for-divi' ),
                    'dina-swipe-to-top'           => esc_html__( 'Swipe To Top', 'divinationkit-for-divi' ),
                    'dina-bounce-to-right'        => esc_html__( 'Bounce To Right', 'divinationkit-for-divi' ),
                    'dina-bounce-to-left'         => esc_html__( 'Bounce To Left', 'divinationkit-for-divi' ),
                    'dina-bounce-to-bottom'       => esc_html__( 'Bounce To Bottom', 'divinationkit-for-divi' ),
                    'dina-bounce-to-top'          => esc_html__( 'Bounce To Top', 'divinationkit-for-divi' ),
                    'dina-radial-in'              => esc_html__( 'Radial In', 'divinationkit-for-divi' ),
                    'dina-radial-out'             => esc_html__( 'Radial Out', 'divinationkit-for-divi' ),
                    'dina-rectangle-in'           => esc_html__( 'Rectangle In', 'divinationkit-for-divi' ),
                    'dina-rectangle-out'          => esc_html__( 'Rectangle Out', 'divinationkit-for-divi' ),
                    'dina-shutter-in-horizontal'  => esc_html__( 'Shutter In Horizontal', 'divinationkit-for-divi' ),
                    'dina-shutter-out-horizontal' => esc_html__( 'Shutter Out Horizontal', 'divinationkit-for-divi' ),
                    'dina-shutter-in-vertical'    => esc_html__( 'Shutter In Vertical', 'divinationkit-for-divi' ),
                    'dina-shutter-out-vertical'   => esc_html__( 'Shutter Out Vertical', 'divinationkit-for-divi' ),
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_one_hover_effect',
                'sub_toggle'      => 'bg',
                'mobile_options'  => true,
            ),
            'button_one_hover_bg_color'         => array(
                'label'          => esc_html__( 'Background Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Choose hover effect background color', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#e02b20',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'button_one_hover_effect',
                'sub_toggle'     => 'bg',
                'mobile_options' => true,
            ),
        );

        $button_two_hover_effect = array();

        $layout = array(

            'alignment' => array(
                'label'           => esc_html__( 'Alignment', 'divinationkit-for-divi' ),
                'type'            => 'text_align',
                'option_category' => 'configuration',
                'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
                'default'         => 'left',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'general',
                'default'         => 'left',
                'mobile_options'  => true,
            ),

            'space'     => array(
                'label'          => esc_html__( 'Space Between Buttons', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define space between button and separator.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '10px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'general',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 500,
                ),
            ),

        );

        $button_one = array(
            'button_one_text'    => array(
                'label'           => esc_html__( 'Button Text', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can define the button text.', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'default'         => '',
                'toggle_slug'     => 'content',
                'sub_toggle'      => 'button_one',
                'dynamic_content' => 'text',
            ),

            'button_one_url'     => array(
                'label'           => esc_html__( 'Button Url', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define the button link url for your button.', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'default'         => '',
                'toggle_slug'     => 'content',
                'sub_toggle'      => 'button_one',
                'dynamic_content' => 'url',
            ),

            'url_new_window_one' => array(
                'label'           => esc_html__( 'Open Button link in new window', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can choose whether button URL should be opened in new window.', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__( 'In The Same Window', 'divinationkit-for-divi' ),
                    'on'  => esc_html__( 'In The New Tab', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'content',
                'sub_toggle'      => 'button_one',
            ),
        );

        $button_one_background = $this->dina_custom_background_fields( 'button_one', 'Button One', 'advanced', 'button_one_design', array( 'color', 'gradient', 'image' ), array(), '#01564D' );

        $button_one_design = array(
            'use_button_one_icon'           => array(
                'label'           => esc_html__( 'Show Button One Icon', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Choose whether you want to show button one icon or not', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'on',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_one_design',
            ),
            'button_one_icon'               => array(
                'label'       => esc_html__( 'Select Button One Icon', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Select back side icon.', 'divinationkit-for-divi' ),
                'type'        => 'select_icon',
                'default'     => '&#x35;||divi||400',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_one_design',
                'show_if'     => array(
                    'use_button_one_icon' => 'on',
                ),
            ),

            'button_one_icon_placement'     => array(
                'label'           => esc_html__( 'Button One Icon Placement', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Choose where the button one icon should be displayed (left/right)', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'basic_option',
                'options'         => array(
                    'right' => esc_html__( 'Right', 'divinationkit-for-divi' ),
                    'left'  => esc_html__( 'Left', 'divinationkit-for-divi' ),
                ),
                'default'         => 'right',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_one_design',
                'show_if'         => array(
                    'use_button_one_icon' => 'on',
                ),
            ),

            'button_one_icon_show_on_hover' => array(
                'label'           => esc_html__( 'Only Show Icon On Hover For Button One', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'By default button icons are displayed on hover. If you want you would like button icon to display always', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'on',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_one_design',
                'show_if'         => array(
                    'use_button_one_icon' => 'on',
                ),
            ),

            'button_one_padding'            => array(
                'label'          => esc_html__( 'Button One Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for button one', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'button_one_design',
                'sub_toggle'     => 'wrapper',
                'default'        => '14px|30px|14px|30px',
                'mobile_options' => true,
            ),

            'button_one_margin'             => array(
                'label'          => esc_html__( 'Button One Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin for button one', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'button_one_design',
                'sub_toggle'     => 'wrapper',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),
        );

        $separator = array(
            'use_separator'  => array(
                'label'       => esc_html__( 'Use Separator', 'dina-divinationkit' ),
                'description' => esc_html__( 'Here you can define weather you want to use separator or not between buttons', 'dina-divinationkit' ),
                'type'        => 'yes_no_button',
                'options'     => array(
                    'on'  => esc_html__( 'Yes', 'dina-divinationkit' ),
                    'off' => esc_html__( 'No', 'dina-divinationkit' ),
                ),
                'default'     => 'off',
                'toggle_slug' => 'content',
                'sub_toggle'  => 'separator',
            ),

            'separator_type' => array(
                'label'       => esc_html__( 'Select Separator Type', 'dina-divinationkit' ),
                'type'        => 'select',
                'options'     => array(
                    'icon' => esc_html__( 'Icon', 'dina-divinationkit' ),
                    'text' => esc_html__( 'Text', 'dina-divinationkit' ),
                ),
                'default'     => 'icon',
                'toggle_slug' => 'content',
                'sub_toggle'  => 'separator',
                'show_if'     => array(
                    'use_separator' => 'on',
                ),
            ),

            'separator_icon' => array(
                'label'       => esc_html__( 'Select Icon', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Select separator icon.', 'divinationkit-for-divi' ),
                'type'        => 'select_icon',
                'default'     => '&#xe030;||divi||400',
                'toggle_slug' => 'content',
                'sub_toggle'  => 'separator',
                'show_if'     => array(
                    'separator_type' => 'icon',
                    'use_separator'  => 'on',
                ),
            ),

            'separator_text' => array(
                'label'           => esc_html__( 'Separator Text', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define text that will display between buttons', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'default'         => 'Or',
                'toggle_slug'     => 'content',
                'sub_toggle'      => 'separator',
                'dynamic_content' => 'text',
                'show_if'         => array(
                    'separator_type' => 'text',
                    'use_separator'  => 'on',
                ),
            ),
        );

        $separator_design = array(
            'text_bg'      => array(
                'label'          => esc_html__( 'Separator Text Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change your front side icon background color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'sub_toggle'     => 'separator_text',
                'show_if'        => array(
                    'separator_type' => 'text',
                ),
                'mobile_options' => true,
                'hover'          => 'tabs',
            ),

            'icon_bg'      => array(
                'label'          => esc_html__( 'Icon Background', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change your front side icon background color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'sub_toggle'     => 'separator_icon',
                'show_if'        => array(
                    'separator_type' => 'icon',
                ),
                'mobile_options' => true,
                'hover'          => 'tabs',
            ),

            'icon_color'   => array(
                'label'          => esc_html__( 'Icon Color', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change your front side icon color.', 'divinationkit-for-divi' ),
                'type'           => 'color-alpha',
                'default'        => '#333333',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'sub_toggle'     => 'separator_icon',
                'show_if'        => array(
                    'separator_type' => 'icon',
                ),
                'mobile_options' => true,
                'hover'          => 'tabs',
            ),

            'icon_size'    => array(
                'label'          => esc_html__( 'Icon Size', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Here you can change your front side icon size.', 'divinationkit-for-divi' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '20px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'sub_toggle'     => 'separator_icon',
                'mobile_options' => true,
                'hover'          => 'tabs',
                'range_settings' => array(
                    'min'  => 0,
                    'step' => 1,
                    'max'  => 1000,
                ),
                'show_if'        => array(
                    'separator_type' => 'icon',
                ),
            ),

            'icon_padding' => array(
                'label'          => esc_html__( 'Icon Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'sub_toggle'     => 'separator_icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
                'hover'          => 'tabs',
                'show_if'        => array(
                    'separator_type' => 'icon',
                ),
            ),
            'text_padding' => array(
                'label'          => esc_html__( 'Separator Text Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for icon', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'separator',
                'sub_toggle'     => 'separator_text',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
                'hover'          => 'tabs',
                'show_if'        => array(
                    'separator_type' => 'text',
                ),
            ),
        );

        $button_two = array(
            'button_two_text'    => array(
                'label'           => esc_html__( 'Button Text', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can define the button text.', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'default'         => '',
                'toggle_slug'     => 'content',
                'sub_toggle'      => 'button_two',
                'dynamic_content' => 'text',
            ),

            'button_two_url'     => array(
                'label'           => esc_html__( 'Button Url', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Define the button link url for your button.', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'default'         => '',
                'toggle_slug'     => 'content',
                'sub_toggle'      => 'button_two',
                'dynamic_content' => 'url',
            ),

            'url_new_window_two' => array(
                'label'           => esc_html__( 'Open Button link in new window', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Here you can choose whether button URL should be opened in new window.', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__( 'In The Same Window', 'divinationkit-for-divi' ),
                    'on'  => esc_html__( 'In The New Tab', 'divinationkit-for-divi' ),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'content',
                'sub_toggle'      => 'button_two',
            ),
        );

        $button_two_background = $this->dina_custom_background_fields( 'button_two', 'Button Two', 'advanced', 'button_two_design', array( 'color', 'gradient', 'image' ), array(), '#01564D' );

        $button_two_design = array(
            'use_button_two_icon'           => array(
                'label'           => esc_html__( 'Show Button Two Icon', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Choose whether you want to show button Two icon or not', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'on',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_two_design',
            ),
            'button_two_icon'               => array(
                'label'       => esc_html__( 'Select Button Two Icon', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Select back side icon.', 'divinationkit-for-divi' ),
                'type'        => 'select_icon',
                'default'     => '&#x35;||divi||400',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_two_design',
                'show_if'     => array(
                    'use_button_two_icon' => 'on',
                ),
            ),

            'button_two_icon_placement'     => array(
                'label'           => esc_html__( 'Button Two Icon Placement', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'Choose where the button Two icon should be displayed (left/right)', 'divinationkit-for-divi' ),
                'type'            => 'select',
                'option_category' => 'basic_option',
                'options'         => array(
                    'right' => esc_html__( 'Right', 'divinationkit-for-divi' ),
                    'left'  => esc_html__( 'Left', 'divinationkit-for-divi' ),
                ),
                'default'         => 'right',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_two_design',
                'show_if'         => array(
                    'use_button_two_icon' => 'on',
                ),
            ),

            'button_two_icon_show_on_hover' => array(
                'label'           => esc_html__( 'Only Show Icon On Hover For Button Two', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'By default button icons are displayed on hover. If you want you would like button icon to display always', 'divinationkit-for-divi' ),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'divinationkit-for-divi' ),
                    'off' => esc_html__( 'No', 'divinationkit-for-divi' ),
                ),
                'default'         => 'on',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_two_design',
                'show_if'         => array(
                    'use_button_two_icon' => 'on',
                ),
            ),

            'button_two_padding'            => array(
                'label'          => esc_html__( 'Button Two Padding', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom padding for button two', 'divinationkit-for-divi' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'button_two_design',
                'sub_toggle'     => 'wrapper',
                'default'        => '14px|30px|14px|30px',
                'mobile_options' => true,
            ),

            'button_two_margin'             => array(
                'label'          => esc_html__( 'Button Two Margin', 'divinationkit-for-divi' ),
                'description'    => esc_html__( 'Define custom margin for button two', 'divinationkit-for-divi' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'button_two_design',
                'sub_toggle'     => 'wrapper',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),
        );

        return array_merge(
            $layout,
            $button_one,
            $button_one_background,
            $button_one_design,
            $separator,
            $separator_design,
            $button_two,
            $button_two_background,
            $button_two_design,
            $button_one_hover_effect,
            $button_two_hover_effect,
        );
    }

    public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                 = array();
        $advanced_fields['text']         = false;
        $advanced_fields['filters']      = false;
        $advanced_fields["link_options"] = false;
        $advanced_fields['text_shadow']  = array();
        $advanced_fields['fonts']        = array();

        $advanced_fields['fonts']['button_one_text'] = array(
            'label'       => esc_html__( 'Button One', 'divinationkit-for-divi' ),
            'css'         => array(
                'main'      => '%%order_class%% .dina_button_one',
                'important' => false,
            ),
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'button_texts',
            'sub_toggle'  => 'button_one_text',
            'font_size'   => array(
                'default' => '16px',
            ),
            'line_height' => array(
                'default' => '1.2em',
            ),
        );

        $advanced_fields['borders']['button_one'] = array(
            'label_prefix' => esc_html__( 'Button One', 'divinationkit-for-divi' ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'button_one_design',
            'css'          => array(
                'main'      => array(
                    'border_radii'  => '%%order_class%% .dina_button_one, %%order_class%% .dina_button_one.dina-border-hover-effect:before',
                    'border_styles' => '%%order_class%% .dina_button_one',
                ),
                'important' => false,
            ),
            'defaults'     => array(
                'border_radii'  => 'on|0px|0px|0px|0px',
                'border_styles' => array(
                    'width' => '0px',
                    'color' => $et_accent_color,
                    'style' => 'solid',
                ),
            ),
        );

        $advanced_fields['borders']['separator_icon'] = array(
            'label_prefix' => esc_html__( 'Separator Icon', 'divinationkit-for-divi' ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'separator',
            'sub_toggle'   => 'separator_icon',
            'css'          => array(
                'main'      => array(
                    'border_radii'  => '%%order_class%% .dina_dual_button-separator i.dina_icon',
                    'border_styles' => '%%order_class%% .dina_dual_button-separator i.dina_icon',
                ),
                'important' => false,
            ),
            'defaults'     => array(
                'border_radii'  => 'on|0px|0px|0px|0px',
                'border_styles' => array(
                    'width' => '0px',
                    'color' => $et_accent_color,
                    'style' => 'solid',
                ),
            ),
        );
        $advanced_fields['borders']['separator_text'] = array(
            'label_prefix' => esc_html__( 'Separator Text', 'divinationkit-for-divi' ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'separator',
            'sub_toggle'   => 'separator_text',
            'css'          => array(
                'main'      => array(
                    'border_radii'  => '%%order_class%% .dina_dual_button-separator-text',
                    'border_styles' => '%%order_class%% .dina_dual_button-separator-text',
                ),
                'important' => false,
            ),
            'defaults'     => array(
                'border_radii'  => 'on|0px|0px|0px|0px',
                'border_styles' => array(
                    'width' => '0px',
                    'color' => $et_accent_color,
                    'style' => 'solid',
                ),
            ),
        );

        $advanced_fields['fonts']['separator_text'] = array(
            'label'       => esc_html__( 'Separator', 'divinationkit-for-divi' ),
            'css'         => array(
                'main'      => '%%order_class%% .dina_dual_button-separator-text',
                'important' => false,
            ),
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'separator',
            'sub_toggle'  => 'separator_text',
            'font_size'   => array(
                'default' => '16px',
            ),
            'line_height' => array(
                'default' => '1.2em',
            ),
        );

        $advanced_fields['fonts']['button_two_text'] = array(
            'label'       => esc_html__( 'Button Two', 'divinationkit-for-divi' ),
            'css'         => array(
                'main'      => '%%order_class%% .dina_button_two',
                'important' => false,
            ),
            'tab_slug'    => 'advanced',
            'toggle_slug' => 'button_texts',
            'sub_toggle'  => 'button_two_text',
            'font_size'   => array(
                'default' => '16px',
            ),
            'line_height' => array(
                'default' => '1.2em',
            ),
        );
        $advanced_fields['borders']['button_two'] = array(
            'label_prefix' => esc_html__( 'Button Two', 'divinationkit-for-divi' ),
            'tab_slug'     => 'advanced',
            'toggle_slug'  => 'button_two_design',
            'css'          => array(
                'main'      => array(
                    'border_radii'  => '%%order_class%% .dina_button_two, %%order_class%% .dina_button_one.dina-border-hover-effect:before',
                    'border_styles' => '%%order_class%% .dina_button_two',
                ),
                'important' => false,
            ),
            'defaults'     => array(
                'border_radii'  => 'on|0px|0px|0px|0px',
                'border_styles' => array(
                    'width' => '0px',
                    'color' => $et_accent_color,
                    'style' => 'solid',
                ),
            ),
        );

        return $advanced_fields;
    }

    // Render Button one
    public function render_button_one() {

        $classes                        = array( 'dina_button', 'dina_button_one' );
        $button_text                    = isset( $this->props['button_one_text'] ) ? $this->props['button_one_text'] : 'Button One';
        $button_url                     = isset( $this->props['button_one_url'] ) ? $this->props['button_one_url'] : '#';
        $new_window                     = $this->props['url_new_window_one'] === 'on' ? '_blank' : '_self';
        $button_one_2d_hover_effect     = $this->props['button_one_2d_hover_effect'];
        $button_one_border_hover_effect = $this->props['button_one_border_hover_effect'];
        $button_one_bg_hover_effect     = $this->props['button_one_bg_hover_effect'];

        $icon                      = '';
        $use_button_one_icon       = $this->props['use_button_one_icon'] === 'on' ? true : false;
        $button_one_icon_placement = $this->props['button_one_icon_placement'];

        if ( $use_button_one_icon ) {
            $icon = sprintf( '<i class="dina_button_one-icon">%1$s</i>', $this->dina_render_icon( 'button_one_icon' ) );
        }

        if ( $button_one_2d_hover_effect !== '' ) {
            array_push( $classes, $button_one_2d_hover_effect );
        }

        if ( $button_one_border_hover_effect !== '' ) {
            array_push( $classes, $button_one_border_hover_effect );
            array_push( $classes, 'dina-border-hover-effect' );
        }

        if ( $button_one_bg_hover_effect !== '' ) {
            array_push( $classes, $button_one_bg_hover_effect );
            array_push( $classes, 'dina-bg-hover-effect' );
        }

        return sprintf(
            '<a href="%4$s" target="%5$s" class="%6$s">
                %1$s
                %2$s
                %3$s
            </a>',
            $button_one_icon_placement === 'left' ? $icon : '',
            $button_text,
            $button_one_icon_placement === 'right' ? $icon : '',
            $button_url, // 4
            $new_window,
            join( ' ', $classes ),
        );

    }

    // Render Button two
    public function render_button_two() {

        $classes                        = array( 'dina_button', 'dina_button_two' );
        $button_text                    = isset( $this->props['button_two_text'] ) ? $this->props['button_two_text'] : 'Button two';
        $button_url                     = isset( $this->props['button_two_url'] ) ? $this->props['button_two_url'] : '#';
        $new_window                     = $this->props['url_new_window_two'] === 'on' ? '_blank' : '_self';
        $button_two_2d_hover_effect     = $this->props['button_two_2d_hover_effect'];
        $button_two_border_hover_effect = $this->props['button_two_border_hover_effect'];
        $button_two_bg_hover_effect     = $this->props['button_two_bg_hover_effect'];

        $icon                          = '';
        $use_button_two_icon           = $this->props['use_button_two_icon'] === 'on' ? true : false;
        $button_two_icon_placement     = $this->props['button_two_icon_placement'];
        $button_two_icon_show_on_hover = $this->props['button_two_icon_show_on_hover'];

        if ( $use_button_two_icon ) {
            $icon = sprintf( '<i class="dina_button_two-icon">%1$s</i>', $this->dina_render_icon( 'button_two_icon' ) );
        }

        if ( $button_two_2d_hover_effect !== '' ) {
            array_push( $classes, $button_two_2d_hover_effect );
        }

        if ( $button_two_border_hover_effect !== '' ) {
            array_push( $classes, $button_two_border_hover_effect );
        }

        if ( $button_two_bg_hover_effect !== '' ) {
            array_push( $classes, $button_two_bg_hover_effect );
        }

        return sprintf(
            '<a href="%4$s" target="%5$s" class="%6$s">
                %1$s
                %2$s
                %3$s
            </a>',
            $button_two_icon_placement === 'left' ? $icon : '',
            $button_text,
            $button_two_icon_placement === 'right' ? $icon : '',
            $button_url, // 4
            $new_window,
            join( ' ', $classes ),
        );

    }

    public function render_separator() {

        $separator_type = $this->props['separator_type'];
        $use_separator  = $this->props['use_separator'];

        if ( $use_separator !== 'on' ) {
            return;
        }

        if ( $separator_type === 'icon' ) {
            return sprintf(
                '<div class="dina_dual_button-separator">
                    <i class="dina_icon">
                        %1$s
                    </i>
                </div>',
                $this->dina_render_icon( 'separator_icon' ),
            );
        }

        if ( $separator_type === 'text' ) {
            return sprintf(
                '<div class="dina_dual_button-separator">
                    <span class="dina_dual_button-separator-text>
                        %1$s
                    </span>
                </div>',
                $this->props['separator_text']
            );
        }
    }

    public function render( $attrs, $content, $render_slug ) {

        $this->render_css( $render_slug );
        wp_enqueue_style( 'dina-2d-hover-effects' );
        wp_enqueue_style( 'dina-border-hover-effects' );
        wp_enqueue_style( 'dina-bg-hover-effects' );

        return sprintf(
            '<div class="dina_dual_button-container">
                %1$s%2$s%3$s
            </div>',
            $this->render_button_one(),
            $this->render_separator(),
            $this->render_button_two(),
        );
    }

    public function render_css( $render_slug ) {

        // Button Icon design
        $use_button_one_icon           = $this->props['use_button_one_icon'] === 'on' ? true : false;
        $button_one_icon_placement     = $this->props['button_one_icon_placement'];
        $button_one_icon_show_on_hover = $this->props['button_one_icon_show_on_hover'];
        $use_button_two_icon           = $this->props['use_button_two_icon'] === 'on' ? true : false;
        $button_two_icon_placement     = $this->props['button_two_icon_placement'];
        $button_two_icon_show_on_hover = $this->props['button_two_icon_show_on_hover'];
        $use_separator                 = $this->props['use_separator'] === 'on' ? true : false;

        if ( $use_separator ) {
            // Generate  separator icon style
            $this->generate_styles(
                array(
                    'utility_arg'    => 'icon_font_family',
                    'render_slug'    => $render_slug,
                    'base_attr_name' => 'separator_icon',
                    'important'      => true,
                    'selector'       => '%%order_class%% .dina_button-separator-icon i.dina_icon',
                    'processor'      => array(
                        'ET_Builder_Module_Helper_Style_Processor',
                        'process_extended_icon',
                    ),
                )
            );
        }

        $this->dina_custom_bg_style( $render_slug, 'button_one', '%%order_class%% .dina_button_one', '%%order_class%% .dina_button_one:hover' );

        $this->dina_custom_bg_style( $render_slug, 'button_two', '%%order_class%% .dina_button_two', '%%order_class%% .dina_button_one:hover' );

        // Button one
        if ( $use_button_one_icon ) {
            $this->generate_styles(
                array(
                    'utility_arg'    => 'icon_font_family',
                    'render_slug'    => $render_slug,
                    'base_attr_name' => 'button_one_icon',
                    'important'      => true,
                    'selector'       => '%%order_class%% .dina_button_one-icon',
                    'processor'      => array(
                        'ET_Builder_Module_Helper_Style_Processor',
                        'process_extended_icon',
                    ),
                )
            );

            if ( $button_one_icon_placement === 'right' ) {

                if ( $button_one_icon_show_on_hover === 'on' ) {
                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => '%%order_class%% .dina_button_one-icon',
                        'declaration' => 'opacity: 0; margin-left: -1.2rem;',
                    ) );

                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => '%%order_class%% .dina_button_one:hover .dina_button_one-icon',
                        'declaration' => 'opacity: 1; margin-left: .3rem;',
                    ) );
                } else {
                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => '%%order_class%% .dina_button_one-icon',
                        'declaration' => 'margin-left: .3rem;',
                    ) );
                }
            }

            if ( $use_button_one_icon && $button_one_icon_placement === 'left' ) {

                if ( $button_one_icon_show_on_hover === 'on' ) {
                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => '%%order_class%% .dina_button_one-icon',
                        'declaration' => 'opacity: 0; margin-left: 0rem;',
                    ) );

                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => '%%order_class%% .dina_button_one:hover .dina_button_one-icon',
                        'declaration' => 'opacity: 1; margin-left: -1.2rem;',
                    ) );
                } else {
                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => '%%order_class%% .dina_button_one-icon',
                        'declaration' => 'margin-left: -1.2rem;',
                    ) );
                }
            }
        }

        // Button two
        if ( $use_button_two_icon ) {
            $this->generate_styles(
                array(
                    'utility_arg'    => 'icon_font_family',
                    'render_slug'    => $render_slug,
                    'base_attr_name' => 'button_two_icon',
                    'important'      => true,
                    'selector'       => '%%order_class%% .dina_button_two-icon',
                    'processor'      => array(
                        'ET_Builder_Module_Helper_Style_Processor',
                        'process_extended_icon',
                    ),
                )
            );

            if ( $button_two_icon_placement === 'right' ) {

                if ( $button_two_icon_show_on_hover === 'on' ) {
                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => '%%order_class%% .dina_button_two-icon',
                        'declaration' => 'opacity: 0; margin-left: -1.2rem;',
                    ) );

                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => '%%order_class%% .dina_button_two:hover .dina_button_two-icon',
                        'declaration' => 'opacity: 1; margin-left: .3rem;',
                    ) );
                } else {
                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => '%%order_class%% .dina_button_two-icon',
                        'declaration' => 'margin-left: .3rem;',
                    ) );
                }
            }

            if ( $use_button_two_icon && $button_two_icon_placement === 'left' ) {

                if ( $button_two_icon_show_on_hover === 'on' ) {
                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => '%%order_class%% .dina_button_two-icon',
                        'declaration' => 'opacity: 0; margin-left: 0rem;',
                    ) );

                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => '%%order_class%% .dina_button_two:hover .dina_button_two-icon',
                        'declaration' => 'opacity: 1; margin-left: -1.2rem;',
                    ) );
                } else {
                    ET_Builder_Element::set_style( $render_slug, array(
                        'selector'    => '%%order_class%% .dina_button_two-icon',
                        'declaration' => 'margin-left: -1.2rem;',
                    ) );
                }
            }
        }

        $this->dina_responsive_css( $render_slug, array(
            array(
                'option_slug' => 'alignment',
                'property'    => 'justify-content',
                'selector'    => '%%order_class%% .dina_dual_button-container',
            ),
            array(
                'option_slug' => 'space',
                'property'    => 'gap',
                'selector'    => '%%order_class%% .dina_dual_button-container',
            ),

            array(
                'option_slug' => 'button_one_margin',
                'property'    => 'margin',
                'selector'    => '%%order_class%% .dina_button_one',
                'hover'       => '%%order_class%% .dina_button_one:hover',
            ),
            array(
                'option_slug' => 'button_one_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_button_one',
                'hover'       => '%%order_class%% .dina_button_one:hover',
            ),

            array(
                'option_slug' => 'button_two_margin',
                'property'    => 'margin',
                'selector'    => '%%order_class%% .dina_button_two',
                'hover'       => '%%order_class%% .dina_button_two:hover',
            ),
            array(
                'option_slug' => 'button_two_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_button_two',
                'hover'       => '%%order_class%% .dina_button_two:hover',
            ),

            array(
                'option_slug' => 'icon_size',
                'property'    => 'font-size',
                'selector'    => '%%order_class%% .dina_dual_button-separator i.dina_icon',
                'hover'       => '%%order_class%% .dina_dual_button-separator:hover i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_color',
                'property'    => 'color',
                'selector'    => '%%order_class%% .dina_dual_button-separator i.dina_icon',
                'hover'       => '%%order_class%% .dina_dual_button-separator:hover i.dina_icon',
            ),
            array(
                'option_slug' => 'icon_bg',
                'property'    => 'background',
                'selector'    => '%%order_class%% .dina_dual_button-separator i.dina_icon',
                'hover'       => '%%order_class%% .dina_dual_button-separator:hover i.dina_icon',
            ),
            array(
                'option_slug' => 'text_bg',
                'property'    => 'background-color',
                'selector'    => '%%order_class%% .dina_dual_button-separator-text',
                'hover'       => '%%order_class%% .dina_dual_button-separator:hover .dina_dual_button-separator-text',
            ),
            array(
                'option_slug' => 'icon_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_dual_button-separator  i.dina_icon',
                'hover'       => '%%order_class%% .dina_dual_button-separator:hover i.dina_icon',
            ),
            array(
                'option_slug' => 'text_padding',
                'property'    => 'padding',
                'selector'    => '%%order_class%% .dina_dual_button-separator-text',
                'hover'       => '%%order_class%% .dina_dual_button-separator:hover .dina_dual_button-separator-text',
            ),
        ) );

        // Button border hover effect
        $border_hover = $this->props['button_one_border_hover_effect'];
        if ( $border_hover !== '' ) {

            if (
                $border_hover === 'dina-ripple-in' ||
                $border_hover === 'dina-ripple-out' ||
                $border_hover === 'dina-outline-in' ||
                $border_hover === 'dina-outline-out'
            ) {
                $this->dina_responsive_css( $render_slug, array(
                    array(
                        'option_slug' => 'button_one_hover_border_color',
                        'property'    => 'border-color',
                        'selector'    => '%%order_class%% .dina_button_one.dina-border-hover-effect::before',
                    ),
                    array(
                        'option_slug' => 'button_one_hover_border_width',
                        'property'    => 'border-width',
                        'selector'    => '%%order_class%% .dina_button_one.dina-border-hover-effect::before',
                    ),

                ) );
            } else {
                $this->dina_responsive_css( $render_slug, array(
                    array(
                        'option_slug' => 'button_one_hover_border_bg_color',
                        'property'    => 'background',
                        'selector'    => '%%order_class%% .dina_button_one.dina-border-hover-effect::before',
                    ),
                    array(
                        'option_slug' => 'button_one_hover_border_bg_height',
                        'property'    => 'height',
                        'selector'    => '%%order_class%% .dina_button_one.dina-border-hover-effect::before',
                    ),

                ) );
            }

        }

        // Hover BG color
        $bg_color_effect = $this->props['button_one_bg_hover_effect'];
        if ( $bg_color_effect !== '' ) {
            $this->dina_responsive_css( $render_slug, array(
                array(
                    'option_slug' => 'button_one_hover_bg_color',
                    'property'    => 'background',
                    'selector'    => '%%order_class%% .dina_button_one.dina-bg-hover-effect::before',
                ),
            ) );
        }

    }
}

new DINA_Dual_Button();