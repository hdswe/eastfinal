<?php
include('header.php');
/*		for($i=1; $i<=16; $i++){
			$f = 'w'.$i.'';
			$insert	= $pdo->pdoExecute("ALTER TABLE `questionnaire` ADD `".$f."` VARCHAR(20) NOT NULL");
		}


*/	

	$sql_is_insert = "SELECT * FROM `questionnaire` WHERE `course_id` = ".$_GET['course']."";
	$execsql_is_insert = $pdo->pdoExecute($sql_is_insert);

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

        }elseif  ($row['q17']=='لا'){
          $reportqm17 +=1;
        }
        if($row['q18']=='نعم'){
          $reportq18 +=1;

        }elseif  ($row['q18']=='لا'){
          $reportqm18 +=1;
        }
        if($row['q19']=='نعم'){
          $reportq19 +=1;

        }elseif  ($row['q19']=='لا'){
          $reportqm19 +=1;
        }
        if($row['q20']=='ممتاز'){
          $reportq20 +=1;

        }elseif  ($row['q20']=='مقبول'){
          $reportqm20 +=1;
        }


      }
        var_dump(        $reportq1);
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
   
    <td colspan="2">اسم البرنامج</td>
    <td colspan="7"><?= $reslut_course['title'] ?></td>
  </tr>
  <tr>
    <td colspan="2">المدرب </td>
    <td colspan="7"><?= $reslut_course['trainer'] ?></td>
  </tr>
  <tr>
    <td colspan="2">الموعد </td>
    <td colspan="7"><?= $reslut_course['date_h'] ?></td>
  </tr>
  <tr>
    <td colspan="2">مكان البرنامج </td>
    <td colspan="7"><?= $reslut_course['location'] ?></td>
  </tr>
  <tr class="active">
    <tr class="active">
    <th colspan="3">أولاً : تقييم المدرب</th>
    <th colspan="3">ممتاز</th>
    <th colspan="2">جيد</th>
    <th colspan="2">مقبول</th>
    

  </tr>
    

  </tr>
  <tr>
    <td>1</td>
    <td colspan="2">إلمام    المدرب بموضوعات البرنامج</td>
    <td colspan="3"><?= $reportq1 ?> طلاب</td>
    <td colspan="2"><?= $reportqg1 ?> طلاب</td>
    <td colspan="2"><?= $reportqm1 ?> طلاب</td>
  </tr>
  <tr>
    <td>2</td>
    <td colspan="2">وضوح المادة العلمية المعروضة (الرسومات – الخط)</td>
    <td colspan="3"><?= $reportq2 ?> طلاب</td>
    <td colspan="2"><?= $reportqg2 ?> طلاب</td>
    <td colspan="2"><?= $reportqm2 ?> طلاب</td>
  </tr>
  <tr>
    <td>3</td>
    <td colspan="2">قدرة المدرب على إدارة المداخلات والمناقشات</td>

    <td colspan="3"><?= $reportq3 ?> طلاب</td>
    <td colspan="2"><?= $reportqg3 ?> طلاب</td>
    <td colspan="2"><?= $reportqm3 ?> طلاب</td> </tr>
  <tr>
    <td>4</td>
   <td colspan="2">قدرة المدرب على تحفيز المشاركين على التفاعل</td>
    <td colspan="3"><?= $reportq3 ?> طلاب</td>
    <td colspan="2"><?= $reportqg3 ?> طلاب</td>
    <td colspan="2"><?= $reportqm3 ?> طلاب</td> </tr>
    </tr>
  <tr>
    <td>5</td>
    <td colspan="2">مدى تعاونه مع المتدربين</td>
    <td colspan="3"><?= $reportq5 ?> طلاب</td>
    <td colspan="2"><?= $reportqg5 ?> طلاب</td>
    <td colspan="2"><?= $reportqm5 ?> طلاب</td>
    </tr>
  <tr class="active">
    <td colspan="3">ثانيًا : تقييم البرنامج التدريبي </th>
    <td colspan="3">ممتاز</th>
    <td colspan="2">جيد</th>
    <th colspan="2">مقبول</th>
   
  </tr>
  <tr>
    <td>6</td>
    <td colspan="2">شمولية    مفردات الدورة للموضوع</td>
    <td colspan="3"><?= $reportq6 ?> طلاب</td>
    <td colspan="2"><?= $reportqg6 ?> طلاب</td>
    <td colspan="2"><?= $reportqm6 ?> طلاب</td>
    </tr>
  <tr>
    <td>7</td>
    <td colspan="2">حسن    الإخراج الفني للحقيبة التدريبية</td>
    <td colspan="3"><?= $reportq7 ?> طلاب</td>
    <td colspan="2"><?= $reportqg7?> طلاب</td>
    <td colspan="2"><?= $reportqm7 ?> طلاب</td>
    </tr>
  <tr>
    <td>8</td>
    <td colspan="2">كفاية مدة البرنامج (<?= $reslut_course['day_count'] ?>)</td>
    <td colspan="3"><?= $reportq8 ?> طلاب</td>
    <td colspan="2"><?= $reportqg8 ?> طلاب</td>
    <td colspan="2"><?= $reportqm8 ?> طلاب</td>
    </tr>
  <tr>
    <td>9</td>
    <td colspan="2">مكان    انعقاد البرنامج </td>
    <td colspan="3"><?= $reportq9 ?> طلاب</td>
    <td colspan="2"><?= $reportqg9 ?> طلاب</td>
    <td colspan="2"><?= $reportqm9 ?> طلاب</td>
    </tr>
  <tr>
    <td>10</td>
    <td colspan="2">توقيت    تنفيذ البرنامج  <?= $reslut_course['time'] ?></td>
    <td colspan="3"><?= $reportq10 ?> طلاب</td>
    <td colspan="2"><?= $reportqg10 ?> طلاب</td>
    <td colspan="2"><?= $reportqm10 ?> طلاب</td>
    </tr>
  <tr>
    <td>11</td>
    <td colspan="2">مناسبة    موضوع الدورة للحضور</td>
    <td colspan="3"><?= $reportq11 ?> طلاب</td>
    <td colspan="2"><?= $reportqg11 ?> طلاب</td>
    <td colspan="2"><?= $reportqm11 ?> طلاب</td>
    </tr>
  <tr class="active">
    <td colspan="3">ثالثًا : خدمة المتدربين </th>
    <td colspan="3">ممتاز</th>
    <td colspan="2">جيد</th>
    <th colspan="2">مقبول</th>
  
  </tr>
  <tr>
    <td>12</td>
    <td colspan="2">المتابعة    والقدرة على تقديم المعلومات هاتفيا</td>
    <td colspan="3"><?= $reportq12 ?> طلاب</td>
    <td colspan="2"><?= $reportqg12 ?> طلاب</td>
    <td colspan="2"><?= $reportqm12 ?> طلاب</td>
    </tr>
  <tr>
    <td>13</td>
    <td colspan="2">جودة    الضيافة </td>
    <td colspan="3"><?= $reportq13 ?> طلاب</td>
    <td colspan="2"><?= $reportqg13 ?> طلاب</td>
    <td colspan="2"><?= $reportqm13 ?> طلاب</td>
    </tr>
  <tr>
    <td>14</td>
    <td colspan="2">حسن    الاستقبال والتسجيل</td>
    <td colspan="3"><?= $reportq14 ?> طلاب</td>
    <td colspan="2"><?= $reportqg14 ?> طلاب</td>
    <td colspan="2"><?= $reportqm14 ?> طلاب</td>
    </tr>
  <tr class="active">
    <td colspan="3">رابعاً :  البيئة التدريبية والخدمات المساندة  </th>
    <td colspan="3">ممتاز</th>
    <td colspan="2">جيد</th>
    <th colspan="2">مقبول</th>
  </tr>
  <tr>
    <td>15</td>
    <td colspan="2">تكامل    تجهيزات القاعة وسلامتها</td>
    <td colspan="3"><?= $reportq15 ?> طلاب</td>
    <td colspan="2"><?= $reportqg15 ?> طلاب</td>
    <td colspan="2"><?= $reportqm15 ?> طلاب</td>
    </tr>
  <tr>
    <td>16</td>
    <td colspan="2">وضوح    رسالة  إعلان الدورة  </td>
    <td colspan="3"><?= $reportq16 ?> طلاب</td>
    <td colspan="2"><?= $reportqg16 ?> طلاب</td>
    <td colspan="2"><?= $reportqm16 ?> طلاب</td>
    </tr>
  <tr>
    <td colspan="10">خامساً: أسئلة عامة </td>
  </tr>
  <tr>
    <td>17</td>
    <td colspan="2">هل وضعت أهداف للبرنامج</td>
    <td colspan="2">نعم </td>
   <td><?= $reportq17 ?> طلاب</td>
   <td colspan="2">لا </td>
    <td colspan="2"><?= $reportqm17 ?> طلاب</td>

  </tr>
  <tr>
    <td>18</td>
    <td colspan="2">هل تحققت أهدافك ؟</td>
    <td colspan="2">نعم </td>
    <td><?= $reportq18 ?> طلاب</td>
    <td colspan="2">لا </td>
    <td colspan="2"><?= $reportqm18 ?> طلاب</td>
  </tr>
  <tr>
    <td>19</td>
    <td colspan="2">هل تعتقد أن البرنامج سيساعدك في تطوير    مهاراتك مستقبلاً؟</td>
    <td colspan="2">نعم </td>
     <td><?= $reportq19 ?> طلاب</td>
     <td colspan="2">لا </td>
    <td colspan="2"><?= $reportqm19 ?> طلاب</td>
  </tr>
  <tr>
    <td>20</td>
    <td colspan="2">ما هو تقييمك العام عن الدورة </td>
    <td colspan="2">مقبول </td>
    <td><?= $reportq20 ?> طلاب</td>
    <td colspan="2">ممتاز </td>
    <td colspan="2"><?= $reportqm20 ?> طلاب</td>
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
