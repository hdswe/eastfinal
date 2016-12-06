<?php
    require ("header.php");

#############################################################
# Check Register Available
#############################################################
    if($_GET['do'] != 'closed'){
        if($settingsRegisterTrainer == '0'){
             header('Location: ?do=closed');
        }
    }
    
#############################################################
# Register User - Step2
#############################################################
	if (isset($_POST['btnsend'])) {

        $username = $_POST['mobile'];
        $checkMobile = false;
        $sqlUsername = "SELECT * FROM `trainer` WHERE `mobile`=:username";
        $dataUsername[username] = $username;
        $ExecuteSqlMob = $pdo->pdoExecute($sqlUsername, $dataUsername);
        if($pdo->pdoRowCount($ExecuteSqlMob) < 1){

        }else{
            $msg = '<div class="alert alert-danger" role="alert">رقم الجوال المدخل موجود مسبقا</div>';
            $checkMobile = true;
        }

        $email = $_POST['email'];
        $sqlEmail = "SELECT * FROM `trainer` WHERE `email`=:email";
        $checkEmail = false;
        $dataEmail[email] = $email;
        $ExecuteSql = $pdo->pdoExecute($sqlEmail, $dataEmail);
        if($pdo->pdoRowCount($ExecuteSql) < 1){
        }else{$msg = $msg . '<div class="alert alert-danger" role="alert">الايميل المدخل موجود مسبقا</div>';
            $checkEmail = true;
        }
        if (strtolower ( $_POST ['captcha'] ) != strtolower ( $_SESSION ['captcha'] )) {
            $msg = '<div class="alert alert-danger" role="alert">خطأ في رمز التحقق</div>';
        } elseif (($_FILES['fileattach']['name'] != "") && ($_FILES['picattach']['name'] != "")) {

                $maxSize = "9437184";
                $PicmaxSize = "26214400";
                $allowedExtensions = array("zip", "rar", "RAR", "ZIP", "pdf", "PDF", "doc", "DOC", "docx", "DOCX");
                $allowedExtensionsPic = array("png", "PNG", "jpg", "JPG", "GIF", "gif","JPEG","jpeg");
                $uploadedPic = $_FILES["picattach"]["name"];
                $uploadedfile = $_FILES["fileattach"]["name"];

                strstr($_FILES["fileattach"]["type"], "file");
                strstr($_FILES["picattach"]["type"], "file");
                $splitedPicName = explode(".", $uploadedPic);
                $splitedFileName = explode(".", $uploadedfile);
                $type = $splitedFileName[sizeof($splitedFileName) - 1];
                $Pictype = $splitedPicName[sizeof($splitedPicName) - 1];
                $uploadedPic = time() . ".$Pictype";
                $uploadedfile = time() . ".$type";
                if ($_FILES['fileattach']['size'] > $maxSize) {
                    $msg = "يجب أن لايزيد حجم الملف المرفق عن 9 ميجا بايت";
                }
                if ($_FILES['picattach']['size'] > $PicmaxSize) {
                    $msg = "يجب أن لايزيد حجم الصورة المرفقة عن 25 ميجا بايت";
                }
                $extension = pathinfo($_FILES['fileattach']['name']);
                $extension = $extension["extension"];
                $Picextension = pathinfo($_FILES['picattach']['name']);
                $Picextension = $Picextension["extension"];
                foreach ($allowedExtensions as $key => $ext) {
                    if (strcasecmp($ext, $extension) == 0) {
                        $boolValidExt = true;
                        break;
                    }
                }
                foreach ($allowedExtensionsPic as $key => $ext) {
                    if (strcasecmp($ext, $Picextension) == 0) {
                        $boolValidExtPic = true;
                        break;
                    }
                }

                if ($boolValidExt && $boolValidExtPic) {
                    if (empty($msg)) {

                        if ((is_uploaded_file($_FILES['fileattach']['tmp_name']))&&(is_uploaded_file($_FILES['picattach']['tmp_name']))) {

                            copy($_FILES['fileattach']['tmp_name'], "data/files/" . $uploadedfile);
                            copy($_FILES['picattach']['tmp_name'], "data/images/" . $uploadedPic);

                                $data['first_name']             = trim($_POST['first_name']);
                                $data['father_name']            = trim($_POST['father_name']);
                                $data['grand_father_name']      = trim($_POST['grand_father_name']);
                                $data['family_name']            = trim($_POST['family_name']);
                                $data['full_name']              = $_POST['first_name']." ".$_POST['father_name']." ".$_POST['grand_father_name']." ".$_POST['family_name'];
                                $data['email']		          	= trim($_POST['email']);
                                $data['mobile']		         	= trim($_POST['mobile']);
                                $data['training']		      	= trim($_POST['training']);
                                $data['additional_notes']	  	= trim($_POST['additional_notes']);
                                $data['have_you_training']	   	= trim($_POST['have_you_training']);
                                $data['institutions_trained']	= trim($_POST['institutions_trained']);
                                $data['file_cv']		        = $uploadedfile;
                                $data['pic']		        	= $uploadedPic;
                                $insert = $pdo->pdoInsUpd('trainer', $data);
                                $isInsert = $pdo->pdoRowCount($insert);
                                if($isInsert == 1){
                                    header('Location: ?do=successfully');
                                } else {
                                    header('Location: ?do=failure');
                                }
                            }
                }
            }else{

                if(!$boolValidExt){

                    $msg = '<div class="alert alert-danger" role="alert">الملف يحمل الامتداد التالي '.$extension.' وهو غير مدعوم لدينا</div>';

                }
                if(!$boolValidExtPic){
                    $msg = $msg.'<div class="alert alert-danger" role="alert">الصورة  يحمل الامتداد التالي '.$Picextension.' وهو غير مدعوم لدينا</div>';

                }
            }
        }else {
		if($_FILES['fileattach']['name'] == ""){
			
			$msg = '<div class="alert alert-danger" role="alert">يجب أن تقوم بارفاق السيرة الذاتية</div>';
			
		} if($_FILES['picattach']['name'] == ""){
			
			$msg =$msg .'<div class="alert alert-danger" role="alert">يجب أن تقوم بارفاق الصورة شخصية</div>';
			
		}
			
		}

	}

