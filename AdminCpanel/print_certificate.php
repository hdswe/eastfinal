<?php
    session_start();
    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/newFunction.php");
    require_once ("certificate/hijri.class.php");



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="certificate/css/normalize.css">
    <!--Flie My Style -->
 <link rel="stylesheet" href="certificate/css/main.css">
  <link rel="stylesheet" href="certificate/css/bootstrap.min.css">
<style type="text/css">

@page {
  size: A4;
  margin: 0;
}
@media print {
  html, body,.page {
    width: 210mm;
    height: 297mm;
  }
  /* ... the rest of the rules ... */
}

.page {
		margin:0px;

	padding:0px;
	background: url(images/certfcate.jpg) no-repeat left top;
}
.page table {
	width: 95%;
}

.page th {
	background-color: #DBDBDB;
	padding: 5px;
	text-align: center;
	border: 1px solid #000;
	font-family: arial;
	font-size: 16px;
	font-weight: bold;
}
.page td {
    border: 1px solid #000000;
    font-family: arial;
    font-size: 15px;
    font-weight: bold;
    padding: 10px;}

.print {
	font-family: "Arial Black", Gadget, sans-serif;
	font-size: 24px;
	margin-top: 30px;
	display:block;
	margin-left:120px;
}

@media print
  {
  .print {display:none;}
  }





.none table {
	width: 95%;
}

.none th {
	background-color: #fff;
	padding: 5px;
	text-align: center;
	border: 1px solid #fff;
	font-family: arial;
	font-size: 16px;
	font-weight: bold;
}
.none td {
    border: 1px solid #fff;
    font-family: arial;
    font-size: 15px;
    font-weight: bold;
    padding: 10px;}


</style>

</head>

<body onload="print()" class="container">
<!--<a href="javascript:window.print()" title="" class="print">
طباعة كافة الأوراق
</a>
-->
<?
	$course = $_GET['id'];

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
						course.day_section,
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
            foreach($rows as $result) {

?>

                <div class="card-cer">

                    <div class="logo-right"> <img src="certificate/images/logo_right_lg.png" alt="" /> </div>
                    <div class="logo-center"> <img src="certificate/images/logo_center_lg.png" alt="" /> </div>
                    <div class="logo-left"> <img src="certificate/images/logo_left.png" alt="" /> </div>
                    <div class="img-right-quran"> <img src="certificate/images/bg-card-cer-r-lg.png" alt="" /> </div>
                    <div class="text-info">
                        <p>تشهد الجمعية الخيرية لتحفيظ القرآن  الكريم بمركز الشرق</p>
                        <p> بأن المشارك  / <span></p>
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

        <?=  $result['day_section'] ?>
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
<?	} ?>

<script src="js/bootstrap.min.js"></script>
</body>
</html>