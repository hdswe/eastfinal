<?php include('header.php') ?>
    
    
    <div class="section padding-off columns medium-12 large-12 background-color-off">
			<div class="tmm_row" style="text-align:left; ">
				<div class="relative ">
					<div id="layerslider_1_1" class="ls-wp-container"
						 style="width:1140px;height:500px;max-width:1140px;margin:0 auto;margin-bottom: 0px;">

						<?php
						$rows_slide = $pdo->pdoGetAll("SELECT * FROM `slide` WHERE `status` = 1");
						foreach($rows_slide as $result_slide) {
						?>
						<div class="ls-slide" data-ls="transition2d:11;">
							<img src="data/images/<?= $result_slide['image'] ?>" class="ls-bg" alt="<?= $result_slide['title'] ?>"/>

							<h2 class="ls-l" style="top:190px;left:50%;font-size:48px;white-space: nowrap;"
								data-ls="offsetxin:0;durationin:600;delayin:500;easingin:easeInOutExpo;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:600;easingout:easeInOutExpo;scalexout:0;scaleyout:0;">
								<?= $result_slide['title'] ?></h2>

							<div class="ls-l"
								 style="top:260px;left:0px;width: 80%; left: 50%; @include transform(translateX(-50%));white-space: nowrap;"
								 data-ls="offsetxin:0;offsetyin:20;durationin:500;delayin:1000;easingin:linear;scalexin:0.7;scaleyin:0.7;offsetxout:0;durationout:600;easingout:easeInOutExpo;scalexout:0;scaleyout:0;">
								<p class="text-center">
									<?= $result_slide['details'] ?>
								</p>
							</div>
						</div>
                        <? } ?>
						
					</div>
				</div>
			</div>
		</div>
		<!--/ .section -->

		<div class="medium-12 large-12 columns">

			<ul class="block-with-icons">
				<li>
					<a href="news.php">
						<i class="icon-group"></i>
						<h5>أخبارنا</h5>
						<span>تعرف على جديد اخبار الجمعية</span>
					</a>
				</li>
				<li>
					<a href="register.php">
						<i class="icon-thumbs-up-4"></i>
						<h5>المتدربين</h5>
						<span>يوجد لدينا 2500 متدرب</span>
					</a>
				</li>
				<li>
					<a href="login.php">
						<i class="icon-calendar-inv"></i>
						<h5>شاهد برامجنا</h5>
						<span>لدينا 512 برنامج تدريبي</span>
					</a>
				</li>
			</ul>

		</div>



    <!--  statrt aside  -->
    <aside id="sidebar" class="medium-3 large-3 columns text-center">
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


    </aside>
    <!--  end aside  --> 
    
    <!--  programing  -->
    <section class="medium-9 large-9 columns">
      <div class="section padding-off columns medium-12 large-12 background-color-off">
        <div class="row">
          <div class="relative">
            <h2 class="section-title">قائمة البرامج</h2>
            <ul class="accordion">
              <div class="row post-list two-cols">
                <?php
 $rows = $pdo->pdoGetAll("SELECT * FROM `programs` WHERE published='yes' AND archive='no' ORDER BY `id` DESC");
  foreach($rows as $result) 
   {
		echo '<li class="medium-12 large-12 columns accordion-navigation right">';
       
			echo '<a class="acc-trigger" data-mode=""  href="?program='.$result['id'].'">'.$result['title'].'</a>';
			echo'<div class="content" style="display: none;">'.$result['details'].'<br><hr>';
			echo '<h3>الدورات داخل البرنامج</h3>';
			echo'<table class="table table-striped table-bordered">
			  <tr>
				<td>اسم الدورة</td>
				<td>اسم المدرب</td>
				<td>التاريخ</td>
				<td>الفئة</td>
				<td>التفاصيل</td>
			  </tr>';
				$sql_c = $pdo->pdoGetAll("SELECT * FROM `course` WHERE programs_id=".$result['id']." AND archive='no' ORDER BY `id` DESC");
				foreach($sql_c as $result_c) {
			  echo'<tr>
				<td>'.$result_c['title'].'</td>
				<td>'.$result_c['trainer'].'</td>
				<td>'.$result_c['date_h'].'</td>
				<td>';
                    $sql_groups = $pdo->pdoGetAll("SELECT * FROM `groups` ORDER BY `id` DESC");
                    foreach($sql_groups as $result_groups) {
                        $required_groupsr = explode(",", $result_c['groups_id']);
                    if(in_array($result_groups['id'], $required_groupsr)) { echo $result_groups['title'].", ";
					 }
					}
				echo'</td>
				<td>';
                        // check reservation //
                        $sqlIdRes = "SELECT * FROM `reservation` WHERE `course_id`=:id AND `user_id`=:user_id";
                        $dataIdRes[id] = $result_c['id'];
                        $dataIdRes[user_id] = $idUser;
                        $resultRes = $pdo->pdoGetRow($sqlIdRes, $dataIdRes);
                        $statusReservation = $resultRes['status'];
			if($result_c['status'] == 1){
                            if($statusReservation == 1 ) {
                            echo '<a href="course_details.php?id='.$result_c['id'].'">بانتظار المراجعة</a>';
                            } elseif($statusReservation == 2 ) {
                            echo '<a href="course_details.php?id='.$result_c['id'].'">حجزك مؤكد</a>';
                            } elseif($statusReservation == 3 ) {
                            echo '<a href="course_details.php?id='.$result_c['id'].'">حجزك ملغي</a>';
                            }else {
                                                    echo '<a href="course_details.php?id='.$result_c['id'].'">التفاصيل</a>';
                            }
                                                }elseif($result_c['status'] == 2){
                                                    echo 'التسجيل مغلق';
                                                }elseif($result_c['status'] == 3){
                                                    echo 'التسجيل مغلق'; }
				echo'</td>
			  </tr>';
				}
			echo'</table>';


			echo'</div>';
		echo '</li>';
	}
