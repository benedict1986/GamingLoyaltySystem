<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatabaseAdapter
 *
 * @author admin
 */
class DatabaseAdapter {

    var $host = 'localhost';
    var $database = 'GamingLoyaltySystem';
    var $username = 'postgres';
    var $password = 'admin';
    var $connection;

    function __construct() {
        $this->connection = pg_connect("host={$this->host} dbname={$this->database} user={$this->username} password={$this->password}");
    }

    /**
     * This function inserts an object into database
     * @param $sql: sql statement
     * @return id of the new record
     */
    public function insert($sql) {
        $result = pg_query($this->connection, $sql);
        $rows = pg_fetch_row($result); 
        return $rows['0'];
    }
    
    /**
     * This function retrieve data from database
     * @param $sql: sql statement
     * @return rows of data
     */
    public function select($sql)
    {
        $result = pg_query($this->connection, $sql);
        return  pg_fetch_all($result); 
    }

}
