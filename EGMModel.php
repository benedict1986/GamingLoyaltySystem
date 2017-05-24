<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EGMModel
 *
 * @author admin
 */
class EGMModel {

    var $id;
    var $floor_position;
    var $game_number;
    var $serial;
    var $denomination;
    var $date;
    var $turnover;
    var $revenue;
    var $theme;

    
    public function insertItem($table, $data_adapter)
    {
        $sql = "INSERT INTO \"{$table}\"  (id, floor_position, game_number, serial, denomination, date, turnover, revenue, theme) VALUES ({$this->id}, {$this->floor_position}, {$this->game_number}, {$this->serial}, {$this->denomination}, to_date('{$this->date}', 'DD/MM/YYYY'), {$this->turnover}, {$this->revenue}, {$this->theme})";
        $data_adapter->insert($sql);
    }
}
