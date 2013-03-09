<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>English</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo SITE_JS ?>jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo SITE_JS ?>jquery.cookie.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        $(document).keypress(function(eventObject){
            var key = eventObject.which;
            if ( key == 32 ) { // space
                $('#english').show();
            } else if ( key == 43 ) { // num +
                no_show(<?php echo $word['id'] ?>);
            }
            
        });
        
        if ( $.cookie("show_translation_after_5_sec") == "yes" ) {
            setTimeout("$('#english').show();", 5000);
        }
        
        function no_show(id) {
            
            $.ajax({
                url: '<?php echo SITE_AJAX ?>ajax_no_show.php',
                data: {
                    this_script: '<?php echo THIS_SCRIPT ?>',
                    id: id
                },
                type: 'post',
                success: function(json)
                {
//                    alert(json);
//                    var response = eval("("+json+")");
////                    alert(response.length);
//                    
//                    var html='<option value="">Select City</option>';
//                    for(var i=0; i<response.length; i++) {
//                        var city=response[i];
//                        html+='<option value="'+city.id+'">'+city.city_name+'</option>';
//                    }
//                    jQuery('#city_prem_div').show();
//                    jQuery('#city_prem').html(html);

                }
            });
            
        }

    });
</script>
</head>
<body>
    <div style="float: left;">
        <a href="<?php echo SITE_URL ?>">Home</a>
    </div>
