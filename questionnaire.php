<?php
	include('header.php');
/*		for($i=1; $i<=16; $i++){
			$f = 'w'.$i.'';
			$insert	= $pdo->pdoExecute("ALTER TABLE `questionnaire` ADD `".$f."` VARCHAR(20) NOT NULL");
		}


*/	

	$sql_is_insert = "SELECT * FROM `questionnaire` WHERE `course_id` = ".$_GET['course']." AND `user_id` = ".$_GET['user_id']."";
	$execsql_is_insert = $pdo->pdoExecute($sql_is_insert);
	if($pdo->pdoRowCount($execsql_is_insert) == 1) {
		$table_show = 'yes';
		$reslut = $pdo->pdoGetRow($sql_is_insert);
	}

	if(isset($_POST['btnsend'])) {
		$data['user_id']			= $_SESSION['user_id'];
		$data['course_id']			= $_GET['course'];
		
		for($i=1; $i<=20; $i++){
			$data['q'.$i.'']		= trim($_POST['q'.$i.'']);
		}
		for($iw=1; $iw<=16; $iw++){
			$data['w'.$iw.'']		= trim($_POST['w'.$iw.'']);
		}
		$insert						= $pdo->pdoInsUpd('questionnaire', $data);
		header('Location: ?course='.$_GET['course'].'&process=successfully');
    }

	/*if(isset($_GET['course'])&&isset($_GET['user_id'])){ 
		$sql_course = "SELECT * FROM `course` WHERE `id` = ".$_GET['course']." and `user_id`=".$_GET['user_id']."";
		$reslut_course = $pdo->pdoGetRow($sql_course);
	}*/
	if(isset($_GET['course'])){ 
		$sql_course = "SELECT * FROM `course` WHERE `id` = ".$_GET['course']."";
		$reslut_course = $pdo->pdoGetRow($sql_course);
	}

	
