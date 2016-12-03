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

	<!-- Google Web Fonts
	================================================== -->
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:700,500,400%7cCourgette%7cRoboto:400,500,700%7CIndie+Flower:regular%7COswald:300,regular,700&amp;subset=latin%2Clatin-ext'
		  rel='stylesheet' type='text/css'>

	<!-- Theme CSS
	================================================== -->
	<link rel="stylesheet" href="css/normalize.css"/>
	<link rel="stylesheet" href="css/styles.css"/>
	<link rel="stylesheet" href="css/layout.css"/>

	<!-- Vendor CSS
	================================================== -->
	<link rel="stylesheet" href="css/vendor.css"/>
	<link rel="stylesheet" href="css/fontello.css"/>
	<link rel="stylesheet" href="assets/diplomat/js/vendor/layerslider/css/layerslider.css"/>

	<!-- Modernizr
	================================================== -->
	<script src="assets/diplomat/js/vendor/jquery.modernizr.js"></script>
</head>
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


	<!-- - - - - - - - MAIN  - - - - - - - -->

	<main id="content" class="row sbr">

		<div class="section padding-off columns medium-12 large-12 background-color-off">
			<div class="tmm_row">
				<div class="relative">

					<!-- LayerSlider -->

					<?php include('slider.php') ?>

					<!-- End LayerSlider -->

				</div>
			</div>
		</div>



<!--  statistics  -->
		<div class="medium-12 large-12 columns">
<?php include('statistics.php') ?>
			
		</div>

<!--  statistics  -->


<!--  statrt aside  -->
<aside id="sidebar" class="medium-3 large-3 columns text-center">
	<?php include('right.php') ?>
</aside>
<!--  end aside  -->


	<!--  programing  -->
<section id="main" class="medium-9 large-9 columns">
		<div class="section padding-off columns medium-12 large-12 background-color-off">
			<div class="row">
				  <?php include('programs.php') ?>
			</div>	
</section>
<!--  end programing  -->


<!--  start news  -->


<section id="main" class="medium-9 large-9 columns">
	<div class="section padding-off columns medium-12 large-12 background-color-off">
		<div class="row">
				<?php include('news.php') ?>
		</div>
	</div>
</section>	
<!--  end news  -->

	

	</main>

	<!--/ #content -->



	<!-- - - - - - - - END MAIN - - - - - - - -->


	<!-- - - - - - - - FOOTER - - - - - - - -->

	<footer id="footer">
          <?php include('footer.php') ?>
	</footer>
	<!--/ #footer-->

	<!-- - - - - - - - END FOOTER - - - - - - - -->

</div>
<!--/ #wrapper-->

<!-- - - - - - - - END WRAPPER - - - - - - - -->


</body>
</html>