<?php

namespace Src;

class Base{

    public $plugin_path;
    public $plugin_url;
    public $plugin_prefix;

    public function __construct(){

        $this->plugin_path = plugin_dir_path( dirname( __FILE__ ) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__ ) );
        $this->plugin_prefix = 'fnsk';

    }

}
