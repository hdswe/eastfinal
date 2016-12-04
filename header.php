<?php
	ob_start();
    require ("include/dbWrapperClass.php");
    require ("include/config.php");
    require ("include/newFunction.php");
?>
<!DOCTYPE html>
<!--[if lte IE 8]><html class="ie8 no-js" lang="en-US"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en-US"><![endif]-->
<!--[if !(IE)]><!--><html class="not-ie no-js" lang="en-US"><!--<![endif]-->
<head>
	<!-- Basic Page Needs
	  ================================================== -->
	<meta charset="utf-8"/>
	<title><?= $settingsSiteName ?></title>
	<meta name="description" content="Diplomat - Responsive Political HTML5 Template">

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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">
	<link rel="stylesheet" href="css/normalize.css"/>
	<link rel="stylesheet" href="css_old/styles.css"/>
	<link rel="stylesheet" href="css/layout.css"/>
	<link rel="stylesheet" href="css/rtl.css"/>

	<!-- Vendor CSS
	================================================== -->
	<link rel="stylesheet" href="css/vendor.css"/>
	<link rel="stylesheet" href="css/fontello.css"/>
	<link rel="stylesheet" href="js/vendor/layerslider/css/layerslider.css"/>
	<!-- Modernizr
	================================================== -->
	<script src="js/vendor/jquery.modernizr.js"></script>
</head>
<body class="animated">
<div class="tmm_loader">

	<div class="logo">
		<span class="tmm_logo">
      <a title="Political HTML5 Theme" href="index.php"><img src="images/logo.png" class="img-responsive" alt=""></a>
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

<!-- - - - - - - -  WRAPPER  - - - - - - - -->
<div id="wrapper">

	<!-- - - - - - - - MOBILE MENU - - - - - - - -->

	<nav id="mobile-advanced" class="mobile-advanced"></nav>

	<!-- - - - - - - - END MOBILE MENU - - - - - - - -->


	<!-- - - - - - - - HEADER - - - - - - - -->

	<header id="header" class="header type-4">

		<div class="header-top">

			<div class="row">

				<div class="large-12 columns">
					<ul class="social-icons">
						<li class="twitter">
							<a target="_blank" href="https://twitter.com/ThemeMakers">Twitter</a>
						</li>
						<li class="facebook">
							<a target="_blank" href="http://www.facebook.com/wpThemeMakers">Facebook</a>
						</li>
						<li class="linkedin">
							<a target="_blank" href="http://linkedin.com/">Linkedin</a>
						</li>
						<li class="pinterest">
							<a target="_blank" href="http://pinterest.com/">Pinterest</a>
						</li>
						<li class="gplus">
							<a target="_blank" href="http://plus.google.com/">Google Plus</a>
						</li>
						<li class="instagram">
							<a target="_blank" href="http://instagram.com/">Instagram</a>
						</li>
						<li class="dribbble">
							<a target="_blank" href="http://dribbble.com/">Dribbble</a>
						</li>
					</ul>
					<!--/ .social-icons-->
				</div>

			</div>
			<!--/ .row-->

		</div>
		<!--/ .header-top-->

		<div class="header-middle">

			<div class="row">

				<div class="large-12 columns">
					<div class="header-middle-entry">

						<div class="logo">
							<span class="tmm_logo">
      <a title="Political HTML5 Theme" href="index.php"><img src="images/logo.png" class="img-responsive" alt=""></a>

							</span>
						</div>
					<?php if(empty($_SESSION['username'])) { ?>
						<div class="account">

							<!-- - - - - - - - DONATE BUTTON - - - - - - - -->

							<a href="login.php" class="btn btn-lg donate" style="margin-bottom: -5px;">تسجيل دخول</a>

							<!-- - - - - - - - END DONATE BUTTON - - - - - - - -->

						</div>
                       <? } ?>
					</div>

				</div>

			</div>
			<!--/ .row-->

		</div>
		<!--/ .header-middle-->

		<div class="header-bottom">

			<div class="row">

				<div class="large-12 columns">

					<nav id="navigation" class="navigation top-bar" data-topbar>

						<div class="menu-primary-menu-container">

							<ul id="menu-primary-menu" class="menu">
								              <li class="menu-item current_page_item"> <a href="index.php">الرئيسية</a> </li>
              <li> <a href="page.php?id=2">من نحن</a> </li>
              <li> <a href="course.php">الدورات</a> </li>
              <li> <a href="trainer.php">تسجيل مدرب</a> </li>
              <li> <a href="register.php">تسجيل متدرب</a> </li>
              <li> <a href="page.php?id=3">اتصل بنا</a> </li>

							</ul>
						</div>
						<?php if(empty($_SESSION['username'])) { ?>
						<a href="login.php" class="button large donate">تسجيل دخول</a>
						<? } ?>
					</nav>
					<!--/ .navigation-->

				</div>

			</div>
			<!--/ .row-->

		</div>
		<!--/ .header-bottom-->

	</header>
	<!--/ #header-->

	<!-- - - - - - - -  END HEADER  - - - - - - - -->


	<!-- - - - - - - - MAIN  - - - - - - - -->

	<main id="content" class="row sbr">
