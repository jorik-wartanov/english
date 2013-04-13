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
    
    
    function wordNoShow($verb_id, $table) {

        $query = "UPDATE $table 
                     SET no_show='1' 
                   WHERE id='$verb_id'";

        return $this->_db->executeQuery($query);
        
    }
    
    function wordSetShow($row, $num, $table) {

        $query = "UPDATE $table 
                     SET no_show='0' 
                   WHERE id > $row AND id <= $row+$num";

        return $this->_db->executeQuery($query);
        
    }
    
    
    
    
    
    function getWords( $row = 0, $num = 100 ) {
        
        $query = "SELECT * 
                    FROM word
                   WHERE id > $row AND id <= $row+$num AND no_show != 1
                ORDER BY RAND()
                   LIMIT 1";

        return $this->_db->selectRow($query);
        
    }
// временно, после того как поле word_ru заполнится - удалить
function getWords2() {

    $query = "SELECT * 
                FROM word
               WHERE word_ru = ''
               LIMIT 1";

    return $this->_db->selectRow($query);

}


    function remainingWords( $row = 0, $num = 100 ) {
        
        $query = "SELECT COUNT(*) AS 'remaining' 
                    FROM word
                   WHERE id > $row AND id <= $row+$num AND no_show != 1 ";

        return $this->_db->selectOneValue($query);
        
    }
    
    
    function addTranslationOfYandex( $word_id, $text, $lang = 'en-ru' ) {
        
        $query_select = "SELECT word_ru FROM word WHERE id = $word_id";
        
        if ( !$this->_db->selectOneValue($query_select) ) {

            $text = str_replace("\"", "\'", $text);
            $url  = TRANSLATE_YANDEX_API . "lang=$lang&text=$text";
            $json = @file_get_contents($url);
            $res  = json_decode($json);

            if ( $res->code == 200 && $res->text[0] != '' ) {

                $word_ru = $res->text[0];
                $query_update = "UPDATE word 
                                    SET word_ru='$word_ru' 
                                  WHERE id='$word_id'";

                if ( $this->_db->executeQuery($query_update) )
                    return $word_ru;

            }
        
        }
        
    }
    
    
}
