<style type="text/css">
    .wrap>table td>div  {
        /*border-right: grey thin dotted;*/
		border-top: grey thin dotted;
        width: 80%;
        padding: 1em;
    }
    .abtasty_option  {
       /* height: 145px;*/
    }
    .abtasty_faq  {
        height: 170px;
    }
    .abtasty_howto  {
        /*height: 269px;*/
    }
    .abtasty_contact, .abtasty_actu  {
        height:  411px;
    }


</style>

<div class="wrap">
	<table>
		<tr>
			<td>
				<h1>Welcome on the AB Tasty plugin !</h1>
				<p>AB Tasty helps you create and manage AB Tests on your website.<br>
				This plugin will automatically paste the AB Tasty code to your whole website.<br>
				If you have any question, feel free to contact us using the form below.</p>				</p>
			</td>
			<td>
			<img src="../wp-content/plugins/ab-tasty/img/logo_AB_Tasty.png" title="ABTasty" style="margin-left:25px" alt="ABTasty"/>

			</td>
		</tr>
	</table>
    <table>
        <tr valign="top">
            <td>
               <div class="abtasty_option">
                    <form method="post" action="options.php">
                        <?php wp_nonce_field('update-options'); ?>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="page_options" value="abtasty_js_clientid"/>
                        <h2>ID Client</h2>
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">
                                    <label for="abtasty_js_clientid">
                                        ID Client
                                    </label>
                                </th>

                                <td>
                                    <?php $abtasty_js_clientid = get_option('abtasty_js_clientid'); ?>
                                    <input  name="abtasty_js_clientid" type="text" id="abtasty_js_clientid" value="<?php echo empty($abtasty_js_clientid) ? 'Paste your client ID here' : $abtasty_js_clientid; ?>" class="regular-text" <?php echo empty($abtasty_js_clientid) ? 'onclick="if(!this._ab_modified) {this.value = \'\';this._ab_modified = true;}"' : ''; ?> />
                                    <p class="description">
                                        Paste here your client ID in order to activate the plugin on your website
                                    </p>
                                </td>






                            </tr>
                            <tr valign="top">
                                <th scope="row"></th>
                                <td>
                                    <input type="submit" name="submit" id="submit" class="button-primary" value="Update"> or 
									<input type="button" class="button-primary" value="I don't have an account" onclick="window.open('http://en.abtasty.com/offer')">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </td>
			<td rowspan="3">
                <div class="abtasty_howto">
                    <h2>How to find your client ID?</h2>
                    <p>
                        In your AB Tasty dashboard click on "AB Tasty Tag".<br>
						<a href="../wp-content/plugins/ab-tasty/img/screen1.png" target="_blank"><img src="../wp-content/plugins/ab-tasty/img/screen1.png" width="300px"></a><br><br><br>

						Pick up your Client ID in the second area.
						<a href="../wp-content/plugins/ab-tasty/img/screen2.png" target="_blank"><img src="../wp-content/plugins/ab-tasty/img/screen2.png" width="300px"></a>
                    </p>
                </div>
            </td>

        </tr>
        <tr valign="top">
            <td>
                <div class="abtasty_faq">
                    <h2>FAQ</h2>
                    <ul>
						<li><a href="https://support.abtasty.com/hc/en-us/sections/200282367-Our-Answers" >The more frequently asked questions</a></li>
						<li><a href="https://support.abtasty.com/hc/en-us/articles/200238677-Quick-Start-Guide" >Quick Starter Guide</a></li>
                        <li><a href="https://support.abtasty.com/hc/en-us/articles/200288876-How-can-I-test-a-page-that-requires-a-login-or-one-that-requires-session-information-" >How to test a page that requires a login</a></li>
						<li><a href="https://support.abtasty.com/hc/en-us/articles/200321596-Recommendations-for-validating-a-test-before-publication" >Recommandations before publication</a></li>
                    </ul>
                </div>
            </td>
        </tr>
        <tr valign="top">
            <td>
                <div class="abtasty_actu">
                    <h2>News</h2>
                    <?php
                    $xmlfile = file_get_contents('http://abtasty.com/rss.php');
                    if ($xmlfile)  {
                        $rss = new SimpleXMLElement($xmlfile);
                        // echo $rss->channel->item->count();
                        for ($i = 0; $i < $abtasty_max_news and $i < $abtasty_max_news; ++$i)
                        {
                            $item = $rss->channel->item[$i];
                        ?>
                        <div class="abtasty_article">
                            <h4><a target="_blank" href="<?php echo str_replace('s=rss','s=wordpress&m=plugin',$item->link); ?>"><?php echo $item->title; ?></a></h4>
                            <p><?php echo $item->description; ?></p>
                        </div>
                        <?php
                        }
                            // $rss->channel->item);
                    }
                    else  {
                        echo '<h2>Error loading.</h2>';
                    }
                    ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="abtasty_contact">
                    <h2>Contact</h2>
                    <form action="http://en.abtasty.com/contact" method="post">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">
                                    <label for="abtasty_name">Name</label>
                                </th>
                                <td>
                                    <input type="text" id="abtasty_name" name="nom" class="regular-text"/>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="abtasty_company">Company</label>
                                </th>
                                <td>
                                    <input type="text" id="abtasty_company" name="societe" class="regular-text"/>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="abtasty_phone">Phone</label>
                                </th>
                                <td>
                                    <input type="text" id="abtasty_phone" name="phone" class="regular-text"/>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="abtasty_mail">Email</label>
                                </th>
                                <td>
                                    <input type="text" id="abtasty_mail" name="mail" class="regular-text"/>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="abtasty_message">Message</label>
                                </th>
                                <td>
                                    <textarea name="message" id="abtasty_message" style="width: 300px;" rows="7"></textarea><br/>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"></th>
                                <td>
                                    <input type="submit" name="submitted" id="submitted" class="button-primary" value="Send">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </td>
            <td></td>
        </tr>
    </table>
</div>
