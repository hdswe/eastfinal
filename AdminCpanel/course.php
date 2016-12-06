<?
    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/tokenClass.php");
    require ("../include/newFunction.php");
    require ("../include/resize.php");
    $chkToken= new Token(10);

#############################################################
# Pagination Setting
#############################################################

    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $limit = 10;
    $startpoint = ($page * $limit) - $limit;
    $url = "?do=show&";
    $statement = "`course`";

#############################################################
# Upload and Resize Images
#############################################################
    if($_FILES['fileimage']['name'] != ""){
        $maxSize = "7048576";
        $allowedExtensions = array("jpg", "JPG", "JPEG", "png", "PNG", "BMP", "bmp");

        $uploadedfileimage = $_FILES["fileimage"]["name"];
        strstr($_FILES["fileimage"]["type"],"image");
        $splitedImageName=explode(".",$uploadedfileimage);
        $type=$splitedImageName[sizeof($splitedImageName)-1];
        $uploadedfileimage=time().".$type";
        if($_FILES['fileimage']['size'] > $maxSize){
            $error = "File size cannot exceed 1MB";
        }
        $extension = pathinfo($_FILES['fileimage']['name']);
        $extension = $extension["extension"];
        foreach($allowedExtensions as $key=>$ext) {
            if(strcasecmp($ext, $extension) == 0){
                $boolValidExt = true;
                break;
            }
        }
        if($boolValidExt) {
            if(empty($error)) {
                if(is_uploaded_file($_FILES['fileimage']['tmp_name'])) {
                    copy($_FILES['fileimage']['tmp_name'], "../data/images/" . $uploadedfileimage);
                }
            }
        }
        else
        {
            $error = "Files with .$extension extensions are not allowed";
        }
        if(empty($error))
        {
            $srcFile = "../data/images/" . $uploadedfileimage;
            $destFile_thumbs = "../data/thumbs/" . $uploadedfileimage;
            $destFile_orignal = "../data/images/" . $uploadedfileimage;

            $resizeObj = new resize($srcFile);
            $resizeObj -> resizeImage(180, 120, 'crop');        
            $resizeObj -> saveImage($destFile_thumbs, 100);
    
            $resizeObja = new resize($srcFile);
            $resizeObja -> resizeImage(450, 'landscape');       
            $resizeObja -> saveImage($destFile_orignal, 100);
        
            unset($resizeObj);
        }       
    } else {
        $old_uploadedfileimage = $_POST['images_old'];
        $uploadedfileimage = $old_uploadedfileimage;
    }

