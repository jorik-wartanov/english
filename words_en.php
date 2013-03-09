<?php
require_once 'config.php';

$words = new Words();
$row = ( $_COOKIE['row'] ? $_COOKIE['row'] : 0 );
$num = ( $_COOKIE['num'] ? $_COOKIE['num'] : 100 );
$word = $words->getWords($row, $num);
//$word = $words->getWords2();

$word_ru = $words->addTranslationOfYandex( $word['id'], $word['word_en'], $lang = 'en-ru' );
if ( !$word['word_ru'] ) {
    $word['word_ru'] = $word_ru;
}
    
//echo "<pre>";
//print_r($word);
//echo "</pre>";
?>
<?php include 'tmp/header.php'; ?>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('input[name="row"]').keyup(function(){
            if ( $(this).val() ) {
                $.cookie("row", $(this).val());
            } else {
                $.cookie('row', '', { expires: -1 });
            }
        });
        
        $('input[name="num"]').keyup(function(){
            if ( $(this).val() ) {
                $.cookie("num", $(this).val());
            } else {
                $.cookie('num', '', { expires: -1 });
            }
        });
        
        $('input[name="advanced_ru"]').click(function(){
            if ( $(this).is(':checked') ) {
                $.cookie("advanced_ru", "yes");
            } else {
                $.cookie('advanced_ru', '', { expires: -1 });
            }
        });
        
        $('input[name="show_translation"]').click(function(){
            if ( $(this).is(':checked') ) {
                $.cookie("show_translation", "yes");
            } else {
                $.cookie('show_translation', '', { expires: -1 });
            }
        });
        
        $('input[name="show_translation_after_5_sec"]').click(function(){
            if ( $(this).is(':checked') ) {
                $.cookie("show_translation_after_5_sec", "yes");
            } else {
                $.cookie('show_translation_after_5_sec', '', { expires: -1 });
            }
        });

    });
</script>

<div id="words_filter" style="float: right; padding: 5px; background-color: #CCC;">
    <label>word begin</label><input type="text" style="width: 40px;" name="row" value="<?php echo ( $_COOKIE['row'] ? $_COOKIE['row'] : '' ) ?>" maxlength="5" />
    <label>words num</label><input type="text" style="width: 40px;" name="num" value="<?php echo ( $_COOKIE['num'] ? $_COOKIE['num'] : '' ) ?>" maxlength="5" />
    <label>advanced ru</label><input type="checkbox" name="advanced_ru" <?php echo ( $_COOKIE['advanced_ru'] == 'yes' ? 'checked' : '' ) ?> />
    <label>show translation</label><input type="checkbox" name="show_translation" <?php echo ( $_COOKIE['show_translation'] == 'yes' ? 'checked' : '' ) ?> />
    <label>show translation after 5 seconds</label><input type="checkbox" name="show_translation_after_5_sec" <?php //echo ( $_COOKIE['show_translation_after_5_sec'] == 'yes' ? 'checked' : '' ) ?> />
</div>

<div style="clear: both;"></div>
<div id="russian">
    <p style="font-size: <?php echo ( $_COOKIE['advanced_ru'] == 'yes' ? '96' : '126' ) ?>px; font-family: verdana; font-weight: bold; text-align: center; margin: 50px 0;"><?php echo $word['word_en'] ?> <?php echo $word['transcription'] ?></p>
</div>
<div id="english" style="display: <?php echo ( $_COOKIE['show_translation'] == 'yes' ? 'block' : 'none' ) ?>;">
    <p style="font-size: <?php echo ( $_COOKIE['advanced_ru'] == 'yes' ? '76' : '96' ) ?>px; font-family: verdana; font-weight: bold; text-align: center; color: #999; margin: 50px 0;"><?php echo ( $_COOKIE['advanced_ru'] == 'yes' ? $word['word_advanced_ru'] : $word['word_ru'] ) ?></p>
</div>
<?php include 'tmp/footer.php'; ?>
