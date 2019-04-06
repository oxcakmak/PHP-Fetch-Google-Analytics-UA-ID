<?php
/*
Author: Osman Çakmak
Skype: oxcakmak
Email: oxcakmak@hotmail.com
Website: http://oxcakmak.com/
Country: Turkey [TR]
*/

function fetchGoogleAnalyticsUAID($googleAnalyticsURL){
    // Script Regex
    $script_regex = "/<script\b[^>]*>([\s\S]*?)<\/script>/i"; 

    // UA_ID Regex
    $ua_regex = "/UA-[0-9]{5,}-[0-9]{1,}/";

    // Preg Match for Script
    // Extract all the script tags of the content
    preg_match_all($script_regex, file_get_contents($googleAnalyticsURL), $inside_script); 

    // Check for ga.gs and _trackPageview in all <script> tag
    for ($i = 0; $i < count($inside_script[0]); $i++){
        if (stristr($inside_script[0][$i], "ga.js")) $flag2_ga_js = TRUE;
    }

    // Preg Match for UA ID
    // Extract UA-ID using regular expression
    preg_match_all($ua_regex, file_get_contents($googleAnalyticsURL), $ua_id);

    // Return UA ID
    return $ua_id[0][0];
}

?>
