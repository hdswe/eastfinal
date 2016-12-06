<?php
    require ("header.php");


#############################################################
# Check Register Available
#############################################################
    if($_GET['do'] != 'closed'){
        if($settingsRegisterCase == '0'){
             header('Location: ?do=closed');
        }
    }

#############################################################
# Check Id number - Step1
#############################################################
	if(isset($_POST['btnsend_step1'])){
		$id_number = $_POST['id_number'];
		$strlen_id = strlen($id_number);
			if($strlen_id == 10) { 
			$sqlIdNumber = "SELECT * FROM `users` WHERE `id_number`=:id_number";
			$dataIdNumber[id_number] = $id_number;
			$ExecuteSql = $pdo->pdoExecute($sqlIdNumber, $dataIdNumber);
			if($pdo->pdoRowCount($ExecuteSql) < 1){
				header('Location: ?do=step2&id_number='.$id_number.'');
			} else {
				$msg = '<div class="alert alert-danger" role="alert">انت مسجل مسبقاً</div>';
			}
		} else {
			$msg = '<div class="alert alert-danger" role="alert">الرقم خطأ, يرجى التأكد منه مرة اخرى</div>';
		}
	}

#############################################################
# Register User - Step2
#############################################################
    if(isset($_POST['btnsend_step2'])) {
    
    			$username = $_POST['username']; 
    					$checkMobile = false;
		$sqlUsername = "SELECT * FROM `users` WHERE `username`=:username";
		$dataUsername[username] = $username;
		$ExecuteSqlMob = $pdo->pdoExecute($sqlUsername, $dataUsername);
		if($pdo->pdoRowCount($ExecuteSqlMob) < 1){
			
		}else{
				$msg = '<div class="alert alert-danger" role="alert">رقم الجوال المدخل موجود مسبقا</div>';
				$checkMobile = true;
		}
			
		$email = $_POST['email']; 	
		$sqlEmail = "SELECT * FROM `users` WHERE `email`=:email";
		$checkEmail = false;
		$dataEmail[email] = $email;
		$ExecuteSql = $pdo->pdoExecute($sqlEmail, $dataEmail);
		if($pdo->pdoRowCount($ExecuteSql) < 1){
				}else{$msg = $msg . '<div class="alert alert-danger" role="alert">الايميل المدخل موجود مسبقا</div>';
				$checkEmail = true;
			}
    
    
        if (strtolower ( $_POST ['captcha'] ) != strtolower ( $_SESSION ['captcha'] )) {
			$msg = '<div class="alert alert-danger" role="alert">خطأ في رمز التحقق</div>';
        } else {
        if(!$checkEmail && !$checkMobile){
            $data['id_number']              = $_POST['id_number'];
            $data['first_name']             = trim($_POST['first_name']);
            $data['father_name']            = trim($_POST['father_name']);
            $data['grand_father_name']      = trim($_POST['grand_father_name']);
            $data['family_name']            = trim($_POST['family_name']);
            $data['full_name']              = $_POST['first_name']." ".$_POST['father_name']." ".$_POST['grand_father_name']." ".$_POST['family_name'];
            $data['username']               = trim($_POST['username']);
            $data['password']               = trim($_POST['password']);
            $data['email']		          = trim($_POST['email']);
            $data['gender']                 = trim($_POST['gender']);
            $data['city']		           = trim($_POST['city']);
            $data['neighborhood_id']		       = trim($_POST['neighborhood_id']);
            $data['neighborhood_name']		       = trim($_POST['neighborhood_name']);
            $data['mosque_id']		         = trim($_POST['mosque_id']);
            $data['mosque_name']		         = trim($_POST['mosque_name']);
            $data['nationality']            = trim($_POST['nationality']);
            $data['date_reg']               = time();
            $data['groups_id']              = trim($_POST['groups_id']);
            $data['job']              		= trim($_POST['job']);
            $data['qualification']          = trim($_POST['qualification']);
            $insert = $pdo->pdoInsUpd('users', $data);
            $isInsert = $pdo->pdoRowCount($insert);
            if($isInsert == 1){
            	$sqlUserID = "SELECT * FROM `users` WHERE `id_number`=:id_number";
		$dataUserID[id_number] = $data['id_number'];
		$ExecuteSqlMob = $pdo->pdoExecute($sqlUserID , $dataUserID);
		if(!($pdo->pdoRowCount($ExecuteSqlMob) < 1)){
			$result = $pdo->pdoGetRow($sqlUserID , $dataUserID);
			$databarcode['barcode']             =$result ['id'] .''.floor(rand ( 1000 , 9999 ));
            	$where[id_number] = $dataUserID[id_number] ;
            	$update = $pdo->pdoInsUpd('users', $databarcode, 'update', $where);
		}
			
            	
                header('Location: ?do=successfully');
            } else {
                header('Location: ?do=failure');
            }
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
          <h1>التسجيل كمتدرب</h1>
          <div class="breadcrumbs"> <a href="home.php" title="">الرئيسية</a> <a href="register.php" title="">التسجيل متدرب</a> </div>
        </div>
        <?php if($_GET['do'] != 'successfully') { ?>
        <form method="post" role="form">
          <?php if(!isset($_GET['do'])) { ?>
          <?php echo '<div data-alert="" class="alert-box secondary">'. $msg .'</div>' ?>
          <div class="form-group">
            <label>رقم بطاقة الاحوال / الاقامة</label>
              <input type="text" name="id_number" class="form-control" autofocus required  id="id_number" pattern="(?!.*([0-9])\1{9})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" maxlength="10" oninvalid="setCustomValidity('يجب كتابة رقم البطاقة بشكل صحيح')">
            <p class="help-block" >سيتم اظهار رقم بطاقة الاحوال في الشهادة, يجب كتابتة بشكل صحيح.</p> </div>
          <div class="form-group">

            <input name="btnsend_step1" type="submit" class="btn btn-primary btn-lg" value="ارسال">
            
          </div>
          <?php } ?>
          <?php if(isset($_GET['do']) and $_GET['do'] == 'step2' and isset($_GET['id_number'])) { ?>
          <input name="id_number" type="hidden" id="id_number" value="<?php echo $_GET['id_number'] ?>">
          <?php echo '<div data-alert="" class="alert-box secondary">'. $msg .'</div>' ?>
          <div class="row">
          <div class="col-md-3">
          <div class="form-group">
            <label>الأسم الأول</label>
              <input type="text" name="first_name" required class="form-control"  id="first_name" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['first_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
              </div>
          </div>
          <div class="col-md-3">
          <div class="form-group">
            <label>أسم الاب</label>
              <input type="text" name="father_name" required class="form-control"  id="father_name" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['father_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
              </div>
          </div>
          <div class="col-md-3">
          <div class="form-group">
            <label>أسم الجد </label>
              <input  type="text" name="grand_father_name" required class="form-control" id="grand_father_name" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['grand_father_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
              </div>
          </div>
          <div class="col-md-3">
          <div class="form-group">
            <label>العائلة</label>
              <input type="text" name="family_name" required class="form-control" id="family_name" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['family_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
              </div>
          </div>
          </div>
          <div class="form-group">
            <label>رقم الجوال</label>
              <input type="text"name="username" required  id="username"  class="form-control" pattern="(?![9]{10})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['username'] ?>" maxlength="10" oninvalid="setCustomValidity('يجب كتابة رقم جوال صحيح')">
          </div>
          <div class="form-group">
            <label>البريد الالكتروني </label>
              <input type="email" name="email" required class="form-control"  id="email" value="<?php echo $_POST['email'] ?>" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة بريد الكتروني صحيح')">
          </div>
          <div class="form-group">
            <label>كلمة المرور</label>
              <input name="password" type="password" required class="form-control"  id="password" placeholder="يفضل ان لا يقل الباسوورد عن 6 ارقام" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة كلمة مرور')">
          </div>
          <div class="form-group">
            <label>اعد كلمة المرور </label>
              <input name="repassword" type="password" required class="form-control"  id="repassword" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة كلمة مرور')">
          </div>
          <div class="form-group">
            <label>المدينة </label>
              <input type="text" name="city" required  id="city" class="form-control" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['city'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
          </div>
          <div class="form-group">
            <label>المسجد /  الجامع</label>
            <?php if($settingsMenuMosque == 'yes') { ?>
            <select name="mosque_id" required  id="mosque_id" class="form-control" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب اختيار المسمى الوظيفي')">
              <option disabled selected value>--- أختر ----</option>
              <?php
                                            $sql = "SELECT * FROM `mosque` ORDER BY `id` ASC";
                                            $rows = $pdo->pdoGetAll($sql);
                                            foreach($rows as $result) {
                                        ?>
              <option value="<?php echo $result['id'] ?>"><?php echo $result['title'] ?></option>
              <?php } ?>
              <option value="0">غير ذلك</option>
            </select>
            <?php } else {  ?>
            <input name="mosque_name1"  id="mosque_name1" class="form-control" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['mosque_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
            <?php } ?>
          </div>
          <div class="form-group" id="other_mosque" style="display:none;">
            <label>اسم المسجد</label>
            <input name="mosque_name"  id="mosque_name" class="form-control" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['mosque_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
          </div>
          <div class="form-group">
            <label>المركز</label>
            <?php if($settingsMenuCenter == 'yes') { ?>
            <select name="center_id" required  id="center_id" class="form-control" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب اختيار المركز')">
              <option disabled selected value>--- أختر ----</option>
              <?php
                $sql = "SELECT * FROM `center` ORDER BY `id` ASC";
                $rows = $pdo->pdoGetAll($sql);
                foreach($rows as $result) {
            ?>
              <option value="<?php echo $result['id'] ?>"><?php echo $result['title'] ?></option>
              <?php } ?>
              <option value="0">غير ذلك</option>
            </select>
            <?php } else {  ?>
            <input name="center_name1" required  id="center_name1" class="form-control" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['center_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
            <?php } ?>
          </div>
          <div class="form-group" id="other_center" style="display:none;">
            <label>اسم المركز</label>
            <input name="center_name"  id="center_name" class="form-control" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['center_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
          </div>
          <div class="form-group">
            <label>الحي</label>
            <?php if($settingsMenuNeighborhood == 'yes') { ?>
            <select name="neighborhood_id" required class="form-control" id="neighborhood_id" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب اختيار الحي')">
              <option disabled selected value>--- أختر ----</option>
              <?php
                            $sql = "SELECT * FROM `neighborhood` ORDER BY `id` ASC";
                            $rows = $pdo->pdoGetAll($sql);
                            foreach($rows as $result) {
                        ?>
              <option value="<?php echo $result['id'] ?>"><?php echo $result['title'] ?></option>
              <?php } ?>
              <option value="0">غير ذلك</option>
            </select>
            <?php } else {  ?>
            <input name="neighborhood_name1" required class="form-control" id="neighborhood_name1" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['neighborhood_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
            <?php } ?>
          </div>
          <div class="form-group" id="other_neighborhood" style="display:none;">
            <label>اسم الحي</label>
            <input name="neighborhood_name"  id="neighborhood_name" class="form-control" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['neighborhood_name'] ?>" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
          </div>
          <div class="form-group">
            <label>المسمى الوظيفي </label>
            <select name="groups_id" required class="form-control" id="groups_id">
              <option disabled selected value>--- أختر ----</option>
              <?php
                    $sql = "SELECT * FROM `groups` ORDER BY `id` ASC";
                    $rows = $pdo->pdoGetAll($sql);
                    foreach($rows as $result) {
                ?>
              <option value="<?php echo $result['id'] ?>"><?php echo $result['title'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group" id ="other_groups_id" style="display:none">
            <label>الوظيفة</label>
            <input name="job"  id="job" value="<?php echo $_POST['job'] ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>الجنسية</label>
            <input type="text" name="nationality" required class="form-control"  id="nationality" value="<?php echo $_POST['nationality'] ?>" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة الجنسية')">
          </div>
          <div class="form-group">
            <label>الجنس</label>
            <select name="gender" required  id="gender" class="form-control" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب اختيار الجنس')">
              <option disabled selected value>--- أختر ----</option>
              <option value="ذكر">ذكر</option>
              <option value="انثى">انثى</option>
            </select>
          </div>
          <div class="form-group">
            <label>المؤهل العلمي </label>
            <select name="qualification" required  id="qualification" class="form-control" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب أختيار المؤهل')">
              <option disabled selected value>--- أختر ----</option>
              <option value="ثانوي">ثانوي</option>
              <option value="دبلوم">دبلوم</option>
              <option value="بكالوريوس">بكالوريوس</option>
              <option value="ماجستير">ماجستير</option>
              <option value="دكتوراه">دكتوراه</option>
            </select>
          </div>
          <br/>
          <div class="form-group">
            <label>رمز التحقق </label>
            <img style="margin: 20px 0px;" src="tools/captcha/showCaptcha.php" alt="captcha"  />
            <p class="tmmFormStyling form-input-text">
              <input tybr="text" name="captcha" required class="form-control" id="captcha" placeholder="قم بكتابة الرمز الذي تراه هنا" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('قم بكتابة الرمز الذي تراه هنا')">
            </p>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-lg" name="btnsend_step2"id="btnsend_step2"  type="submit" >ارسال</button>
          </div>
          <?php } ?>
        </form>
        <?php } if(isset($_GET['do']) and $_GET['do'] == 'closed') { ?>
        <div class="alert alert-danger" role="alert">التسجيل مغلق حالياً</div>
        <?php } ?>
        <?php if(isset($_GET['do']) and $_GET['do'] == 'successfully') { ?>
        <div class="alert alert-success" role="alert">تمت عملية التسجيل بنجاح, شكرا لك</div>
        <?php } ?>
        <?php if(isset($_GET['do']) and $_GET['do'] == 'failure') { ?>
        <div class="alert alert-danger" role="alert">حدث خطأ, لقم بالمحاولة مرة اخرى</div>
        <?php } ?>
      </section>
      <!--/ .section--> 
      
    </div>
    <!--/ #main-->
    
    <!--/ #sidebar--> 
    
    <?php include('footer.php') ?>
  <!--/ #footer--> 
  
</div>
<script>
$(document).ready(function(){

$("#mosque_id").change(function(){
   
if($(this).val()=="0")
{
    $("#other_mosque").show();
}
else
{
	$("#other_mosque").hide(); 
}
    
});

$("#neighborhood_id").change(function(){
   
if($(this).val()=="0")
{
    $("#other_neighborhood").show();
}
else
{
	$("#other_neighborhood").hide(); 
}
    
});

$("#groups_id").change(function(){
   
if($(this).val()=="0")
{
    $("#other_groups_id").show();
}
else
{
	$("#other_groups_id").hide(); 
}
    
});


$("#center_id").change(function(){
   
if($(this).val()=="0")
{
    $("#other_center").show();
}
else
{
	$("#other_center").hide(); 
}
    
});

});

</script>
