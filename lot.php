<?php
require_once 'functions.php';
require_once 'data.php';

$lot_id = $_GET['id'];
$my_lots = array();

if (isset($_POST['add-cost']) && !(array_key_exists ( $lot_id , get_my_lots() ))) {

    $arr = [ $lot_id => ['cost' => $_POST['cost'],'time' => time(), 'id' => $lot_id]];

    if (!empty(get_my_lots()))  {
        foreach (get_my_lots() as $key => $lot_cookie) {

            array_push($my_lots, $lot_cookie);
        }
    }

    array_push($my_lots, $arr);

    setcookie( 'mylots',json_encode($my_lots));

    header('Location: /mylots.php');
}

?>

<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <title>DC Ply Mens 2016/2017 Snowboard</title>
    <link href='css/normalize.min.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet'>
</head>
<body>

<?= include_templates('templates/header.php', []) ?>

<?php

if (!array_key_exists($_GET['id']-1, $lots)) {
    header('HTTP/1.1 404 Not Found');
    ?>
    <main>
        <?= include_templates('templates/nav.php', ['categories' => $categories]) ?>
        <section class='lot-item container'>
            <h2>Такого лота не существует</h2>
            <p>Перейдите на <a href='/'>главную страницу</a> для просмотра всех товаров</p>
        </section>

    </main>

    <?php
    exit();
} else
    $lot = $lots[$_GET['id']-1];

    include_templates('templates/lot.php', ['categories' => $categories, 'bets' => $bets, 'lot' => $lot, 'lot_id' => $lot_id, 'users' => $users]);
?>

<?= include_templates('templates/footer.php', ['categories' => $categories]) ?>

</body>
</html>
