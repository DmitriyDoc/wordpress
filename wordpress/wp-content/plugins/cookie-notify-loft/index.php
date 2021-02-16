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
        if ( !empty($_POST) ) {
            update_option('cnl_bg', $_POST['cnl_bg']);
            update_option('cnl_color', $_POST['cnl_color']);
            update_option('cnl_text', $_POST['cnl_text']);
            update_option('cnl_position', $_POST['cnl_position']);
        }

        $bg = get_option('cnl_bg');
        $color = get_option('cnl_color');
        $text = get_option('cnl_text');
        $position = get_option('cnl_position');
?>
        <h2>Настройки уведомления</h2>
        <form method="post">
            <p>
                <label>
                    Введите значения для цвета фона:
                    <input type="text" name="cnl_bg" value=" <?php echo $bg; ?> ">
                </label>
            </p>

            <p>
                <label>
                    Введите значения для цвета текста:
                    <input type="text" name="cnl_color" value=" <?php echo $color; ?> ">
                </label>
            </p>

            <p>
                <label>
                    Введите текст уведомления:
                    <input type="text" name="cnl_text" value=" <?php echo $text; ?> ">
                </label>
            </p>

            <fieldset>
                <legend>Выберите положение для уведомления:</legend>
            </fieldset>
            <label>
                Сверху
                <input
                    type="radio"
                    name="cnl_position"
                    value="top"
                    <?php checked('top', $position, true); ?>
                >
            </label>

            <label>
                Снизу
                <input
                    type="radio"
                    name="cnl_position"
                    value="bottom"
                    <?php checked('bottom', $position, true); ?>
                >
            </label>
            <br><br>

            <button type="submit"> Сохранить настройки  </button>
        </form>
<?php
    }

    add_action( 'wp_footer', 'cnl_front_page_view');

    function cnl_front_page_view() {
        $bg = get_option('cnl_bg');
        $color = get_option('cnl_color');
        $text = get_option('cnl_text');
        $position = get_option('cnl_position');
        $css = $position . ': 0;';
?>
        <div class="alert">
            <div class="wrapper">
                <?php echo  $text; ?>
                <br><br>
                <button class="alert__btn">Принять и закрыть</button>
            </div>
        </div>
        <style>
            .alert {
                color : <?php echo  $color; ?> ;
                background-color: <?php echo  $bg; ?>;
                position: fixed;
                <?php echo  $css; ?>
                left: 0;
                z-index: 9999999;
                text-align: center;
                padding: 20px 10px;
                width: 100%;
            }
            .alert button {
                border: 1px solid <?php echo  $color; ?>;
                color : <?php echo  $color; ?> ;
                background-color: transparent;
                font: inherit;
                font-size: 14px;
                padding: 10px 20px;
                cursor: pointer;
            }
            .alert button:hover,
            .alert button:active,
            .alert button:focus{
                background-color: <?php echo  $color; ?>;
                color: <?php echo  $bg; ?>;
                transition: 0.3s;
            }
        </style>
<?php
    }