<?php
// This puts the lotion in the--nevermind, it shows you how to insert a Content Security Policy (or other HTTP Header) in Wordpress.
// Add this to your functions.php file (after modifying the CSP parts to suit your needs).

function cspInsert() {
	// final CSP built as chunks for easier maintenance

    // create the nonce for javascript
	$GLOBALS['nonce'] = base64_encode(random_bytes(16)); // generate a nonce
	
    $cspStart = "Content-Security-Policy: ";
	$cspDefault = "default-src 'none'; ";
	$cspScriptHeader = "script-src 'self' 'nonce-".$GLOBALS['nonce']."' 'unsafe-inline' 'unsafe-eval' ";
	$cspScriptSites = "https://*.google.com https://connect.facebook.net; ";
	$cspStyle = "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com/; ";
	$cspImages = "img-src 'self' data: https://secure.gravatar.com https://twin-iq.kickfire.com https://www.rumiview.com https://track.hubspot.com/; ";
	$cspFonts = "font-src 'self' data: https://fonts.gstatic.com; ";
	$cspConnect = "connect-src 'self' https://api.hubapi.com/hs-script-loader-public/v1/config/pixel/json https://hits-i.iubenda.com/write; ";
	$cspFrames = "frame-src 'self' https://www.google.com https://www.youtube.com; ";	
	$cspForms = "form-action 'self';";

	$cspTotal = $cspStart.$cspDefault.$cspScriptHeader.$cspScriptSites.$cspStyle.$cspImages.$cspFonts.$cspConnect.$cspFrames.$cspForms;
	header($cspTotal);
}
add_action('send_headers', 'cspInsert', 1);
?>