<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DB {
    var $_username;
    var $_password;
    var $_database;
    var $_host;
    var $_link;

    function __construct() {
        require_once 'config.php';
        $this->_username = $username;
        $this->_password = $password;
        $this->_database = $database;
        $this->_host     = $wwwroot;
    }
    
    function db_connect() {
        $this->_link = mysql_connect($this->_host, $this->_username, $this->_password) or die (mysql_error());
        mysql_select_db($this->_database) or die(mysql_error());
    }
    
    /**
     * 
     * @param string $table  Table name.
     * @param array $where  Where clause.
     * @param array $columns  Select columns.
     * @return An array of arrays.
     */
    function get_records($table, $where, $columns) {
        if (is_array($columns)) {
            $fields = implode(',', $columns);
            $sql = 'SELECT ' . $fields . ' FROM ' . $table;
        } else {
            $sql = 'SELECT * FROM ' . $table;
        }
        if (is_array($where)) {
            $count = count($where);
            $sql .= ' WHERE ';
            foreach ($where as $heading => $value) {
                $sql .= $heading . ' = ' . $value;
                if ($count > 1) {
                    $sql .= ' AND ';
                    $count --;
                }
            }
        }
        $result = mysql_query($sql);
        $data = array();
        $i = 0;
        while ($rawdata = mysql_fetch_array($result, MYSQLI_ASSOC)) {
            $data->$i = array();
            foreach ($rawdata as $key => $row) {
                $data[$i][$key] = $row;
            }
            $i++;
        }
        return $data;
    }
}
?>
