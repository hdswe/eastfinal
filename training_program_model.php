<?php
    require ("include/dbWrapperClass.php");
    require ("include/config.php");
    require ("include/newFunction.php");
	
	
	if(isset($_POST['btnsend'])){
		header('Location: print_training_program_model.php');
	}

?>
<!DOCTYPE html>

<html  class="no-js" lang="ar" dir="rtl">
<head>
        

    <!-- Basic Page Needs
      ================================================== -->
    <meta charset="utf-8"/>
    <title><?php echo $settingsSiteName ?></title>
    <meta name="description" content="Diplomat - Responsive Political HTML5 Template">
    <meta name="author" content="ThemeMakers">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>

  <!-- Web Font
  ================================================== -->
 <link href="http://fonts.googleapis.com/css?family=Droid+Arabic+Naskh" rel="stylesheet" type="text/css">
 <link href="http://fonts.googleapis.com/css?family=Droid+Arabic+Kufi" rel="stylesheet" type="text/css">

    <!-- Theme CSS
    ================================================== -->
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/layout.css"/>

    <!-- Vendor CSS
    ================================================== -->
    <link rel="stylesheet" href="assets/diplomat/css/vendor.css"/>
    <link rel="stylesheet" href="css/fontello.css"/>
    <link rel="stylesheet" href="assets/diplomat/js/vendor/layerslider/css/layerslider.css"/>

    <!-- Modernizr
    ================================================== -->
    <script src="assets/diplomat/js/vendor/jquery.modernizr.js"></script>
</head>
<body>

<body class="animated">
<div class="tmm_loader">

  <div class="logo">
    <span class="tmm_logo">
      <a title="Political HTML5 Theme" href="home.html"><img src="images/logo.png" class="img-responsive" alt=""></a>
    </span>
  </div>

  <div class="loader">
    <div id="spinningSquaresG">
      <div id="spinningSquaresG_1" class="spinningSquaresG"></div>
      <div id="spinningSquaresG_2" class="spinningSquaresG"></div>
      <div id="spinningSquaresG_3" class="spinningSquaresG"></div>
      <div id="spinningSquaresG_4" class="spinningSquaresG"></div>
      <div id="spinningSquaresG_5" class="spinningSquaresG"></div>
      <div id="spinningSquaresG_6" class="spinningSquaresG"></div>
      <div id="spinningSquaresG_7" class="spinningSquaresG"></div>
      <div id="spinningSquaresG_8" class="spinningSquaresG"></div>
    </div>
  </div>
</div>

<!-- - - - - - - - WRAPPER - - - - - - - -->
<div id="wrapper">

  <!-- - - - - - - - MOBILE MENU - - - - - - - -->

  <nav id="mobile-advanced" class="mobile-advanced"></nav>

  <!-- - - - - - - - END MOBILE MENU - - - - - - - -->


  <!-- - - - - - - - HEADER - - - - - - - -->
  <?php include('header.php') ?>

  <!-- - - - - - - -  END HEADER  - - - - - - - -->

