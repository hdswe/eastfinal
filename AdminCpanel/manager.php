<?
    session_start();
    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/tokenClass.php");
    require ("../include/newFunction.php");
    $chkToken= new Token(10);



#############################################################
# Pagination Setting
#############################################################

    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $limit = 10;
    $startpoint = ($page * $limit) - $limit;
    $url = "?do=show&";
    $statement = "`users` WHERE is_admin='yes'";

#############################################################
# Add Users
#############################################################

    if(isset($_POST['btnadd'])) {
        if($chkToken->Check()) { 
               // $data['id_number']              = trim($_POST['id_number']);
                $data['first_name']             = trim($_POST['first_name']);
                $data['father_name']            = trim($_POST['father_name']);
                $data['grand_father_name']      = trim($_POST['grand_father_name']);
                $data['family_name']            = trim($_POST['family_name']);
                $data['full_name']              = $_POST['first_name']." ".$_POST['father_name']." ".$_POST['grand_father_name']." ".$_POST['family_name'];
                $data['username']               = trim($_POST['username']);
                $data['password']               = trim($_POST['password']);
                $data['email']		          = trim($_POST['email']);
                $data['gender']                 = trim($_POST['gender']);
                $data['is_admin']                = 'yes';
                $data['pr_login_admin'] = trim($_POST['pr_login_admin']);
                $data['pr_settings']    = trim($_POST['pr_settings']);
                $data['pr_course']      = trim($_POST['pr_course']);
                $data['pr_group']       = trim($_POST['pr_group']);
                $data['pr_reservation'] = trim($_POST['pr_reservation']);
                $data['pr_support']     = trim($_POST['pr_support']);
                $data['pr_barcode']     = trim($_POST['pr_barcode']);
                $data['pr_pages']       = trim($_POST['pr_pages']);
                $data['pr_revenues']    = trim($_POST['pr_revenues']);
                $data['pr_city']        = trim($_POST['pr_city']);
                $data['pr_reports']     = trim($_POST['pr_reports']);
                $data['pr_users']       = trim($_POST['pr_users']);
                $data['pr_sms']         = trim($_POST['pr_sms']);
                $insert = $pdo->pdoInsUpd('users', $data);
                $isInsert = $pdo->pdoRowCount($insert);
                if($isInsert == 1){
                    header('Location: ?do=show&process=successfully');
                }else{
                    header('Location: ?do=show&process=failure');
                }
            } else { 
               die(header("Location: login.php")); 
        }  
    }

#############################################################
# Edit Users
#############################################################
    if($_GET['do'] == 'edit' and isset($_GET['id'])){
        $sql = "SELECT * FROM `users` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
    }

    if(isset($_POST['btnedit'])) {
        if($chkToken->Check()) { 
        if(empty($_POST['password'])){
            $data['password']             = $_POST['hdn_pass'];
        }else{
            $data['password']             = trim($_POST['password']);
        }
                $data['first_name']             = trim($_POST['first_name']);
                $data['father_name']            = trim($_POST['father_name']);
                $data['grand_father_name']      = trim($_POST['grand_father_name']);
                $data['family_name']            = trim($_POST['family_name']);
                $data['full_name']              = $_POST['first_name']." ".$_POST['father_name']." ".$_POST['grand_father_name']." ".$_POST['family_name'];
                $data['username']               = trim($_POST['username']);
                $data['email']		          = trim($_POST['email']);
                $data['gender']                 = trim($_POST['gender']);
                $data['pr_login_admin'] = trim($_POST['pr_login_admin']);
                $data['pr_settings']    = trim($_POST['pr_settings']);
                $data['pr_course']      = trim($_POST['pr_course']);
                $data['pr_group']       = trim($_POST['pr_group']);
                $data['pr_reservation'] = trim($_POST['pr_reservation']);
                $data['pr_support']     = trim($_POST['pr_support']);
                $data['pr_barcode']     = trim($_POST['pr_barcode']);
                $data['pr_pages']       = trim($_POST['pr_pages']);
                $data['pr_revenues']    = trim($_POST['pr_revenues']);
                $data['pr_city']        = trim($_POST['pr_city']);
                $data['pr_reports']     = trim($_POST['pr_reports']);
                $data['pr_users']       = trim($_POST['pr_users']);
                $data['pr_sms']         = trim($_POST['pr_sms']);
                $where[id] = $_GET['id'];
                $update = $pdo->pdoInsUpd('users', $data, 'update', $where);
                $isUpdate = $pdo->pdoRowCount($update);
                if($isUpdate == 1){
                    header('Location: ?do=show&process=successfully');
                }else{
                    header('Location: ?do=show&process=failure');
                }
            } else { 
               die(header("Location: login.php")); 
        }  
    }
    

#############################################################
# Delete One Users
#############################################################

    if(isset($_GET['del'])){
        $sql = "DELETE FROM `users` WHERE `id`=:id";
        $data[id] = $_GET['del'];
        $delete = $pdo->pdoExecute($sql, $data);
        $isDelete = $pdo->pdoRowCount($delete);
            if($isDelete == 1){
                header('Location: ?do=show&process=successfully');
            }else{
                header('Location: ?do=show&process=failure');
            }
    }
    

#############################################################
# Delete Group Users
#############################################################

    if(isset($_POST['delChecked'])){
        for($i = 0; $i < count($_POST['checkbox']); $i++){
            $course_id = intval($_POST['checkbox'][$i]);
            $sql = "DELETE FROM `users` WHERE `id`=:id";
            $data[id] = $course_id;
            $delete = $pdo->pdoExecute($sql, $data);
            $countCheckbox = count($_POST['checkbox']);
            if($countCheckbox = $i){
               header('Location: ?do=show&process=successfully');
            }
        }
    }
    

#############################################################
# Banned Group Cource
#############################################################

    if(isset($_POST['bannedChecked'])){
        for($i = 0; $i < count($_POST['checkbox']); $i++){
            $course_id = intval($_POST['checkbox'][$i]);
            $data['course_id']       = $course_id;
            $data['user_id']         = $_GET['id'];
            $insert = $pdo->pdoInsUpd('banned_course', $data);
            header('Location: ?do=show&process=successfully');
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
        switch($do)
        {
        case "show":
        include("template/manager/show.php");
        break;
        case "add":
        include("template/manager/add.php");
        break;
        case "edit":
        include("template/manager/edit.php");
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
