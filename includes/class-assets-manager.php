<?php


namespace DINA_DIVINATIONKIT;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Assets handlers class
 */
class DINA_Assets
{

    /**
     * Class constructor
     */
    function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_assets']);
        add_action('admin_enqueue_scripts', [$this, 'register_assets']);
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts()
    {
        return [
            'divi-default_values-script' => [
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/js/dina-default-values.js',
                'version' => filemtime(DINA_DIVINATIONKIT_PATH . '/assets/js/dina-default-values.js'),
                'deps'    => ['jquery'],
                'enqueue' => true
            ],

            //Slick
            'dina-slick' => [
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/lib/slick/slick.min.js',
                'version' => filemtime(DINA_DIVINATIONKIT_PATH . '/assets/lib/slick/slick.min.js'),
                'deps'    => ['jquery'],
                'enqueue' => false
            ],
            'dina-slick-logo-slider' => [
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/js/dina-slick-logo-slider.js',
                'version' => filemtime(DINA_DIVINATIONKIT_PATH . '/assets/js/dina-slick-logo-slider.js'),
                'deps'    => ['jquery'],
                'enqueue' => false
            ],

        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles()
    {
        return [
            'divi-nations-admin-style' => [
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/admin/css/admin.css',
                'version' => filemtime(DINA_DIVINATIONKIT_PATH . '/assets/admin/css/admin.css'),
                'enqueue' => true
            ],
            'global' => [
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/css/global.css',
                'version' => filemtime(DINA_DIVINATIONKIT_PATH . '/assets/css/global.css'),
                'enqueue' => true
            ],

            // Slick
            'dina-slick' => [
                'src'     => DINA_DIVINATIONKIT_URL . '/assets/lib/slick/slick.css',
                'version' => filemtime(DINA_DIVINATIONKIT_PATH . '/assets/lib/slick/slick.css'),
                'enqueue' => false
            ],
        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets()
    {
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false;

            if ($script['enqueue']) {
                wp_enqueue_script($handle, $script['src'], $deps, $script['version'], true);
            } else {
                wp_register_script($handle, $script['src'], $deps, $script['version'], true);
            }
        }

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;

            if ($style['enqueue']) {
                wp_enqueue_style($handle, $style['src'], $deps, $style['version']);
            } else {
                wp_register_style($handle, $style['src'], $deps, $style['version']);
            }
        }

    }
}
