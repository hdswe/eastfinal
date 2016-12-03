<?php
    require ("include/dbWrapperClass.php");
    require ("include/config.php");
    require ("include/newFunction.php");
    
    
    if(isset($_POST['btn_reset'])){
		$email = $_POST['email'];
		$sql_reset = "SELECT * FROM `users` WHERE `email`=:email";
		$data_reset[email] = $email;
		$execute_reset = $pdo->pdoExecute($sql_reset, $data_reset);
		if($pdo->pdoRowCount($execute_reset) == 1){
            $result = $pdo->pdoGetRow($sql_reset, $data_reset);
			//ارسال رسالة الباسورد
			$to      = $email;
			$subject = 'الباسورد الخاص بك';
			$message = $result['password'];
			$headers = 'From: webmaster@example.com' . "\r\n" .
				'Reply-To: webmaster@example.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
			
			$ss = mail($to, $subject, $message, $headers);

			header('Location: ?do=succes');
		} else {
			header('Location: ?do=user_not_exist');
		}
	}

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
            <h3 class="panel-title">استرجاع كلمة المرور</h3>
          </div>
          <div class="panel-body">
          <p>قم بكتابة البريد الألكتروني وسيتم ارسال كلمة المرور أليك:</p>
			<?php if($_GET['do'] != 'succes' ){ ?>
			<?php if($_GET['do'] == 'user_not_exist'){ ?>
		<div class="alert alert-warning" role="alert">هذا البريد غير مسجل لدينا</div>
			<?php } ?>
              <form method="post" role="form">
          <div class="form-group">
            <label for="exampleInputEmail1">البريد الإلكتروني</label>
            <input name="email" type="email" required class="form-control" id="email" placeholder="user@email.com" value="<?php echo $_POST['username'] ?>">
          </div>
          
          
          
          <input name="btn_reset" type="submit" id="btn_reset" class="btn btn-default" value="ارسال">
            </form>
            <?php } elseif($_GET['do'] == 'succes'){ ?>
		<div class="alert alert-success" role="alert">تم ارسال كلمة المرور الى بريدك, قم بمراجعته</div>
            <?php } ?>
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