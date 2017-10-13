<?php
/*
Plugin Name: CMB for Axeos PBX
Description: This plugin enables you to easily add call-me-back functionality to your business website utilizing the API of your awesome Axeos cloud PBX.
Version: 1.0
Author: Olle Kunnen
Author URI: https://github.com/olku
*/

// create custom plugin settings menu
add_action('admin_menu', 'cmb_plugin_create_menu');

function cmb_plugin_create_menu() {

// create new top-level WordPress menu item
add_menu_page('CMB plugin settings', 'CMB Settings', 'administrator', __FILE__, 'cmb_plugin_settings_page' , plugins_url('/images/icon.png', __FILE__) );
    }

function cmb_plugin_settings_page() {
    if (isset($_POST['save'])){
        update_option('api_key',$_POST['api_key']);
        update_option('pbx_ip', $_POST['pbx_ip']);
        update_option('context', $_POST['context']);
        
    }
?>

<div class="wrap">
<h1>CMB settings (Axeos cloud PBX settings)</h1>
<p>Paste the following shortcode anywhere in your website to display the phone number input field and call button: <b>[cmb_form]</b></p>
<form method="post" action="#">
    <table class="form-table">
        <tr valign="top">
        <th scope="row">API key</th>
        <td><input type="text" name="api_key" value="<?php echo esc_attr( get_option('api_key') ); ?>"  style="width: 24%;" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">PBX IP</th>
        <td><input type="text" name="pbx_ip" value="<?php echo esc_attr( get_option('pbx_ip') ); ?>"  style="width: 24%;"  /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">CMB Context</th>
        <td><input type="text" name="context" value="<?php echo esc_attr( get_option('context') ); ?>"  style="width: 24%;"  /></td>
        </tr>
    </table>
    <input type="submit" name="save" value="Save Changes" />

</form>
</div>

<?php } 
function call_me_back($atts, $content = null) {
    $api_key = get_option( 'api_key' );
    $pbx_ip = get_option( 'pbx_ip' );
    $context = get_option( 'context' );
    
if($_REQUEST["number"]!=null){
        $post_string = 'key='.$api_key.'&name='.$context.'&number='.$_POST['number'];
        $gatewayurl = 'https://'.$pbx_ip.'/apis/lsp/callMeBack';
        $response = wp_remote_post( $gatewayurl, array(
                    'method'       => 'POST',
                    'body'         => $post_string,
                    'redirection'  => 0,
                    'timeout'      => 30,
                    'sslverify'    => false,
                ) );
       
       if ( is_wp_error($response) || ! isset($response['body']) )
        return '';
     return 'Thank you! We will call you a.s.a.p.';
} else {
?>

<p>
<form method='post' id="callback">
    <span class="call-span"> Phone number: </span><input type="number" name='number' name="Phone Number" title="numbers only" required=""/>
    <input type='submit' value='Call me' />
</form>
</p>
<?php } 
}
add_shortcode('cmb_form', 'call_me_back');