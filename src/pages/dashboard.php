<?php

namespace Src\Pages;

use Src\Base;
use Src\Callbacks\Sanitize;
use Src\Callbacks\Page;

class Dashboard extends Base{

    public $sanitize;
    public $page;

    public function __construct(){

        parent::__construct();

        $this->sanitize = new Sanitize();
        $this->page = new Page();

        add_action( 'admin_init', array( $this, 'set_admin_form' ) );
        add_action( 'admin_menu', array( $this, 'set_admin_page' ) );
    }

    public function set_admin_form(){

        register_setting(
            'fnsk_top_group',
            'fnsk_top_name',
            array( $this->sanitize, 'ctp' )
        );

        add_settings_section(
            'fnsk_top_section',
            'トップセクション',
            array( $this, 'render_top_section' ),
            'fnsk'
        );

        add_settings_field(
            'fnsk_top_field',
            'トップフィールド',
            array( $this, 'render_top_field' ),
            'fnsk',
            'fnsk_top_section'
        );

    }

    public function set_admin_page(){

        add_menu_page(
            'FNSK',
            'Fnsk',
            'manage_options',
            'fnsk',
            array( $this->page, 'dashboard' )
        );

        add_submenu_page(
            'fnsk',
            'ダッシュボード',
            'ダッシュボード',
            'manage_options',
            'fnsk',
            array( $this->page, 'dashboard' )
        );

    }

    public function render_top_section(){
        echo "トップセクション";
    }

    public function render_top_field(){
        echo "<input type='text' name='fnsk_top_name' value='".get_option('fnsk_top_name')."' />";
    }


}