<?php
    require ("header.php");
	session_destroy();    


?>


    <div class="large-12 columns">

      <section class="section margin-top-off">

        <div class="page-title">
          <h1>خروج دخول</h1>

          <div class="breadcrumbs">
            <a href="home.php" title="">الرئيسية</a>
            <a href="logout.php" title="">خروج دخول</a>
          
          </div>
        </div>

<p class="error">جيل خروجك بنجاح, شكراً لزيارتك
<a href="#" class="alert-close">
  <meta http-equiv="refresh" content="3;URL=index.php">
</a><a class="alert-close" href="#"></a></p>



       
</section>
      <!--/ .section-->

    </div>


          <?php include('footer.php') ?>
