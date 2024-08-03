<?php
/*
Plugin Name: DiviNationKit for Divim
Plugin URI:  https://divinationkit.comm
Description: Divinationkit is a Powerful Divi module extension to enhance your Divi website to the next level.
Version:     1.0.3
Author:      DiviNationKitm
Author URI:  https://divinationkit.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: divinationkit-for-divim
Domain Path: /languages

Divinationkit for Divi is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Divinationkit for Divi is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Divinationkit for Divi. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * The plugin main class
 */
if (!class_exists('DINA_DIVINATIONKIT')) :

    final class DINA_Divinationkit_plugin
    {

        /**
         * Website url
         */
        const website_url = 'https://divinationkit.com';

        /**
         * Plugin version
         *
         * @var string
         */
        const version = '1.0.2';

        /**
         * Plugin documentation
         *
         * @var string
         */
        const DOCUMENTATION_LINK = 'https://divinationkit.com/docs';

        /**
         * Plugin only instance
         */
        private static $instance;

        /**
         * Class construcotr
         */
        private function __construct()
        {
            $this->define_constants();

            register_activation_hook(__FILE__, array($this, 'activate'));

            add_action('plugins_loaded', array($this, 'init_plugin'));
            add_action('divi_extensions_init', array($this, 'dne_extension_initialize'));
            add_filter('plugin_action_links_' . DINA_DIVINATIONKIT_BASE, array($this, 'add_plugin_action_links'));
        }

        /**
         * Initializes a singleton instance
         *
         * @return \DINA_Divinationkit_plugin
         */
        public static function init()
        {

            if (!isset(self::$instance) && !(self::$instance instanceof DINA_DIVINATIONKIT)) {
                $instance = new self();
            }

            return $instance;
        }

        /**
         * Define the required plugin constants
         *
         * @return void
         */
        public function define_constants()
        {

            define('DINA_DIVINATIONKIT_VERSION', self::version);
            define('DINA_DIVINATIONKIT_FILE', __FILE__);
            define('DINA_DIVINATIONKIT_DIR', plugin_dir_path(__FILE__));
            define('DINA_DIVINATIONKIT_PATH', __DIR__);
            define('DINA_DIVINATIONKIT_URL', plugins_url('', DINA_DIVINATIONKIT_FILE));
            define('DINA_DIVINATIONKIT_ASSETS', DINA_DIVINATIONKIT_URL . '/assets');
            define('DINA_DIVINATIONKIT_BASE', plugin_basename(__FILE__));

            define('DINA_DIVINATIONKIT_WEBSITE', self::website_url);
            define('DINA_DIVINATIONKIT_AUTHOR', 'DiviNationKit');
        }

        /**
         * Initialize the plugin
         *
         * @return void
         */
        public function init_plugin()
        {

            require_once DINA_DIVINATIONKIT_DIR . 'includes/functions.php';

            require_once DINA_DIVINATIONKIT_DIR . 'includes/class-assets-manager.php';
            new DINA_DIVINATIONKIT\DINA_Assets();
        }

        /**
         * Initialize divi modules
         */
        public function dne_extension_initialize()
        {
            require_once DINA_DIVINATIONKIT_DIR . 'includes/Divinationkit.php';
        }

        /**
         * Do stuff upon plugin activation
         *
         * @return void
         */
        public function activate()
        {
            $installed = get_option('dne_divi_nation_installed');

            if (!$installed) {
                update_option('dne_divi_nation_installed', time());
            }

            update_option('dne_divi_nation_version', '1.0.0');
        }

        /**
         * Add Pluign actions links
         *
         * @param mixed $links
         *
         * @return mixed $links
         */
        public function add_plugin_action_links($links)
        {

            $links[] = sprintf(
                '<a href="%1$s" target="_blank" style="color: #197efb;font-weight: 600;">
								%2$s
							</a>',
                self::DOCUMENTATION_LINK,
                esc_html__('Docs', 'dne-divi-nations')
            );

            return $links;
        }
    }

endif;

/**
 * Initializes the main plugin
 *
 * @return void
 */
function dina_divinationkit_plugin()
{
    return DINA_Divinationkit_plugin::init();
}

// Kick-off the plugin
dina_divinationkit_plugin();
