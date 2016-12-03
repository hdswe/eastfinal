<?
    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/tokenClass.php");
    require ("../include/newFunction.php");

    $chkToken= new Token(10);
    $sql = "SELECT * FROM `settings` where id=:id";
    $data[id] = '1';
    $row = $pdo->pdoGetRow($sql, $data);
    
#############################################################
# Save Genral Settings
#############################################################

    if(isset($_POST['btnsave'])) {
        if($chkToken->Check()) {
                $data[site_name]        = $_POST['site_name'];
                $data[site_url]         = $_POST['site_url'];
                $data[site_email]       = $_POST['site_email'];
                $data[description]      = $_POST['description'];
                $data[keyword]          = $_POST['keyword'];
                $data[register_case]    = $_POST['register_case'];
                $data[register_trainer] = $_POST['register_trainer'];
                $where[id] = '1';
                $result = $pdo->pdoInsUpd('settings', $data, 'update', $where);
                header('Location: ?edit=successfully');
            } else {
               die(header("Location: login.php"));
        }
    }

#############################################################
# Save SMS Settings
#############################################################

    if(isset($_POST['btnsavemenu'])) {
        if($chkToken->Check()) { 
                $data[menu_mosque] 		= $_POST['mosque'];
                $data[menu_neighborhood] = $_POST['neighborhood'];
                $data[menu_center] = $_POST['center'];
                $where[id] = '1';
                $result = $pdo->pdoInsUpd('settings', $data, 'update', $where);
                header('Location: ?edit=successfully');
            } else { 
               die(header("Location: login.php")); 
        }  
    }
#############################################################
# Save Menu Settings
#############################################################

    if(isset($_POST['btnsavesms'])) {
        if($chkToken->Check()) {
                $data[sms_gateway]    = $_POST['sms_gateway'];
                $data[sms_username] = $_POST['sms_username'];
                $data[sms_password] 		= $_POST['sms_password'];
                $data[sms_sender] = $_POST['sms_sender'];
                $where[id] = '1';
                $result = $pdo->pdoInsUpd('settings', $data, 'update', $where);
                header('Location: ?edit=successfully');
            } else {
               die(header("Location: login.php"));
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
  <link rel="stylesheet" href="css/jquery.tagsinput.css" />
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
    <? include ('template/settings/edit.php') ?>
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
jQuery(document).ready(function(){
  // Tags Input
  jQuery('#keyword').tagsInput({width:'auto'});
});
</script>

</body>
</html>
