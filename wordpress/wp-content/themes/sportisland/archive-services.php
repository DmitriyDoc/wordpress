<?php
    get_header();
?>

    <main class="main-content">
        <h1 class="sr-only">Услуги</h1>
        <div class="wrapper">
            <?php get_template_part('tmp/breadcrumbs'); ?>
            <?php if ( have_posts() ) : ?>
                <ul class="services-list">
                <?php
                    while( have_posts() ) :
                        the_post();
                ?>
                    <li class="services-list__item service">
                        <h2 class="service__name main-heading"> <?php the_title(); ?> </h2>
                        <p class="service__text"> <?php the_field('services_description'); ?> </p>
                        <p class="service__action">
                            <a href="#modal-form" data-post-id="<?php echo $id; ?>" class="service__subscribe btn btn_modal">записаться</a>
                            <strong class="service__price price">
                                <?php the_field('services_price'); ?> <span class="price__unit">р./мес.</span>
                            </strong>
                        </p>
                        <figure class="service__thumb">
                            <img src="<?php echo get_field('services_image')['url']; ?>" alt="<?php get_field('services_image')['alt']; ?>" class="service__img">
                        </figure>
                    </li>
    <!--                <li class="services-list__item service">-->
    <!--                    <h2 class="service__name main-heading"> ЖЕНСКИЙ ФИТНЕС </h2>-->
    <!--                    <p class="service__text"> В клубе «SportIsland» вам предложат фитнес программы различных направлений и уровней подготовленности: как для новичков, так и для опытных атлетов. Поставьте себе цель и опытные тренеры приведут вас к телу вашей мечты! </p>-->
    <!--                    <p class="service__action">-->
    <!--                        <a href="#" class="service__subscribe btn">записаться</a>-->
    <!--                        <strong class="service__price price"> 2200 <span class="price__unit">р./мес.</span>-->
    <!--                        </strong>-->
    <!--                    </p>-->
    <!--                    <figure class="service__thumb">-->
    <!--                        <img src="img/services__service_pic3.jpg" alt="" class="service__img">-->
    <!--                    </figure>-->
    <!--                </li>-->
                <?php endwhile; ?>
            </ul>
            <?php
                else:
                    get_template_part('tmp/no-posts');
                endif;
            ?>
        </div>
    </main>

<?php
    get_footer();
?>