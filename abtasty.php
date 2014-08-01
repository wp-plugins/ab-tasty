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
?>
    <script>
    (function(){
      var ABTastyAccID = "<?php echo get_option('abtasty_js_clientid');?>";

      (function(i,s,o,g,r,a,m){i[r]=i[r]||[],i['abtiming']=1*new Date();
      a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//cdn.abtasty.co/' + ABTastyAccID + '.js','_abtasty');
    })();
    </script>
  
<?php
	
	
	
	
	
	
	
}
?>
