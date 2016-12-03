<?php
    require ("include/dbWrapperClass.php");
    require ("include/config.php");
    require ("include/newFunction.php");
    

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo $settingsSiteName ?></title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="nivo-slider/themes/dark/dark.css">
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

	</head>
	<body>
<?php include ("header.php");?>

<div class="container">
  
  <!--left-->
  <?php include ("right.php");?>
  <!--/left-->
  
  <!--center-->
  <div class="col-sm-9">
  <div class="row">
  
    <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">تسجيل الدخول</h3>
          </div>
          <div class="panel-body">
		<div class="alert alert-success" role="alert">تم تسجيل دخولك بنجاح, سيتم تحويلك خلال 3 ثواني</div>
<meta http-equiv="refresh" content="3;URL=my_reservation.php">

          </div>
        </div>

  </div>
  </div>
  
    
  </div><!--/center-->

  <hr>
</div>
<?php include ("footer.php");?>

	</body>
</html>