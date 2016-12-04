<?php
include('header.php');
/*		for($i=1; $i<=16; $i++){
			$f = 'w'.$i.'';
			$insert	= $pdo->pdoExecute("ALTER TABLE `questionnaire` ADD `".$f."` VARCHAR(20) NOT NULL");
		}


*/	

	$sql_is_insert = "SELECT * FROM `questionnaire` WHERE `course_id` = ".$_GET['course']."";
	$execsql_is_insert = $pdo->pdoExecute($sql_is_insert);
    $count= $pdo->pdoRowCount($execsql_is_insert);
	if($pdo->pdoRowCount($execsql_is_insert) > 0) {
		$table_show = 'yes';
		$reslut = $pdo->pdoGetAll($sql_is_insert);
      $reportq1=0;$reportq2=0;$reportq3=0;$reportq4=0;$reportq5=0;$reportq6=0;$reportq7=0;$reportq8=0;$reportq9=0;$reportq10=0;
      $reportq20=0;$reportq11=0;$reportq12=0;$reportq13=0;$reportq14=0;$reportq15=0;$reportq16=0;$reportq17=0;$reportq18=0;$reportq19=0;
  $reportqg1=0;$reportqg2=0;$reportqg3=0;$reportqg4=0;$reportqg5=0;$reportqg6=0;$reportqg7=0;$reportqg8=0;$reportqg9=0;$reportqg10=0;
      $reportqg20=0;$reportqg11=0;$reportqg12=0;$reportqg13=0;$reportqg14=0;$reportqg15=0;$reportqg16=0;$reportqg17=0;$reportqg18=0;$reportqg19=0;
  $reportqm1=0;$reportqm2=0;$reportqm3=0;$reportqm4=0;$reportqm5=0;$reportqm6=0;$reportqm7=0;$reportqm8=0;$reportqm9=0;$reportqm10=0;
      $reportqm20=0;$reportqm11=0;$reportqm12=0;$reportqm13=0;$reportqm14=0;$reportqm15=0;$reportqm16=0;$reportqm17=0;$reportqm18=0;$reportq19=0;
      foreach ($reslut as $row){
      if($row['q1']=='ممتاز'){
        $reportq1 +=1;
      }elseif ($row['q1']=='جيد'){
        $reportq1 +=1;
      }elseif ($row['q1']=='مقبول'){
        $report3 +=1;
      }
        if($row['q2']=='ممتاز'){
          $reportq2 +=1;

        }elseif ($row['q2']=='جيد'){
          $reportqg2 +=1;

        }elseif ($row['q2']=='مقبول'){
          $reportqm2 +=1;

        }
        if($row['q3']=='ممتاز'){
          $reportq3 +=1;

        }elseif ($row['q3']=='جيد'){
          $reportqg3 +=1;

        }elseif ($row['q3']=='مقبول'){
          $reportqm3 +=1;
        }
        if($row['q4']=='ممتاز'){
          $reportq4 +=1;

        }elseif ($row['q4']=='جيد'){
          $reportqg4 +=1;

        }elseif ($row['q4']=='مقبول'){
          $reportqm4 +=1;
        }
        if($row['q5']=='ممتاز'){
          $reportq5 +=1;

        }elseif ($row['q5']=='جيد'){
          $reportqg5 +=1;

        }elseif ($row['q5']=='مقبول'){
          $reportqm5 +=1;
        }
        if($row['q6']=='ممتاز'){
          $reportq6 +=1;

        }elseif ($row['q6']=='جيد'){
          $reportqg6 +=1;

        }elseif ($row['q6']=='مقبول'){
          $reportqm6 +=1;
        }
        if($row['q7']=='ممتاز'){
          $reportq7 +=1;

        }elseif ($row['q7']=='جيد'){
          $reportqg7 +=1;

        }elseif ($row['q7']=='مقبول'){
          $reportqm7 +=1;
        }
        if($row['q8']=='ممتاز'){
          $reportq8 +=1;

        }elseif ($row['q8']=='جيد'){
          $reportqg8 +=1;

        }elseif ($row['q8']=='مقبول'){
          $reportqm8 +=1;
        }
        if($row['q9']=='ممتاز'){
          $reportq9 +=1;

        }elseif ($row['q9']=='جيد'){
          $reportqg9 +=1;

        }elseif ($row['q9']=='مقبول'){
          $reportqm9 +=1;
        }
        if($row['q10']=='ممتاز'){
          $reportq10 +=1;

        }elseif ($row['q10']=='جيد'){
          $reportqg10 +=1;

        }elseif ($row['q10']=='مقبول'){
          $reportqm10 +=1;
        }
        if($row['q11']=='ممتاز'){
          $reportq11 +=1;

        }elseif ($row['q11']=='جيد'){
          $reportqg11 +=1;

        }elseif ($row['q11']=='مقبول'){
          $reportqm11 +=1;
        }
        if($row['q12']=='ممتاز'){
          $reportq12 +=1;

        }elseif ($row['q12']=='جيد'){
          $reportqg12 +=1;

        }elseif ($row['q12']=='مقبول'){
          $reportqm12 +=1;
        }
        if($row['q13']=='ممتاز'){
          $reportq13 +=1;

        }elseif ($row['q13']=='جيد'){
          $reportqg13 +=1;

        }elseif ($row['q13']=='مقبول'){
          $reportqm13 +=1;
        }
        if($row['q14']=='ممتاز'){
          $reportq14 +=1;

        }elseif ($row['q14']=='جيد'){
          $reportqg14 +=1;

        }elseif ($row['q14']=='مقبول'){
          $reportq14 +=1;
        }
        if($row['q15']=='ممتاز'){
          $reportq15 +=1;

        }elseif ($row['q15']=='جيد'){
          $reportqg15 +=1;

        }elseif ($row['q15']=='مقبول'){
          $reportqm15 +=1;
        }
        if($row['q16']=='ممتاز'){
          $reportq16 +=1;

        }elseif ($row['q16']=='جيد'){
          $reportq16 +=1;
        }elseif ($row['q16']=='مقبول'){
          $reportqm16 +=1;
        }
        if($row['q17']=='نعم'){
          $reportq17 +=1;

        }elseif ($row['q17']=='لا'){
          $reportqm17 +=1;
        }
        if($row['q18']=='نعم'){
          $reportq18 +=1;

        }elseif  ($row['q18']=='لا'){
          $reportqm18 +=1;
        }
        if($row['q19']=='نعم'){
          $reportq19 +=1;

        }elseif ($row['q19']=='لا'){
          $reportqm19 +=1;
        }
        if($row['q20']=='ممتاز'){
          $reportq20 +=1;

        }elseif ($row['q20']=='مقبول'){
          $reportqm20 +=1;
        }


      }
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
    <td><?= $reportq1 ?> طلاب</td>
    <td><?= $reportqg1 ?> طلاب</td>
    <td colspan="2"><?= $reportqm1 ?> طلاب</td>
  </tr>
  <tr>
    <td>2</td>
    <td>وضوح المادة العلمية المعروضة (الرسومات – الخط)</td>
    <td><?= $reportq2 ?> طلاب</td>
    <td><?= $reportqg3 ?> طلاب</td>
    <td colspan="2"><?= $reportqm4 ?> طلاب</td>
  </tr>
  <tr>
    <td>3</td>
    <td>قدرة المدرب على إدارة المداخلات والمناقشات</td>

    <td><?= $reportq1 ?> طلاب</td>
    <td><?= $reportqg1 ?> طلاب</td>
    <td colspan="2"><?= $reportqm1 ?> طلاب</td> </tr>
  <tr>
    <td>4</td>
    <td>قدرة المدرب على تحفيز المشاركين على التفاعل</td>
    <td><input type="radio" name="q4" id="radio" value="ممتاز" <?= $reslut['q4'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q4" id="radio2" value="جيد" <?= $reslut['q4'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q4" id="radio3" value="مقبول" <?= $reslut['q4'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w4" id="w4" value="<?= $reslut['w4'] ?>"></td>
    </tr>
  <tr>
    <td>5</td>
    <td>مدى تعاونه مع المتدربين</td>
    <td><input type="radio" name="q5" id="radio" value="ممتاز" <?= $reslut['q5'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q5" id="radio2" value="جيد" <?= $reslut['q5'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q5" id="radio3" value="مقبول" <?= $reslut['q5'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
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
    <td><input type="radio" name="q6" id="radio2" value="جيد" <?= $reslut['q6'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q6" id="radio3" value="مقبول" <?= $reslut['q6'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w6" id="w6" value="<?= $reslut['w6'] ?>"></td>
    </tr>
  <tr>
    <td>2</td>
    <td>حسن    الإخراج الفني للحقيبة التدريبية</td>
    <td><input type="radio" name="q7" id="radio" value="ممتاز" <?= $reslut['q7'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q7" id="radio2" value="جيد" <?= $reslut['q7'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q7" id="radio3" value="مقبول" <?= $reslut['q7'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w7" id="w7" value="<?= $reslut['w7'] ?>"></td>
    </tr>
  <tr>
    <td>3</td>
    <td>كفاية مدة البرنامج (<?= $reslut_course['day_count'] ?>)</td>
    <td><input type="radio" name="q8" id="radio" value="ممتاز" <?= $reslut['q8'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q8" id="radio2" value="جيد" <?= $reslut['q8'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q8" id="radio3" value="مقبول" <?= $reslut['q8'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w8" id="w8" value="<?= $reslut['w8'] ?>"></td>
    </tr>
  <tr>
    <td>4</td>
    <td>مكان    انعقاد البرنامج </td>
    <td><input type="radio" name="q9" id="radio" value="ممتاز" <?= $reslut['q9'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q9" id="radio2" value="جيد" <?= $reslut['q9'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q9" id="radio3" value="مقبول" <?= $reslut['q9'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w9" id="w9" value="<?= $reslut['w9'] ?>"></td>
    </tr>
  <tr>
    <td>5</td>
    <td>توقيت    تنفيذ البرنامج  <?= $reslut_course['time'] ?></td>
    <td><input type="radio" name="q10" id="radio" value="ممتاز" <?= $reslut['q10'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q10" id="radio2" value="جيد" <?= $reslut['q10'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q10" id="radio3" value="مقبول" <?= $reslut['q10'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w10" id="w10" value="<?= $reslut['w10'] ?>"></td>
    </tr>
  <tr>
    <td>6</td>
    <td>مناسبة    موضوع الدورة للحضور</td>
    <td><input type="radio" name="q11" id="radio" value="ممتاز" <?= $reslut['q11'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q11" id="radio2" value="جيد" <?= $reslut['q11'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q11" id="radio3" value="مقبول" <?= $reslut['q11'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
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
    <td><input type="radio" name="q12" id="radio2" value="جيد" <?= $reslut['q12'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q12" id="radio3" value="مقبول" <?= $reslut['q12'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w12" id="w12" value="<?= $reslut['w12'] ?>"></td>
    </tr>
  <tr>
    <td>2</td>
    <td>جودة    الضيافة </td>
    <td><input type="radio" name="q13" id="radio" value="ممتاز" <?= $reslut['q13'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q13" id="radio2" value="جيد" <?= $reslut['q13'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q13" id="radio3" value="مقبول" <?= $reslut['q13'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w13" id="w13" value="<?= $reslut['w13'] ?>"></td>
    </tr>
  <tr>
    <td>3</td>
    <td>حسن    الاستقبال والتسجيل</td>
    <td><input type="radio" name="q14" id="radio" value="ممتاز" <?= $reslut['q14'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q14" id="radio2" value="جيد" <?= $reslut['q14'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q14" id="radio3" value="مقبول" <?= $reslut['q14'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
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
    <td><input type="radio" name="q15" id="radio2" value="جيد" <?= $reslut['q15'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q15" id="radio3" value="مقبول" <?= $reslut['q15'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
    <td colspan="4"><input type="text" name="w15" id="w15" value="<?= $reslut['w15'] ?>"></td>
    </tr>
  <tr>
    <td>2</td>
    <td>وضوح    رسالة  إعلان الدورة  </td>
    <td><input type="radio" name="q16" id="radio" value="ممتاز" <?= $reslut['q16'] == 'ممتاز' ? "checked='checked'" : '' ?>></td>
    <td><input type="radio" name="q16" id="radio2" value="جيد" <?= $reslut['q16'] == 'جيد' ? "checked='checked'" : '' ?>></td>
    <td colspan="2"><input type="radio" name="q16" id="radio3" value="مقبول" <?= $reslut['q16'] == 'مقبول' ? "checked='checked'" : '' ?>></td>
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
<? } ?>

        </div>





      </section>
      <!--/ .section-->

    </div>
    <!--/ #main-->

    <!--/ #sidebar-->


<?php include('footer.php') ?>
