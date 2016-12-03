<?php
    require ("header.php");
?>


<aside id="sidebar" class="medium-3 large-3 columns">
             <?php include('right-pages.php') ?>
    </aside>
    <!--/ #sidebar-->


    <div class="large-9 columns">

      <section class="section margin-top-off">

        <div class="page-title">
          <h1>تسجيل الدخول</h1>

          <div class="breadcrumbs">
            <a href="home.php" title="">الرئيسية</a>
            <a href="login.php" title="">تسجيل الدخول</a>
          
          </div>
        </div>

			<?php if($_GET['do'] != 'succes' ){ ?>
			<?php if($_GET['do'] == 'password_wrong'){ ?>
	     	<div class="alert alert-danger" role="alert">خطأ في كلة المرور, قم بالمحاولة مرة أخرى.
              <a href="reset_password.php">أو قم باستعادة كلمة المرور من هنا </a>
              <a class="alert-close" href="#"></a>
        </div>
			<?php } ?>

			<?php if($_GET['do'] == 'user_not_exist'){ ?>
		    <div class="alert alert-danger" role="alert">
             <p>هذا الرقم غير مسجل لدينا</p>
             <a class="alert-close" href="#"></a>
        </div>
			<?php } ?>
 
       
     <form method="post" role="form">
          <div class="form-group">
             <label>رقم بطاقة الاحوال / الاقامة</label>
                   <input type="text" name="id_number" required class="form-control" id="id_number" pattern="(?!.*([0-9])\1{9})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_SESSION['id_number'] ?>" maxlength="10" oninvalid="setCustomValidity('يجب كتابة رقم جوال صحيح')">
          </div>   



           <div class="form-group">
             <label> كلمة المرور</label>
			<input name="password" type="password" required class="form-control" id="password" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة كلمة مرور')">
            
          </div>   

          
          <div class="form-group">
                <input name="login" type="submit" id="login" class="btn btn-primary btn-lg" value="ارسال">
          </div>

      </form>
       <?php } elseif($_GET['do'] == 'succes'){ ?>
		        <div class="alert alert-success" role="alert">
                 تم تسجيل دخولك بنجاح, سيتم تحويلك خلال 3 ثواني
                   <a class="alert-close" href="#"></a>
            </div>
		<meta http-equiv="refresh" content="3;URL=my_reservation.php">
            <?php } ?>
       

  </section>
      <!--/ .section-->

    </div>
    <!--/ #main-->

    


          <?php include('footer.php') ?>

