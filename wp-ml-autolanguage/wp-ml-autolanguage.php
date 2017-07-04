<?php
/******************************************************************************************
 *
 * @link              https://github.com/danilor/
 * @since             1.0.0
 * @package           Wp_Ml_Autolanguage
 *
 * @wordpress-plugin
 * Plugin Name:       Wordpress Auto Multilanguage for WPML
 * Plugin URI:        https://github.com/danilor/wp-ml-autolanguage
 * Description:       This plugin will generate automatic post for every language when working with the WPML plugin. Use with caution. Reference: https://wpml.org/wpml-hook/wpml_admin_make_post_duplicates/. While activated, it will automatically duplicate the posts to the active languages in the WPML Configuration.
 * Version:           1.0.0
 * Author:            Danilo Josué Ramírez Mattey
 * Author URI:        https://github.com/danilor/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-ml-autolanguage
 * Domain Path:       /languages
 ******************************************************************************************/



/**********************************************
 * Lets require all necesarry files
 **********************************************/
 require_once plugin_dir_path( __FILE__ ) . 'classes/WPAutoLanguage.php';

/**********************************************
 * The code that runs during plugin activation.
 **********************************************/
$wpmlauto = new WPAutoLanguage();
/**********************************************
 * The code that adds all the require hooks
 **********************************************/
$wpmlauto ->addHooks();
/**********************************************
 * This code will execute all post actions
 **********************************************/
$wpmlauto ->post_actions();