?>
<style>
input[type="checkbox"], input[type="radio"] {
    opacity: 10;
}
input[type="text"] {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.table>tbody>tr.active>td, .table>tbody>tr.active>th, .table>tbody>tr>td.active, .table>tbody>tr>th.active, .table>tfoot>tr.active>td, .table>tfoot>tr.active>th, .table>tfoot>tr>td.active, .table>tfoot>tr>th.active, .table>thead>tr.active>td, .table>thead>tr.active>th, .table>thead>tr>td.active, .table>thead>tr>th.active { background-color:#D8D8D8; }
</style>
    <aside id="sidebar" class="medium-3 large-3 columns">
	<?php include('right-pages.php') ?>
    </aside>

    <div class="large-9 columns">

      <section class="section margin-top-off">

        <div class="page-title">
          <h1>استبيانة تقييم الدورة</h1>

          <div class="breadcrumbs">
            <a href="home.php" title="">الرئيسية</a>
            <a href="#" title="">استبيانة تقييم دورة <?= $reslut_course['title'] ?></a>
            
          
          </div>
        </div>

        <div class="information">
        <? if($table_show == 'yes') {
			if($_GET['process'] == 'successfully') {
				echo '<p class="success">تم ارسال تقييمك بنجاح, شكرأ لك</p>';
			}
        echo '<p class="notice">قمت بتقييم هذه الدورة</p>';
		?>
        <br>
          <table class="table table-striped table-bordered">
  <tr>
    <td colspan="2" rowspan="4">
    
      أخي المتدرب/ <?php echo $firstNameUser." ".$familyNameUser ?><br><br>
      نحن مهتمون بتقييمك لتوفير التدريب الذي يلبي احتياجك،<br><br> فنأمل منك مشكوراً تعبئة النموذج بكل شفافية.</td>
    <td colspan="2">اسم البرنامج</td>
    <td colspan="6"><?= $reslut_course['title'] ?></td>
  </tr>
  <tr>
    <td colspan="2">المدرب </td>
    <td colspan="6"><?= $reslut_course['trainer'] ?></td>
  </tr>
  <tr>
    <td colspan="2">الموعد </td>
    <td colspan="6"><?= $reslut_course['date_h'] ?></td>
  </tr>
  <tr>
    <td colspan="2">مكان البرنامج </td>
    <td colspan="6"><?= $reslut_course['location'] ?></td>
  </tr>
  <tr class="active">
    <th colspan="2">أولاً : تقييم المدرب</th>
    <th>ممتاز</th>
    <th>جيد</th>
    <th colspan="2">مقبول</th>
    <th colspan="4">(سبب اختيار مقبول)</th>
  </tr>
  <tr>
    <td>1</td>
    <td>إلمام    المدرب بموضوعات البرنامج</td>
    <td><input type="radio" name="q1" id="radio" value="ممتاز" <?= $reslut['q1'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q1" id="radio2" value="جيد" <?= $reslut['q1'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q1" id="radio3" value="مقبول" <?= $reslut['q1'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input name="w1" type="text" id="w1" value="<?= $reslut['w1'] ?>"></td>
  </tr>
  <tr>
    <td>2</td>
    <td>وضوح المادة العلمية المعروضة (الرسومات – الخط)</td>
    <td><input type="radio" name="q2" id="radio" value="ممتاز" <?= $reslut['q2'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q2" id="radio2" value="جيد" <?= $reslut['q2'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q2" id="radio3" value="مقبول" <?= $reslut['q2'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input name="w2" type="text" id="w2" value="<?= $reslut['w2'] ?>"></td>
    </tr>
  <tr>
    <td>3</td>
    <td>قدرة المدرب على إدارة المداخلات والمناقشات</td>
    <td><input type="radio" name="q3" id="radio" value="ممتاز" <?= $reslut['q3'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q3" id="radio2" value="جيد" <?= $reslut['q3'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q3" id="radio3" value="مقبول" <?= $reslut['q3'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w3" id="w3" value="<?= $reslut['w3'] ?>"></td>
    </tr>
  <tr>
    <td>4</td>
    <td>قدرة المدرب على تحفيز المشاركين على التفاعل</td>
    <td><input type="radio" name="q4" id="radio" value="ممتاز" <?= $reslut['q4'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q4" id="radio2" value="جيد" <?= $reslut['q4'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q4" id="radio3" value="مقبول" <?= $reslut['q4'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w4" id="w4" value="<?= $reslut['w4'] ?>"></td>
    </tr>
  <tr>
    <td>5</td>
    <td>مدى تعاونه مع المتدربين</td>
    <td><input type="radio" name="q5" id="radio" value="ممتاز" <?= $reslut['q5'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q5" id="radio2" value="جيد" <?= $reslut['q5'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q5" id="radio3" value="مقبول" <?= $reslut['q5'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w5" id="w5" value="<?= $reslut['w5'] ?>"></td>
    </tr>
  <tr class="active">
    <th colspan="2">ثانيًا : تقييم البرنامج التدريبي </th>
    <th>ممتاز</th>
    <th>جيد</th>
    <th colspan="2">مقبول</th>
    <th colspan="4">(سبب اختيار مقبول)</th>
  </tr>
  <tr>
    <td>1</td>
    <td>شمولية    مفردات الدورة للموضوع</td>
    <td><input type="radio" name="q6" id="radio" value="ممتاز" <?= $reslut['q6'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q6" id="radio2" value="جيد" <?= $reslut['q6'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q6" id="radio3" value="مقبول" <?= $reslut['q6'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w6" id="w6" value="<?= $reslut['w6'] ?>"></td>
    </tr>
  <tr>
    <td>2</td>
    <td>حسن    الإخراج الفني للحقيبة التدريبية</td>
    <td><input type="radio" name="q7" id="radio" value="ممتاز" <?= $reslut['q7'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q7" id="radio2" value="جيد" <?= $reslut['q7'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q7" id="radio3" value="مقبول" <?= $reslut['q7'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w7" id="w7" value="<?= $reslut['w7'] ?>"></td>
    </tr>
  <tr>
    <td>3</td>
    <td>كفاية مدة البرنامج (<?= $reslut_course['day_count'] ?>)</td>
    <td><input type="radio" name="q8" id="radio" value="ممتاز" <?= $reslut['q8'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q8" id="radio2" value="جيد" <?= $reslut['q8'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q8" id="radio3" value="مقبول" <?= $reslut['q8'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w8" id="w8" value="<?= $reslut['w8'] ?>"></td>
    </tr>
  <tr>
    <td>4</td>
    <td>مكان    انعقاد البرنامج </td>
    <td><input type="radio" name="q9" id="radio" value="ممتاز" <?= $reslut['q9'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q9" id="radio2" value="جيد" <?= $reslut['q9'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q9" id="radio3" value="مقبول" <?= $reslut['q9'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w9" id="w9" value="<?= $reslut['w9'] ?>"></td>
    </tr>
  <tr>
    <td>5</td>
    <td>توقيت    تنفيذ البرنامج  <?= $reslut_course['time'] ?></td>
    <td><input type="radio" name="q10" id="radio" value="ممتاز" <?= $reslut['q10'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q10" id="radio2" value="جيد" <?= $reslut['q10'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q10" id="radio3" value="مقبول" <?= $reslut['q10'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w10" id="w10" value="<?= $reslut['w10'] ?>"></td>
    </tr>
  <tr>
    <td>6</td>
    <td>مناسبة    موضوع الدورة للحضور</td>
    <td><input type="radio" name="q11" id="radio" value="ممتاز" <?= $reslut['q11'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q11" id="radio2" value="جيد" <?= $reslut['q11'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q11" id="radio3" value="مقبول" <?= $reslut['q11'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w11" id="w11" value="<?= $reslut['w11'] ?>"></td>
    </tr>
  <tr class="active">
    <th colspan="2">ثالثًا : خدمة المتدربين </th>
    <th>ممتاز</th>
    <th>جيد</th>
    <th colspan="2">مقبول</th>
    <th colspan="4">(سبب اختيار مقبول)</th>
  </tr>
  <tr>
    <td>1</td>
    <td>المتابعة    والقدرة على تقديم المعلومات هاتفيا</td>
    <td><input type="radio" name="q12" id="radio" value="ممتاز" <?= $reslut['q12'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q12" id="radio2" value="جيد" <?= $reslut['q12'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q12" id="radio3" value="مقبول" <?= $reslut['q12'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w12" id="w12" value="<?= $reslut['w12'] ?>"></td>
    </tr>
  <tr>
    <td>2</td>
    <td>جودة    الضيافة </td>
    <td><input type="radio" name="q13" id="radio" value="ممتاز" <?= $reslut['q13'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q13" id="radio2" value="جيد" <?= $reslut['q13'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q13" id="radio3" value="مقبول" <?= $reslut['q13'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w13" id="w13" value="<?= $reslut['w13'] ?>"></td>
    </tr>
  <tr>
    <td>3</td>
    <td>حسن    الاستقبال والتسجيل</td>
    <td><input type="radio" name="q14" id="radio" value="ممتاز" <?= $reslut['q14'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q14" id="radio2" value="جيد" <?= $reslut['q14'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q14" id="radio3" value="مقبول" <?= $reslut['q14'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w14" id="w14" value="<?= $reslut['w14'] ?>"></td>
    </tr>
  <tr class="active">
    <th colspan="2">رابعاً :  البيئة التدريبية والخدمات المساندة  </th>
    <th>ممتاز</th>
    <th>جيد</th>
    <th colspan="2">مقبول</th>
    <th colspan="4">(سبب اختيار مقبول)</th>
  </tr>
  <tr>
    <td>1</td>
    <td>تكامل    تجهيزات القاعة وسلامتها</td>
    <td><input type="radio" name="q15" id="radio" value="ممتاز" <?= $reslut['q15'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q15" id="radio2" value="جيد" <?= $reslut['q15'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q15" id="radio3" value="مقبول" <?= $reslut['q15'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w15" id="w15" value="<?= $reslut['w15'] ?>"></td>
    </tr>
  <tr>
    <td>2</td>
    <td>وضوح    رسالة  إعلان الدورة  </td>
    <td><input type="radio" name="q16" id="radio" value="ممتاز" <?= $reslut['q16'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q16" id="radio2" value="جيد" <?= $reslut['q16'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q16" id="radio3" value="مقبول" <?= $reslut['q16'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w16" id="w16" value="<?= $reslut['w16'] ?>"></td>
    </tr>
  <tr>
    <td colspan="10">خامساً: أسئلة عامة </td>
  </tr>
  <tr>
    <td>1</td>
    <td colspan="4">هل وضعت أهداف للبرنامج</td>
    <td colspan="2">نعم </td>
    <td><input type="radio" name="q17" id="radio4" value="نعم" <?= $reslut['q17'] == 'نعم' ? "checked='checked'" : '' ?>></td>
    <td>لا</td>
    <td><input type="radio" name="q17" id="radio5" value="لا" <?= $reslut['q17'] == 'لا' ? "checked='checked'" : '' ?>></td>
  </tr>
  <tr>
    <td>2</td>
    <td colspan="4">هل تحققت أهدافك ؟</td>
    <td colspan="2">نعم </td>
    <td><input type="radio" name="q18" id="radio7" value="نعم" <?= $reslut['q18'] == 'نعم' ? "checked='checked'" : '' ?>></td>
    <td>لا</td>
    <td><input type="radio" name="q18" id="radio6" value="لا" <?= $reslut['q18'] == 'لا' ? "checked='checked'" : '' ?>></td>
  </tr>
  <tr>
    <td>3</td>
    <td colspan="4">هل تعتقد أن البرنامج سيساعدك في تطوير    مهاراتك مستقبلاً؟</td>
    <td colspan="2">نعم </td>
    <td><input type="radio" name="q19" id="radio8" value="نعم" <?= $reslut['q19'] == 'نعم' ? "checked='checked'" : '' ?>></td>
    <td>لا</td>
    <td><input type="radio" name="q19" id="radio9" value="لا" <?= $reslut['q19'] == 'لا' ? "checked='checked'" : '' ?>></td>
  </tr>
  <tr>
    <td>4</td>
    <td colspan="4">ما هو تقييمك العام عن الدورة </td>
    <td colspan="2">ممتاز </td>
    <td><input type="radio" name="q20" id="radio11" value="ممتاز" <?= $reslut['q20'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td>مقبول</td>
    <td><input type="radio" name="q20" id="radio10" value="مقبول" <?= $reslut['q20'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
  </tr>
</table>
<? } else { ?>
<form method="post">
          <table class="table table-striped table-bordered">
  <tr>
    <td colspan="2" rowspan="4">
    
      أخي المتدرب/ <?php echo $firstNameUser." ".$familyNameUser ?><br><br>
      نحن مهتمون بتقييمك لتوفير التدريب الذي يلبي احتياجك،<br><br> فنأمل منك مشكوراً تعبئة النموذج بكل شفافية.</td>
    <td colspan="2">اسم البرنامج</td>
    <td colspan="6"><?= $reslut_course['title'] ?></td>
  </tr>
  <tr>
    <td colspan="2">المدرب </td>
    <td colspan="6"><?= $reslut_course['trainer'] ?></td>
  </tr>
  <tr>
    <td colspan="2">الموعد </td>
    <td colspan="6"><?= $reslut_course['date_h'] ?></td>
  </tr>
  <tr>
    <td colspan="2">مكان البرنامج </td>
    <td colspan="6"><?= $reslut_course['location'] ?></td>
  </tr>
  <tr class="active">
    <th colspan="2">أولاً : تقييم المدرب</th>
    <th>ممتاز</th>
    <th>جيد</th>
    <th colspan="2">مقبول</th>
    <th colspan="4">(سبب اختيار مقبول)</th>
  </tr>
  <tr>
    <td>1</td>
    <td>إلمام    المدرب بموضوعات البرنامج</td>
    <td><input type="radio" name="q1" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q1" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q1" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w1" id="w1"></td>
  </tr>
  <tr>
    <td>2</td>
    <td>وضوح المادة العلمية المعروضة (الرسومات – الخط)</td>
    <td><input type="radio" name="q2" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q2" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q2" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w2" id="w2"></td>
    </tr>
  <tr>
    <td>3</td>
    <td>قدرة المدرب على إدارة المداخلات والمناقشات</td>
    <td><input type="radio" name="q3" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q3" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q3" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w3" id="w3"></td>
    </tr>
  <tr>
    <td>4</td>
    <td>قدرة المدرب على تحفيز المشاركين على التفاعل</td>
    <td><input type="radio" name="q4" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q4" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q4" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w4" id="w4"></td>
    </tr>
  <tr>
    <td>5</td>
    <td>مدى تعاونه مع المتدربين</td>
    <td><input type="radio" name="q5" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q5" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q5" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w5" id="w5"></td>
    </tr>
  <tr class="active">
    <th colspan="2">ثانيًا : تقييم البرنامج التدريبي </th>
    <th>ممتاز</th>
    <th>جيد</th>
    <th colspan="2">مقبول</th>
    <th colspan="4">(سبب اختيار مقبول)</th>
  </tr>
  <tr>
    <td>1</td>
    <td>شمولية    مفردات الدورة للموضوع</td>
    <td><input type="radio" name="q6" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q6" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q6" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w6" id="w6"></td>
    </tr>
  <tr>
    <td>2</td>
    <td>حسن    الإخراج الفني للحقيبة التدريبية</td>
    <td><input type="radio" name="q7" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q7" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q7" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w7" id="w7"></td>
    </tr>
  <tr>
    <td>3</td>
    <td>كفاية مدة    البرنامج (<?= $reslut_course['day_count'] ?>)</td>
    <td><input type="radio" name="q8" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q8" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q8" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w8" id="w8"></td>
    </tr>
  <tr>
    <td>4</td>
    <td>مكان    انعقاد البرنامج </td>
    <td><input type="radio" name="q9" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q9" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q9" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w9" id="w9"></td>
    </tr>
  <tr>
    <td>5</td>
    <td>توقيت    تنفيذ البرنامج  <?= $reslut_course['time'] ?></td>
    <td><input type="radio" name="q10" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q10" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q10" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w10" id="w10"></td>
    </tr>
  <tr>
    <td>6</td>
    <td>مناسبة    موضوع الدورة للحضور</td>
    <td><input type="radio" name="q11" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q11" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q11" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w11" id="w11"></td>
    </tr>
  <tr class="active">
    <th colspan="2">ثالثًا : خدمة المتدربين </th>
    <th>ممتاز</th>
    <th>جيد</th>
    <th colspan="2">مقبول</th>
    <th colspan="4">(سبب اختيار مقبول)</th>
  </tr>
  <tr>
    <td>1</td>
    <td>المتابعة    والقدرة على تقديم المعلومات هاتفيا</td>
    <td><input type="radio" name="q12" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q12" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q12" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w12" id="w12"></td>
    </tr>
  <tr>
    <td>2</td>
    <td>جودة    الضيافة </td>
    <td><input type="radio" name="q13" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q13" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q13" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w13" id="w13"></td>
    </tr>
  <tr>
    <td>3</td>
    <td>حسن    الاستقبال والتسجيل</td>
    <td><input type="radio" name="q14" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q14" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q14" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w14" id="w14"></td>
    </tr>
  <tr class="active">
    <th colspan="2">رابعاً :  البيئة التدريبية والخدمات المساندة  </th>
    <th>ممتاز</th>
    <th>جيد</th>
    <th colspan="2">مقبول</th>
    <th colspan="4">(سبب اختيار مقبول)</th>
  </tr>
  <tr>
    <td>1</td>
    <td>تكامل    تجهيزات القاعة وسلامتها</td>
    <td><input type="radio" name="q15" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q15" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q15" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w15" id="w15"></td>
    </tr>
  <tr>
    <td>2</td>
    <td>وضوح    رسالة  إعلان الدورة  </td>
    <td><input type="radio" name="q16" id="radio" value="ممتاز"></td>
    <td><input type="radio" name="q16" id="radio2" value="جيد"></td>
    <td colspan="2"><input type="radio" name="q16" id="radio3" value="مقبول"></td>
    <td colspan="4"><input type="text" name="w16" id="w16"></td>
    </tr>
  <tr>
    <td colspan="10">خامساً: أسئلة عامة </td>
  </tr>
  <tr>
    <td>1</td>
    <td colspan="4">هل وضعت أهداف للبرنامج</td>
    <td colspan="2">نعم </td>
    <td><input type="radio" name="q17" id="radio4" value="نعم"></td>
    <td>لا</td>
    <td><input type="radio" name="q17" id="radio5" value="لا"></td>
  </tr>
  <tr>
    <td>2</td>
    <td colspan="4">هل تحققت أهدافك ؟</td>
    <td colspan="2">نعم </td>
    <td><input type="radio" name="q18" id="radio7" value="نعم"></td>
    <td>لا</td>
    <td><input type="radio" name="q18" id="radio6" value="لا"></td>
  </tr>
  <tr>
    <td>3</td>
    <td colspan="4">هل تعتقد أن البرنامج سيساعدك في تطوير    مهاراتك مستقبلاً؟</td>
    <td colspan="2">نعم </td>
    <td><input type="radio" name="q19" id="radio8" value="نعم"></td>
    <td>لا</td>
    <td><input type="radio" name="q19" id="radio9" value="لا"></td>
  </tr>
  <tr>
    <td>4</td>
    <td colspan="4">ما هو تقييمك العام عن الدورة </td>
    <td colspan="2">ممتاز </td>
    <td><input type="radio" name="q20" id="radio11" value="ممتاز"></td>
    <td>مقبول</td>
    <td><input type="radio" name="q20" id="radio10" value="مقبول"></td>
  </tr>
</table>
<input name="btnsend" type="submit" class="btn btn-primary" id="btnsend" value="ارسال">
</form>
<? } ?>

        </div>

      


     
      </section>
      <!--/ .section-->

    </div>
    <!--/ #main-->

    <!--/ #sidebar-->


<?php include('footer.php') ?>
