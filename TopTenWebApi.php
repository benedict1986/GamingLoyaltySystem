<?php

require_once 'LoyaltyModel.php';
$rows = LoyaltyModel::getTopTen();
$patrons = array();
for($i = 0; $i < sizeof($rows); $i++)
{
    $results = LoyaltyModel::getGamesForPatron($rows[$i]['patron_id']);
    $games = '';
    for($j = 0; $j < sizeof($results);$j++)
    {
        $games .= (string)$results[$j]['floor_position'] . ', ';
    }
    $games.trim(", ");
    $rows[$i]['floor_positions'] = $games;
}
print_r($rows);

