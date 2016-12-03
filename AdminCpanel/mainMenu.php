<link href="http://fonts.googleapis.com/css?family=Droid+Arabic+Kufi" rel="stylesheet" type="text/css">
<style>
body, h1, h2, h3, h4, h5 { font-family: 'Droid Arabic Kufi', serif !important; }

</style>
<div class="leftpanel">
    
    <div class="logopanel">
        <h1><span>[</span> Control Panel <span>]</span></h1>
    </div><!-- logopanel -->
        
    <div class="leftpanelinner">    
        
        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">   
            <div class="media userlogged">
                <div class="media-body">
                    <h4><?= $FullNameUser ?></h4>
                </div>
            </div>
          
            <h5 class="sidebartitle actitle">حسابي</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="users.php?do=edit&id=<?= $idUser ?>"><i class="fa fa-cog"></i> <span>الملف الشخصي</span></a></li>
              <li><a href="settings.php"><i class="fa fa-question-circle"></i> <span>الإعددات</span></a></li>
              <li><a href="?logout"><i class="fa fa-sign-out"></i> <span>تسجيل خروج</span></a></li>
            </ul>
        </div>
      
      <h5 class="sidebartitle">القائمة الرئيسية</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li <?= $this_url_page == 'index.php' ? "class='active'" : "" ?>><a href="index.php"><i class="fa fa-home"></i> <span>الرئيسية</span></a></li>
        <li <?= $this_url_page == 'settings.php' ? "class='active'" : "" ?>><a href="settings.php"><i class="fa fa-cog"></i> <span>الاعددات</span></a></li>
        
        
        <li class="nav-parent"><a href=""><i class="fa fa-check-square-o"></i> <span>البرامج</span></a>
          <ul class="children">
            <li><a href="programs.php?do=show"><i class="fa fa-caret-left"></i>البرامج</a></li>
            <li><a href="programs.php?do=archive"><i class="fa fa-caret-left"></i>أرشيف البرامج</a></li>
          </ul>
        </li>
        
                <li class="nav-parent"><a href=""><i class="fa fa-check-square-o"></i> <span>الدورات</span></a>
          <ul class="children">
            <li><a href="course.php?do=show"><i class="fa fa-caret-left"></i>الدورات</a></li>
            <li><a href="course.php?do=archive"><i class="fa fa-caret-left"></i>أرشيف الدورات</a></li>
          </ul>
        </li>
        

        <li <?= $this_url_page == 'news.php' ? "class='active'" : "" ?>><a href="news.php?do=show"><i class="fa fa-folder-open"></i> <span>الأخبار</span></a></li>
        

        <li class="nav-parent"><a href=""><i class="fa fa-check-square-o"></i> <span>الحجوزرات</span></a>
          <ul class="children">
            <li><a href="reservation.php?do=show"><i class="fa fa-caret-left"></i> الطلبات المقدمة</a></li>
            <li><a href="reservation.php?do=confirmed"><i class="fa fa-caret-left"></i> الطلبات المؤكدة</a></li>
            <li><a href="reservation.php?do=canceled"><i class="fa fa-caret-left"></i> الطلبات الملغية</a></li>
          </ul>
        </li>
        
        <li <?= $this_url_page == 'support.php' ? "class='active'" : "" ?>><a href="support.php?do=support">
        
        <i class="fa fa-users"></i> <span>الدعم الفني</span>
        <span class="pull-left badge badge-success">
        <?
		$sql_support = "SELECT * FROM `ticket` WHERE `status` = 1";
		$execute_sql_support = $pdo->pdoExecute($sql_support);
		echo $pdo->pdoRowCount($execute_sql_support);

		?>
        </span>
        </a></li>
                
        <li class="nav-parent"><a href=""><i class="fa fa-check-square-o"></i> <span>الباركود</span></a>
          <ul class="children">
            <li><a href="barcode.php?do=generate"><i class="fa fa-caret-left"></i>سحب الباركود</a></li>
            <li><a href="barcode.php?do=course"><i class="fa fa-caret-left"></i>تقرير حضور الدورات</a></li>
            <li><a href="barcode.php?do=registr_attend"><i class="fa fa-caret-left"></i>تحضير يدوي</a></li>
          </ul>
        </li>
        
        
        
        <li <?= $this_url_page == 'pages.php' ? "class='active'" : "" ?>><a href="pages.php?do=show"><i class="fa fa-print"></i> <span>الصفحات</span></a></li>
        <li <?= $this_url_page == 'mosque.php' ? "class='active'" : "" ?>><a href="mosque.php?do=show"><i class="fa fa-print"></i> <span>المساجد</span></a></li>
        <li <?= $this_url_page == 'center.php' ? "class='active'" : "" ?>><a href="center.php?do=show"><i class="fa fa-print"></i> <span>المراكز</span></a></li>
        <li <?= $this_url_page == 'questionnaire.php' ? "class='active'" : "" ?>><a href="questionnaire.php?do=show"><i class="fa fa-print"></i> <span>استبانة الدورات</span></a></li>

        <li <?= $this_url_page == 'neighborhood.php' ? "class='active'" : "" ?>><a href="neighborhood.php?do=show"><i class="fa fa-print"></i> <span>الأحياء</span></a></li>

        <li <?= $this_url_page == 'trainer.php' ? "class='active'" : "" ?>><a href="trainer.php?do=show"><i class="fa fa-home"></i> <span>المدربين</span>
        <span class="pull-left badge badge-success">
        <?
		$sql_support = "SELECT * FROM `trainer` WHERE `status` = 0";
		$execute_sql_support = $pdo->pdoExecute($sql_support);
		echo $pdo->pdoRowCount($execute_sql_support);

		?>
        </span>
        </a></li>
        <li <?= $this_url_page == 'banner.php' ? "class='active'" : "" ?>><a href="banner.php?do=show"><i class="fa fa-laptop"></i> <span>البنرات</span></a></li>
        <li <?= $this_url_page == 'archive.php' ? "class='active'" : "" ?>><a href="archive.php?do=show"><i class="fa fa-book"></i> <span>الارشيف</span></a></li>
        <li <?= $this_url_page == 'site_frind.php' ? "class='active'" : "" ?>><a href="site_frind.php?do=show"><i class="fa fa-chain"></i> <span>مواقع صديقة</span></a></li>
        <li <?= $this_url_page == 'slide.php' ? "class='active'" : "" ?>><a href="slide.php?do=show"><i class="fa fa-picture-o"></i> <span>السلايدات</span></a></li>
        <li <?= $this_url_page == 'reports.php' ? "class='active'" : "" ?>><a href="reports.php?do=show"><i class="fa fa-home"></i> <span>التقارير</span></a></li>
        <li <?= $this_url_page == 'group.php' ? "class='active'" : "" ?>><a href="group.php?do=show"><i class="fa fa-sitemap"></i> <span>المجموعات</span></a></li>
        <li <?= $this_url_page == 'users.php' ? "class='active'" : "" ?>><a href="users.php?do=show"><i class="fa fa-user"></i> <span>الاعضاء</span></a></li>
        <li <?= $this_url_page == 'manager.php' ? "class='active'" : "" ?>><a href="manager.php?do=show"><i class="fa fa-user"></i> <span>الإداريين</span></a></li>

        <li <?= $this_url_page == 'certificate.php' ? "class='active'" : "" ?>><a href="certificate.php?do=show"><i class="fa fa-user"></i> <span>طباعة الشهادات</span></a></li>
        
        <li <?= $this_url_page == 'banned.php' ? "class='active'" : "" ?>><a href="banned.php?do=show"><i class="fa fa-user"></i> <span>حظر الاعضاء</span></a></li>

