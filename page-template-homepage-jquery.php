<?php
    require ("include/dbWrapperClass.php");
    require ("include/config.php");
    require ("include/newFunction.php");


?>
<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
   <head>
      <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	  <title><?php echo $settingsSiteName ?></title>
      <link rel="stylesheet" type="text/css" href="css/_style.css" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/primary-green.css" />
      <script  type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
      <!--[if lt IE 9]>
      <link rel="stylesheet" href="css/IE.css" />
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <!--[if lte IE 8]>
      <script type="text/javascript" src="js/IE.js"></script>
      <![endif]-->
   </head>
   <body>
      <!-- START Top-Toolbar -->
      <aside class="top-aside clearfix">
         <div class="container">
            <div class="col-md-6">
               <div class="sidebar-widget">
                  <ul class="custom-menu">
                     <li class="current-menu-item"><a href="page-template-homepage-jquery.html">Home</a></li>
                     <li><a href="page-template-team-members.html">Team</a></li>
                     <li><a href="page-template-sitemap.html">Sitemap</a></li>
                     <li><a href="content-color-autumn.html">Colors</a></li>
                     <li><a href="page-template-shortcodelist.html">Shortcodes</a></li>
                     <li><a href="page-template-homepage-lightbox-hero.html">Pages</a></li>
                  </ul>
               </div>
            </div>
            <!-- END top-toolbar-left -->
            <div class="col-md-6">
               <div class="sidebar-widget">
                  <ul class="social_icons">
                     <li><a href="http://themes.truethemes.net/Sterling/feed" class="rss">RSS</a></li>
                     <li><a href="http://www.twitter.com/truethemes" class="twitter">Twitter</a></li>
                     <li><a href="http://www.facebook.com/truethemes" class="facebook">Facebook</a></li>
                     <li><a href="mailto:themes@truethemes.net" class="email">Email</a></li>
                  </ul>
               </div>
            </div>
            <!-- END top-toolbar-right -->
         </div>
         <!-- END center-wrap -->
         <div class="top-aside-shadow"></div>
      </aside>
      <!-- END Top-Toolbar -->
      
      
      
      
      <!-- START Header -->
      <header>
         <div class="container">
            <div class="col-md-3">
               <a href="#"><img src="images/logo.png" class="img-responsive" alt=""/></a>
            </div>
            <!-- END companyIdentity -->
            <!-- START Main Navigation -->
             <div class="col-md-9">
            <nav>
            <ul>
			<li><a href="index.php">الرئيسية</a></li>
			<li><a href="page.php?id=2">من نحن</a></li>
			<li><a href="course.php">الدورات</a></li>
			<li><a href="trainer.php">تسجيل مدرب</a></li>
			<li><a href="register.php">تسجيل متدرب</a></li>
			<li><a href="page.php?id=3">اتصل بنا</a></li>
		</ul>
            </nav>
            </div>
            <!-- END Main Navigation -->
         </div>
         <!-- END center-wrap -->
      </header>
      <!-- END Header -->
      
      
      
      
      <!-- START Banner Area -->
      <section class="banner-slider">
         <div class="center-wrap">
            <div id="slides">
               <div class="slides_container">
                  
                  
                  <div class="clearfix home-slider-post">
                     <div class="one_half">
                        <h2>Easily Embed Video!</h2>
                        <p>Adding custom video is an absolute breeze! Sterling is a fully HTML5 Responsive Website Template perfect for everyone in need of a professional online presence. It was designed and built by an award-winning Creative Team and it&#8217;s backed by the industry&#8217;s most all-inclusive customer support.</p>
                        <p><a href="#" class="small green button" target="_self"> Call to Action Button &rarr;</a></p>
                     </div>
                     <div class="one_half">
                        <div class="single-post-thumb">
                           <iframe src="http://player.vimeo.com/video/30299004" width="445" height="250"></iframe>  	
                        </div>
                     </div>
                  </div>
                  <!-- END slider post -->
                  
                  
                  <div class="clearfix home-slider-post">
                     <p><img class="aligncenter size-full wp-image-1059" title="Image - Web Display" src="content-images/web-display.png" alt="Premium WordPress Theme - CMS - TrueThemes" width="960" height="434" /></p>
                  </div>
                  <!-- END slider post -->
                  
                  
                  <div class="clearfix home-slider-post" id="slider-post-877">
                     <div class="one_half">
                        <div class="img-frame full-half"><img src="content-images/celebrating-success-445x273.png" alt="HTML5 Responsive Website Template" width="445" height="273" /></div>
                     </div>
                     <div class="one_half">
                        <h2>Built by Professionals, for Professionals</h2>
                        <p>Experience is the best teacher, and we've got loads of it. We're an award-winning creative team with over 5 years of real-world website building experience. You won't find needless functions "just because they're cool". We've built this theme using our real-world experiences as the driving force behind every decision we've made.</p>
                        <p><a href="content-images/celebrating-success.jpg" class="small green button" data-gal="prettyPhoto" title="Sterling - Premium Web Template"> This button opens a Lightbox &rarr; </a></p>
                     </div>
                  </div>
                  <!-- END slider post -->
                  
                  
                  
               </div>
               <!-- END slides_container -->
            </div>
            <!-- END slides -->
         </div>
         <!-- END center-wrap -->
         <div class="shadow top"></div>
         <div class="shadow bottom"></div>
         <div class="tt-overlay"></div>
      </section>
      <!-- END Banner Area -->
      
      
      
      
      <!-- START Content Container -->
      <section id="content-container" class="clearfix">
         <div class="container">
         <div class="col-sm-3">
                        
            <div class="sidebar right-sidebar">

