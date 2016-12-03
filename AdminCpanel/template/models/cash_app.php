<?
    session_start();
    require ("../../../include/dbWrapperClass.php");
    require ("../../../include/config.php");
    require ("../../../include/tokenClass.php");
    require ("../../../include/newFunction.php");
    $chkToken= new Token(10);
    
    if(isset($_POST['btn'])){
   
     //header('Location: http://east-ala.com/course_model.php?course='.$_GET['course'].'');
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../../images/favicon.png" type="image/png">

  <title><?= $settingsSiteName ?> - لوحة التحكم</title>

  <link href="../../css/style.default.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/bootstrap-fileupload.min.css" />
  <link rel="stylesheet" href="../../css/bootstrap-timepicker.min.css" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../../js/html5shiv.js"></script>
  <script src="../../js/respond.min.js"></script>
  <![endif]-->
</head>

<body>
    
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
  <? include ('../../mainMenu.php') ?>
  <div class="mainpanel">
    
    <? include ('../../headerBar.php') ?>
    <!-- headerbar -->
    
    
    <div class="contentpanel">
 ﻿<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" id="form">
<?php $addToken = new Token; $addToken->protectForm(); ?> 
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">نموذج طلب صرف أتعاب مدرب </h4>
        </div>
        <div class="panel-body panel-body-nopadding">
        <div class="form-group" id="course">
              <label class="col-sm-2 control-label">رابط  النموذج</label>
              <div class="col-sm-6">
                <input name="course" type="text" required class="form-control" id="course" value="http://east-ala.com/course_model.php?course=<?=$_GET['course']?>">
              </div>
            </div>
   

      

       
        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                  <input name="btn" type="submit" id="btn" value="استعراض نموذج" class="btn btn-primary">&nbsp;
                  
				</div>
			 </div>
		  </div><!-- panel-footer -->
        
      </div>
</form>

   
    </div>
    <!-- contentpanel -->
    
  </div>
  <!-- mainpanel -->
  
  
  
</section>



<script src="../../js/jquery-1.10.2.min.js"></script>
<script src="../../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../../js/jquery-ui-1.10.3.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/modernizr.min.js"></script>
<script src="../../js/jquery.sparkline.min.js"></script>
<script src="../../js/toggles.min.js"></script>
<script src="../../js/retina.min.js"></script>
<script src="../../js/jquery.cookies.js"></script>

<script src="../../js/jquery.autogrow-textarea.js"></script>
<script src="../../js/bootstrap-fileupload.min.js"></script>
<script src="../../js/bootstrap-timepicker.min.js"></script>
<script src="../../js/jquery.maskedinput.min.js"></script>
<script src="../../js/jquery.tagsinput.min.js"></script>
<script src="../../js/jquery.mousewheel.js"></script>
<script src="../../js/chosen.jquery.min.js"></script>
<script src="../../js/dropzone.min.js"></script>
<script src="../../js/colorpicker.js"></script>


<script src="../../js/custom.js"></script>

<script>
$(document).ready(function() {

	    
  
    //var count=0;
    	jQuery( "#showform a" ).each(function() {
    		var textAnchor=jQuery(this).text();
    		
    		if(textAnchor=="حفظ"){
    		//alert(textAnchor);
    		jQuery(this).click(function(){
    			var notes=jQuery("textarea[for='"+jQuery(this).attr("for")+"']").val();
    			
    			var href=jQuery(this).attr('href');
    			
    			jQuery(this).attr('href',href+''+notes);
 
    			
    		});
    			
    		//count+=1;
    			
    		}
    	});
    	
    	
  

    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });

    
	  // Input Masks
  jQuery("#date").mask("99/99/9999");
  jQuery("#dateh").mask("99/99/9999");
  jQuery("#first_day").mask("99/99/9999");
  jQuery("#second_day").mask("99/99/9999");
  
  // Time PiWcker
  jQuery('#timepicker').timepicker({defaultTIme: false});


        jQuery('.ckbox input').click(function(){
            var t = jQuery(this);
            if(t.is(':checked')){
                t.closest('tr').addClass('selected');
            } else {
                t.closest('tr').removeClass('selected');
            }
        });


} );



    function validate() {
        var chks = document.getElementsByName('checkbox[]');
        var hasChecked = false;
        for (var i = 0; i < chks.length; i++){
            if (chks[i].checked){
                hasChecked = true;
            break;
            }
        }
        if (hasChecked == false) {
            alert("يجب اختيار عنصر واحد على الاقل.");
            return false;
        }
        return true;
    }


</script>


</body>
</html>