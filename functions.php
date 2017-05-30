<?php

require_once 'mysql_helper.php';

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
    $ts = (strtotime($ts));

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

    $host     = 'localhost';
    $database = 'yetigave';
    $user     = 'root';
    $password = '1111';
    $connection     = mysqli_connect($host, $user, $password, $database) or die("Error! " . mysqli_error($link));



//1. Функция для получения данных
function get_data($link, $query, $values = []) {

    $prepared_stmt = db_get_prepare_stmt($link, $query, $values);

    mysqli_stmt_execute($prepared_stmt);

    $result = mysqli_fetch_all(mysqli_stmt_get_result($prepared_stmt), MYSQLI_NUM);

    return $result;
}


//2. Функция для вставки данных
function insert_data($link, $query, $values) {

    $prepared_stmt = db_get_prepare_stmt($link, $query, $values);
    mysqli_stmt_execute($prepared_stmt);

    $result = mysqli_stmt_insert_id($prepared_stmt);

    return $result ? $result : false;
}


//3. Функция для обновления данных.
function update_data($link, $table_name, $new_data, $conditions) {

    $values = [];
    $new_data_sql = "";
    $conditions_sql = "";

    foreach ($new_data as $key_d => $value_d ) {

        $values[] = $new_data[$key_d][key($value_d)];

        $new_data_sql .= key($value_d )." = ?";


        if ($key_d  < count($new_data) - 1) {
            $new_data_sql .= ", ";

        }

    }

    foreach ($conditions as $key_c => $value_c) {

        $values[] = $new_data[$key_c][key($value_c)];

        $conditions_sql .= key($value_c)." = ?";


        if ($key_c < count($new_data) - 1) {
            $conditions_sql .= " AND ";

        }

    }

    $query  = 'UPDATE ' . $table_name . 'SET ' . $new_data_sql. 'WHERE ' . $conditions_sql;

    $prepared_stmt = db_get_prepare_stmt($link, $query, $values);

    $result = mysqli_stmt_affected_rows($prepared_stmt);

    return $result ? $result : false;
}

function get_time_remain($time) {
    // устанавливаем часовой пояс в Московское время
    date_default_timezone_set('Europe/Moscow');

    // временная метка для настоящего времени
    $now = time();

    // далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining

    $time_remaining_ts = (strtotime($time) - $now);
    return date("H:i", $time_remaining_ts);
}

?>
