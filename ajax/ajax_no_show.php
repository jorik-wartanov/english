<?php
require_once '../config.php';


$id          = $_POST['id'];
$this_script = $_POST['this_script'];

if ( $id ) {
    
    $words = new Words();
    
    if ( $this_script == 'irregular_verbs_ru.php' || $this_script == 'irregular_verbs_en.php' ) {
        
        $result = $words->wordNoShow($id, 'irregular_verbs');
        echo $result;
        
    } elseif ( $this_script == 'words_en.php' ) {
        
        $result = $words->wordNoShow($id, 'word');
        echo $result;
        
    }
    
}


?>