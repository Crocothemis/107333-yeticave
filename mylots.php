<?php
require_once 'functions.php';
require_once 'data.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?= include_templates('templates/header.php', []) ?>
<?php include_templates('templates/mylots.php',['lots' => $lots, 'categories' => $categories]);
?>
<?= include_templates('templates/footer.php', ['categories' => $categories]) ?>
</body>
</html>