?>

    <aside id="sidebar" class="medium-3 large-3 columns">
             <?php include('right-pages.php') ?>
 </aside>

    <div class="large-9 columns">
      <section class="section margin-top-off">
        <div class="page-title">
          <h1>التسجيل كمدرب</h1>
          <div class="breadcrumbs"> <a href="home.php" title="">الرئيسية</a> <a href="trainer.php" title="">التسجيل كمدرب</a> </div>
        </div>
        <?php if($_GET['do'] != 'closed') { ?>
        <?php if($_GET['do'] != 'successfully') { ?>
        <form method="post" enctype="multipart/form-data" role="form">
          <p> <?php echo $msg ?></p>
          <div class="row">
          <div class="col-md-3">
          <div class="form-group">
    <label for="first_name">الاسم الأول</label>
              <input id="first_name" required class="form-control" type="text" name="first_name"  pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['first_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
  </div>
          </div>
          <div class="col-md-3">
          <div class="form-group">
        <label for="father_name">اسم الأب</label>
              <input id="father_name" required class="form-control" type="text" name="father_name" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['father_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
    
   		 </div>
          </div>
          <div class="col-md-3">
           <div class="form-group">
        <label for="grand_father_name">اسم الجد</label>
              <input id="grand_father_name" required class="form-control" type="text" name="grand_father_name"  pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['grand_father_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
          </div>
          </div>
          <div class="col-md-3">
           <div class="form-group">
        <label for="family_name">اسم العائلة</label>
              <input id="family_name" required type="text" class="form-control" name="family_name" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['family_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
          </div>
          </div>
		</div>
          <div class="form-group">
        <label for="mobile">رقم الهاتف</label>

              <input name="mobile" required type="text" class="form-control" id="mobile" pattern="(?![9]{10})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['mobile'] ?>" maxlength="10"  oninvalid="setCustomValidity('يجب كتابة رقم جوال صحيح')">
              
          </div>
          
         <div class="form-group">
        <label for="email">البريد الالكتروني</label>
              <input name="email" type="email" class="form-control" id="email" value="<?php echo $_POST['email'] ?>">
          </div>
          <div class="form-group">
              <label>هل سبق لك التدريب في مؤسسة خيرية ؟</label>
              <div class="radio">
                <label>
                  <input type="radio" name="have_you_training" id="have_you_training-yes" value="yes">
                  نعم </label>
              </div>
              <div class="radio">
                <label>
                  <input name="have_you_training" type="radio" id="have_you_training-no" value="no" checked="checked">
                  لا </label>
              </div>
            </div>
          <div style="display:none;"  id="otherAnswer" class="form-group">
            <label> اذكرها </label>
              <textarea  name="institutions_trained" rows="3" class="form-control" id="institutions_trained" ><?php echo $_POST['training'] ?></textarea>
          </div>
          <div class="form-group">
            <label> مجالات التدريب </label>
              <textarea name="institutions_trained" rows="3" class="form-control" id="institutions_trained" ><?php echo $_POST['training'] ?></textarea>
          </div>
          <div class="form-group">
            <label> ملاحظات اضافية </label>
              <textarea  name="additional_notes" rows="3" class="form-control" id="additional_notes"><?php echo $_POST['additional_notes'] ?></textarea>
          </div>
          <div class="form-group">
            <label> رفع السيرة الذاتية </label>
            <input name="fileattach" type="file" id="fileattach">
            <p class="help-block">الامتددات المدعومة لدينا Zip, Rar, Pdf, Doc, Docx</p>
          </div>
          <div class="form-group">
            <label> صورة شخصية </label>
            <input name="picattach" type="file" id ="picattach"/>
            <p class="help-block">الامتددات المدعومة لدينا PNG, GPJ, GIF</p>
          </div>
          <div class="form-group">
            <label> رمز التحقق </label>
            <img src="tools/captcha/showCaptcha.php" alt="captcha" style="margin-bottom:10px;" /> <br/>
              <input name="captcha" class="form-control" id="captcha" placeholder="قم بكتابة الرمز الذي تراه هنا">
          </div>
          <br>
          <div class="form-group">
              <input name="btnsend" type="submit" class="btn btn-primary btn-lg" id="btnsend" value="ارسال">
          </div>
        </form>
        <?php } } if(isset($_GET['do']) and $_GET['do'] == 'closed') { ?>
        <div class="alert alert-danger" role="alert">التسجيل مغلق حالياً</div>
        <?php } ?>
        <?php if(isset($_GET['do']) and $_GET['do'] == 'successfully') { ?>
        <div class="alert alert-success" role="alert"> سعيدين بمشاركتك لنا ..
          سنتواصل معك قريبا </div>
        <?php } ?>
        <?php if(isset($_GET['do']) and $_GET['do'] == 'failure') { ?>
        <div class="alert alert-danger" role="alert">حدث خطأ, لقم بالمحاولة مرة اخرى</div>
        <?php } ?>
      </section>
      <!--/ .section--> 
      
    </div>
    <!--/ #main-->
    
    
    <?php include('footer.php') ?>

</div>
<script>
$(document).ready(function(){

	$("input[type='radio']").change(function(){
   
if($(this).val()=="yes")
{
    $("#otherAnswer").show();
}
else
{
       $("#otherAnswer").hide(); 
}
    
});

});


</script>

