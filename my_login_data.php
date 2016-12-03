<?php
    require ("include/dbWrapperClass.php");
    require ("include/config.php");
    require ("include/newFunction.php");
    
#############################################################
# Check Login User
#############################################################
    if(isset($idUser)){
		$sqlIdNumber = "SELECT * FROM `users` WHERE `id`=:id";
		$dataIdNumber[id] = $idUser;
		$result = $pdo->pdoGetRow($sqlIdNumber, $dataIdNumber);
    } else { 
        header('Location: index.php');
    }

#############################################################
# Update Login Data
#############################################################

    if(isset($_POST['btnedit'])) {
        if(empty($_POST['password'])){
            $data['password']             = $_POST['hdn_pass'];
        }else{
            $data['password']             = trim($_POST['password']);
        }
            $where[id] = $idUser;
            $update = $pdo->pdoInsUpd('users', $data, 'update', $where);
            $msg = "تم التعديل بنجاح";
    }


?>
<!DOCTYPE html>
<
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
            <a href="home.php" title="">التسجيل كمتدرب</a>
            <a href="my_login_data.php" title="">التسجيل كمتدرب</a>
          
          </div>
        </div>


    <form method="post" role="form">
        <p><?php echo $msg ?></p>
        
        <div id ="main"class="medium-12 columns">  

        <label>رقم بطاقة الاحوال / الاقامة
        <p class="tmmFormStyling form-input-text">
        <input name="id_number" disabled class="form-control" id="id_number" value="<?php echo $result['id_number'] ?>" readonly>
         </p>
         </label>
         </div>
        
        <input name="hdn_pass" type="hidden" id="hdn_pass" value="<?php echo $result['password'] ?>">
        
        
        <div id ="main"class="medium-12 columns">    
        <label>كلمة المرور
        <p class="tmmFormStyling form-input-text">
        <input name="password" class="form-control" id="password">
         </label>
         </div>


         <div id ="main"class="medium-12 columns">    
        <label>اعد كلمة المرور
        <p class="tmmFormStyling form-input-text">
        <input name="repassword" class="form-control" id="repassword">
        </p>
        </label>
        </div>

        <div id ="main"class="medium-12 columns">    
        <input name="btnedit" type="submit" class="btn btn-primary" id="btnedit" value="تعديل">
        </div>
                                
    </form>
                            




       
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

</body>
</body>