<!---------------------------------------------------------->
<!-- Login Box
<!---------------------------------------------------------->
    <?php if(empty($_SESSION['username'])) { ?>
    	<div class="panel panel-default">
         	<div class="panel-heading">تسجيل دخول</div>
         	<div class="panel-body">
            <form method="post" role="form">
          <div class="form-group">
            <label for="exampleInputEmail1">رقم بطاقة الاحوال / الاقامة</label>
            <input name="id_number" required class="form-control" id="id_number" pattern="(?![9]{10})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_POST['id_number'] ?>" maxlength="10" oninvalid="setCustomValidity('رقم بطاقة الاحوال / الاقامة')">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">كلمة المرور</label>
		<input name="password" type="password" required class="form-control" id="password" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة كلمة مرور')">
          </div>
          
          
          <input name="login" type="submit" id="login" class="btn btn-default" value="ارسال">
            </form>
            </div>
        </div>
    <?php  } ?>

<!---------------------------------------------------------->
<!-- My Account Box
<!---------------------------------------------------------->
    <?php if(!empty($_SESSION['username'])) { ?>
    	<div class="panel panel-default">
         	<div class="panel-heading">خيارات التحكم</div>
         	<div class="panel-body">
            <div class="list-group-rightmenu">
            <h4 style="color:#B4292D">مرحباً: <?php echo $firstNameUser." ".$familyNameUser ?></h4>
            <ul>
              <li><a href="course.php">الدورات المتاحة</a></li>
              <li><a href="my_reservation.php">حجوزاتي</a></li>
              <li><a href="my_archive.php">ارشيفي</a></li>
              <li><a href="ticket.php">الدعم الفني</a></li>
              <li><a href="my_profile.php">تعديل بياناتي</a></li>
              <li><a href="my_login_data.php">بيانات الدخول</a></li>
              <li><a href="logout.php?logout">خروج</a></li>
            </ul>
            </div>
            </div>
        </div>
    <?php  } ?>

<!---------------------------------------------------------->
<!-- Date And Time Box
<!---------------------------------------------------------->
    	<div class="panel panel-default">
         	<div class="panel-heading">احصائيات</div>
         	<div class="panel-body">
            <p><span>الساعة الان : </span><?php echo date("h:i") ?></p>
            <p><span>تاريخ اليوم : </span><?php echo date("Y/m/d") ?></p>
            <p><span>عدد الزيارات : </span><?php echo $settingsVisit ?></p>
            
            </div>
        </div>


<!---------------------------------------------------------->
<!-- Banner Box
<!---------------------------------------------------------->
    	<div class="panel panel-default banner">
         	<div class="panel-heading">بنرات اعلانية</div>
         	<div class="panel-body">
            <?php
            $rows_banner = $pdo->pdoGetAll("SELECT * FROM `banner` WHERE `status` = 1");
            foreach($rows_banner as $result_banner) {
                echo '<a href="'.$result_banner['link'].'"><img src="data/images/'.$result_banner['images'].'" alt="'.$result_banner['title'].'"/></a>';
            }
            ?>
            </div>
        </div>


