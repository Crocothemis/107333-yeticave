<?php
$lots = get_data($connection,'SELECT * FROM lots ORDER BY id ASC;');
$categories = get_data($connection,'SELECT * FROM categories ORDER BY id ASC;');


$bets = get_data($connection,'SELECT * FROM costs ORDER BY id ASC;');

$users = [
    [
        'email' => 'ignat.v@gmail.com',
        'name' => 'Игнат',
        'password' => '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka'
    ],
    [
        'email' => 'kitty_93@li.ru',
        'name' => 'Леночка',
        'password' => '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa'
    ],
    [
        'email' => 'warrior07@mail.ru',
        'name' => 'Руслан',
        'password' => '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW'
    ]
];
?>
