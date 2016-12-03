<?php
    require ("../../include/dbWrapperClass.php");
    require ("../../include/config.php");
    require ("../../include/newFunction.php");
    require_once ("hijri.class.php");

              


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>

<!--File Normalize ==> Nice Reset -->
<link rel="stylesheet" href="css/normalize.css">
<!--Flie My Style -->
<link rel="stylesheet" href="css/main.css">
<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" /><!-- Google Web Font-->

</head>
<body>
<div class="container">
<?php
  $sql = "SELECT 
                        reservation.id AS resid,
                        reservation.user_id,
                        reservation.course_id,
                        reservation.date,
                        reservation.status,
                        
                        course.id AS coid,
                        course.title,
						course.trainer,
						course.time,
						course.date_h ,
						course.date_m,
						course.day_hours,
						course.programs_id As prtitle ,
						
		                groups.title As gotitle,
		                
		                programs.title As prtitle,
		                
						 
                        
                        users.id AS userid,
                        users.username,
                        users.full_name,
                        users.groups_id
                        
                        FROM `reservation`,`course`,`users`,`groups`,`programs`
                        
                        WHERE
                        reservation.course_id = course.id AND
                        reservation.user_id = users.id AND
                        groups.id = users.groups_id AND
                        programs.id = course.programs_id AND
                        reservation.status = '2' AND
						reservation.course_id = ".$_GET['course_id']."
                        
                        ORDER BY `resid` DESC
                        
                    ";
	$rows = $pdo->pdoGetAll($sql);
//    var_dump($rows) ;
//    die();
	foreach($rows as $result) {
?>
  <div class="card-cer">

    <div class="logo-right"> <img src="images/logo_right_lg.png" alt="" /> </div>
    <div class="logo-center"> <img src="images/logo_center_lg.png" alt="" /> </div>
    <div class="logo-left"> <img src="images/logo_left.png" alt="" /> </div>
    <div class="img-right-quran"> <img src="images/bg-card-cer-r-lg.png" alt="" /> </div>
    <div class="text-info">
      <p>تشهد الجمعية الخيرية لتحفيظ القرآن  الكريم بمركز الشرق</p>
      <p> بأن المشارك  / <span>
        <?= $result['full_name']; ?>
        </sapn>
      </p>
      <p> قد حضر دورة تدريبية بعنوان : <span> (
        <?= $result['title']; ?>
        ) </span> </p>
      <p> التي قدمها المدرب / <span>
        <?= $result['trainer'];  ?>
        </span> </p>
      <p> وذلك <span>

        <?=  'مساء' ?>
        </span> يوم <span>
          <?php echo (new hijri\datetime($result['date_m']))->format('D'); ?>
        </span> الموافق <span>
        <?= $result['date_h'];  ?>
        </span> خلال ( <span>
        <?= $result['day_hours'];  ?>
        </span> ) ساعات تدريبية </p>
      <p> ضمن فعاليات <span>
        <?= $result['prtitle'];  ?>
        </span> لفئة <span>
        <?= $result['gotitle'];

        ?>
        </span> </p>
      <p> سائلين المولي عز وجل له دوام التوفيق والسداد   ,,,</p>
    </div>
    <footer class="footer">
      <div class="admin">
        <h2>المدير التنفيذي</h2>
        <p> عادل بن محمد الخلفية</p>
      </div>
      <div class="admin admin-center">
        <h2>مدير مركز الشرق</h2>
        <p> تركي بن محمد البسام</p>
      </div>
    </footer>
  </div>
  <? } ?>
</div>
</body>
</html>
