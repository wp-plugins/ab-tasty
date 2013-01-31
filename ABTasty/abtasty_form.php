
<style type="text/css">
    .wrap>table td>div  {
        border: grey thin solid;
        width: 80%;
        padding: 1em;
    }
    .abtasty_option  {
        height: 145px;
    }
    .abtasty_faq  {
        height: 94px;
    }
    .abtasty_howto  {
        height: 269px;
    }
    .abtasty_contact, .abtasty_actu  {
        height:  411px;
    }
</style>

<div class="wrap">
    <img src="http://www.abtasty.com/interface/img/logo_AB_Tasty.png" title="ABTasty" alt="ABTasty"/>
    <table>
        <tr valign="top">
            <td rowspan="2">
                <div class="abtasty_howto">
                    <h3>Comment Trouver l'ID Client &agrave; Coller ?</h3>
                    <p>
                        HOWTO
                    </p>
                </div>
            </td>
            <td>
               <div class="abtasty_option">
                    <form method="post" action="options.php">
                        <?php wp_nonce_field('update-options'); ?>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="page_options" value="abtasty_js_clientid"/>
                        <h3>ID Client</h3>
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">
                                    <label for="abtasty_js_clientid">
                                        ID Client
                                    </label>
                                </th>
                                <td>
                                    <input name="abtasty_js_clientid" type="text" id="abtasty_js_clientid" value="<?php echo get_option('abtasty_js_clientid'); ?>" class="regular-text"/>
                                    <p class="description">
                                        HOWTOSHORT
                                    </p>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"></th>
                                <td>
                                    <input type="submit" name="submit" id="submit" class="button-primary" value="Modifier">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div> 
            </td>
        </tr>
        <tr valign="top">
            <td>
                <div class="abtasty_faq">
                    <h3>FAQ</h3>
                    <ul>
                        <li><a href="https://abtasty.com/help/">Aide en Ligne (Clients)</a></li>
                        <li><a href="https://abtasty.com/faq">Questions Fr&eacute;quentes</a></li>
                    </ul>
                </div>
            </td>
        </tr>
        <tr valign="top">
            <td>
                <div class="abtasty_actu">
                    <h3>
                        Actu
                    </h3>
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
                            <h4><a href="<?=$item->link?>"><?=$item->title?></a></h4>
                            <p><?=$item->description?></p>
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
            <td>
                <div class="abtasty_contact">
                    <h3>Contact</h3>
                    <form action="http://en.abtasty.com/contact" method="post">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">
                                    <label for="abtasty_name">Nom</label>
                                </th>
                                <td>
                                    <input type="text" id="abtasty_name" name="nom" class="regular-text"/>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="abtasty_company">Soci&eacute;te</label>
                                </th>
                                <td>
                                    <input type="text" id="abtasty_company" name="societe" class="regular-text"/>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="abtasty_phone">T&eacute;l&eacute;phone</label>
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
                                    <input type="submit" name="submitted" id="submitted" class="button-primary" value="Envoyer">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </td>
        </tr>
    </table>
</div>
