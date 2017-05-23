-- все категории;
INSERT INTO categories (category_name)
VALUES ("Транспорт"),
       ("Электроника"),
       ("Хобби"),
       ("Для дома"),
       ("Животные"),
       ("Одежда"),
       ("Красота и здоровье"),
       ("Доски и лыжи"),
       ("Крепления"),
       ("Ботинки"),
       ("Разное");


-- пользователи;
-- // в качестве даты регистрации: MySQL функция NOW().
INSERT INTO users (date_of_sign_in,email,username,password,avatar,contacts)
VALUES (NOW(),
        "ignat.v@gmail.com",
        "Игнат",
        "$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka",
        "img/avatar.jpg",
        "8(925)123-45-67"),

        (NOW(),
        "kitty_93@li.ru",
        "Леночка",
        "$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa",
        "img/avatar.jpg",
        "8(925)123-45-67"),

        (NOW(),
        "warrior07@mail.ru",
        "Руслан",
        "$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW",
        "img/avatar.jpg",
        "8(925)123-45-67");

-- все объявления;
INSERT INTO lots
        (date_of_creation,
        description,
        lot_title,
        image,
        starting_price,
        date_of_completion,
        bid_rate,
        additions_to_favorites,
        user_id,
        category_id)

VALUES (NOW(),
        "Легкий маневренный сноуборд, готовый дать жару в любом парке,
        растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax,
         уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью
         и отзывчивостью, а симметричная геометрия в сочетании с классическим
         прогибом кэмбер позволит уверенно держать высокие скорости",
        "2014 Rossignol District Snowboard",
        "img/lot-1.jpg",
        109999,
        NOW() + INTERVAL 1 DAY,
        200,
        0,
        1,
        8),

        (NOW(),
        "Описание DC Ply Mens 2016/2017 Snowboard",
         "DC Ply Mens 2016/2017 Snowboard",
        "/img/lot-2.jpg",
        159999,
        NOW() + INTERVAL 2 DAY,
        200,
        0,
        2,
        8),

        (NOW(),
        "Описание креплений Union Contact Pro 2015 года размер L/XL",
         "Крепления Union Contact Pro 2015 года размер L/XL",
        "/img/lot-3.jpg",
        8000,
        NOW() + INTERVAL 3 DAY,
        200,
        0,
        3,
        9),

        (NOW(),
        "Описание ботинок для сноуборда DC Mutiny Charocal",
         "Ботинки для сноуборда DC Mutiny Charocal",
        "/img/lot-4.jpg",
        10999,
        NOW() + INTERVAL 4 DAY,
        200,
        0,
        1,
        10),

        (NOW(),
        "Описание куртки для сноуборда DC Mutiny Charocal",
         "Куртка для сноуборда DC Mutiny Charocal",
        "/img/lot-5.jpg",
        7500,
        NOW() + INTERVAL 5 DAY,
        200,
        0,
        2,
        6),

        (NOW(),
        "Описание маски Oakley Canopy",
        "Маска Oakley Canopy",
        "/img/lot-6.jpg",
        5400,
        NOW() + INTERVAL 6 DAY,
        200,
        0,
        3,
        11);

-- ставки для одного из объявлений.
INSERT INTO costs (date_of_cost,cost,user_id,lot_id)
VALUES (NOW() - INTERVAL 4 DAY,
        11500,
        1,
        1),

        (NOW() - INTERVAL 3 DAY,
        11000,
        2,
        1),

        (NOW() - INTERVAL 2 DAY,
        10500,
        3,
        1),

       (NOW() - INTERVAL 1 DAY,
        10000,
        1,
        1);
