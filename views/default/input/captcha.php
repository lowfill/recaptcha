<?php

/**
 * view to include recaptcha field in the user registration form
 * overrides Elggs default view /views/default/input/captcha.php
 * called in /views/default/forms/register.php [ echo elgg_view('input/captcha') ]
 *
 */


if(array_key_exists('recaptcha_verified', $_SESSION) && $_SESSION['recaptcha_verified'] == 1) {

    // no need for recaptcha again - user has already entered the correct value previously
   $output = "<label>".elgg_echo('recaptcha:label:human_verification')."</label><b>".elgg_echo('recaptcha:verified')."</b><br><br>";
}
else {
    if(elgg_get_plugin_setting('require_recaptcha','recaptcha') == 'on'){

        // include the recaptcha lib
        require_once(elgg_get_plugins_path() . 'recaptcha/lib/recaptchalib.php');
		
        // check if http or https 
        $use_ssl = false;
        if( isset($_SERVER['HTTPS']) && $_SERVER["HTTPS"] == "on" ) $use_ssl = true; 
               
        $publickey = elgg_get_plugin_setting('recaptcha_public_key','recaptcha');
        $output = "<label>".elgg_echo('recaptcha:label:human_verification')."</label><br>";

        $lang = elgg_trigger_plugin_hook('lang', 'captcha');
        if(empty($lang)){
        	$lang = 'en';
        }
        
        //TODO Add this to plugin settings
        $theme = elgg_get_plugin_setting('recaptcha_theme','recaptcha');
        if(empty($theme)){
        	$theme = 'clean';
        }
        
        if(!empty($vars['theme'])){
        	$theme = 'custom';
        	$custom_theme_widget = $vars['theme']."_recaptcha_theme";
        	$output .= elgg_view('input/captcha_'.$vars['theme'].'_theme');
        }
        
        $output .= "<script type='text/javascript'>
                var RecaptchaOptions = {
                        custom_translations : {
                                        instructions_visual : '" . elgg_echo('recaptcha:instructions_visual') . "',
                                        instructions_audio : '" . elgg_echo('recaptcha:instructions_audio') . "',
                                        play_again : '" . elgg_echo('recaptcha:play_again') . "',
                                        cant_hear_this : '" . elgg_echo('recaptcha:cant_here_this') . "',
                                        visual_challenge : '" . elgg_echo('recaptcha:visual_challenge') . "',
                                        audio_challenge : '" . elgg_echo('recaptcha:audio_challenge') . "',
                                        refresh_btn : '" . elgg_echo('recaptcha:refresh_btn') . "',
                                        help_btn : '" . elgg_echo('recaptcha:help_btn') . "',
                                        incorrect_try_again : '" . elgg_echo('recaptcha:incorrect_try_again') . "'
                                        },
                        lang : '" . $lang . "', // Unavailable while writing this code (just for audio challenge)
                        theme : '" . $theme . "',
                        custom_theme_widget: '{$custom_theme_widget}'
                    };
                </script>
        ";
        
        $output .= recaptcha_get_html($publickey, null, $use_ssl);
        $output .= '<br>';
    }
    else {
    	$output = '';
    }
}

echo $output;