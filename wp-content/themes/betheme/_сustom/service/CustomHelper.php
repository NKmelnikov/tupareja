<?php

namespace Betheme\Service;


class CustomHelper
{
    public static function sanitiseText($text){
        require_once( explode( "wp-content" , __FILE__ )[0] . "wp-load.php" );
        $text = esc_html($text);
        $text = sanitize_text_field($text);

        return $text;
    }

    public static function validateFile($text){


        return $text;
    }
}
