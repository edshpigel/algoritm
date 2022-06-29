<?php $topost_num_timetable = 10001; ?>
<div class="swiper-container swiper-container-timetable ">
    <div class="swiper-wrapper">
        <?php
        $i = 0;
        while ($i <= 13) { ?>
            <div class="swiper-slide">
                <div class="date-timetable mb-3">
                    <div class="h-2px bg-body w-100 mb-2"></div>
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="fs-35 bold text-dark mr-2 pr-1">
                            <?php echo do_shortcode('[show_date day="' . $i . '"]');
                            $date_short = do_shortcode('[show_date day="' . $i . '"]'); ?>
                        </div>
                        <div class="d-block">
                            <div class="fs-16 color-999 regular mt-n2 mb-n1">
                                <?php echo do_shortcode('[show_date_week day="' . $i . '"]'); ?></div>
                            <div class="fs-16 text-dark bold"><?php echo do_shortcode('[show_date_month day="' . $i . '"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block">
                    <?php
                    $year_echo = date_i18n('Y', strtotime('+' . $i . 'day'));
                    $month_echo = date_i18n('F', strtotime('+' . $i . 'day'));
                    $day_echo = date_i18n('j', strtotime('+' . $i . 'day'));
                    $time_start = get_field('time_start');
                    $today = current_time('Ymd');
                    $full_i_post = do_shortcode('[show_date_full day="' . $i . '"]');
                    ?>
                    <?php $args = array(
                        'post_type' => 'timetables',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'meta_query' => array(
                            array(
                                'key'       => 'time_start',
                                'compare'   => '<=',
                                'value'     => $today,
                            )
                        ),
                        'meta_key'          => 'time_start',
                        'orderby'           => 'meta_value_num',
                        'order'             => 'ASC'
                    );


                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                        while ($query->have_posts()) :
                            $query->the_post(); ?>
                            <?php $week_i_post = do_shortcode('[show_date_week day="' . $i . '"]');
                            $week_time = get_field('week_time_traning');
                            if ($week_time) :
                                foreach ($week_time as $week) :
                                    if ($week === $week_i_post) :
                                        $date_minus_output = "";
                                        if (have_rows('date_minus')) :
                                            while (have_rows('date_minus')) : the_row();
                                                $date_minus_in = get_sub_field('date_minus_in');
                                                if ($date_minus_in === $full_i_post) :
                                                    $date_minus_output = $date_minus_in;
                                                endif;
                                            endwhile;
                                        endif; ?>
                                        <?php if (!($date_minus_output)) : ?>
                                            <a class="d-block position-relative text-dark mb-2 p-1 position-relative none-decoration <?php if (get_field('link_on_click') && !(get_field('show_how') == 'gray')) : ?>btn-<?php echo $topost_num_timetable; ?><?php endif; ?>" <?php if (get_field('link_on_click') && !(get_field('show_how') == 'gray')) : ?> href="<?php the_field('link_on_click'); ?>" <?php endif; ?>>
                                                <div class="content-text position-relative zi-2 p-2 <?php if (get_field('show_how') == 'gray') : echo " color-777";
                                                                                                    elseif (get_field('show_how') == 'color') : echo " text-white";
                                                                                                    endif; ?>">
                                                    <div class="fs-18 mb-2 bold">
                                                        <?php if (get_field('show_heading_or_select_meta')) :
                                                            $select_trening = get_field('select_trening');
                                                            echo esc_html($select_trening->name);
                                                        else : ?>
                                                            <?php $title_post = get_the_title();
                                                            echo $title_post; ?>
                                                        <?php endif; ?></div>
                                                    <div class="">
                                                        <?php if (get_field('time_start') || get_field('time_end')) : ?>
                                                            <div class="fs-13 mb-2"><?php the_field('time_start'); ?> - <?php the_field('time_end'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (get_field('price')) : ?>
                                                            <?php
                                                            $price = get_field('price');
                                                            $price = number_format($price, 0, '', ' '); ?>
                                                            <div class="fs-13 mb-1">Стоимость <?php echo $price; ?> ₽</div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if (get_field('show_how') == 'gray' || get_field('show_how') == 'color') : ?>
                                                    <div class="position-absolute left right top-bottom zi--3 " style="background-color: <?php if (get_field('show_how') == 'gray') : echo "#f1f1f1";
                                                                                                                                            elseif (get_field('show_how') == 'color') : the_field('color');
                                                                                                                                            endif; ?>;">
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (get_field('show_how') == 'border') : ?>
                                                    <div class="position-absolute left right top-bottom zi--3" <?php if (get_field('show_how') == 'border') : ?> style="border: 1px solid <?php the_field('color'); ?>;" <?php endif; ?>></div>
                                                    <div class="position-absolute right bottom zoom-lg-7 zoom-sm-6 zi--3 " style="border-left: 30px solid transparent; border-top: 16px solid transparent; border-bottom: 16px solid <?php the_field('color'); ?>; border-right: 30px solid <?php the_field('color'); ?>;">
                                                    </div>
                                                <?php endif; ?>
                                                <div class="position-absolute right bottom zoom-lg-7 zoom-sm-6 zi--2 mr-mb-n1px" style="border-left: 30px solid transparent; border-top: 16px solid transparent; border-bottom: 16px solid white; border-right: 30px solid white;">
                                                </div>
                                            </a>
                                            <?php if (!(get_field('show_how') == 'gray')) : ?>
                                                <input type="hidden" name="topost" id="topost" class="topost-show-<?php echo $topost_num_timetable; ?>" value="Запись на тренировку  -  <?php if (get_field('show_heading_or_select_meta')) :
                                                                                                                                                                                            $select_trening = get_field('select_trening');
                                                                                                                                                                                            echo esc_html($select_trening->name);
                                                                                                                                                                                        else : ?>
                    <?php echo $title_post; ?>
                    <?php endif; ?>  -  <?php echo do_shortcode('[show_date day="' . $i . '"]');
                                                echo " ";
                                                echo do_shortcode('[show_date_month day="' . $i . '"]'); ?>  -  Стоимость <?php echo $price; ?> ₽">
                                                <script>
                                                    $(".btn-<?php echo $topost_num_timetable; ?>").click(function() {
                                                        $(".topost-show-<?php echo $topost_num_timetable; ?>").trigger("click");
                                                    });
                                                </script>
                                            <?php endif; ?>
                                            <?php $topost_num_timetable++; ?>
                                        <?php endif; ?>
                            <?php endif;
                                endforeach;
                            endif; ?>
                        <?php
                            wp_reset_postdata();
                        endwhile;

                    else : ?>
                        <div class="color-777 fs-14">Нет тренировок в этот день</div>
                    <?php endif; ?>

                </div>
            </div>

            <?php $i++; ?>
        <?php } ?>
    </div>
</div>