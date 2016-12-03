<!---------------------------------------------------------->
<!-- Login Box
<!---------------------------------------------------------->
<?php if(empty($_SESSION['username'])) { ?>

<div class="widget widget_categories  slideUpRun">
  <h3 class="widget-title">تسجيل دخول</h3>
  <div class="row">
    <form method="post" role="form">
      <div class="form-group">
        <label >رقم بطاقة الاحوال / الاقامة </label>
        <input type="text" name="id_number" required class="form-control" id="id_number" pattern="(?!.*([0-9])\1{9})[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $_SESSION['id_number'] ?>" maxlength="10" oninvalid="setCustomValidity('يجب كتابة رقم جوال صحيح')">
      </div>
      <div class="form-group">
        <label> كلمة المرور </label>
        <input name="password" type="password" required class="form-control" id="password" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('يجب كتابة كلمة مرور')">
      </div>
      <div class="form-group">
        <input name="login" type="submit" id="login" class="btn btn-primary btn-lg btn-block" value="ارسال">
      </div>
    </form>
  </div>
</div>
<?php } ?>

<!----------------------------------------------------------> 
<!-- My Account Box
<!---------------------------------------------------------->
<?php if(!empty($_SESSION['username'])) { ?>
<div class="widget widget_categories  slideUpRun">
  <h3 class="widget-title">خيارات التحكم</h3>
  <ul>
    <li>
      <h4 style="color:#B4292D">مرحباً: <?php echo $firstNameUser." ".$familyNameUser ?></h4>
    </li>
    <li class="cat-item "><a href="course.php">الدورات المتاحة</a></li>
    <li class="cat-item "><a href="my_reservation.php">حجوزاتي</a></li>
    <li class="cat-item "><a href="my_archive.php">ارشيفي</a></li>
    <li class="cat-item "><a href="ticket.php">الدعم الفني</a></li>
    <li class="cat-item "><a href="my_profile.php">تعديل بياناتي</a></li>
    <!--<li><a href="my_login_data.php">بيانات الدخول</a></li>-->
    <li class="cat-item "><a href="logout.php?logout">خروج</a></li>
  </ul>
</div>
<?php  } ?>

<!----------------------------------------------------------> 
<!-- Site Frind Box
<!---------------------------------------------------------->

<div class="widget widget_categories  slideUpRun">
  <h3 class="widget-title">مواقع صديقة</h3>
  <ul>
    <?php
     $rows_site_frind = $pdo->pdoGetAll("SELECT * FROM `site_frind` ORDER BY `id` DESC");
     foreach($rows_site_frind as $result_site_frind) { ?>
    <li class="cat-item "> <a href="<?php echo  $result_site_frind['url'] ?>"><?php echo $result_site_frind['title'] ?></a> </li>
    <?php } ?>
  </ul>
</div>

<!----------------------------------------------------------> 

<!----------------------------------------------------------> 
<!-- Banner Box
<!---------------------------------------------------------->

<div class="widget widget_upcoming_events">
  <h3 class="widget-title">بنرات اعلانية</h3>
  <ul>
    <?php
    $rows_banner = $pdo->pdoGetAll("SELECT * FROM `banner` WHERE `status` = 1");
     foreach($rows_banner as $result_banner) {  ?>
    <li class="has-thumb">
      <div class="event-container">
        <div class="event-media">
          <div class="item-overlay"> <img src="data/images/<?php echo $result_banner['images']?>" alt=""> </div>
          <div class="event-content with-excerpt">
            <h4 class="event-title"> <a href="<?php  echo $result_banner['link'] ?>"><?php echo $result_banner['title'] ?></a> </h4>
          </div>
        </div>
      </div>
    </li>
    <?php } ?>
  </ul>
</div>

<!----------------------------------------------------------> 

