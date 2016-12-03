<?
    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/newFunction.php");
    
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

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="signin">

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
    <div class="signinpanel">
        
        <div class="row">
                        
            <div class="col-md-6 col-md-offset-3">
			<? if($_GET['do'] != 'succes' ){ ?>
			<? if($_GET['do'] == 'password_wrong'){ ?>
		<div class="alert alert-danger" role="alert">خطأ في كلة المرور, قم بالمحاولة مرة أخرى</div>
			<? } ?>
			<? if($_GET['do'] == 'user_not_exist'){ ?>
		<div class="alert alert-warning" role="alert">هذا الأسم غير موجود</div>
			<? } ?>

                <form method="post" action="">
                    <h4 class="nomargin">تسجيل الدخول</h4>
                    <p class="mt5 mb20">قم بتسجيل دخولك لتتمكن من استخدام صلاحياتك</p>
                
                    <input name="id_number" type="text" required class="form-control uname" id="id_number" placeholder="أسم المستخدم" />
                    <input name="password" type="password" required class="form-control pword" id="password" placeholder="كلمة المرور" />
                    <a href=""><small>هل نسيت كلمة المرور ؟</small></a>
                    <input name="login" type="submit" class="btn btn-success btn-block" id="login" value="دخول">
                    
                </form>
                            <? } elseif($_GET['do'] == 'succes'){ ?>
		<div class="alert alert-success" role="alert">تم تسجيل دخولك بنجاح, سيتم تحويلك خلال 3 ثواني</div>
		<meta http-equiv="refresh" content="3;URL=index.php">
            <? } ?>

            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        
        
    </div><!-- signin -->
  
</section>


<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/retina.min.js"></script>

<script src="js/custom.js"></script>

</body>
</html>
