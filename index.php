<?php

/*
Plugin Name: Rexbondan, LLC Footer Cross-site and Reflective Backlinks
Plugin URI: https://www.rexbondan.com
Description: Inserts a collapsible details tag for Cross-site links and Reflective Backlinks. It reads files in the hosting account's home folder.\n ~/cross-site-links.php \n ~/reflective-backlinks.php

Version: 1.0
Author: Bob Henry
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


add_action('wp_footer', 'rxb_footer_links');
function rxb_footer_links() {

$this_site = $_SERVER['SERVER_NAME'];

$openHTML = <<<HTML
<aside class="footer-navlinks">
HTML;

include_once("~/cross-site-links.php");

$crossSiteLinks = <<<HTML
<details>
    <summary>Other Rexbonan, LLC Sites</summary>
        <ul class="cs-link">
        $cross_site_link
        </ul>
</details>

HTML;

include_once("~/reflective-backlinks.php");

$reflectiveBacklinks = <<<HTML
<details>
    <summary>Site Status Links</summary>
        <ul class="reflect-backlink">
        $reflexbacklink;
        </ul>
</details>

HTML;



$closeHTML = <<<HTML
</aside>
<style>
aside.footer-navlinks {
    margin: 20px 2.25em;
    font-size: small;
}
</style>
HTML;

return $openHTML . $crossSiteLinks . $reflectiveBackLinks . $closeHTML;

}