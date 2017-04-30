<?php
require_once 'functions.php';
// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

function timestamp_to_time($ts) {
    $now = time();
    $hour_ago = $now - 60 * 60;
    $day_ago = $now - (24 * 60 * 60);

    if ($ts < $day_ago) {

        return date('d.m.y'.' в '. 'H:i:s', $ts);

    } else {

        if ($ts < $hour_ago) {

            return date('G'.' часов назад', $ts);

        } else {

            return date('i'.' минут назад', $ts);

        }

    }

}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>DC Ply Mens 2016/2017 Snowboard</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?= include_templates("templates/header.php", []) ?>

<?php include_templates("templates/lot.php", ['bets' => $bets]);
?>

<?= include_templates("templates/footer.php", []) ?>

</body>
</html>
