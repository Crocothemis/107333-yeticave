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
<?= include_templates("templates/header.php", ['categories' => $categories]) ?>
<?php include_templates("templates/main.php", ['categories' => $categories, 'lots' => $lots ]);
 ?>
<?= include_templates("templates/footer.php", ['categories' => $categories]) ?>



</body>
</html>