#############################################################
# Add Cource
#############################################################

    if(isset($_POST['btnadd'])) {
        if($chkToken->Check()) { 
                $ftitle             = isset($_POST['ftitle']) ? "0" : "1" ;
                $fprograms_id       = isset($_POST['fprograms_id']) ? "0" : "1" ;
                $fgroups_id         = isset($_POST['fgroups_id']) ? "0" : "1" ;
                $fday_count         = isset($_POST['fday_count']) ? "0" : "1" ;
                $fdate_h            = isset($_POST['fdate_h']) ? "0" : "1" ;
                $ftime              = isset($_POST['ftime']) ? "0" : "1" ;
                $ftrainer           = isset($_POST['ftrainer']) ? "0" : "1" ;
                $flocation          = isset($_POST['flocation']) ? "0" : "1" ;
                $fdependence_date   = isset($_POST['fdependence_date']) ? "0" : "1" ;
                $fdependence_number = isset($_POST['fdependence_number']) ? "0" : "1" ;
                $fmap               = isset($_POST['fmap']) ? "0" : "1" ;
                $fdetails           = isset($_POST['fdetails']) ? "0" : "1" ;
                
                $hide_fields = $ftitle.",".$fprograms_id.",".$fgroups_id.",".$fday_count.",".$fdate_h.",".$ftime.",".$ftrainer.",".$flocation.",".$fdependence_date.",".$fdependence_number.",".$fmap.",".$fdetails;

                $data['title']                = trim($_POST['title']);
                $data['programs_id']            = trim($_POST['programs_id']);
                $data['groups_id']              = implode(",",$_POST['groups_id']);
                $data['day_count']              = trim($_POST['day_count']);
                $data['day_hours']              = trim($_POST['day_hours']);
                $data['day_section']              = trim($_POST['day_section']);
                $data['date_h']              = $_POST['date_h'];
                $data['date_m']              = $_POST['date_m'];
                $data['time']                  = $_POST['time'];
                $data['trainer']                = trim($_POST['trainer']);
                $data['location']               = trim($_POST['location']);
                $data['dependence_date']        = $_POST['dependence_date'];
                $data['dependence_number']      = $_POST['dependence_number'];
                $data['details']                = $_POST['details'];
                $data['con_reg']                = $_POST['con_reg'];
                
                
                $data['status']                 = $_POST['status'];
                $data['cancel_reservation_time']    = $_POST['cancel_reservation_time'];
                $data['map']                    = $uploadedfileimage;
                $data['hide_fields']            = $hide_fields;
                $data['open_close_register']    = $_POST['open_close_register'];
                $data['open_register_date']     = $_POST['open_register_date'];
                $data['close_register_date']    = $_POST['close_register_date'];
                
                $insert = $pdo->pdoInsUpd('course', $data);
                $isInsert = $pdo->pdoRowCount($insert);
                if($isInsert == 1){
                    $insert_id = $pdo->pdoLastInsertId($insert);
                    header('Location: ?do=show&process=successfully');
                }else{
                    header('Location: ?do=show&process=failure');
                }
            } else { 
               die(header("Location: login.php")); 
        }  
        
    }

#############################################################
# Edit Cource
#############################################################
    if($_GET['do'] == 'edit' and isset($_GET['id']) or $_GET['do'] == 'add_day' and isset($_GET['id'])){
        $sql = "SELECT * FROM `course` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
        $hide_fields = explode(",",$result['hide_fields']);
        $ftitle             = $hide_fields[0];
        $fprograms_id       = $hide_fields[1];
        $fgroups_id         = $hide_fields[2];
        $fday_count         = $hide_fields[3];
        $fdate_h            = $hide_fields[4];
        $ftime              = $hide_fields[5];
        $ftrainer           = $hide_fields[6];
        $flocation          = $hide_fields[7];
        $fdependence_date   = $hide_fields[8];
        $fdependence_number = $hide_fields[9];
        $fmap               = $hide_fields[10];
        $fdetails           = $hide_fields[11];
            

    }

    if(isset($_POST['btnedit'])) {
        if($chkToken->Check()) { 
                $ftitle             = isset($_POST['ftitle']) ? "1" : "0" ;
                $fprograms_id       = isset($_POST['fprograms_id']) ? "1" : "0" ;
                $fgroups_id         = isset($_POST['fgroups_id']) ? "1" : "0" ;
                $fday_count         = isset($_POST['fday_count']) ? "1" : "0" ;
                $fdate_h            = isset($_POST['fdate_h']) ? "1" : "0" ;
                $ftime              = isset($_POST['ftime']) ? "1" : "0" ;
                $ftrainer           = isset($_POST['ftrainer']) ? "1" : "0" ;
                $flocation          = isset($_POST['flocation']) ? "1" : "0" ;
                $fdependence_date   = isset($_POST['fdependence_date']) ? "1" : "0" ;
                $fdependence_number = isset($_POST['fdependence_number']) ? "1" : "0" ;
                $fmap               = isset($_POST['fmap']) ? "1" : "0" ;
                $fdetails           = isset($_POST['fdetails']) ? "1" : "0" ;
                $fcon_reg           = isset($_POST['fcon_reg']) ? "1" : "0" ;
                
                $hide_fields = $ftitle.",".$fprograms_id.",".$fgroups_id.",".$fday_count.",".$fdate_h.",".$ftime.",".$ftrainer.",".$flocation.",".$fdependence_date.",".$fdependence_number.",".$fmap.",".$fdetails.",".$fcon_reg;
                
                /*$groups_id = $_POST['groups_id_1'].",".$_POST['groups_id_2'].",".$_POST['groups_id_3'].",".$_POST['groups_id_4'].",".$_POST['groups_id_5'];*/
                $data['title']                = trim($_POST['title']);
                $data['programs_id']            = trim($_POST['programs_id']);
                /*$data['groups_id']              = $groups_id;*/
                $data['day_count']              = trim($_POST['day_count']);
                $data['date_h']              = $_POST['date_h'];
                $data['date_m']              = $_POST['date_m'];
                $data['time']                  = $_POST['time'];
                $data['cancel_reservation_time']    = $_POST['cancel_reservation_time'];
                $data['trainer']                = trim($_POST['trainer']);
                $data['location']              = trim($_POST['location']);
                $data['dependence_date']        = $_POST['dependence_date'];
                $data['dependence_number']      = $_POST['dependence_number'];
                $data['details']                = $_POST['details'];
                $data['con_reg']                = $_POST['con_reg'];
                $data['status']                 = $_POST['status'];
                $data['map']                    = $uploadedfileimage;
                $data['hide_fields']            = $hide_fields;
                $data['open_close_register']    = $_POST['open_close_register'];
                $data['open_register_date']     = $_POST['open_register_date'];
                $data['close_register_date']    = $_POST['close_register_date'];
                $where[id] = $_GET['id'];
                $update = $pdo->pdoInsUpd('course', $data, 'update', $where);
                $isUpdate = $pdo->pdoRowCount($update);
                header('Location: ?do=edit_group&id='.$_GET['id'].'');
            } else { 
               die(header("Location: login.php")); 
        }  
    }
    
