<?
    session_start();
    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/tokenClass.php");
    require ("../include/newFunction.php");
    $chkToken= new Token(10);



#############################################################
# Edit Properties SMS
#############################################################

    if($_GET['do'] == 'properties') {
        $sql = "SELECT * FROM `sms` where id=1";
        $result = $pdo->pdoGetRow($sql);
    }

    if(isset($_POST['btnedit'])) {
        if($chkToken->Check()) { 
                $data['register_case']			  = trim($_POST['register_case']);
                $data['register_message']		   = trim($_POST['register_message']);
                $data['reservation_case']		   = trim($_POST['reservation_case']);
                $data['reservation_message']		= trim($_POST['reservation_message']);
                $data['reservation_cancel_case']	= trim($_POST['reservation_cancel_case']);
                $data['reservation_cancel_message'] = trim($_POST['reservation_cancel_message']);
                $data['password_case']			  = trim($_POST['password_case']);
                $data['password_message']		   = trim($_POST['password_message']);
                $data['support_case']			   = trim($_POST['support_case']);
                $data['support_message']			= trim($_POST['support_message']);
                $data['reg_course_case']			= trim($_POST['reg_course_case']);
                $data['reg_course_message']         = trim($_POST['reg_course_message']);
                $data['welcome_trainer']         = trim($_POST['welcome_trainer']);
                $data['welcome_trainer_message']         = trim($_POST['welcome_trainer_message']);
                
                $data['welcome_trainer']         = trim($_POST['absence_notify']);
                $data['welcome_trainer_message']         = trim($_POST['absence_notify_message']);
                $data['welcome_trainer']         = trim($_POST['unblock_notify']);
                $data['welcome_trainer_message']         = trim($_POST['unblock_notify_message']);
                $data['welcome_trainer']         = trim($_POST['block_notify']);
                $data['welcome_trainer_message']         = trim($_POST['block_notify_message']);
                $where[id] = '1';
                $update = $pdo->pdoInsUpd('sms', $data, 'update', $where);
                $isUpdate = $pdo->pdoRowCount($update);
                if($isUpdate == 1){
                    header('Location: ?do=properties&process=successfully');
                }else{
                    header('Location: ?do=properties&process=failure');
                }
            } else { 
               die(header("Location: login.php")); 
        }  
    }
    
    
    
#############################################################
# Edit Properties SMS
#############################################################

    if($_POST['send_choose'] == "ارسال"){
        $string = $_POST['number'];
		$lines = explode(',', $string);
        $ms = count($lines);
        foreach($lines AS $line){
            $data['username']	= $line;
            $query = $pdo->pdoInsUpd('send_all', $data);
            $query_num = $pdo->pdoExecute("SELECT id FROM `send_all`");
            if($pdo->pdoRowCount($query_num) == $ms){
                header('Location: ?do=send');
            }
                
        }
    }


    if($_GET['case'] == "TRUNCATE") { 
        $query_tr = $pdo->pdoExecute("TRUNCATE TABLE `send_all`");
        header('Location: ?do=send_choose');
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title><?= $settingsSiteName ?> - لوحة التحكم</title>

  <link href="css/style.default.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-fileupload.min.css" />
  <link rel="stylesheet" href="css/bootstrap-timepicker.min.css" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body>
    
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
  <? include ('mainMenu.php') ?>
  <div class="mainpanel">
    
    <? include ('headerBar.php') ?>
    <!-- headerbar -->
    
    
    <div class="contentpanel">
    <?
	$do = $_GET["do"];
	switch($do){
        case "properties":
        include("template/sms/properties.php");
        break;
        case "course":
        include("template/sms/course.php");
        break;
        case "group":
        include("template/sms/group.php");
        break;
        case "confirmation":
        include("template/sms/confirmation.php");
        break;
        case "gender":
        include("template/sms/gender.php");
        break;
        case "confirmation_gender":
        include("template/sms/confirmation_gender.php");
        break;
        case "send":
        include("template/sms/send.php");
        break;
        case "sendall":
        include("template/sms/sendall.php");
        break;
        case "send_choose":
        include("template/sms/send_choose.php");
        break;
        case "send_count":
        include("template/sms/send_count.php");
        break;
        case "done":
        include("template/sms/done.php");
        break;
        case "variables":
        include("template/sms/variables.php");
        break;
        
        
	}
    
    ?>
    </div>
    <!-- contentpanel -->
    
  </div>
  <!-- mainpanel -->
  
  
  
</section>



<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-ui-1.10.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/toggles.min.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/jquery.cookies.js"></script>

<script src="js/jquery.autogrow-textarea.js"></script>
<script src="js/bootstrap-fileupload.min.js"></script>
<script src="js/bootstrap-timepicker.min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script src="js/jquery.tagsinput.min.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/chosen.jquery.min.js"></script>
<script src="js/dropzone.min.js"></script>
<script src="js/colorpicker.js"></script>


<script src="js/custom.js"></script>


<script>
$(document).ready(function() {



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