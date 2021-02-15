<?php
/*
Plugin Name: Cookie Notify by Loft
Description: Выводит уведомление для пользователей сайта о том, что сайт успользует cookie (Плагин для демонстрации создания )
*/

register_activation_hook(__FILE__,'cnl_activation');
register_deactivation_hook(__FILE__,'cnl_deactivation');

function options() {
    return [
        'cnl_bg' => '#000',
        'cnl_color' => '#fff',
        'cnl_text' => 'Мы используем куки',
        'cnl_position' => 'bottom'
    ];
}

function cnl_activation() {
    $options = options();
    foreach ($options as $key => $value){
        update_option($key, $value);
    }
}

function cnl_deactivation() {
    $options = options();
    foreach ($options as $key => $value){
        delete_option($key);
    }
}

//add_action('wp_footer', function(){
//    $options = options();
//    foreach ($options as $key => $value){
//        echo $key . ' =>' . get_option($key) .'<br>';
//    }
//});

add_action( 'admin_menu', 'cnl_register_menu');

function cnl_register_menu() {
    add_menu_page(
        'Cookie уведомление',
        'Cookie уведомление',
        'manage_options',
        'cnl-settings',
        'cnl_admin_page_view',
        'dashicons-buddicons-community'

    );
}

function cnl_admin_page_view() {
    echo '<h1>Hello , World!</h1>';
}