<main id="content" class="row">



    <div id="main" class="large-8 columns">

      <section class="section margin-top-off">

        <div class="page-title">
          <h1>نموذج طلب صرف أتعاب مدرب</h1>

          <div class="breadcrumbs">
            <a href="home.php" title="">الرئيسية</a>
            <a href="cash_app.php" title="">نموذج طلب صرف أتعاب مدرب</a>
          
          </div>
        </div>



          <?php if($_GET['do'] != 'closed') { ?>
            <?php if($_GET['do'] != 'successfully') { ?>
                <form method="post" enctype="multipart/form-data" role="form" action="print_training_program_model.php">
				<div class="row">
                   <p> <?php echo $msg ?></p>
                     
					<div id ="main"class="medium-12 columns">
					<label> اسم مركز 
					 <p class="tmmFormStyling form-input-text">
					<input name="name" type="text" required type="text" id="name" placeholder="أسم المركز" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
                    </p>
                    </label>
                    </div>

                    <div id ="main"class="medium-12 columns">
                    <label>الفصل الدراسي   <
                     <p class="tmmFormStyling form-input-text">
                    <input name="organizer" required type="text" id="organizer" placeholder="اسم منسق التدريب" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
                    </p>
                    </label>
                    </div>

					<span>      تأجيل دورة تدريبية</span>
																	<hr>
					<div id ="main"class="medium-12 columns">
					<label>عنوان الدورة
					 <p class="tmmFormStyling form-input-text">
					<input name="delay_course_name"  required type="text" id="delay_course_name" placeholder="عنوان الدورة">
                    </p>
                    </label>
                    </div>

                    <div id ="main"class="medium-12 columns">
                    <label>الموعد القديم
                     <p class="tmmFormStyling form-input-text">
					<input name="delay_course_olddate"  type="date" required type="text" id="delay_course_olddate" >
                    </p>
                    </label>
                    </div>

                    <div id ="main"class="medium-12 columns">
                    <label>الموعد الجديد
                     <p class="tmmFormStyling form-input-text">
					<input name="delay_course_newdate"  type="date" required type="text" id="delay_course_newdate" >
                    </p>
                    </label>
                    </div>

																		  
					<hr>
					
					<span> إلغاء دورة تدريبية</span>
																		
<hr>
					<div id ="main"class="medium-12 columns">
					<label>عنوان الدورة
					 <p class="tmmFormStyling form-input-text">
					<input name="cancel_course_name"  required type="text" id="cancel_course_name" placeholder="عنوان الدورة">
                    </p>
                    </label>
                    </div>

                    <div id ="main"class="medium-12 columns">
                    <label>تاريخ الدورة
                     <p class="tmmFormStyling form-input-text">
					<input name="cancel_course_date"  type="date" required type="text" id="cancel_course_date" >
                    </p>
                    </label>
                    </div>

                    <div id ="main"class="medium-12 columns">
                    <label>المدرب 
                     <p class="tmmFormStyling form-input-text">
					<input name="cancel_trainer_name"  required type="text" id="cancel_trainer_name" placeholder="المدرب">
                    </p>
                    </label>
                    </div>

					<hr>
					<span>          تغيير مدرب دورة </span>
																		
<hr>
					<div id ="main"class="medium-12 columns">
					<label>عنوان الدورة
					 <p class="tmmFormStyling form-input-text">
					<input name="change_course_name"  required type="text" id="change_course_name" placeholder="عنوان الدورة">
                    </p>
                    </label>
                    </div>

					<div id ="main"class="medium-12 columns">
					<label>تاريخ الدورة
					 <p class="tmmFormStyling form-input-text">
					<input name="change_course_date"  type="date" required type="text" id="change_course_date" >
                    </p>
                    </label>
                    </div>

                    <div id ="main"class="medium-12 columns">
                    <label>المدرب القديم
                     <p class="tmmFormStyling form-input-text">
					<input name="change_trainer_name_old"  required type="text" id="change_trainer_name_old" placeholder="المدرب">
                    </p>
                    </label>
                    </div>

                    <div id ="main"class="medium-12 columns">
                    <label>المدرب البديل
                     <p class="tmmFormStyling form-input-text">
					<input name="change_trainer_name_new"  required type="text" id="change_trainer_name_new" placeholder="المدرب البديل">
                    </p>
                    </label>
                    </div>

                    <div id ="main"class="medium-12 columns">
                    <label>للأسباب التالية:
                     <p class="tmmFormStyling form-input-text">
                    <textarea name="reasons" rows="3" type="text" id="reasons"></textarea>
                   	</p>
                   	</label>
                   	</div>
                   	<hr>
																			      
					<span>  إضافة دورة تدريبية</span>
					<hr>
					

					<div id ="main"class="medium-12 columns">
					<label>عنوان الدورة
					 <p class="tmmFormStyling form-input-text">
					<input name="new_course_name"  required type="text" id="new_course_name" placeholder="عنوان الدورة">
                    </p>
                    </label>
                    </div>

                    <div id ="main"class="medium-12 columns">
                    <label>المدرب
                     <p class="tmmFormStyling form-input-text">
					<input name="new_trainer_name"  required type="text" id="new_trainer_name" placeholder="المدرب">
                    </p>
                    </label>
                    </div>


                    <div id ="main"class="medium-12 columns">
                    <label>تاريخ الدورة
                     <p class="tmmFormStyling form-input-text">
					<input name="new_course_date"  type="date" required type="text" id="new_course_date" >
                    </p>
                    </label>
                    </div>

                    <div id ="main"class="medium-12 columns">
                    <label>الفئة
                     <p class="tmmFormStyling form-input-text">
					<input name="new_target"  required type="text" id="new_target" placeholder="الفئة">
                    </p>
                    </label>
                    </div>

                    <div id ="main"class="medium-12 columns">
                    <label>التكلفة
                     <p class="tmmFormStyling form-input-text">
					<input name="new_cost"  required type="text" id="new_cost" placeholder="التكلفة">
					</p>
					</label>
					</div>

																		
																		
                    <div id ="main"class="medium-12 columns">                                                   
                    <input name="btnsend" type="submit" class="btn btn-default" id="btnsend" value="ارسال">
                     </div>                                           
                </form>
                    <?php } }  ?>
                    
                    
                    <?php if(isset($_GET['do']) and $_GET['do'] == 'failure') { ?>
                    

                     <div class="" role="alert">
                         <p class="error">حدث خطأ, لقم بالمحاولة مرة اخرى
                            <a class="alert-close" href="#"></a>
                         </p>
                   </div>  
                           
                    <?php } ?>
                    
               



       
</section>
      <!--/ .section-->

    </div>


    <aside id="sidebar" class="medium-4 large-4 columns">
             <?php include('right-pages.php') ?>
 </aside>
    <!--/ #sidebar-->

      </main>
    <!--/ #main-->

    



 <footer id="footer">
          <?php include('footer.php') ?>
  </footer>
  <!--/ #footer-->


</div>



<script>
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


</script>
</body>
</html>