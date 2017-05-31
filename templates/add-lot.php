<main>
    <?= include_templates("templates/nav.php", ['categories' => $categories]) ?>
    <form class="form form--add-lot container<?= !empty($invalid_fields) ? ' form--invalid' : ''; ?>" action="../add-lot.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <div class="form__item <?= array_key_exists( 'title' , $invalid_fields ) ? '  form__item--invalid' : '';  ?>">
                <label for="title">Наименование</label>
                <input id="title" type="text" name="title" placeholder="Введите наименование лота" value="<?= array_key_exists( 'title' , $valid_fields ) ? $valid_fields['title']  : '';  ?>">
                <span class="form__error"> 
                    <?= array_key_exists( 'title' , $invalid_fields ) ? $invalid_fields['title'] : '';  ?>
                    </span>
            </div>
            <div class="form__item <?= array_key_exists( 'category' , $invalid_fields ) ? '  form__item--invalid' : '';  ?>">
                <label for="category">Категория</label>
                <select id="category" name="category" >
                    <option>Выберите категорию</option>
                    <?php foreach ($categories as $key => $value):?>
                        <option value="<?=$value[0]?>" 
                            <?= ((array_key_exists( 'category' , $valid_fields )) && ($valid_fields['category'] === $value[1])) ? 'selected' : ''; ?>>
                            <?=$value[1]?>
                        </option>
                    <?php endforeach;?>
                </select>
                <span class="form__error">
                    <?= array_key_exists( 'category' , $invalid_fields ) ? $invalid_fields['category'] : '';  ?>
                </span>
            </div>
        </div>
        <div class="form__item form__item--wide <?= array_key_exists( 'message' , $invalid_fields ) ? ' form__item--invalid' : ''; ?>">
            <label for="message">Описание</label>
            <textarea id="message" name="message" placeholder="Напишите описание лота" >
               <?php if ( array_key_exists( 'message' , $valid_fields )) {  print $valid_fields['message'];}  ?>
            </textarea>
            <span class="form__error">
                <?= array_key_exists( 'message' , $invalid_fields ) ? $invalid_fields['message'] : '';  ?>
            </span>
        </div>
        <div class="form__item form__item--file <?= array_key_exists( 'image' , $valid_fields) ? ' form__item--uploaded' :
            (array_key_exists('image' , $invalid_fields ) ? '  form__item--invalid' : '' ); ?>"> <!-- form__item--uploaded -->



            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="<?= array_key_exists( 'image' , $valid_fields ) ? $valid_fields['image']  : ''; ?>" width="113" height="113" alt="Изображение лота">

                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" id="photo2" value="" name="image">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
            <span class="form__error"><?= array_key_exists( 'image' , $invalid_fields ) ? $invalid_fields['image'] : '';  ?></span>
        </div>
        <div class="form__container-three">
            <div class="form__item form__item--small <?= array_key_exists( 'price' , $invalid_fields ) ? '  form__item--invalid' : '';  ?>">
                <label for="price">Начальная цена</label>
                <input id="price"  name="price" placeholder="0" value="<?= array_key_exists( 'price' , $valid_fields ) ? $valid_fields['price']  : '';  ?>">
                <span class="form__error"><?= array_key_exists( 'price' , $invalid_fields ) ? $invalid_fields['price'] : '';  ?></span>
            </div>
            <div class="form__item form__item--small <?= array_key_exists( 'lot-step' , $invalid_fields ) ? ' form__item--invalid' : '';  ?>">
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step"  name="lot-step" placeholder="0" value="<?= array_key_exists( 'lot-step' , $valid_fields ) ? $valid_fields['lot-step']  : '';  ?>">
                <span class="form__error"><?= array_key_exists( 'lot-step' , $invalid_fields ) ? $invalid_fields['lot-step'] : '';  ?></span>
            </div>
            <div class="form__item <?= array_key_exists( 'lot-date' , $invalid_fields ) ? '  form__item--invalid' : '';  ?>">
                <label for="lot-date">Дата завершения</label>
                <input class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="20.05.2017"  value="<?= array_key_exists( 'lot-date' , $valid_fields ) ? $valid_fields['lot-date']  : '';  ?>">
                <span class="form__error"><?= array_key_exists( 'lot-date' , $invalid_fields ) ? $invalid_fields['lot-date'] : '';  ?></span>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit"  name="submit-btn"  class="button">Добавить лот</button>
    </form>
</main>
