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
<?= include_templates("templates/header.php", []) ?>

<?php
 if (isset($_SESSION['user'])) {

     $invalid_fields = [];
     $valid_fields = [];

     if (isset($_POST['submit-btn'])) { //если форма была отправлена

         $new_lot = [];
         
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

             $new_lot[$key] = $value;

         }

         if (!empty($invalid_fields)) { //если форма невалидна

             echo  include_templates("templates/add-lot.php", ["invalid_fields" => $invalid_fields, 'valid_fields' => $valid_fields,'categories' => $categories]);

         } else { //показать страницу нового лота
             
             $query = "INSERT INTO lots SET date_of_creation= ?, lot_title= ?, description= ?, image= ?, starting_price= ?, date_of_completion= ?, bid_rate= ?, user_id= ?, category_id= ?";
             $values = [
                 "date_of_creation" => date('Y-m-d H:i:s'),
                 "lot_title" => $new_lot["title"],
                 "description" =>$new_lot["message"],
                 "image" =>$new_lot["image"],
                 "starting_price" => $new_lot["price"],
                 "date_of_completion" => $new_lot["lot-date"],
                 "bid_rate" => $new_lot["lot-step"],
                 "user_id" => $_SESSION['user'][0],
                 "category_id" => $new_lot["category"]
             ];

             $created_lot = insert_data($connection, $query, $values);

             header("Location: /lot.php?id=".$created_lot);
         }

     } else { // если это первая загрузка страницы

         echo  include_templates("templates/add-lot.php", ["invalid_fields" => $invalid_fields, 'valid_fields' => $valid_fields,'categories' => $categories]);

     }
 } else {
     header( 'http/1.1 403 forbidden' );
     ?>
     <main>
         <?= include_templates("templates/nav.php", []) ?>
         <section class="lot-item container">
             <h2>Доступ ограничен</h2>
             <p>Выполните <a href="/login.php">вход</a> или <a href="/sign-up.php">зарегистрируйтесь</a> для просмотра этой страницы</p>
         </section>

     </main>

     <?php
     exit();
 }

?>

<?= include_templates("templates/footer.php", []) ?>

</body>
</html>

