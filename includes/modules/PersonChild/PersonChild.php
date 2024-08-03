<?php

class DINA_Person_Child extends DINA_Module_Core {

    public function init() {
        $this->name                        = esc_html__( 'Social Network', 'divinationkit-for-divi' );
        $this->slug                        = 'dina_person_child';
        $this->vb_support                  = 'on';
        $this->type                        = 'child';
        $this->main_css_element            = "%%order_class%%";
        $this->advanced_setting_title_text = esc_html__( 'Social Network', 'dina-divinationkit' );
        $this->settings_text               = esc_html__( 'Social Network Settings', 'dina-divinationkit' );
        $this->child_title_var             = 'social_network';

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'network' => esc_html__( 'Network', 'divinationkit-for-divi' ),
                    'link'    => esc_html__( 'Link', 'divinationkit-for-divi' ),
                    'target'  => esc_html__( 'Link Window', 'divinationkit-for-divi' ),
                ),
            ),
        );
    }

    function get_fields() {
        return array(
            'social_network' => array(
                'label'           => esc_html__( 'Social Network', 'et_builder' ),
                'type'            => 'select',
                'option_category' => 'basic_option',
                'options'         => array(
                    'facebook'  => esc_html__( 'Facebook', 'divinationkit-for-divi' ),
                    'twitter'   => esc_html__( 'X (Twitter)', 'divinationkit-for-divi' ),
                    'pinterest' => esc_html__( 'Pinterest', 'divinationkit-for-divi' ),
                    'instagram' => esc_html__( 'Instagram', 'divinationkit-for-divi' ),
                    'linkedin'  => esc_html__( 'Linkedin', 'divinationkit-for-divi' ),
                    'tumblr'    => esc_html__( 'Tumblr', 'divinationkit-for-divi' ),
                    'skype'     => esc_html__( 'Skype', 'divinationkit-for-divi' ),
                    'vimeo'     => esc_html__( 'Vimeo', 'divinationkit-for-divi' ),
                    'dribbble'  => esc_html__( 'Dribbble', 'divinationkit-for-divi' ),
                    'behance'   => esc_html__( 'Behance', 'divinationkit-for-divi' ),
                    'flickr'    => esc_html__( 'Flickr', 'divinationkit-for-divi' ),
                    'github'    => esc_html__( 'Github', 'divinationkit-for-divi' ),
                    'telegram'  => esc_html__( 'Telegram', 'divinationkit-for-divi' ),
                    'tiktok'    => esc_html__( 'TikTok', 'divinationkit-for-divi' ),
                    'twitch'    => esc_html__( 'Twitch', 'divinationkit-for-divi' ),
                    'whatsapp'  => esc_html__( 'WhatsApp', 'divinationkit-for-divi' ),
                    'youtube'   => esc_html__( 'YouTube', 'divinationkit-for-divi' ),
                    'spotify'   => esc_html__( 'Spotify', 'divinationkit-for-divi' ),
                    'other'     => esc_html__( 'Select Other', 'divinationkit-for-divi' ),
                ),
                'default'         => 'facebook',
                'toggle_slug'     => 'network',
            ),

            'icon'           => array(
                'label'       => esc_html__( 'Select Icon', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Select social network icon', 'divinationkit-for-divi' ),
                'type'        => 'select_icon',
                'toggle_slug' => 'network',
                'show_if'     => array(
                    'social_network' => 'other',
                ),
            ),

            'url'            => array(
                'label'           => esc_html__( 'Account Link URL', 'divinationkit-for-divi' ),
                'description'     => esc_html__( 'The URL for this social network link', 'divinationkit-for-divi' ),
                'type'            => 'text',
                'dynamic_content' => 'url',
                'toggle_slug'     => 'link',
                'show_if_not'     => array(
                    'social_network' => 'skype',
                ),
            ),

            'target'         => array(
                'label'       => esc_html__( 'Link Target', 'divinationkit-for-divi' ),
                'description' => esc_html__( 'Here you can choose whether or not your links opens in a new window', 'divinationkit-for-divi' ),
                'type'        => 'select',
                'options'     => array(
                    'off' => esc_html__( 'In The Same Window', 'divinationkit-for-divi' ),
                    'on'  => esc_html__( 'In The New Tab', 'divinationkit-for-divi' ),
                ),
                'toggle_slug' => 'link',
                'show_if_not' => array(
                    'social_network' => 'skype',
                ),
            ),

            'username'       => array(
                'label'       => esc_html__( 'Account Username', 'divinationkit-for-divi' ),
                'type'        => 'text',
                'toggle_slug' => 'network',
                'show_if'     => array(
                    'social_network' => 'skype',
                ),
            ),

            'skype_action'   => array(
                'label'       => esc_html__( 'Skype Button Action', 'divinationkit-for-divi' ),
                'type'        => 'select',
                'options'     => array(
                    'call' => esc_html__( 'Call', 'divinationkit-for-divi' ),
                    'chat' => esc_html__( 'Chat', 'divinationkit-for-divi' ),
                ),
                'default'     => 'call',
                'toggle_slug' => 'network',
                'show_if'     => array(
                    'social_network' => 'skype',
                ),
            ),
        );
    }

    public function get_advanced_fields_config() {
        $advanced_fields                 = array();
        $advanced_fields['text']         = false;
        $advanced_fields['text_shadow']  = false;
        $advanced_fields['fonts']        = false;
        $advanced_fields['link_options'] = false;
        $advanced_fields['sticky']       = false;

        return $advanced_fields;
    }

    public function render( $attrs, $content, $render_slug ) {

        $social_network = $this->props['social_network'];
        $url            = $this->props['url'] ? $this->props['url'] : '#';
        $target         = $this->props['target'] === 'on' ? '_blank' : '';
        $skype_username = $this->props['username'];
        $skype_url      = '';
        $skype_action   = $this->props['skype_action'];
        $is_skype       = false;

        if ( 'skype' === $social_network ) {
            $skype_url = sprintf(
                'skype:%1$s?%2$s',
                sanitize_text_field( $skype_username ),
                sanitize_text_field( $skype_action )
            );
            $is_skype = true;
        }

        $social_network_url = $is_skype ? $skype_url : esc_url( $url );

        return sprintf(
            '<a href="%2$s" class="dina_person-social-network" target="%3$s">
                <span class="dina_person-social-icon-%1$s"></span>
            </a>',
            $social_network,
            $social_network_url,
            esc_attr( $target )
        );
    }

}

new DINA_Person_Child();