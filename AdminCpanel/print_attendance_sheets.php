<?php
    session_start();
    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/newFunction.php");
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

* {
	margin:0px;
	padding:0px;
}

body,html {
	margin:0px;
	padding:0px;
	width:210mm;
	 height:297mm
}
.page {
		margin:0px;
	padding:0px;
	width:210mm;
	 height:297mm

	font-family: "Times New Roman", Times, serif;
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

<body>
<!--<a href="javascript:window.print()" title="" class="print">
طباعة كافة الأوراق
</a>
--><? 
	$course = $_GET['id'];

	$query = "
	SELECT
	reservation.id AS resid,
	reservation.course_id,
	reservation.date resdate,
	reservation.status,
	reservation.user_id,
	reservation.barcode,
	
	users.id AS uid,
	users.full_name,
	
	course.id AS courid,
	course.title,
	course.date_h,
	course.trainer,
	course.location,
	course.time,
	course.details
	

	FROM
	`reservation` ,`users` ,`course`
	
	WHERE
	reservation.course_id = $course AND
	reservation.user_id = users.id AND
	course.id = $course AND
	reservation.status = '2'
	";
            $rows = $pdo->pdoGetAll($query);
            foreach($rows as $record) {

?>

<div class="page">
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl">
  <tr>
    <th width="100">اسم الطالب</th>
    <td width="384"><? echo $record['full_name'] ?></td>
  </tr>
  <tr>
    <th>عنوان الدورة</th>
    <td><? echo $record ['title'] ?></td>
  </tr>
  <tr>
    <th>اسم المدرب</th>
    <td><? echo $record ['trainer'] ?></td>
  </tr>
  <tr>
    <th>المكان</th>
    <td><? echo $record ['location'] ?></td>
  </tr>
  <tr>
    <th>تاريخ الدورة</th>
    <td><? echo $record ['date_h'] ?></td>
  </tr>
  <tr>
    <th>وقت الدورة</th>
    <td><? echo $record ['time'] ?></td>
  </tr>
  <tr>
    <th>تفاصيل الدورة</th>
    <td><? echo $record ['details'] ?></td>
  </tr>
  <tr>
    <th>حالة الحجز</th>
    <td><?
                      if($record ['status'] == '1'){
                          echo "غير مؤكد";
                      }
                      if($record ['status'] == '2'){
                          echo "مؤكد";
                      }
                      ?></td>
  </tr>
  <tr>
    <td colspan="2">
    <img src="template/barcode/test_1D.php?text=<? echo $record ['barcode'] ?>" alt="barcode" /></td>
  </tr>
  </table>
  
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl" class="none">
  <tr>
    <th width="100">&nbsp;</th>
    <td width="384">&nbsp;</td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
    <img src="template/reports/barcode.png" alt="barcode" /></td>
  </tr>
  </table>

  </div>
<?	} ?>

</body>
</html>