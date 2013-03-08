<?php
require_once '../config.php';


$verb_id = $_POST['verb_id'];
if ( $verb_id ) {
    $words = new Words();
    $result = $words->wordNoShow($verb_id);
    echo $result;
}


//$res_json = json_encode($res);

//echo $res_json;
    
//echo $verb_id;


//echo '<pre>';
//print_r(Venue::getFreeTiers( 1 ) );
//echo '</pre>';

?>