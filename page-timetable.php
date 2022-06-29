<?php

/*
 * Template name: Страница - Расписание
 * Template Post Type: page
 */


get_header(); ?>


<div id="content">
    <div class="position-absolute top-bottom left right bg-white zi--2"></div>


    <div class="header-menu bg-white"></div>

    <div class="bg-figure bg-figure-small right top position-absolute zi1 d-flex mt-n1 trsfX-180 ">
        <div class="position-relative d-flex flex-nowrap align-items-start">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-gray-second.png" class="mw-100 min-width-300 mh-100">
        </div>
    </div>
    <div class="container position-relative zi-2">
        <div class="mb-4 zoom-lg-7">
            <?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs(); ?>
        </div>
        <div class="d-flex mx-0 justify-content-between align-items-start flex-wrap ">
            <div class="h1 bold text-dark bg-strong-blue mb-4">Расписание</div>
            <div class="position-relative d-flex align-items-center mb-4 zoom-lg-7">
                <div class="swiper-button-prev p-left-right position-relative swiper-button-prev-timetable custom-btn-swiper-prev custom-btn-swiper-prev-white-dis mt-0"></div>
                <div class="swiper-button-next p-left-right position-relative swiper-button-next-timetable custom-btn-swiper-next custom-btn-swiper-next-white-dis mt-0"></div>
            </div>
        </div>
        <div class="h3 mb-lg-5 mb-4 color-777"><?php the_field('time_work_timetable'); ?></div>
        <?php get_template_part('template-parts/timetable'); ?>
    </div>
    <div class="space-p-block"></div>

</div>


<?php get_footer(); ?>