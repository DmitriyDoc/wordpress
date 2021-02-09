<?php
    get_header();
?>

    <main class="main-content">
        <div class="wrapper">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item breadcrumbs__item_home">
                    <a href="index.html" class="breadcrumbs__link">Главная</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="trainers.html" class="breadcrumbs__link">Тренеры</a>
                </li>
            </ul>
        </div>
        <section class="trainers">
            <div class="wrapper">
                <h1 class="main-heading trainers__h">Тренеры</h1>
                <?php if ( have_posts() ) : ?>
                    <ul class="trainers-list">
                        <?php
                            while( have_posts() ) :
                                the_post();
                        ?>
                            <li class="trainers-list__item">
                                <article class="trainer">
                                    <img src="<?php echo get_field('trainer_picture')['url']; ?>" alt="<?php echo get_field('trainer_picture')['alt']; ?>" class="trainer__thumb">
                                    <div class="trainer__wrap">
                                        <h2 class="trainer__name"> <?php the_title(); ?> </h2>
                                        <p class="trainer__text"> <?php the_field('trainer_description'); ?> </p>
                                    </div>
                                    <a href="#" class="trainer__subscribe btn">записаться</a>
                                </article>
                            </li>
    <!--                        <li class="trainers-list__item">-->
    <!--                            <article class="trainer">-->
    <!--                                <img src="img/trainers__trainer_pic2.png" alt="" class="trainer__thumb">-->
    <!--                                <div class="trainer__wrap">-->
    <!--                                    <h2 class="trainer__name"> Юзвак Дмитрий </h2>-->
    <!--                                    <p class="trainer__text"> Хореограф. Преподаватель Dance Mix, Twerk, Strip dance и др направлений. Официальный представитель UBPF. Чемпионка Европы по фитнес Бикини. Тренер по дефиле. Персональный тренер тренажерного зала. </p>-->
    <!--                                </div>-->
    <!--                                <a href="#" class="trainer__subscribe btn">записаться</a>-->
    <!--                            </article>-->
    <!--                        </li>-->
                        <?php endwhile; ?>
                    </ul>
                <?php
                    else:
                        get_template_part('tmp/no-posts');
                    endif;
                ?>
            </div>
        </section>
    </main>

<?php
    get_footer();
?>