<?php
class Language {

    private $lang;
    private $ini;

    public function __construct()
    {
        global $config;
        $this->lang = $config['default_lang'];

        if(!empty($_SESSION['lang']) && file_exists('lang/'.$_SESSION['lang'].'.ini')) {
            $this->lang = $_SESSION['lang'];
        }

        $this->ini = parse_ini_file('lang/'.$this->lang.'.ini');
    }

    public function get($word, $return = false)
    {
        $text = $word;

        if (isset($this->ini[$word])) {
            $text = $this->ini[$word];
        }

        if ($return) {
            return $text;
        } else {
            echo $text;
        }
    }
}