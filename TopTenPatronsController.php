<?php

require_once 'DatabaseAdapter.php';
require_once 'LoyaltyViewModel.php';

$data_adapter = new DatabaseAdapter();
$loyalties = array();

function getTopTenPatrons($table, $da) {
    $sql = "SELECT  patron_id, SUM(turnover) as total_turnover FROM \"{$table}\" GROUP BY patron_id ORDER BY SUM(turnover) DESC LIMIT 10";
    return $da->select($sql);
}

function getGamesForOnePatron($table, $patron_id, $da) {
    $sql = "SELECT floor_position FROM \"{$table}\" WHERE patron_id = {$patron_id} GROUP BY floor_position ORDER BY floor_position";
    $results = $da->select($sql);
    $games = '';
    foreach ($results as $result) {
        $games .= (string) $result['floor_position'] . ", ";
    }
    $games = trim($games, ", ");
    return $games;
}

// Get Top 10 Patrons
$rows = getTopTenPatrons("Loyalty", $data_adapter);
if ($rows != 0) {
    foreach ($rows as $row) {
        $loyalty = new LoyaltyViewModel();
        $loyalty->patron_id = $row['patron_id'];
        $loyalty->total_turnover = $row['total_turnover'];
        $loyalty->games = getGamesForOnePatron("Loyalty", $row['patron_id'], $data_adapter);
        array_push($loyalties, $loyalty);
    }
}