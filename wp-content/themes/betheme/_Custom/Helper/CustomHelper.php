<?php

namespace Helper;

use RuntimeException;
require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
require_once ABSPATH . 'wp-includes/pomo/mo.php';
use MO;

class CustomHelper
{

    /** @var self */
    private static $instance;
    private $configFilePath = ABSPATH . 'wp-content/themes/betheme/_Custom/Helper/config.ini';
    private $version;
    private $email_from = 'info@tuparejaucraniana.com';
    private $email_from_name = 'Elena';
    private $env='prod';
    
    public function __construct()
    {
        $this->loadIniFile($this->configFilePath);
    }

    /**
     * Build an instance of the config object (singleton)
     *
     */
    public static function build()
    {
        self::$instance = new self();
    }

    /**
     * Store an instance of the config object (singleton)
     *
     * @return self
     * @throws RuntimeException
     */
    public static function instance()
    {
        if (empty(self::$instance)) {
            $err = 'Instance of configuration object not created yet.';
            throw new RuntimeException($err);
        }
        return self::$instance;
    }

    public function version()
    {
        return (string)$this->version;
    }
    
    public function env()
    {
        return (string)$this->env;
    }

    public function email_from()
    {
        return (string)$this->email_from;
    }

    public function email_from_name()
    {
        return (string)$this->email_from_name;
    }
    
    public function getCurrentUrl($lang=null){
        $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://";
        $requestUri = str_ireplace(['/ru'], '', $_SERVER['REQUEST_URI']);
        return (!is_null($lang)) ? "$protocol$_SERVER[HTTP_HOST]$lang$requestUri" : "$protocol$_SERVER[HTTP_HOST]$requestUri";
    }

    /**
     * Read INI file and fill up corresponding config params
     *
     * @param $initFilePath
     */
    private function loadIniFile($initFilePath)
    {
        if (!file_exists($initFilePath)) {
            throw new RuntimeException("Config file not exist by path `$initFilePath`");
        }

        $data = parse_ini_file($initFilePath);
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public static function sanitiseText($text)
    {
        require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
        $text = esc_html($text);
        $text = sanitize_text_field($text);
        $text = self::removeEmoji($text);

        return $text;
    }

    public static function getTranslationByLocale($key, $locale) {
        $mo = new MO;
        $mofile = get_template_directory() . '/languages/' . $locale . '.mo';
        $mo->import_from_file($mofile);
        return $mo->translate($key);
    }

    function convertImgPath($src)
    {
        preg_match_all('`(\/wp-content.*)`im', $src, $new_src, PREG_SET_ORDER);
        if (!empty($new_src)) {
            return $new_src[0][0];
        }
        return '';
    }

    function getCurrentAge($timestamp)
    {
        $age = date('Y') - date('Y', $timestamp);
        if (date('n') < date('n', $timestamp)) {
            $age--;
        }
        if ((date('n') == date('n', $timestamp)) && (date('j') < date('j', $timestamp))) {
            $age--;
        }
        return $age;
    }


    function eyeColorMap($color)
    {
        switch (strtolower($color)) {
            case 'hazel':
                $es_color = 'marrones';
                break;
            case 'gray':
                $es_color = 'grises';
                break;
            case 'green':
                $es_color = 'verdes';
                break;
            case 'black':
                $es_color = 'negros';
                break;
            default:
                $es_color = 'azules';
                break;
        }
        return $es_color;
    }

    function hairColorMap($color, $type='ladies')
    {
        if ($type === 'men') {
            switch (strtolower($color)) {
                case 'ginger':
                    $es_color = 'pelirrojo';
                    break;
                case 'brunette':
                    $es_color = 'moreno';
                    break;
                case 'chestnut':
                    $es_color = 'castaño';
                    break;
                default:
                    $es_color = 'rubio';
                    break;
            }
            return $es_color;
        }

        switch (strtolower($color)) {
            case 'ginger':
                $es_color = 'pelirroja';
                break;
            case 'brunette':
                $es_color = 'morena';
                break;
            case 'chestnut':
                $es_color = 'castaño';
                break;
            default:
                $es_color = 'rubia';
                break;
        }
        return $es_color;
    }

    public function getZodiac($timestamp){
        $day = date('j',$timestamp);
        $month = date('n',$timestamp);

        if(($month==1 && $day>20)||($month==2 && $day<20)) {
            $mysign = "aquarius";
        }
        if(($month==2 && $day>18 )||($month==3 && $day<21)) {
            $mysign = "pisces";
        }
        if(($month==3 && $day>20)||($month==4 && $day<21)) {
            $mysign = "aries";
        }
        if(($month==4 && $day>20)||($month==5 && $day<22)) {
            $mysign = "taurus";
        }
        if(($month==5 && $day>21)||($month==6 && $day<22)) {
            $mysign = "gemini";
        }
        if(($month==6 && $day>21)||($month==7 && $day<24)) {
            $mysign = "cancer";
        }
        if(($month==7 && $day>23)||($month==8 && $day<24)) {
            $mysign = "leo";
        }
        if(($month==8 && $day>23)||($month==9 && $day<24)) {
            $mysign = "virgo";
        }
        if(($month==9 && $day>23)||($month==10 && $day<24)) {
            $mysign = "libra";
        }
        if(($month==10 && $day>23)||($month==11 && $day<23)) {
            $mysign = "scorpio";
        }
        if(($month==11 && $day>22)||($month==12 && $day<23)) {
            $mysign = "sagittarius";
        }
        if(($month==12 && $day>22)||($month==1 && $day<21)) {
            $mysign = "capricorn";
        }
        return $mysign;
    }

    public static function removeEmoji($text)
    {
        $cleanText = "";

        // Match Emoticons
        $regexEmoticons = '/[\x{1F600}-\x{1F64F}]/u';
        $cleanText = preg_replace($regexEmoticons, '', $text);

        // Match Miscellaneous Symbols and Pictographs
        $regexSymbols = '/[\x{1F300}-\x{1F5FF}]/u';
        $cleanText = preg_replace($regexSymbols, '', $cleanText);

        // Match Transport And Map Symbols
        $regexTransport = '/[\x{1F680}-\x{1F6FF}]/u';
        $cleanText = preg_replace($regexTransport, '', $cleanText);

        return $cleanText;
    }
}
