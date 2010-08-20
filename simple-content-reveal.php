<?php
/*
Plugin Name: Simple Content Reveal
Plugin URI: http://www.artiss.co.uk/simple-content-reveal
Description: Easily hide and reveal WordPress content
Version: 1.2
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/
wp_enqueue_script('swap_display',WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__))."simple-content-reveal.js");
// Shortcode to add reveal functionality in posts/pages
add_shortcode('reveal','sc_content_reveal');
function sc_content_reveal($paras="",$content="") {
    if ($content=="") {
        extract(shortcode_atts(array('heading'=>'','id'=>'','default'=>'','img_url'=>'','ext'=>''),$paras));
        if ($heading.$id.$default.$img_url.$ext=="") {
            return return_scr_end();
        } else {
            return return_scr_start($heading,$id,$default,$img_url,$ext);
        }  
    } else {
        return $content;
    }
}
// Function to add content reveal code, where requested
function simple_content_reveal($heading="",$id="",$default="",$img_url="",$ext="") {
    if ($heading.$id.$default.$img_url.$ext=="") {
        echo return_scr_end();
    } else {
        echo return_scr_start($heading,$id,$default,$img_url,$ext);
    }
}
// Function to write out initial script around content
function return_scr_start($heading="",$id="",$default="",$img_url="",$ext="") {
    $version=1.0;
    // Validate ID and heading
    if ($id=="") {$error=report_scr_error("No ID was specified","Simple Content Reveal");}
    if ($heading=="") {$error=report_scr_error("No heading was specified","Simple Content Reveal");}
    // Set up and validate image extension
    $ext=strtolower($ext);
    if ($ext=="") {$ext="gif";}
    if (($ext!="gif")&&($ext!="png")) {$error=report_scr_error("Invalid image extension - must be PNG or GIF","Simple Content Reveal");}
    // Set default image folder if none specified
    if ($img_url=="") {$img_url=WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__))."images/";}
    // Set up the default - hide or show
    $default=strtolower($default);
    if (($default=="hide")or($default=="")) {
        $default="none";
        $image_num=1;
    } else {
        if ($default=="show") {
            $default="block";
            $image_num=2;
        } else {
            $error=report_scr_error("Invalid default - must be blank, 'show' or 'hide'","Simple Content Reveal");
        }
    }
    if (!$error) {
        // Add image to heading, if required - it is enclosed in JavaScript, so that it doesn't
        // appear is JS is turned off
        $img_url=WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__))."images/";
        $img_code="<script type=\"text/javascript\">document.writeln('<img src=\"".$img_url."image".$image_num.".".$ext."\" id=\"scrimg_".$id."\" alt=\"Hide/reveal text\" title=\"Hide/reveal text\"/>');</script>";
        $heading = str_replace("%image%",$img_code,$heading);
        // Output JavaScript to content
        $output="<!-- Simple Content Reveal v".$version." | http://www.artiss.co.uk/simple-content-reveal -->\n";
        $output.="<div onmouseover=\"document.body.style.cursor='pointer'\" onmouseout=\"document.body.style.cursor='default'\" onclick=\"swap_display('scrdiv_".$id."','scrimg_".$id."')\">\n";
        $output.=$heading."\n";
        $output.="</div>\n";
        $output.="<script type=\"text/javascript\">document.writeln('<div style=\"display: ".$default."\" id=\"scrdiv_".$id."\">');</script>\n";
        return $output;
    }
}
// Function to write out final bit of script around content
function return_scr_end() {
    // No parameters specified - close off section
    $output="<script type=\"text/javascript\">document.writeln('</div>');</script>\n";
    $output.="<!-- End of Simple Content Reveal -->\n";
    return $output;
}
// Display errors
function report_scr_error($errorin,$plugin_name) {
    echo "<p style=\"color: #f00; font-weight: bold;\">".$plugin_name.": ".__($errorin)."</p>\n";
    return true;
}