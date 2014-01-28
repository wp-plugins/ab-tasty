<?php
/*
 * Plugin Name: ABTasty
 * Plugin URI: http://www.abtasty.com
 * Description: AB Tasty wordpress Plugin
 * Version: 1.4
 * Author: ABTasty
 * Author URI: http://www.abtasty.com
 * License: none
 * */


/* Runs when plugin is activated */
register_activation_hook(__FILE__,'abtasty_install'); 
function abtasty_install() {
    /* Creates new database field */
    add_option("abtasty_js_clientid", '');
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

add_action('wp_head','abtasty');
function abtasty()
{
    echo "<!-- http://www.abtasty.com -->\n";
    echo '
	
	
	<script>
    (function(){
      var ABTastyAccID = "' . get_option('abtasty_js_clientid') . '";
      var ABTastyTimeout = 2000;
      var ABTastyIP = "";
      if("undefined"!==typeof sessionStorage&&"undefined"!==typeof sessionStorage.ABTastyFrameworkCode&&0!=sessionStorage.ABTastyPagesViewed%5)sessionStorage.ABTastyPagesViewed++,"undefined"===typeof sessionStorage.ABTastyDontRun&&eval(sessionStorage.ABTastyFrameworkCode);else{if("undefined"!==typeof sessionStorage&&(void 0==sessionStorage.ABTastyPagesViewed?sessionStorage.ABTastyPagesViewed=0:sessionStorage.ABTastyPagesViewed++,"undefined"!==typeof sessionStorage.ABTastyDontRun))return;var b=(new Date).getTime(),c=document.getElementsByTagName("head")[0],a=document.createElement("script");a.setAttribute("type","text/javascript");a.setAttribute("async","true");a.setAttribute("src","//d1447tq2m68ekg.cloudfront.net/"+ABTastyAccID+".js");/MSIE [678]/.test(window.navigator.userAgent)||(window.stopABTastyAutorun=!0,a.onload=function(){var a=(new Date).getTime()-b;"undefined"!==typeof ABTastyFrameworkCode&&"undefined"!==typeof sessionStorage&&(sessionStorage.ABTastyFrameworkCode=ABTastyFrameworkCode);a>ABTastyTimeout?"undefined"!==typeof sessionStorage&&(sessionStorage.ABTastyDontRun="true"):"undefined"!==typeof ABTastyFrameworkCode&&eval(ABTastyFrameworkCode)});c.appendChild(a)}
    })();
  </script>
  
  
  ';
	
	
	
	
	
	
	
}
?>
