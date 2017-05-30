<?php
require_once 'functions.php';
require_once 'data.php';
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link href="../css/normalize.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<?= include_templates("templates/header.php", ['categories' => $categories]) ?>
<?php

$invalid_fields = [];
$valid_fields = [];

if (isset($_POST['signup-btn'])) { //если форма была отправлена

    $new_user = [];

    foreach ($_POST as $key => $value) {

        $valid_fields[$key] = htmlspecialchars($value);

        if (empty($value)) {

            if ($key === 'email') {

                $invalid_fields[$key] = 'Введите e-mail';

            } else if ($key === 'password') {

                $invalid_fields[$key] = 'Введите пароль';
            } else if ($key === 'name') {

                $invalid_fields[$key] = 'Введите свое имя';

            } else if ($key === 'message') {

                $invalid_fields[$key] = 'Оставьте свои контакты';
            }


        } else {
            $new_user[$key] = $value;
        }

        if (isset($_FILES['avatar'])) {

            $img_type = $_FILES['avatar']['type'];

            if (($img_type == 'image/jpeg') || ($img_type == 'image/png') || ($img_type == 'image/gif')) {

                $valid_fields['avatar'] = 'img/' . $_FILES['avatar']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . basename($_FILES['avatar']['name']));

                $new_user['avatar'] = 'img/' . basename($_FILES['avatar']['name']);

            } else {
                $invalid_fields['avatar'] = 'допускаются форматы png, jpg, gif';
                $form_valid = false;
            }
        }else {

            $new_user['avatar'] = 'img/user.jpg';
        }

    }

    if (!empty($invalid_fields)) { //если форма невалидна

        echo  include_templates("templates/sign-up.php", ["invalid_fields" => $invalid_fields, 'valid_fields' => $valid_fields,'categories' => $categories]);

    } else {

        if (!empty($_POST)) {

            if (searchUserByEmail($new_user['email'], $users) === NULL) {
                $query = "INSERT INTO users SET date_of_sign_in= ?, email= ?, username= ?, password= ?, avatar= ?, contacts= ?";
                $values = [
                    "date_of_sign_in" => date('Y-m-d H:i:s'),
                    "email" => $new_user["email"],
                    "username" => $new_user["name"],
                    "password" => password_hash($new_user["password"], PASSWORD_DEFAULT),
                    "avatar" => $new_user["avatar"],
                    "contacts" => $new_user["message"]
                ];

                echo insert_data($connection, $query, $values);

                header("Location: /login.php?reg=true");

            } else {

                $invalid_fields["email"] = "Такой пользователь уже зарегистрирован";
                echo include_templates("templates/sign-up.php", ["invalid_fields" => $invalid_fields, 'valid_fields' => $valid_fields,'categories' => $categories]);
            }

        }

    }

} else { // если это первая загрузка страницы

    include_templates("templates/sign-up.php", ["users" => $users, "invalid_fields" => $invalid_fields, "valid_fields" => $valid_fields,'categories' => $categories]);
}

?>
<?= include_templates("templates/footer.php", ['categories' => $categories]) ?>

</body>
</html>
