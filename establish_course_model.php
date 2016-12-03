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
          <h1>نموذج طلب إقامة دورات</h1>

          <div class="breadcrumbs">
            <a href="home.php" title="">الرئيسية</a>
            <a href="cash_app.php" title="">نموذج طلب إقامة دورات</a>
          
          </div>
        </div>


      <?php if($_GET['do'] != 'closed') { ?>
        <?php if($_GET['do'] != 'successfully') { ?>
        <form method="post" enctype="multipart/form-data" role="form" action="print_establish_course_model.php">
		
        <p><?php echo $msg ?></p>
           <div class="row">
																				
				 <div id ="main"class="medium-12 columns">
				<label> اسم مركز الإشراف    
                 <p class="tmmFormStyling form-input-text">
				<input name="name" required type="text"id="name" placeholder="أسم المركز" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
                </p>
                </label>
                </div>

                 <div id ="main"class="medium-12 columns">
                <label> اسم منسق التدريب     
                 <p class="tmmFormStyling form-input-text">
                <input name="organizer" required type="text"id="organizer" placeholder="اسم منسق التدريب" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
                </p>
                </label>
                </div>

                 <div id ="main"class="medium-12 columns">
                <label>عدد الدورات التي ستقدم   
                 <p class="tmmFormStyling form-input-text">
                <input name="course_num" required type="text"id="course_num" placeholder="عدد الدورات التي ستقدم " >
                </p>
                </label>
                </div>

                 <div id ="main"class="medium-12 columns">
                <label>خـلال    
                 <p class="tmmFormStyling form-input-text">
                <input name="from" required type="date" type="text"id="from" >
               </p>
               </label>
               </div>

                 <div id ="main"class="medium-12 columns">
                <label>الي    
                 <p class="tmmFormStyling form-input-text">
            	    <input name="to" required type="date" type="text"id="to" >
                </p>
                </label>
                </div>

				<span>مدير إدارة الشؤون التعليمية  السلام عليكم ورحمة الله وبركاته ،،، وبعد : </span> 
                  <span>نفيدكم بأن مركز إشراف </span>
				<div id ="main"class="medium-12 columns">
					 <p class="tmmFormStyling form-input-text">               
							<input name="name"  required type="text"id="name" placeholder="أسم المركز" pattern="^([^0-9]*)$" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ او كتابة ارقام فيه')">
               		 </p>
                </div>

                <span>يود أن يطرح الدورات  التالية خلال الفترة المذكورة فنرجو من فضيلتكم التكرم بتعميدها لنا شاكرين لكم حسن تعاونكم معنا .</span>         
				<hr>

				 <div id ="main"class="medium-12 columns">
				<label>عنوان الدورة  
                  <p class="tmmFormStyling form-input-text">
				<input name="course_name1"  required type="text"id="course_name" placeholder="عنوان الدورة">
                </p>
                </label>
                </div>

				 <div id ="main"class="medium-12 columns">
				<label>اسم المدرب ثلاثي  
                 <p class="tmmFormStyling form-input-text">
				      <input name="trainer_name"  required type="text"id="trainer_name" placeholder="اسم المدرب ثلاثي">
                </p>
                </label>
                </div>

				 <div id ="main"class="medium-12 columns">
				<label>عدد الساعات  
                 <p class="tmmFormStyling form-input-text">
					<input name="hours"  required type="text"id="hours" placeholder="عدد الساعات">
                </p>
                </label>
                </div>

				 <div id ="main"class="medium-12 columns">
				<label>الفئة المستهدفة  
                 <p class="tmmFormStyling form-input-text">
			    	<input name="target"  required type="text"id="target" placeholder="الفئة المستهدفة">
                </p>
                </label>
                </div>

				 <div id ="main"class="medium-12 columns">
				<label>تاريخ ويوم  
                 <p class="tmmFormStyling form-input-text">
				<input name="course_date"  type="date" required type="text"id="course_date" >
                </p>
                </label>
                </div>

				 <div id ="main"class="medium-12 columns">
				<label>تكلفة المدرب  
                 <p class="tmmFormStyling form-input-text">
				<input name="cost"  required type="text"id="cost" placeholder="تكلفة المدرب">
                </p>
                </label>
                </div>

				 <div id ="main"class="medium-12 columns">
				<label>مكان الدورة  
                 <p class="tmmFormStyling form-input-text">
				<input name="place"  required type="text"id="place" placeholder="مكان الدورة">
                </p>
                </label>
                </div>


				<button id="b0" class="btn add-more" type="button" for="1">+</button>
				 <p class="tmmFormStyling form-input-text">
				<input name="btnsend" type="submit" class="btn btn-default" id="btnsend" value="ارسال">
                </p>
               

                                                                
                       
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








      var counter = 2;
var limit = 10;
    jQuery(".add-more").click(function(e){
    	

     if (counter == limit)  {
          alert("يمكنك اضافة 10 دورات كحد أقصي");
     }
     else {
		  <div id ="main"class="medium-12 columns">var newdiv = '<div class="form-group" id="form-group'+counter+'"><div class="row"><div class="col-md-4">
		                   <p class="tmmFormStyling form-input-text">
		                   <label>عنوان الدورة  
		  <input name="course_name'+counter+'"  required type="text"id="course_name'+counter+'" placeholder="عنوان الدورة">'
          </p>
          </label>
          </div>
                        <div id ="main"class="medium-12 columns">+'
                                         <p class="tmmFormStyling form-input-text">
                                         <div id ="main"class="medium-12 columns"><label>اسم المدرب ثلاثي  
                        <input name="trainer_name'+counter+'"  required type="text"id="trainer_name'+counter+'" placeholder="اسم المدرب ثلاثي">
                        </p>
                        </label>
                        </div>
                        <label>عدد الساعات  
                        '                 <p class="tmmFormStyling form-input-text">

						 <div id ="main"class="medium-12 columns">+'<input name="hours'+counter+'"  required type="text"id="hours'+counter+'" placeholder="عدد الساعات">
						 </p>
						 </label>
						 </div><label>الفئة المستهدفة  
                 <p class="tmmFormStyling form-input-text">

						  <input name="target'+counter+'"  required type="text"id="target'+counter+'" placeholder="الفئة المستهدفة">'
                         </p>
                         </label>
                         </div><
                         div id ="main"class="medium-12 columns">+'
                                          <p class="tmmFormStyling form-input-text">
                                          <div id ="main"class="medium-12 columns"><label>تاريخ ويوم  
                         <input name="course_date'+counter+'"  type="date" required type="text"id="course_date'+counter+'" >
                         </p>
                         </label>
                         </div>
                                          <p class="tmmFormStyling form-input-text">
                                          <label>تكلفة المدرب  
                         <input name="cost'+counter+'"  required type="text"id="cost'+counter+'" placeholder="تكلفة المدرب">'
                         </p>
                         </label>
                         </div>
                         <div id ="main"class="medium-12 columns">+'
                          <p class="tmmFormStyling form-input-text">
                                          <label>مكان الدورة  
                         <input name="place'+counter+'"  required type="text"id="place'+counter+'" placeholder="مكان الدورة"></div></div><hr></div> '; 
         </p>
         </label>
         </div>

		 var divId='#form-group'+(counter-1)+'';
         jQuery(divId).after(jQuery(newdiv));
         counter++;
     }





} );



</script>
</body>
</html>