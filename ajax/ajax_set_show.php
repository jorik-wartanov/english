<?php
require_once '../config.php';


$row         = $_POST['row'];
$num         = $_POST['num'];
$this_script = $_POST['this_script'];

if ( is_numeric($row) && is_numeric($num) ) {
    
    $words = new Words();
    
    if ( $this_script == 'words_en.php' ) {
        
        $result = $words->wordSetShow($row, $num, 'word');
        echo $result;
        
    }
    
}


?>