?>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!--  end programing  --> 
    
    <!--  start news  -->
    
    <section class="medium-9 large-9 columns">
      <div class="section padding-off columns medium-12 large-12 background-color-off">
        <div class="row">
          <div class="relative">
  <h2 class="section-title">الأخبار</h2>
  <div class="row post-list two-cols">
    <?php
		$sql = "SELECT * FROM `news` ORDER BY id DESC LIMIT 2 ";
 		$rows = $pdo->pdoGetAll($sql);
		foreach($rows as $result) {
		?>
    <article class="medium-6 large-6 columns">
      <div class="post border post-alternate-1 slideUp">
        <div class="entry-media"> <a href="news_details.php?id=<?php echo $result['id']?>" class="image-post item-overlay "> <img style="height:300px" src="data/images/<?php echo $result['image'] ?>" alt=""/> </a>
          <header class="entry-header">
            <h3 class="entry-title"><a href="news_details.php?id=<?php echo $result['id']?>"><?php echo $result['title'] ?></a></h3>
          </header>
        </div>
        <div class="entry-content">
          <p>
            <?php $txt = cutText($result['details'],250);
				       echo $txt; 
				       ?>
          </p>
        </div>
      </div>
      <!--/ .post-extra--> 
    </article>
    <?php } ?>
  </div>
  <div class="row post-list two-cols">
    <?php
		$sql = "SELECT * FROM `news` ORDER BY id DESC LIMIT 2,4 ";
 		$rows = $pdo->pdoGetAll($sql);
		foreach($rows as $result) {
		?>
    <article class="medium-6 large-6 columns">
      <div class="post border post-alternate-2 slideUpRun">
        <div class="entry-media"> <a href="news_details.php?id=<?php echo $result['id']?>"  class="image-post item-overlay "> <img style="height:80px ; width:105px"  src="data/images/<?php echo $result['image'] ?>" alt=""> </a> </div>
        <div class="entry-content">
          <header class="entry-header"> 
          
            <h4 class="entry-title"><a href="single-post.html">
              <?php echo $result['title'] ?>
              </a></h4>
          </header>
        </div>
      </div>
      <!--/ .post-extra--> 
      
    </article>
    <?php } ?>
  </div>
</div>

        </div>
      </div>
    </section>
    <!--  end news  -->
    
    <?php include('footer.php') ?>
