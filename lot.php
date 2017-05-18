<?php

require_once 'functions.php';
require_once 'lots.php';
// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];


$lot_id = $_GET["id"];
$my_lots = array();

if (isset($_POST['add-cost']) && !(array_key_exists ( $lot_id , get_my_lots() ))) {
    
    $arr = [ $lot_id => ["cost" => $_POST["cost"],"time" => time(), "id" => $lot_id]];

    if (!empty(get_my_lots()))  {
        foreach (get_my_lots() as $key => $lot_cookie) {

            array_push($my_lots, $lot_cookie);
        }
    }

    array_push($my_lots, $arr);

    setcookie( "mylots",json_encode($my_lots));

    header("Location: /mylots.php");
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

<?php

if (!array_key_exists($_GET["id"], $lots)) {
    header("HTTP/1.1 404 Not Found");
    ?>
    <main>
        <?= include_templates("templates/nav.php", []) ?>
        <section class="lot-item container">
            <h2>Такого лота не существует</h2>
            <p>Перейдите на <a href="/">главную страницу</a> для просмотра всех товаров</p>
        </section>

    </main>

    <?php
    exit();
} else include_templates("templates/lot.php", ["bets" => $bets, "lot" => $lots[$_GET["id"]], "lot_id" => $lot_id]);
?>

<?= include_templates("templates/footer.php", []) ?>

</body>
</html>
