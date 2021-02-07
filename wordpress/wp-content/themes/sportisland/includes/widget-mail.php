<?php

class SI_Widget_Mail extends WP_Widget {

    public function __construct(){
        parent::__construct(
            'si_widget_mail',
            'SportIsland - виджет почты',
            [
                'name' => 'SportIsland - виджет почты',
                'description' => 'Выводит почту для обратной связи'
            ]
        );
    }

    public function form($instance){
?>
        <p>
            <label for="<?php echo $this->get_field_id('id-mail-text'); ?>">
                Текст для связи:
            </label>
            <input
                type="text"
                id="<?php echo $this->get_field_id('id-mail-text'); ?>"
                name="<?php echo $this->get_field_name('mail-text'); ?>"
                value="<?php echo $instance['mail-text']; ?>"
                class="widefat"
            >
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('id-mail'); ?>">
                Введите email:
            </label>
            <input
                type="text"
                id="<?php echo $this->get_field_id('id-mail'); ?>"
                name="<?php echo $this->get_field_name('mail'); ?>"
                value="<?php echo $instance['mail']; ?>"
                class="widefat"
            >
        </p>
<?php
    }

    public function widget($args, $instance){

 ?>
            <?php echo $instance['mail-text']; ?>
            <a href="mailto:<?php echo $instance['mail']; ?>"><?php echo $instance['mail']; ?></a>

<?php

    }

    public function update($new_instance, $old_instance){
        return $new_instance;
    }
}