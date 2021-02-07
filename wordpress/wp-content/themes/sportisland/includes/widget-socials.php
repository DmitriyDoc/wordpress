<?php

/**
 * Класс социального виджета.
 */
class Si_Widget_Social extends WP_Widget {

    /**
     * Регистрация виджета.
     */
    function __construct() {
        parent::__construct(
            'si_widget_social',
            'SportIsland - виджет социальных сетей',
            [
                'name' => 'SportIsland - виджет социальных сетей',
                'description' => 'Выводит соц кнопки'
            ]
        );
    }

    /**
     * Вывод виджета на сайте.
     */
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $facebook = $instance['facebook'];
        $vk = $instance['vk'];
        $youtube = $instance['youtube'];
        $instagram = $instance['instagram'];

        // URL-ссылки социальных профилей
        $facebook_profile = '<a class="facebook widget-social-links" target="_blank" href="' . $facebook . '"><i class="fa fa-facebook"></i></a>';
        $vk_profile = '<a class="vk widget-social-links" target="_blank" href="' . $vk . '"><i class="fa fa-vk"></i></a>';
        $youtube_profile = '<a class="youtube widget-social-links" target="_blank" href="' . $youtube . '"><i class="fa fa-youtube-play"></i></a>';
        $instagram_profile = '<a class="instagram widget-social-links" target="_blank" href="' . $instagram . '"><i class="fa fa-instagram"></i></a>';

        echo $args['before_widget'];

        if ( !empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<div class="social-icons">';
        echo ( !empty($facebook ) ) ? $facebook_profile : null;
        echo ( !empty($vk ) ) ? $vk_profile : null;
        echo ( !empty($youtube ) ) ? $youtube_profile : null;
        echo ( !empty($instagram ) ) ? $instagram_profile : null;
        echo '</div>';

        echo $args['after_widget'];
    }

    /**
     * Вывод и настройка виджета в админ-панели.
     */
    public function form( $instance ) {
        isset( $instance['title'] ) ? $title = $instance['title'] : null;
        empty( $instance['title'] ) ? $title = 'Социальные кнопки' : null;
        isset( $instance['facebook'] ) ? $facebook = $instance['facebook'] : null;
        isset( $instance['vk'] ) ? $vk = $instance['vk'] : null;
        isset( $instance['youtube'] ) ? $youtube = $instance['youtube'] : null;
        isset( $instance['instagram'] ) ? $instagram = $instance['instagram'] : null;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('vk'); ?>"><?php _e('Вконтакте:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('vk'); ?>" name="<?php echo $this->get_field_name('vk'); ?>" type="text" value="<?php echo esc_attr($vk); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>">
        </p>

        <?php
    }

    /**
     * Сохранение значений полей виджета.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
        $instance['vk'] = (!empty($new_instance['vk']) ) ? strip_tags($new_instance['vk']) : '';
        $instance['youtube'] = (!empty($new_instance['youtube']) ) ? strip_tags($new_instance['youtube']) : '';
        $instance['instagram'] = (!empty($new_instance['instagram']) ) ? strip_tags($new_instance['instagram']) : '';

        return $instance;
    }

}


