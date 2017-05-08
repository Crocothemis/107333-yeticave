


<main>
    <?= include_templates("templates/nav.php", []) ?>
    <section class="lot-item container">
        <h2> <?php print($lot["title"]);?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="<?php print($lot["image"]);?>" width="730" height="548" alt="Сноуборд">
                </div>
                <p class="lot-item__category">Категория: <span> <?= ($lot["category"]);?></span></p>
                <p class="lot-item__description">Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив
                    снег
                    мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
                    снаряд
                    отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом
                    кэмбер
                    позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,
                    просто
                    посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла
                    равнодушным.</p>
            </div>
            <div class="lot-item__right">
                <div class="lot-item__state">
                    <div class="lot-item__timer timer">
                        10:54:12
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost"><?= ($lot["price"]);?></span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span><?= ($lot["price"]);?></span>
                        </div>
                    </div>
                    <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
                        <p class="lot-item__form-item">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="number" name="cost" placeholder="12 000">
                        </p>
                        <button type="submit" class="button">Сделать ставку</button>
                    </form>
                </div>
                <div class="history">
                    <h3>История ставок (<span><?= isset($bets)? count($bets) : "0"; ?></span>)</h3>

                    <table class="history__list">
                        <?php

                        if (isset($bets)) {
                            foreach ($bets as $key => $bet):
                                ?>
                                <tr class="history__item">
                                    <td class="history__name"><?= ($bet["name"]);?></td>
                                    <td class="history__price"><?= ($bet["price"]);?></td>
                                    <td class="history__time"><?= timestamp_to_time(($bet["ts"]));?></td>
                                </tr>
                                <?php
                            endforeach;
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>