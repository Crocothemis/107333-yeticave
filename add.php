<?php

require_once 'functions.php';

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
<?= include_templates("templates/header.php", []) ?>

<?php

$invalid_fields = [];
$valid_fields = [];

if (isset($_POST['submit-btn'])) { //если форма была отправлена

    foreach ($_POST as $key => $value) {

        if ($key !== 'image') {

            $valid_fields[$key] = htmlspecialchars($value);

            if (($key === 'title' || $key ===  'message') && empty($value)) {

                $invalid_fields[$key] = "поле должно быть заполнено";


            } else if (($key === 'price' || $key ===  'lot-step') && !is_numeric($value)) {

                $invalid_fields[$key] = 'допускаются только цифры';

            } else if (($key === 'lot-date') && !is_numeric(strtotime($value))) {

                $invalid_fields[$key] = 'введите дату';


            }  else if(($key === 'category') && ($value === "Выберите категорию")) {

                $invalid_fields[$key] = 'категория должна быть выбрана';

            }
        }

        if (isset($_FILES['image'])) {

            $img_type = $_FILES['image']['type'];

            if (($img_type == 'image/jpeg') || ($img_type == 'image/png') || ($img_type == 'image/gif') ) {

                $valid_fields['image'] = 'img/'  .  $_FILES['image']['name'];
                move_uploaded_file( $_FILES['image']['tmp_name'], 'img/' . basename($_FILES['image']['name']));

            } else {
                $invalid_fields['image'] = 'допускаются форматы png, jpg, gif';
                $form_valid = false;
            }

        } else {
            $invalid_fields['image'] = 'добавьте изображение';

        }

    }

    if (!empty($invalid_fields)) { //если форма невалидна

        echo  include_templates("templates/add-lot.php", ["invalid_fields" => $invalid_fields, 'valid_fields' => $valid_fields]);

    } else { //показать страницу с новыми данными

        echo  include_templates("templates/lot.php", ['lot' => $valid_fields]);
    }

} else { // если это первая загрузка страницы

    echo  include_templates("templates/add-lot.php", ["invalid_fields" => $invalid_fields, 'valid_fields' => $valid_fields]);

}

?>

<?= include_templates("templates/footer.php", []) ?>

</body>
</html>