<!--<li class="nav-parent"><a href=""><i class="fa fa-check-square-o"></i> <span>نماذج الكترونية</span></a>
          	<ul class="children">
            <li><a href="Electronic_models.php?status=4"><i class="fa fa-caret-left"></i> 	
نموذج تقرير دورة تدريبية </a></li>
            <li><a href="Electronic_models.php?status=1"><i class="fa fa-caret-left"></i>نموذج صرف أتعاب مدرب</a></li>
            <li><a href="Electronic_models.php?status=2"><i class="fa fa-caret-left"></i>نموذج طلب إقامة دورات تدريبية</a></li>
            
            <li><a href="Electronic_models.php?status=3"><i class="fa fa-caret-left"></i>نموذج طلب إلحاقي لبرنامج تدريبي</a></li>
          </ul>
        </li>-->
  
  
        <li class="nav-parent"><a href=""><i class="fa fa-envelope"></i> <span>رسائل SMS</span></a>
          <ul class="children">
            <li><a href="sms.php?do=properties"><i class="fa fa-caret-left"></i> خصائص الرسائل</a></li>
            <li><a href="sms.php?do=variables"><i class="fa fa-caret-left"></i> متغيرات الرسائل</a></li>
            <li><a href="sms.php?do=group"><i class="fa fa-caret-left"></i> مراسلة مجموعة</a></li>
            <li><a href="sms.php?do=course"><i class="fa fa-caret-left"></i> مراسلة اعضاء دورة محددة</a></li>
            <li><a href="sms.php?do=gender"><i class="fa fa-caret-left"></i> مراسلة حسب الجنس</a></li>
            <li><a href="sms.php?do=send_choose"><i class="fa fa-caret-left"></i> الارسال لأرقام محددة</a></li>
            <li><a href="sms.php?do=sendall"><i class="fa fa-caret-left"></i> الأرسال الى جميع المسجلين</a></li>
          </ul>
        </li>
        
        
        
          
       </ul>
    </div><!-- leftpanelinner -->
  </div>
  