<!---------------------------------------------------------->
<!-- Site Frind Box
<!---------------------------------------------------------->
    	<div class="panel panel-default frind-site">
         	<div class="panel-heading">مواقع صديقة</div>
         	<div class="panel-body">
            <ul>
            <?php
            $rows_site_frind = $pdo->pdoGetAll("SELECT * FROM `site_frind` ORDER BY `id` DESC");
            foreach($rows_site_frind as $result_site_frind) {
                echo '<li><a href="'.$result_site_frind['url'].'">'.$result_site_frind['title'].'</a></li>';
            }
            ?>
            </ul>
            </div>
        </div>


    
    
  </div>
               
               
            </div>
         <div class="col-md-9"><div class="page_content">
               <h4>Page Heading</h4>
               <p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Etiam porta sem malesuada magna mollis euismod. Donec ullamcorper nulla non metus auctor fringilla. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas faucibus mollis interdum.</p>
               <p>Maecenas faucibus mollis interdum. Vestibulum id ligula porta felis euismod semper. Curabitur blandit tempus porttitor. Donec id elit non mi porta gravida at eget metus. Sed posuere consectetur est at lobortis.</p>
               <div class="hr hr-solid-double">&nbsp;</div>
               <div class="one_third">
                  <p class="tt-icon icon-calendar-day"> <strong>Responsive</strong><br />
                     Sed posuere consectetur est at lobortis. Nulla vitae elit libero a petra augue.
                  </p>
               </div>
               <div class="one_third">
                  <p class="tt-icon icon-shield-green"> <strong>WordPress</strong><br />
                     Sed posuere consectetur est at lobortis. Nulla vitae elit libero a petra augue.
                  </p>
               </div>
               <div class="one_third">
                  <p class="tt-icon icon-cart-add"> <strong>Theme</strong><br />
                     Sed posuere consectetur est at lobortis. Nulla vitae elit libero a petra augue.
                  </p>
               </div>
            </div></div>
            
            <!-- END of page_content-->
                        
            <!-- END sidebar-->	
         </div>
         <!-- END main-wrap -->
      </section>
      <!-- END Content Container -->
      
      
      
      
      <!-- START Footer Callout -->
      <div class="footer-callout clearfix">
         <div class="center-wrap tt-relative">
            <div class="footer-callout-content">
               <p class="callout-heading">Site-wide callout section</p>
               <p class="callout-text">Engage your customers and promote a rewarding call-to-action. Easily toggle this on or off.</p>
            </div>
            <!-- END footer-callout-content -->
            <div class="footer-callout-button">
               <a href="content-responsive-design.html" class="large green button">View Theme Features &rarr;</a>
            </div>
            <!-- END footer-callout-button -->
         </div>
         <!-- END center-wrap --> 
      </div>
      <!-- END Footer Callout -->
      
      
      
      
      <!-- START Footer -->
      <footer>
         <div class="center-wrap tt-relative">
            <div class="footer-content clearfix">
               <div class="footer-default-one">
                  <div class="sidebar-widget">
                     <div class="textwidget">
                        <p><img src="content-images/truethemes-premium-wordpress.png" alt="HTML5 Responsive Website Template" class="footer-logo" /><br />
                           This is a great place to input keyword-rich content that will help to boost your website's SEO. This footer can have up to 6 columns, each column a powerful widget region.
                        </p>
                     </div>
                     <!-- END textwidget -->
                  </div>
                  <!-- END sidebar-widget -->
               </div>
               <!-- END footer-default-one -->
               
               
               <div class="footer-default-two">
                  <div class="sidebar-widget">
                     <p class="foot-heading">Join our Mailing List</p>
                     <div id="mc_embed_signup">
                        <form action="http://truethemes.us2.list-manage.com/subscribe/post?u=e2deed44e98de9950b14e7fb3&amp;id=47d7d9240b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                           <label for="mce-EMAIL">Email Address:</label>
                           <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="" required />
                           <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" /></div>
                        </form>
                     </div>
                     <!-- END mc_embed_signup -->
                  </div>
                  <!-- END sidebar-widget -->
               </div>
               <!-- END footer-default-two -->
               
               
               <div class="footer-default-three">
                  <div class="sidebar-widget">
                     <p class="foot-heading">Connect with us</p>
                     <ul class="social_icons">
                        <li><a href="http://themes.truethemes.net/Sterling/feed" class="rss">RSS</a></li>
                        <li><a href="http://www.twitter.com/truethemes" class="twitter">Twitter</a></li>
                        <li><a href="http://www.facebook.com/truethemes" class="facebook">Facebook</a></li>
                     </ul>
                  </div>
                  <!-- END sidebar-widget -->
               </div>
               <!-- END footer-default-three -->
            </div>
            <!-- END footer-content -->
         </div>
         <!-- END center-wrap -->
         <div class="footer-copyright clearfix">
            <div class="center-wrap clearfix">
               <div class="foot-copy">
                  <p>Copyright &copy; 2012 Your Company Name. All rights reserved.</p>
               </div>
               <!-- END foot-copy -->
               <a href="#" id="scroll_to_top" class="link-top">Scroll to Top</a>
               <ul class="footer-nav">
                  <li><a href="page-template-homepage-lightbox-hero.html">Pages</a></li>
                  <li><a href="content-responsive-design.html">Features</a></li>
                  <li><a href="content-color-autumn.html">Colors</a></li>
                  <li><a href="page-template-shortcodelist.html">Shortcodes</a></li>
                  <li><a href="page-template-blog.html">Blog</a></li>
               </ul>
            </div>
            <!-- END center-wrap -->
         </div>
         <!-- END footer-copyright -->	
         <div class="shadow top"></div>
         <div class="tt-overlay"></div>
      </footer>
      
      <script type="text/javascript" src="js/custom-main.js"></script>
      <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
      <script type="text/javascript" src="js/slides.min.jquery.js"></script>
      <script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
      <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
      <script type="text/javascript">
         jQuery(document).ready(function(){
         	jQuery('#slides').slides({
         		  preload: false,
         		  //preloadImage: 'preloader url here',
         		  autoHeight: true,
         		  effect: 'slide',
         		  slideSpeed: 500,
         		  play: 0,
         		  randomize: false,
         		  hoverPause: false,
         	  });
         });
      </script>
   </body>
</html>