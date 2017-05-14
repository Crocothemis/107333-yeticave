<main>
    <nav class="nav">
        <ul class="nav__list container">
            <li class="nav__item">
                <a href="all-lots.html">Доски и лыжи</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Крепления</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Ботинки</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Одежда</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Инструменты</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Разное</a>
            </li>
        </ul>
    </nav>
    <form class="form container<?= !empty($invalid_fields) ? ' form--invalid' : ''; ?>" action="../login.php" method="post"> <!-- form--invalid -->
        <h2>Вход</h2>
        <div class="form__item<?= array_key_exists( 'email' , $invalid_fields ) ? ' form__item--invalid' : '';  ?>"> <!-- form__item--invalid -->
            <label for="email">E-mail*</label>
            <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= array_key_exists( 'email' , $valid_fields ) ? $valid_fields['email']  : '';  ?>">
            <span class="form__error"><?= array_key_exists( 'email' , $invalid_fields ) ? $invalid_fields['email'] : '';  ?></span>
        </div>
        <div class="form__item form__item--last <?= array_key_exists( 'password' , $invalid_fields ) ? ' form__item--invalid' : '';  ?>">
            <label for="password">Пароль*</label>
            <input id="password" type="password" name="password" placeholder="Введите пароль" value="<?= array_key_exists( 'password' , $valid_fields ) ? $valid_fields['password']  : '';  ?>">
            <span class="form__error"><?= array_key_exists( 'password' , $invalid_fields ) ? $invalid_fields['password'] : '';  ?></span>
        </div>
        <button type="submit" class="button" name="login-btn">Войти</button>
    </form>
</main>