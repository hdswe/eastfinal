<?
    session_start();
    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/tokenClass.php");
    require ("../include/newFunction.php");
    $chkToken= new Token(10);


#############################################################
# Add City
#############################################################

    if(isset($_POST['btnadd'])) {
        if($chkToken->Check()) { 
                $data['title']		          = trim($_POST['title']);
                $insert = $pdo->pdoInsUpd('city', $data);
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
# Edit City
#############################################################
    if($_GET['do'] == 'edit' and isset($_GET['id'])){
        $sql = "SELECT * FROM `city` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
    }

    if(isset($_POST['btnedit'])) {
        if($chkToken->Check()) { 
                $data['title']		          = trim($_POST['title']);
                $where[id] = $_GET['id'];
                $update = $pdo->pdoInsUpd('city', $data, 'update', $where);
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
# Delete One City
#############################################################

    if(isset($_GET['del'])){
        $sql = "DELETE FROM `city` WHERE `id`=:id";
        $data[id] = $_GET['del'];
        $delete = $pdo->pdoExecute($sql, $data);
        $isDelete = $pdo->pdoRowCount($delete);
            if($isDelete == 1){
                header('Location: ?do=show&process=successfully');
            }else{
                header('Location: ?do=show&process=failure');
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
            include("template/reports/show.php");
            break;
            case "course":
            include("template/reports/course.php");
            break;
            case "programs":
            include("template/reports/programs.php");
            break;
            case "statuscourse":
            include("template/reports/statuscourse.php");
            break;
            case "reservation_canceled":
            include("template/reports/reservation_canceled.php");
            break;
            case "reservation_confirmed":
            include("template/reports/reservation_confirmed.php");
            break;
            case "users":
            include("template/reports/users.php");
            break;
            case "programdetails":
            include("template/reports/details.php");
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