<?php

class DINA_FaqAccordion extends DINA_Module_Core {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . 'modules/faq-accordion/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {

        $this->name            = esc_html__( 'FAQ Accordion', 'divinationkit-for-divi' );
        $this->icon_path       = $this->dina_module_icon( 'faq-accordion' );
        $this->slug            = 'dina_pricelist';
        $this->child_slug      = 'dina_pricelist_child';
        $this->child_item_text = esc_html__( 'Price Item', 'divinationkit-for-divi' );
        $this->vb_support      = 'on';
        $this->folder_name     = 'Divi Nation Kit';

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
}