#############################################################
# Edit Groups
#############################################################

    if(isset($_POST['btnedit_group'])) {
        if($chkToken->Check()) { 
                $data['groups_id']              = implode(",",$_POST['groups_id']);
                $where[id] = $_GET['id'];
                $update = $pdo->pdoInsUpd('course', $data, 'update', $where);
                $isUpdate = $pdo->pdoRowCount($update);
                header('Location: ?do=show&process=successfully');
            } else { 
               die(header("Location: login.php")); 
        }  
    }

#############################################################
# Delete One Cource
#############################################################

    if(isset($_GET['del'])){
        $sql = "DELETE FROM `course` WHERE `id`=:id";
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
# Delete Group Cource
#############################################################

    if(isset($_POST['delChecked'])){
        for($i = 0; $i < count($_POST['checkbox']); $i++){
            $course_id = intval($_POST['checkbox'][$i]);
            $sql = "DELETE FROM `course` WHERE `id`=:id";
            $data[id] = $course_id;
            $delete = $pdo->pdoExecute($sql, $data);
            $countCheckbox = count($_POST['checkbox']);
            if($countCheckbox = $i){
               header('Location: ?do=show&process=successfully');
            }
        }
    }

#############################################################
# Active UnActive Disable
#############################################################

    if(isset($_POST['activeChecked']) or isset($_POST['unActiveChecked']) or isset($_POST['disableChecked'])){
        
        if($_POST['activeChecked']) $status = 0;
        elseif($_POST['disableChecked']) $status = 1;
        elseif($_POST['unActiveChecked']) $status = 2;
        
        for($i = 0; $i < count($_POST['checkbox']); $i++){
            $course_id = intval($_POST['checkbox'][$i]);
            $data[status] = $status;
            $where[id] = $course_id;
            $update = $pdo->pdoInsUpd('course', $data, 'update', $where);
            $countCheckbox = count($_POST['checkbox']);
               header('Location: ?do=show&process=successfully');
        }
    }



#############################################################
# Add Day
#############################################################

    if(isset($_POST['btnaddday'])) {
        for($i = 0; $i < count($_POST['day']); $i++){
            $data_day['course_id']      = $_GET['id'];
            $data_day['day']            = $_POST['day'];
            $insert_day = $pdo->pdoInsUpd('day_course', $data_day);
            header('Location: ?do=show_day&id='.$_GET['id'].'&process=successfully');
        }
    }
    
#############################################################
# Delete Day
#############################################################

    if(isset($_GET['del_day'])){
        $sql = "DELETE FROM `day_course` WHERE `id`=:id";
        $data[id] = $_GET['del_day'];
        $delete = $pdo->pdoExecute($sql, $data);
        $isDelete = $pdo->pdoRowCount($delete);
            if($isDelete == 1){
                header('Location: ?do=show_day&id='.$_GET['id'].'&process=successfully');
            }else{
                header('Location: ?do=show&process=failure');
            }
    }
#############################################################
# Delete Group Day
#############################################################

    if(isset($_POST['delChecked_day'])){
        for($i = 0; $i < count($_POST['checkbox']); $i++){
            $course_id = intval($_POST['checkbox'][$i]);
            $sql = "DELETE FROM `day_course` WHERE `id`=:id";
            $data[id] = $course_id;
            $delete = $pdo->pdoExecute($sql, $data);
            $countCheckbox = count($_POST['checkbox']);
            if($countCheckbox = $i){
               header('Location: ?do=show_day&id='.$_GET['id'].'&process=successfully');
            }
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

  <link rel="stylesheet" href="css/style.default.css" />
  
  <link rel="stylesheet" href="css/bootstrap-fileupload.min.css" />
  <link rel="stylesheet" href="css/bootstrap-timepicker.min.css" />
  <link rel="stylesheet" href="css/jquery.tagsinput.css" />
  
  <link rel="stylesheet" href="calender_hr/jquery.calendars.picker.css"/>
  
  <link rel="stylesheet" href="css/colorpicker.css" />
  <link rel="stylesheet" href="css/dropzone.css" />
  <script src="js/dragtable.js"></script>

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
<style>
.wysihtml5-toolbar { display:none !important;} 
</style>
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
        include("template/course/show.php");
        break;
        case "add":
        include("template/course/add.php");
        break;
        case "edit":
        include("template/course/edit.php");
        break;
        case "archive":
        include("template/course/archive.php");
        break;
        case "edit_group":
        include("template/course/edit_group.php");
        break;
        
        case "show_day":
        include("template/course/show_day.php");
        break;
        case "add_day":
        include("template/course/add_day.php");
        break;
        case "edit_day":
        include("template/course/edit_day.php");
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
<script src="js/jquery.tablesorter.min.js"></script>
<script>
$(document).ready(function() {

    jQuery("#courseStorable").tablesorter();
    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });

      
  
  jQuery('#date_m').datepicker( $.datepicker.regional[ "ar" ] );

  jQuery('#dependence_date').datepicker();

  jQuery('#open_register_date').datepicker();

  jQuery('#close_register_date').datepicker();

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

  // HTML5 WYSIWYG Editor
  jQuery('#wysiwyg').wysihtml5({color: true,html:true,direction:rtl});
  jQuery('#con_reg').wysihtml5({color: true,html:true,direction:rtl});


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


  jQuery(".chosen-select").chosen({'width':'100%','white-space':'nowrap'});

</script>

<script src="calender_hr/jquery.plugin.js"></script>
<script src="calender_hr/jquery.calendars.js"></script>
<script src="calender_hr/jquery.calendars.plus.js"></script>
<script src="calender_hr/jquery.calendars.picker.js"></script>
<!--<script src="jquery.calendars.picker.ext.js"></script>< Include for ThemeRoller styling -->
<script src="calender_hr/jquery.calendars.all.js"></script>
<script src="calender_hr/jquery.calendars.islamic.js"></script>


<script>
$(function() {

var calendar = $.calendars.instance('islamic');
        $('#date_h').calendarsPicker({calendar: calendar});

});

</script>
</body>
</html>