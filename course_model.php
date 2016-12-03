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
            <form method="post" enctype="multipart/form-data" role="form" action="print_course_model.php">
			 <p><?php echo $msg ?></p>
                 <div class="row">
																				
				  <div id ="main"class="medium-12 columns">  
                      <label> أسم المرك
                          <p class="tmmFormStyling form-input-text">
				            <input type="text" name="name" required   id="name" placeholder="أسم المركز" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
                        </p>
                     </label>
                 </div>

                 <div id ="main"class="medium-12 columns">  
                     <label> اسم المنسق
                         <p class="tmmFormStyling form-input-text">
                            <input  type="text" name="orginazer" required   id="orginazer" placeholder="اسم المنسق" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
                        </p>
                      </label>
                  </div>

					<h4 >بيانات االدورة</h4>
                
                <div id ="main"class="medium-12 columns">  
                    <label>اسم الدورة
                        <p class="tmmFormStyling form-input-text">
                           <input   type="text" name="course_name" required   id="course_name" placeholder="اسم الدورة" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
                        </p>
                     </label>
                 </div>

                <div id ="main"class="medium-12 columns">  
                    <label>اسم المدرب
                        <p class="tmmFormStyling form-input-text">
                            <input   type="text"  name="traniner_name" required   id="traniner_name" placeholder="اسم المدرب" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
                        </p>
                    </label>
                </div>

                 <div id ="main"class="medium-12 columns">  
                     <label>رقم جوال المدرب
                         <p class="tmmFormStyling form-input-text">
                            <input   type="text"  name="trainer_mob" required   id="trainer_mob"  placeholder="0599999999" pattern="(?![9]{10})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" maxlength="10"  oninvalid="setCustomValidity('يجب كتابة رقم جوال صحيح')">
                        </p>
                     </label>
                 </div>

                <div id ="main"class="medium-12 columns">  
                    <label>عدد الأيام
                        <p class="tmmFormStyling form-input-text">
                            <input   type="text"  name="day_num" required   id="day_num" placeholder="عدد الأيام" pattern="(?![9]{10})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة أرقام فقط')">
                        </p>
                    </label>
                </div>

                <div id ="main"class="medium-12 columns">  
                    <label>عدد الساعات
                        <p class="tmmFormStyling form-input-text">
                           <input   type="text"  name="hour_num" required   id="hour_num"  placeholder="عدد الساعات" pattern="(?![9]{10})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة رقم جوال صحيح')">
                        </p>
                    </label>
                </div>

                <div id ="main"class="medium-12 columns">  
                    <label>الأيام
                        <p class="tmmFormStyling form-input-text">
                            <input   type="text"  name="days" required   id="days" placeholder="الأيام" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة أرقام فقط')">
                        </p>
                    </label>
                </div>

                 <div id ="main"class="medium-12 columns">  
                     <label>التاريخ
                         <p class="tmmFormStyling form-input-text">
                            <input   type="text" name="datee" required   id="datee" type="date" pattern="(?![9]{10})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة رقم جوال صحيح')">
                        </p>
                     </label>
                 </div>

                <div id ="main"class="medium-12 columns">  
                    <label>الفئة المستهدف
                        <p class="tmmFormStyling form-input-text">
                          <input   type="text"  name="Category" required   id="Category" placeholder="الفئة المستهدفة" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة أرقام فقط')">
                        </p>
                    </label>
                </div>

                <div id ="main"class="medium-12 columns">  
                    <label>مكان إقامة الدورة
                        <p class="tmmFormStyling form-input-text">
                               <input   type="text"  name="place" required   id="place"  placeholder="مكان إقامة الدورة" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة رقم جوال صحيح')">
                        </p>
                    </label>
                </div>

                <div id ="main"class="medium-12 columns">  
                    <label>عدد الحضور الفعلي
                        <p class="tmmFormStyling form-input-text">
                            <input   type="text"  name="att_num" required   id="att_num" placeholder="عدد الحضور الفعلي" pattern="(?![9]{10})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة أرقام فقط')">
                        </p>
                     </label>
                 </div>

                 <div id ="main"class="medium-12 columns">  
                     <label>تكلفة المدرب
                         <p class="tmmFormStyling form-input-text">
                            <input   type="text"  name="cost" required   id="cost"  placeholder="تكلفة المدرب" pattern="(?![9]{10})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة رقم جوال صحيح')">
                        </p>
                     </label>
                 </div>

                 <div id ="main"class="medium-12 columns">  
                     <label>النسبة الإجمالية للتقييم
                         <p class="tmmFormStyling form-input-text">
                            <input   type="text"  name="assess" required   id="assess" placeholder="النسبة الإجمالية للتقييم" pattern="(?![9]{10})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة أرقام فقط')">
                        </p>
                    </label>
                </div>

                <div id ="main"class="medium-12 columns">  
                    <label>أبرز ايجابيات الدورة
                        <p class="tmmFormStyling form-input-text">
                            <textarea name="positive" rows="3"   id="positive"><?php echo $_POST['positive'] ?></textarea>
                        </p>
                     </label>
                 </div>

                 <div id ="main"class="medium-12 columns">  
                 <label>أبرز سلبيات  الدورة:
                  <p class="tmmFormStyling form-input-text">
                         <textarea name="negative" rows="3"  id="negative"><?php echo $_POST['negative'] ?></textarea>
                        </p>
                     </label>
                </div>

																		
                 <div id ="main"class="medium-12 columns">                                                        
                <input name="btnsend" type="submit" class="btn btn-default" id="btnsend" value="ارسال">
                   </div>                                            
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