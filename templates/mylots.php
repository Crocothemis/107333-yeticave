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
    <section class="rates container">
        <h2>Мои ставки</h2>
        <table class="rates__list">


            <?php

                foreach ($lots as $key => $lots_item) {
                    if (isset($_COOKIE["lot-" . $key])) {
                    ?>

                    <tr class="rates__item">
                        <td class="rates__info">
                            <div class="rates__img">
                                <img src="<?php print($lots_item["image"]);?>" width="54" height="40" alt="Сноуборд">
                            </div>
                            <h3 class="rates__title"><a href="/lot.php?id=<?php print($key);?>">2014 Rossignol District Snowboard</a></h3>
                        </td>
                        <td class="rates__category">
                            <?= ($lots_item["category"]);?>
                        </td>
                        <td class="rates__timer">
                            <div class="timer timer--finishing">07:13:34</div>
                        </td>
                        <td class="rates__price">
                            <?php print ($_COOKIE["cost-" . $key])?>
                        </td>
                        <td class="rates__time">
                            <?= timestamp_to_time($_COOKIE["time-" . $key]);?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </section>
</main>