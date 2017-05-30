<main>
    <?= include_templates("templates/nav.php", ['categories' => $categories]) ?>
    <form class="form container<?= !empty($invalid_fields) ? ' form--invalid' : ''; ?>" action="../sign-up.php" method="post"> <!-- form--invalid -->
        <h2>Регистрация нового аккаунта</h2>
        <div class="form__item<?= array_key_exists( 'email' , $invalid_fields ) ? ' form__item--invalid' : '';  ?>"> <!-- form__item--invalid -->
            <label for="email">E-mail*</label>
            <input id="email" type="text" name="email" placeholder="Введите e-mail">
            <span class="form__error">
                 <?= array_key_exists( 'email' , $invalid_fields ) ? $invalid_fields['email'] : '';  ?>
            </span>
        </div>
        <div class="form__item<?= array_key_exists( 'email' , $invalid_fields ) ? ' form__item--invalid' : '';  ?>">
            <label for="password">Пароль*</label>
            <input id="password" type="text" name="password" placeholder="Введите пароль">
            <span class="form__error">
                 <?= array_key_exists( 'password' , $invalid_fields ) ? $invalid_fields['password'] : '';  ?>
            </span>
        </div>
        <div class="form__item<?= array_key_exists( 'email' , $invalid_fields ) ? ' form__item--invalid' : '';  ?>">
            <label for="name">Имя*</label>
            <input id="name" type="text" name="name" placeholder="Введите имя">
            <span class="form__error">
                 <?= array_key_exists( 'name' , $invalid_fields ) ? $invalid_fields['name'] : '';  ?>
            </span>
        </div>
        <div class="form__item<?= array_key_exists( 'email' , $invalid_fields ) ? ' form__item--invalid' : '';  ?>">
            <label for="message">Контактные данные*</label>
            <textarea id="message" name="message" placeholder="Напишите как с вами связаться"></textarea>
            <span class="form__error">
                 <?= array_key_exists( 'message' , $invalid_fields ) ? $invalid_fields['message'] : '';  ?>
            </span>
        </div>
        <div class="form__item form__item--file form__item--last">
            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="../img/avatar.jpg" width="113" height="113" alt="Изображение">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" id="photo2" value="">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button" name="signup-btn">Зарегистрироваться</button>
        <a class="text-link" href="#">Уже есть аккаунт</a>
    </form>
</main>
