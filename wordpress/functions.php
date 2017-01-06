<?php
    
    //CSS一元管理
    if (!is_admin()) {
        function register_style() {
            wp_register_style('bootstrap', get_bloginfo('template_directory').'/css/bootstrap.paper.min.css');
            wp_register_style('xxx-common', get_bloginfo('template_directory').'/css/common.css');
            wp_register_style('pagename', get_bloginfo('template_directory').'/css/pagename.css');
        }
        function add_stylesheet() {
            // 共通
            register_style();
                wp_enqueue_style('bootstrap');
                wp_enqueue_style('xxx-common');
            if (is_front_page()) {
                wp_enqueue_style('pagename');
            }
        }
        add_action('wp_print_styles', 'add_stylesheet');
    }

    //JS一元管理
    if (!is_admin()) {
        function register_script(){
            wp_register_script('bootstrap', get_bloginfo('template_directory').'/js/bootstrap.min.js',array(),false,true);
        }
        function add_script() {
            register_script();
                wp_enqueue_script('bootstrap');
        }
        add_action('wp_print_scripts', 'add_script');
    }

    //SP用ユーザーエージェント
    //スマートフォンを判別
    function is_mobile(){
        $useragents = array(
            'iPhone', // iPhone
            'iPod', // iPod touch
            'Android.*Mobile', // 1.5+ Android *** Only mobile
            'Windows.*Phone', // *** Windows Phone
            'dream', // Pre 1.5 Android
            'CUPCAKE', // 1.5+ Android
            'blackberry9500', // Storm
            'blackberry9530', // Storm
            'blackberry9520', // Storm v2
            'blackberry9550', // Storm v2
            'blackberry9800', // Torch
            'webOS', // Palm Pre Experimental
            'incognito', // Other iPhone browser
            'webmate' // Other iPhone browser

        );
        $pattern = '/'.implode('|', $useragents).'/i';
        return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
    }

?>