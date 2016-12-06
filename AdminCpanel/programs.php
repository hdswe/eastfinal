
<?
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
    $statement = "`programs`";

#############################################################
# Add Programs
#############################################################

    if(isset($_POST['btnadd'])) {
        if($chkToken->Check()) { 
                $data['title']				= trim($_POST['title']);
                $data['details']			= $_POST['details'];
				$data['duration']=$_POST['duration'];
				$data['dayCount']=$_POST['dayCount'];
				$data['groups_id']=$_POST['groups_id'];
				$data['contactNumber']=$_POST['contactNumber'];
				$data['conditions']=$_POST['conditions'];
				$data['others']=$_POST['others'];
                $data['published_details']	= $_POST['published_details'];
                $data['published']			= $_POST['published'];
                $insert = $pdo->pdoInsUpd('programs', $data);
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
# Edit Programs
#############################################################
    if($_GET['do'] == 'edit' and isset($_GET['id'])){
        $sql = "SELECT * FROM `programs` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
    }

    if(isset($_POST['btnedit'])) {
        if($chkToken->Check()) { 
                $data['title']				= trim($_POST['title']);
                $data['details']			= $_POST['details'];
				$data['duration']=$_POST['duration'];
				$data['dayCount']=$_POST['dayCount'];
				$data['groups_id']=$_POST['groups_id'];
				$data['contactNumber']=$_POST['contactNumber'];
				$data['conditions']=$_POST['conditions'];
				$data['others']=$_POST['others'];
                $data['published_details']	= $_POST['published_details'];
                $data['published']			= $_POST['published'];
                $where[id] = $_GET['id'];
                $update = $pdo->pdoInsUpd('programs', $data, 'update', $where);
                header('Location: ?do=show&process=successfully');
            } else { 
               die(header("Location: login.php")); 
        }  
    }
    

#############################################################
# Delete One Programs
#############################################################
    if($_GET['do'] == 'delete' and isset($_GET['id'])){
        $sql = "SELECT * FROM `course` where programs_id=:id";
        $data[id] = $_GET['id'];
        $course = $pdo->pdoExecute($sql, $data);
        $isCourse = $pdo->pdoRowCount($course);
            if($isCourse >= 1){
               $countCourse = "أحذر يوجد عدد ". $isCourse ." دورات في هذا التصنيف وعند حذف البرنامج سيتم جعل الدورات (بدون تصنيف)";
            }else{
               $countCourse = "لايوجد اي دورة داخل هذا البرنامج ويمكنك حذفه بأمان";
            }
    }

    if(isset($_POST['btndel'])){
        $sql = "DELETE FROM `programs` WHERE `id`=:id";
        $data[id] = $_GET['id'];
        $delete = $pdo->pdoExecute($sql, $data);
        $isDelete = $pdo->pdoRowCount($delete);
            if($isDelete == 1){
                header('Location: ?do=show&process=successfully');
            }else{
                header('Location: ?do=show&process=failure');
            }
    }
    
#############################################################
# Archive One Programs
#############################################################
    if($_GET['do'] == 'delete_archive' and isset($_GET['id'])){
        $sql = "SELECT * FROM `course` where programs_id=:id";
        $data[id] = $_GET['id'];
        $course = $pdo->pdoExecute($sql, $data);
        $isCourse = $pdo->pdoRowCount($course);
            if($isCourse >= 1){
               $countCourse = "أحذر يوجد عدد ". $isCourse ." دورات في هذا التصنيف وسيتم أرشفتها";
            }else{
               $countCourse = "لايوجد اي دورة داخل هذا البرنامج";
            }
    }



    if(isset($_POST['btnarchive'])){
		$data['archive']		          = 'yes';
		$data['archive_date']				= time();
		$where[id] = $_GET['id'];
		$update = $pdo->pdoInsUpd('programs', $data, 'update', $where);
		//archive course
		$sql_archive_course = "SELECT id, programs_id FROM `course` WHERE programs_id=".$_GET['id']."";
		$rows_archive_course = $pdo->pdoGetAll($sql_archive_course);
		foreach($rows_archive_course as $result_archive_course) {
			$data_acrive['archive']				= 'yes';
			$where_acrive[id] = $result_archive_course['id'];
			$update = $pdo->pdoInsUpd('course', $data_acrive, 'update', $where_acrive);
		}

		header('Location: ?do=show&process=successfully');
    }
	
#############################################################
# UnArchive One Programs
#############################################################
    if($_GET['do'] == 'unarchive' and isset($_GET['id'])){
		$data['archive']		          = 'no';
		$data['archive_date']				= time();
		$where[id] = $_GET['id'];
		$update = $pdo->pdoInsUpd('programs', $data, 'update', $where);
		//archive course
		$sql_archive_course = "SELECT id, programs_id FROM `course` WHERE programs_id=".$_GET['id']."";
		$rows_archive_course = $pdo->pdoGetAll($sql_archive_course);
		foreach($rows_archive_course as $result_archive_course) {
			$data_acrive['archive']				= 'no';
			$where_acrive[id] = $result_archive_course['id'];
			$update = $pdo->pdoInsUpd('course', $data_acrive, 'update', $where_acrive);
		}

		header('Location: ?do=show&process=successfully');
    }
	
	
#############################################################
# Delete Group Programs
#############################################################

    if(isset($_POST['delChecked'])){
        for($i = 0; $i < count($_POST['checkbox']); $i++){
            $course_id = intval($_POST['checkbox'][$i]);
            $sql = "DELETE FROM `programs` WHERE `id`=:id";
            $data[id] = $course_id;
            $delete = $pdo->pdoExecute($sql, $data);
            $countCheckbox = count($_POST['checkbox']);
            if($countCheckbox = $i){
               header('Location: ?do=show&process=successfully');
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

  <link href="css/style.default.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-fileupload.min.css" />
  <link rel="stylesheet" href="css/bootstrap-timepicker.min.css" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
<style>
.wysihtml5-toolbar { display:none !important;} 
</style>
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
        include("template/programs/show.php");
        break;
        case "add":
        include("template/programs/add.php");
        break;
        case "edit":
        include("template/programs/edit.php");
        break;
        case "delete":
        include("template/programs/delete.php");
        break;
        case "archive":
        include("template/programs/archive.php");
        break;
        case "delete_archive":
        include("template/programs/delete_archive.php");
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
<script src="js/wysihtml5-0.3.0.min.js"></script>
<script src="js/bootstrap-wysihtml5.js"></script>

<script src="js/ckeditor/ckeditor.js"></script>
<script src="js/ckeditor/adapters/jquery.js"></script>


<script src="js/custom.js"></script>




<script>
$(document).ready(function() {
	jQuery('#details').ckeditor();
  jQuery('#wysiwyg').wysihtml5({color: true,html:true,direction:rtl});

        jQuery('.ckbox input').click(function(){
            var t = jQuery(this);
            if(t.is(':checked')){
                t.closest('tr').addClass('selected');
            } else {
                t.closest('tr').removeClass('selected');
            }
        });


} );

</script>


</body>
</html>