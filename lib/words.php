<?php

class Words {
    
    var $_db = NULL;
    
    
    function __construct() {
        $this->_db = new Database();
    }

    
    function __destruct() {

    }
    
    
    function getIrregularVerbs() {

        $query = "SELECT * 
                    FROM irregular_verbs
                   WHERE no_show != 1 
                ORDER BY RAND() 
                   LIMIT 1";

        return $this->_db->selectRow($query);
        
    }
    
    
    function wordNoShow($verb_id) {

        $query = "UPDATE irregular_verbs 
                     SET no_show='1' 
                   WHERE id='$verb_id'";

        return $this->_db->executeQuery($query);
        
    }
    
    
    
    
    
    function getWords( $row = 0, $num = 100 ) {

        $query = "SELECT * 
                    FROM word
                   WHERE id > $row AND id <= $num
                ORDER BY RAND()
                   LIMIT 1";

        return $this->_db->selectRow($query);
        
    }
    
    
}
