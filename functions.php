<?php

function include_templates($path, $variables) {
    if (file_exists ( $path )) {

        $variables = xss($variables);

        extract($variables);

        ob_start();

        $template  = $path;

        include $template;

        ob_get_contents();

    }

    return "";

}

function xss($data)
{
    if (is_array($data)) {
        $escaped = array();
        foreach ($data as $key => $value) {
            $escaped[$key] = xss($value);
        }
        return $escaped;
    }
    return htmlspecialchars($data);
}


function timestamp_to_time($ts) {
    $now = time();
    $hour_ago = $now - 60 * 60;
    $day_ago = $now - (24 * 60 * 60);

    if ($ts < $day_ago) {

        return date("d.m.y"." в ". "H:i:s", $ts);

    } else {

        if ($ts < $hour_ago) {

            return date("G"." часов назад", $ts);

        } else {

            return date("i"." минут назад", $ts);

        }

    }

}

function get_my_lots() {

    $cookie_arr = [];


    if (isset($_COOKIE["mylots"])) {

        $cookie_arr = json_decode($_COOKIE["mylots"], true);

    }
    return $cookie_arr;
}

?>