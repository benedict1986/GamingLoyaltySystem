<?php

require_once 'DatabaseAdapter.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoyaltyModel
 *
 * @author admin
 */
class LoyaltyModel {

    var $id;
    var $patron_id;
    var $date;
    var $turnover;
    var $floor_position;

    public function getAllItems()
    {
        $data_adapter = new DatabaseAdapter();
        $rows = $data_adapter->select("SELECT * FROM Loyalty");
        $items = array();
        foreach ($rows as $row)
        {
            $item = new LoyaltyModel();
            $item->id = $row['id'];
            $item->patron_id = $row['patron_id'];
            $item->date = $row['date'];
            $item->turnover = $row['turn_over'];
            $item->floor_position = $row['floor_position'];
            array_push($items, $item);
        }
    }
    
    public function insertItem($table)
    {
        $sql = "INSERT INTO \"{$table}\"  (id, patron_id, date, turnover, floor_position) VALUES ({$this->id}, {$this->patron_id}, to_date('{$this->date}', 'DD-Mon-YY'), {$this->turnover}, {$this->floor_position})";
        print_r($sql);
        $data_adapter = new DatabaseAdapter();
        $data_adapter->insert($sql);
    }

    public static function getTopTen()
    {
        $sql = "SELECT  patron_id, SUM(turnover) as total_turnover FROM \"Loyalty\" GROUP BY patron_id ORDER BY SUM(turnover) DESC LIMIT 10";
        $data_adapter = new DatabaseAdapter();
        $result = $data_adapter->select($sql);
        return $result;
    }
    
    public static function getGamesForPatron($patron_id)
    {
        $sql = "SELECT floor_position FROM \"Loyalty\" WHERE patron_id = {$patron_id} GROUP BY floor_position";
        $data_adapter = new DatabaseAdapter();
        $result = $data_adapter->select($sql);
        return $result;
    }
}
