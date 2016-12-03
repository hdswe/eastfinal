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
    $statement = "`news`";

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
                $data['title']		          = trim($_POST['title']);
                $data['date']		           = time();
                $data['details']                = $_POST['details'];  
                $data['image']                    = $uploadedfileimage;
                $insert = $pdo->pdoInsUpd('news', $data);
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
    if($_GET['do'] == 'edit' and isset($_GET['id'])){
        $sql = "SELECT * FROM `news` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
    }

    if(isset($_POST['btnedit'])) {
        if($chkToken->Check()) { 
                $data['title']		          = trim($_POST['title']);
                $data['details']              = $_POST['details'];  
                $data['image']                = $uploadedfileimage;
                $where[id] = $_GET['id'];
                $update = $pdo->pdoInsUpd('news', $data, 'update', $where);
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
        $sql = "DELETE FROM `news` WHERE `id`=:id";
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
            $sql = "DELETE FROM `news` WHERE `id`=:id";
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


  </style>
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
        include("template/news/show.php");
        break;
        case "add":
        include("template/news/add.php");
        break;
        case "edit":
        include("template/news/edit.php");
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
  // HTML5 WYSIWYG Editor
  jQuery('#details').ckeditor();

    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });



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
    });
</script>


</body>
</html>