<?php

namespace Helper;


use RuntimeException;
require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");

class CustomHelper
{

    /** @var self */
    private static $instance;
    private $configFilePath = ABSPATH . 'wp-content/themes/betheme/_Custom/Helper/config.ini';
    private $version;
    private $host_ru;
    private $host_es;
    private $email_from = 'info@tuparejaucraniana.com';
    private $email_from_name = 'Elena';

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

    public function host_ru()
    {
        return (string)$this->host_ru;
    }

    public function host_es()
    {
        return (string)$this->host_es;
    }

    public function email_from()
    {
        return (string)$this->email_from;
    }

    public function email_from_name()
    {
        return (string)$this->email_from_name;
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

        return $text;
    }
}
