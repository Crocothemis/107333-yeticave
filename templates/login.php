<main>
    <?= include_templates('templates/nav.php', ['categories' => $categories]) ?>


    <form class="form container<?= !empty($invalid_fields) ? ' form--invalid' : ''; ?>" action="../login.php" method="post">
        <?php
        if (isset($_GET['reg'])) {?>
            <h2>Теперь вы можете войти, используя свой email и пароль</h2>
        <?php
        } else {
        ?>
        <h2>Вход</h2>
        <?php }
        ?>
        <div class="form__item<?= array_key_exists( 'email' , $invalid_fields ) ? ' form__item--invalid' : '';  ?>">
            <label for="email">E-mail*</label>
            <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= array_key_exists( 'email' , $valid_fields ) ? $valid_fields['email']  : '';  ?>">
            <span class="form__error">
                <?= array_key_exists( 'email' , $invalid_fields ) ? $invalid_fields['email'] : '';  ?>
            </span>
        </div>
        <div class="form__item form__item--last <?= array_key_exists( 'password' , $invalid_fields ) ? ' form__item--invalid' : '';  ?>">
            <label for="password">Пароль*</label>
            <input id="password" type="password" name="password" placeholder="Введите пароль" value="<?= array_key_exists( 'password' , $valid_fields ) ? $valid_fields['password']  : '';  ?>">

            <span class="form__error">
                <?= array_key_exists( 'password' , $invalid_fields ) ? $invalid_fields['password'] : '';  ?>
            </span>
        </div>
        <button type="submit" class="button" name="login-btn">Войти</button>
    </form>
</main>
