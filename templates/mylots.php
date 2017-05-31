<main>
    <?= include_templates('templates/nav.php', ['categories' => $categories]) ?>
    <section class="rates container">
        <h2>Мои ставки</h2>
        <table class="rates__list">

            <?php

            foreach (get_my_lots() as $key => $lot_cookie) {
                foreach ($lot_cookie as $key_cookie => $cookie_item) {

                    $id = $cookie_item['id'];
                    $key_cookie = $key_cookie - 1;
                    ?>

                    <tr class="rates__item">
                        <td class="rates__info">
                            <div class="rates__img">
                                <img src="<?php print($lots[$key_cookie][4]); ?>" width="54" height="40" alt="Сноуборд">
                            </div>
                            <h3 class="rates__title"><a href="/lot.php?id=<?php print $id; ?>">
                                    <?php print($lots[$key_cookie][2]); ?>
                                </a></h3>
                        </td>
                        <td class="rates__category">
                            <?php print ($categories[$lots[$key_cookie][11]-1][1]); ?>
                        </td>
                        <td class="rates__timer">
                            <div class="timer timer--finishing">07:13:34</div>
                        </td>
                        <td class="rates__price">
                            <?php print ($cookie_item['cost']) ?>
                        </td>
                        <td class="rates__time">
                            <?= timestamp_to_time($cookie_item['time']); ?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </section>
</main>
