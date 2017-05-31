<?php
$lots = get_data($connection,'SELECT id, date_of_creation, lot_title, description, image VARCHAR, starting_price, date_of_completion, bid_rate, additions_to_favorites, user_id, winner_id, category_id FROM lots ORDER BY id ASC;');
$categories = get_data($connection,'SELECT id, category_name FROM categories ORDER BY id ASC;');
$bets = get_data($connection,'SELECT id, date_of_cost, cost, user_id, lot_id FROM costs ORDER BY id ASC;');
$users = get_data($connection,'SELECT id, date_of_sign_in, email, username, password, avatar, contacts FROM users ORDER BY id ASC;');
?>