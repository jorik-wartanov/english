<?php
require_once 'config.php';

$words = new Words();
$word = $words->getIrregularVerbs();

?>
<?php include 'tmp/header.php'; ?>
<div style="clear: both;"></div>
<div id="russian">
    <p style="font-size: 126px; font-family: verdana; font-weight: bold; text-align: center;"><?php echo $word['russian'] ?></p>
</div>
<div id="english" style="display: none;">
    <p style="font-size: 96px; font-family: verdana; font-weight: bold; text-align: center; color: #999;"><?php echo $word['verbs'] ?></p>
</div>
<?php include 'tmp/footer.php'; ?>
