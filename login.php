<?php
require_once 'functions.php';
require_once 'userdata.php';

function searchUserByEmail($email, $users){
    $result = null;

    foreach ($users as $user) {

        if ($user['email'] == $email) {

            $result = $user;
            break;

        }
    }
    return $result;
}
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

if (isset($_POST['login-btn'])) { //если форма была отправлена

    foreach ($_POST as $key => $value) {

        $valid_fields[$key] = htmlspecialchars($value);

        if (empty($value)) {

            if ($key === 'email') {

                $invalid_fields[$key] = 'Введите e-mail';

            } else if ($key === 'password') {

                $invalid_fields[$key] = 'Введите пароль';
            }

        }

    }

    if (!empty($invalid_fields)) { //если форма невалидна

        echo  include_templates("templates/login.php", ["invalid_fields" => $invalid_fields, 'valid_fields' => $valid_fields]);

    } else { // если валидна - залогинить пользователя (проверить что емайл и пароль есть, создать сессию) и перенаправить на главную страницу
        //session_start();

        if (!empty($_POST)) {

            $email = $_POST['email'];

            $password = $_POST['password'];

            if ($user = searchUserByEmail($email, $users)) {

                if (password_verify($password, $user['password'])) {

                    echo  $_SESSION['user'] = $user;

                    header("Location: /index.php");

                } else {

                    $invalid_fields['password'] = 'Вы ввели неверный пароль';

                    echo  include_templates("templates/login.php", ["invalid_fields" => $invalid_fields, 'valid_fields' => $valid_fields]);
                }
            }
        }

    }

} else { // если это первая загрузка страницы

    include_templates("templates/login.php", ["invalid_fields" => $invalid_fields, 'valid_fields' => $valid_fields]);

}

?>




<?= include_templates("templates/footer.php", []) ?>



</body>
</html>
