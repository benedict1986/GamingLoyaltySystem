<?php

require_once 'DatabaseAdapter.php';
require_once 'LoyaltyModel.php';
require_once 'TopTenPatronsController.php';

if ($_POST['function'] == 'db_insert')
{
    $database_adapter = new DatabaseAdapter();
    $index = $database_adapter->insert("INSERT INTO \"Testing\" (patron_id, date, turnover, floor_position) VALUES (0, to_date('18-Jun-16', 'DD-Mon-YY'), 100, 1)");
    print_r($index);
}
else if ($_POST['function'] == 'db_selection')
{
    $database_adapter = new DatabaseAdapter();
    $rows = $database_adapter->select("SELECT * FROM \"Testing\"");
    print_r($rows);
}
else if ($_POST['function'] == 'loyalty_model_insert')
{
    $database_adapter = new DatabaseAdapter();
    $model = new LoyaltyModel();
    $model->patron_id=0;
    $model->date = '18-Jun-16';
    $model->floor_position = 1;
    $model->turnover = 100;
    $model->insertItem('Testing', $database_adapter);
}
else if ($_POST['function'] == 'loyalty_view_model_select_top_ten')
{
    $database_adapter = new DatabaseAdapter();
    $top_ten = getTopTenPatrons("Testing", $database_adapter);
    print_r($top_ten);
}
else if ($_POST['function'] == 'loyalty_view_model_select_games')
{
    $database_adapter = new DatabaseAdapter();
    $top_ten = getTopTenPatrons("Testing", $database_adapter);
    print_r(getGamesForOnePatron("Testing", $top_ten[0]['patron_id'], $database_adapter));
}

