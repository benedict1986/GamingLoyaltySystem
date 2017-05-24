<?php

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

    public function insertItem($table, $data_adapter)
    {
        $sql = "INSERT INTO \"{$table}\"  (patron_id, date, turnover, floor_position) VALUES ({$this->patron_id}, to_date('{$this->date}', 'DD-Mon-YY'), {$this->turnover}, {$this->floor_position})";
        $data_adapter->insert($sql);
    }
    
    
}
