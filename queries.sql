-- 1. получить список из всех категорий;
SELECT * FROM categories;

-- 2. получить самые новые, открытые лоты.
-- Каждый лот должен включать: название,
--                            стартовую цену,
--                            ссылку на изображение,
--                            цену,
--                            количество ставок,
--                            название категории;
SELECT lots.lot_title,
       lots.starting_price,
       lots.image,
       categories.category_name,
          (SELECT COUNT(*)
           FROM costs
           WHERE costs.lot_id = lots.id) lotCosts
FROM  lots, categories
WHERE lots.date_of_completion < NOW() + 0
AND   lots.category_id = categories.id;

-- 3. найти лот по его названию или описанию;
SELECT * FROM lots where lot_title="DC Ply Mens 2016/2017 Snowboard";
SELECT * FROM lots LIKE '%маневренный сноуборд%';


-- 4. добавить новый лот (все данные из формы добавления);
INSERT INTO lots
        (date_of_creation,
        description TEXT,
        image,
        starting_price,
        date_of_completion,
        bid_rate TINYINT,
        additions_to_favorites,
        user_id,
        winner_id,
        category_id) VALUES (NOW(),
        "Легкий маневренный сноуборд, готовый дать жару в любом парке,
        растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax,
         уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью
         и отзывчивостью, а симметричная геометрия в сочетании с классическим
         прогибом кэмбер позволит уверенно держать высокие скорости",
        "/img/lot-6.jpg",
        109999,
        NOW() + INTERVAL 3 DAY,
        bid_rate 200,
        0,
        2,
        1,
        3);


-- 5. обновить название лота по его идентификатору;
UPDATE lots SET lot_title='Маска Oakley Canopy' WHERE id=1;

-- 6. добавить новую ставку для лота;
INSERT INTO costs  (date_of_cost,
                    cost,
                    user_id,
                    lot_id) VALUES (NOW(),
                    12999,
                    3,
                    1);

-- 7. получить список ставок для лота по его идентификатору
SELECT * FROM costs where lot_id=1;