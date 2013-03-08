<?php
class Database {
    
    var $_db_server   = DB_SERVER;
    var $_db_username = DB_USERNAME;
    var $_db_password = DB_PASSWORD;
    var $_db_name     = DB_NAME;
    
    var $_link        = NULL;
    
    
    
    function __construct() {
        mysql_connect($this->_db_server, $this->_db_username, $this->_db_password) OR die("Could not connect: " . mysql_error());
        mysql_select_db($this->_db_name) OR die("Can't use " . DB_NAME . " : " . mysql_error());
        mysql_query("set NAMES utf8");
    }

    
    function __destruct() {
        mysql_close();
    }
    
    
    function selectOneValue($query) {
        
        $result = mysql_query($query);
	if($result) {
            $row = mysql_fetch_array( $result );
            return $row[0];
	} else {
            return false;
	}
        
    }
    
    
    function selectRow($query) {
        
        $result = mysql_query($query);
	if($result) {
            $row = mysql_fetch_array( $result, MYSQL_ASSOC );
            return $row;
	} else {
            return false;
	}
        
    }
    
    
    function selectArray($query) {
        
        $results_array = array();
        
        $result = mysql_query($query);
	if($result) {
            while( $row = mysql_fetch_array( $result ) ) {
                $results_array[] = $row[0];
            }
            return $results_array;
	} else {
            return false;
	}
        
    }
    
    
    function selectArrayList($query) {
        
        $results_array = array();
        
        $result = mysql_query($query);
	if($result) {
            while( $row = mysql_fetch_array( $result, MYSQL_ASSOC ) ) {
                $results_array[] = $row;
            }
            return $results_array;
	} else {
            return false;
	}
        
    }
    
    
    function executeQuery($query) {
	
	$result = mysql_query($query); // execute query
	if($result) {
            if(mysql_insert_id()) return mysql_insert_id(); else return true; // returns status of result
	} else {
            return false; // return false if query result is empty
	}
	
    }
    
    
    
}
