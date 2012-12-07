<?php
/**
 * recaptcha language pack.
 */

$english = array(
	
	'recaptcha:public_key' => 'Enter Public Key:',
    'recaptcha:private_key' => 'Enter Private Key:',
    'recaptcha:use_recaptcha_registration' => 'Use Recaptcha for user registration.',
    'recaptcha:form_error' => 'Both Public and Private keys are required',
    'recaptcha:settings_saved' => 'All settings successfully saved',
    'recaptcha:label:human_verification' => 'Human Verification: ',
	'recaptcha:human_verification_failed' => 'Human Verification Failed.<br>Please enter the correct values for the human verification field<br>
	    You can get a different challenge by clicking the refresh button indise the image',
    'recaptcha:signup' => 'Please sign up for recaptcha to get you public and private keys at %s',
    'recaptcha:verified' => 'Verified',
	'recaptcha:theme'=>'Select recaptcha theme',	

	'recaptcha:captchafail' => "The reCAPTCHA wasn't entered correctly. Go back and try it again.",
	'recaptcha:instructions_visual' => "Type the two words:",
	'recaptcha:instructions_audio' => "Type what you hear:",
	'recaptcha:play_again' => "Play sound again",
	'recaptcha:cant_hear_this' => "Download sound as MP3",
	'recaptcha:visual_challenge' => "Get a visual challenge",
	'recaptcha:audio_challenge' => "Get an audio challenge",
	'recaptcha:refresh_btn' => "Get a new challenge",
	'recaptcha:help_btn' => "Help",
	'recaptcha:incorrect_try_again' => "Incorrect. Try again.",		
);

add_translation("en", $english);
