<?php
require_once 'config.php';

$words = new Words();
$row = $words->getWords();
echo "<pre>";
print_r($row);
echo "</pre>";
?>
<?php include 'tmp/header.php'; ?>
<!--<div id="russian">
    <p style="font-size: 126px; font-family: verdana; font-weight: bold; text-align: center;"><?php echo $row['verbs'] ?></p>
</div>
<div id="english" style="display: none;">
    <p style="font-size: 96px; font-family: verdana; font-weight: bold; text-align: center; color: #999;"><?php echo $row['russian'] ?></p>
</div>-->
<?php include 'tmp/footer.php'; ?>
