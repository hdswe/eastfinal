<?

    session_start();
    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/tokenClass.php");
    require ("../include/newFunction.php");
    $chkToken= new Token(10);

#############################################################
# Generate Barcode
#############################################################
	$barcode = $_POST['barcode'];
    $day_now = date('m/d/Y',time());
	if(isset($barcode)){
	
			$query = "SELECT 
			reservation.id AS resid,
			reservation.user_id,
			reservation.course_id,
			reservation.barcode,
			
			course.id AS coid,
			course.title,
            course.location,

			day_course.id AS dayid,
            day_course.course_id,
            day_course.day,

			users.id AS userid,
            users.full_name

			
			FROM `reservation`,`course`,`users`,`day_course`
			
			WHERE
			reservation.course_id = course.id AND
			reservation.user_id = users.id AND
			reservation.barcode = '$barcode' AND
            day_course.course_id = course.id AND
            day_course.day = '".$day_now."'
			";
			
			$record = $pdo->pdoGetRow($query);
            $isday_exec = $pdo->pdoExecute($query);
            $isDateDay = $pdo->pdoRowCount($isday_exec);
            if($isDateDay == 1){
                $query_check = $pdo->pdoExecute("SELECT * FROM `registr_attend` WHERE course_id=".$record['coid']." AND day_course_id=".$record['dayid']." AND user_id=".$record['userid'].""); 
                 $isget_barcode = $pdo->pdoRowCount($query_check);
                 if($isget_barcode == 1){
                $msg ='<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>عفوا قمت بسحب الباركود مسبقاً</p>
              </div>';

                 } else {

                $data['course_id']          = $record['coid'];
                $data['day_course_id']      = $record['dayid'];
                $data['user_id']            = $record['userid'];
                $insert = $pdo->pdoInsUpd('registr_attend', $data);
                $msg = '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>تم سحب البار كود وتسجيل الحضور بنجاح</p>
              </div>';
                 }

            } else {
                $msg ='<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>عفوا انت غير مسجل في هذه الدورة, فضلا تحقق من تاريخ ووقت</p>
              </div>';
            }


	}


#############################################################
# Generate Manual Barcode
#############################################################
echo date('m/d/Y',time());
    if(isset($_POST['RegistrAttend'])){
	$sql_day = "SELECT * FROM `day_course` WHERE `day`=:day";
	$day_now = date('m/d/Y',time());
    $data_day[day] = $day_now;
    $result_day = $pdo->pdoGetRow($sql_day, $data_day);

        for($i = 0; $i < count($_POST['checkbox']); $i++){
            $user_id = intval($_POST['checkbox'][$i]);
			$data['course_id']		= $result_day['course_id'];
			$data['day_course_id']	= 55;
			$data['user_id']		= $user_id;
			$insert = $pdo->pdoInsUpd('registr_attend', $data);

			header('Location: ?do=confirmed&course='.$_GET['course'].'&process=successfully');
        }
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
        case "generate":
        include("template/barcode/generate.php");
        break;
        case "course":
        include("template/barcode/course.php");
        break;
        case "registr_attend":
        include("template/barcode/registr_attend.php");
        break;
        case "confirmed":
        include("template/barcode/confirmed.php");
        break;
        case "users":
        include("template/barcode/users.php");
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
