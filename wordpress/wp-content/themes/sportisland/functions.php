<?php

require_once(__DIR__ . '/includes/widget-text.php');
require_once(__DIR__ . '/includes/widget-contacts.php');
require_once(__DIR__ . '/includes/widget-socials.php');
require_once(__DIR__ . '/includes/widget-iframe.php');
require_once(__DIR__ . '/includes/widget-info.php');


add_action('after_setup_theme', 'si_setup');
add_action('wp_enqueue_scripts', 'si_scripts');
add_action( 'widgets_init', 'si_widgets' );
add_action( 'init', 'si_register_types' );

add_shortcode('si-paste-link', 'si_paste_link');

add_filter('show_admin_bar', '__return_false');
add_filter('si_widget_text', 'do_shortcode');

function si_setup() {
    register_nav_menu('menu-header', 'Меню в шапке');
    register_nav_menu('menu-footer', 'Меню в подвале');

    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    //add_theme_support('menus');
}

function si_scripts() {
    wp_enqueue_script(
      'js',
        _si_assets_path('js/js.js'),
      [],
      '1.0',
      true
    );
    wp_enqueue_style(
        'si-style',
        _si_assets_path('css/styles.css'),
        [],
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'si-social-widget',
        _si_assets_path('css/social-widget.css'),
        [],
        '1.0',
        'all'
    );
}

function si_widgets() {
    register_sidebar([
        'name'          => 'Контакты в шапке сайта',
        'id'            => "si-header",
        'before_widget' => null,
        'after_widget'  => null ,
    ]);
    register_sidebar([
        'name'          => 'Контакты в подвале сайта',
        'id'            => "si-footer",
        'before_widget' => null,
        'after_widget'  => null ,
    ]);
    register_sidebar([
        'name'          => 'Сайдбар в подвале - Колонка №1',
        'id'            => "si-footer-column-1",
        'before_widget' => null,
        'after_widget'  => null ,
    ]);
    register_sidebar([
        'name'          => 'Сайдбар в подвале - Колонка №2',
        'id'            => "si-footer-column-2",
        'before_widget' => null,
        'after_widget'  => null ,
    ]);
    register_sidebar([
        'name'          => 'Сайдбар в подвале - Колонка №3',
        'id'            => "si-footer-column-3",
        'before_widget' => null,
        'after_widget'  => null ,
    ]);
    register_sidebar([
        'name'          => 'Карта',
        'id'            => "si-map",
        'before_widget' => null,
        'after_widget'  => null ,
    ]);
    register_sidebar([
        'name'          => 'Сайдбар под картой',
        'id'            => "si-after-map",
        'before_widget' => null,
        'after_widget'  => null ,
    ]);

    register_widget('si_widget_text');
    register_widget('si_widget_contacts');
    register_widget('si_widget_social');
    register_widget('si_widget_iframe');
    register_widget('si_widget_info');
}

function si_register_types() {
    register_post_type( 'services', [
        'labels' => [
            'name'               => 'Услуги', // основное название для типа записи
            'singular_name'      => 'Услуга', // название для одной записи этого типа
            'add_new'            => 'Добавить новую услугу', // для добавления новой записи
            'add_new_item'       => 'Добавить новую услугу', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать услугу', // для редактирования типа записи
            'new_item'           => 'Новая услуга', // текст новой записи
            'view_item'          => 'Смотреть услуги', // для просмотра записи этого типа.
            'search_items'       => 'Искать услуги', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Услуги', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20, // если задано одно значение у всех типов, тогда выводятся по порядку
        'menu_icon'           => 'dashicons-smiley',
        'hierarchical'        => false,
        'supports'            => ['title'],
        'has_archive' => true
    ]);
    register_post_type( 'trainers', [
        'labels' => [
            'name'               => 'Тренеры', // основное название для типа записи
            'singular_name'      => 'Тренеры', // название для одной записи этого типа
            'add_new'            => 'Добавить нового тренера', // для добавления новой записи
            'add_new_item'       => 'Добавить нового тренера', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать тренера', // для редактирования типа записи
            'new_item'           => 'Новый тренер', // текст новой записи
            'view_item'          => 'Смотреть тренера', // для просмотра записи этого типа.
            'search_items'       => 'Искать тренера', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Тренеры', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20, // если задано одно значение у всех типов, тогда выводятся по порядку
        'menu_icon'           => 'dashicons-groups',
        'hierarchical'        => false,
        'supports'            => ['title'],
        'has_archive' => true
    ]);
    register_post_type( 'shedules', [
        'labels' => [
            'name'               => 'Занятие', // основное название для типа записи
            'singular_name'      => 'Занятие', // название для одной записи этого типа
            'add_new'            => 'Добавить новое занятие', // для добавления новой записи
            'add_new_item'       => 'Добавить новое занятие', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать занятие', // для редактирования типа записи
            'new_item'           => 'Новое занятие', // текст новой записи
            'view_item'          => 'Смотреть занятие', // для просмотра записи этого типа.
            'search_items'       => 'Искать занятие', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Занятия', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20, // если задано одно значение у всех типов, тогда выводятся по порядку
        'menu_icon'           => 'dashicons-backup',
        'hierarchical'        => false,
        'supports'            => ['title'],
        'has_archive' => true
    ]);
    register_post_type( 'prices', [
        'labels' => [
            'name'               => 'Прайсы', // основное название для типа записи
            'singular_name'      => 'Прайсы', // название для одной записи этого типа
            'add_new'            => 'Добавить новый прайс', // для добавления новой записи
            'add_new_item'       => 'Добавить новый прайс', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать прайс', // для редактирования типа записи
            'new_item'           => 'Новый прайс', // текст новой записи
            'view_item'          => 'Смотреть прайс', // для просмотра записи этого типа.
            'search_items'       => 'Искать прайс', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Прайсы', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20, // если задано одно значение у всех типов, тогда выводятся по порядку
        'menu_icon'           => 'dashicons-money-alt',
        'hierarchical'        => false,
        'supports'            => ['title'],
        'has_archive' => true
    ]);
    register_post_type( 'cards', [
        'labels' => [
            'name'               => 'Карты', // основное название для типа записи
            'singular_name'      => 'Карты', // название для одной записи этого типа
            'add_new'            => 'Добавить новые карты', // для добавления новой записи
            'add_new_item'       => 'Добавить новые карты', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать карты', // для редактирования типа записи
            'new_item'           => 'Новые карты', // текст новой записи
            'view_item'          => 'Смотреть карты', // для просмотра записи этого типа.
            'search_items'       => 'Искать карты', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Клубные карты', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20, // если задано одно значение у всех типов, тогда выводятся по порядку
        'menu_icon'           => 'dashicons-tickets-alt',
        'hierarchical'        => false,
        'supports'            => ['title'],
        'has_archive' => false
    ]);
}

function si_paste_link($attr) {
    $params = shortcode_atts([
        'link' => '',
        'text' => '',
        'type' => 'link'
    ],$attr);
    $params['text'] = $params['text'] ? $params['text'] : $params['link'];
    if ( $params['link'] ) {
        $protocol = '';
        switch ( $params['type'] ) {
            case 'email':
                $protocol = 'mailto:';
                break;
            case 'phone':
                $protocol = 'tel:';
                $params['link'] = preg_replace('/[^+0-9]/', '', $params['link'] );
                break;
            default:
                $protocol = '';
                break;
        }
        $link = $protocol . $params['link'];
        $text = $params['text'];
        return "<a href=\"${link}\">${text}</a>";
    } else {
        return '';
    }
}

function _si_assets_path($path){
    return get_template_directory_uri() . '/assets/' . $path;
}