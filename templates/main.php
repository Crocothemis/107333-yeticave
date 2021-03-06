<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <?php foreach ($categories as $key => $value):?>
                <li class="promo__item promo__item--other">
                    <a class="promo__link" href="all-lots.html"><?=$value[1]?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
            <select class="lots__select">
                <option>Все категории</option>
                <?php foreach ($categories as $category): ?>
                <option><?=$category?></option>
                <?php endforeach;?>
            </select>
        </div>
        <ul class="lots__list">

            <?php
            foreach ($lots as $key => $lots_item):
                $cat_index = $lots_item[11];
                ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?php print($lots_item[4]);?>" width="350" height="260" alt="Сноуборд">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"> <?= $categories[$cat_index - 1][1]; ?></span>
                        <h3 class="lot__title"><a class="text-link" href="/lot.php?id=<?php print($key+1);?>"> <?php print($lots_item[2]);?></a></h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?= $lots_item[5] ;?><b class="rub">р</b></span>
                            </div>
                            <div class="lot__timer timer">
                                <?= get_time_remain($lots_item[6]);?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            endforeach;
            ?>

        </ul>
    </section>
</main>
