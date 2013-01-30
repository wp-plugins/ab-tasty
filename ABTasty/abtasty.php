<?php
/*
 * Plugin Name: ABTasty
 * Plugin URI: http://www.abtasty.com
 * Description: ABTasty wordpress Plugin
 * Version: 1.0
 * Author: ABTasty
 * Author URI: http://www.abtasty.com
 * License: GPLv3
 * */

$defaultText = 'Insert your ID here';

/* Runs when plugin is activated */
register_activation_hook(__FILE__,'abtasty_install'); 
function abtasty_install() {
    /* Creates new database field */
    add_option("abtasty_js_clientid", $defaultText);
}
/* Runs on plugin deactivation */
register_deactivation_hook( __FILE__, 'abtasty_remove' );
function abtasty_remove() {
    /* Deletes the database field */
    delete_option('abtasty_js_clientid');
}

if (is_admin())  {
    add_action('admin_menu', 'abtasty_admin_menu');
    function abtasty_admin_menu()  {
        add_options_page('ABTasty', 'ABTasty', 'administrator', 'ABTasty', 'abtasty_html_page');
    }
    function abtasty_html_page()  {
        $abtasty_max_news = 5;
        include_once(dirname(__FILE__) . '/abtasty_form.php');
    }
}

add_action('wp_footer','abtasty', 99999);
function abtasty()
{
    if (get_option('abtasty_js_clientid') == $defaultText)
        return;
    echo "<!-- http://www.abtasty.com -->\n";
    echo '<script src="//d1447tq2m68ekg.cloudfront.net/' . get_option('abtasty_js_clientid') . '.js" title="AB Tasty : http://www.abtasty.com"></script>' . "\n";
}
?>
