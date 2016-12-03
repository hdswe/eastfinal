<?php
    require ("include/dbWrapperClass.php");
    require ("include/config.php");
    require ("include/newFunction.php");

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
       <form method="post" enctype="multipart/form-data" role="form" action="print_cash_app.php">

               

                         <p ><?php echo $msg ?></p>
               
                                      
                                      
			
			
<div class="row">
   <div id ="main"class="medium-12 columns">   		
			<label> اسم مركز الإشراف       
      <p class="tmmFormStyling form-input-text">
			<input type="text" name="name" required class="form-control" id="name" placeholder="أسم المركز" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
      </p>
      </div>


   <div id ="main"class="medium-12 columns">   
			<label> اسم المدرب المقدم للدورة       
      <p class="tmmFormStyling form-input-text"> 
      <input  type="text" name="trainer_name" required class="form-control" id="trainer_name" placeholder=" اسم المدرب المقدم للدورة " pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
      </p>
      </div>


   <div id ="main"class="medium-12 columns">   
			<label>رقم جوال المدرب         
      <p class="tmmFormStyling form-input-text"> 
      <input  type="text" name="trainer_mob" required class="form-control" id="trainer_mob" placeholder="0599999999" pattern="(?![9]{10})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" maxlength="10"  oninvalid="setCustomValidity('يجب كتابة رقم جوال صحيح')">
</p>
</div>


			<div id ="main"class="medium-12 columns">
      <label>البريد الإلكتروني للمدرب       
      <p class="tmmFormStyling form-input-text"> 
      <input  type="text" name="trainer_email" required class="form-control" id="trainer_email" placeholder="البريد الإلكتروني للمدرب" >
      </p>
      </div>


   <div id ="main"class="medium-12 columns">   
			<label>عدد الدورات التي قدمها المدرب       
      <p class="tmmFormStyling form-input-text"> 
      <input  type="text" name="trainer_course_num" required class="form-control" id="trainer_course_num" placeholder="عدد الدورات التي قدمها المدرب ">
      </p>
      </div>


   <div id ="main"class="medium-12 columns">                                                               
      <label>رقـــم هـــويــة الـــــمــدرب     
      <p class="tmmFormStyling form-input-text"> 
      <input  type="text" name="trainer_id" required class="form-control" id="trainer_id" placeholder="رقـــم هـــويــة الـــــمــدرب">
      </p>
      </div>


   <div id ="main"class="medium-12 columns">   
			<label>رقم الحساب البنكي للمدرب (الراجحي )     
      <p class="tmmFormStyling form-input-text"> 
      <input  type="text" name="trainer_bank_account" required class="form-control" id="trainer_bank_account" placeholder="رقم الحساب البنكي للمدرب (الراجحي )">
      </p>
      </div>

			<span> منسق تدريب مراكز إشراف حفظه الله السلام عليكم ورحمة الله وبركاته ،،، وبعد : </span> 
																			     
			<span>نفيدكم بأن المدرب  قدم لدى مركزنا للتدريب خلال شهر </span>
																		
      <select  type="text" name="month">
			<option></option>
			<option>محرم</option>
			<option>صفر</option>
			<option>ربيع الأول</option>
			<option> ربيع الثاني</option>
			<option>جمادي الأول</option>
			<option>جمادي الثاني</option>
			<option>رجب</option>
			<option>شعبان</option>
			<option>رمضان</option>
			<option>شوال</option>
			<option>ذو القعدة</option>
			<option>ذو الحجة</option>
			</select>


			<span>( الدورة / الدورات ) التالية :</span> 
			
			

   <div id ="main"class="medium-12 columns">   
      <label>اسم الدورة     
      <p class="tmmFormStyling form-input-text">
       <input  type="text" name="course_name" required class="form-control" id="course_name" placeholder="اسم الدورة" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}"  oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
      </p>
      </div>


   <div id ="main"class="medium-12 columns">                                                                      
      <label>عدد الأيام التدريبية     
      <p class="tmmFormStyling form-input-text">
      <input  type="text" name="training_days" required class="form-control" id="training_days" placeholder="عدد الأيام التدريبية" >
      </p>
      </div>

   <div id ="main"class="medium-12 columns">

      <label>عدد الساعات     
      <p class="tmmFormStyling form-input-text">
      <input  type="text" name="hour_num" required class="form-control" id="hour_num"  placeholder="عدد الساعات">
     </p>
     </div>


   <div id ="main"class="medium-12 columns">  
      <label>تاريخ إقامة الدورة     
      <p class="tmmFormStyling form-input-text">
      <input  type="text" name="course_date" required class="form-control" type="date" id="course_date" placeholder="تاريخ إقامة الدورة" >
      </p>
      </div>




			<div id ="main"class="medium-12 columns">
      <label>اسم الدورة     
      <p class="tmmFormStyling form-input-text">
      <input  type="text" name="course_name1" class="form-control" id="course_name" placeholder="اسم الدورة">
      </p>
      </div>


   <div id ="main"class="medium-12 columns">   
       <label>عدد الأيام التدريبية     
       <p class="tmmFormStyling form-input-text">
       <input  type="text" name="training_days1" class="form-control" id="training_days" placeholder="عدد الأيام التدريبية">
      </p>
      </div>


   <div id ="main"class="medium-12 columns">   
       <label>عدد الساعات     
       <p class="tmmFormStyling form-input-text">
        <input  type="text" name="hour_num1" class="form-control" id="hour_num"  placeholder="عدد الساعات">
       </p>
       </div>


   <div id ="main"class="medium-12 columns">    
       <label>تاريخ إقامة الدورة     
       <p class="tmmFormStyling form-input-text">
       <input  type="text" name="course_date1" class="form-control" type="date" id="course_date" placeholder="تاريخ إقامة الدورة" >
       </p>
       </div>


																		
                                                                       
       <div id ="main"class="medium-12 columns">    
       <input name="btnsend" type="submit" class="btn btn-default" id="btnsend" value="ارسال">
       </div>  
       </label>                                                       
     
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