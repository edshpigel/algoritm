<?php
//
// Timetable
//

function displaydate($atts)
{
    $atts = shortcode_atts(array(
        'day'   => '0'
    ), $atts);
    $plus_days = $atts['day'];
    return date_i18n('j', strtotime('+' . $plus_days . 'day'));
}
add_shortcode('show_date', 'displaydate');

function displayweek($atts)
{
    $atts = shortcode_atts(array(
        'day'   => '0'
    ), $atts);
    $plus_days = $atts['day'];
    return date_i18n('l', strtotime('+' . $plus_days . 'day'));
}
add_shortcode('show_date_week', 'displayweek');

function displaymonth($atts)
{
    $atts = shortcode_atts(array(
        'day'   => '0'
    ), $atts);
    $plus_days = $atts['day'];
    return date_i18n('F', strtotime('+' . $plus_days . 'day'));
}
add_shortcode('show_date_month', 'displaymonth');
