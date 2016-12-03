<?php
    require ("include/dbWrapperClass.php");
    require ("include/config.php");
    require ("include/newFunction.php");
	
#############################################################
# Check Login User
#############################################################
	if ($UserLoggedIn->isLoggedIn() == false) {
		header('Location: login.php');
	}

#############################################################
# Get Details Course
#############################################################

    if(isset($_GET['course'])){
		$id_course = get_safe($_GET['course']);
		$sqlIdCourse = "SELECT * FROM `course` WHERE `id`=:course";
		$dataIdCourse[course] = $id_course;
		$ExecuteSql = $pdo->pdoExecute($sqlIdCourse, $dataIdCourse);
		if($pdo->pdoRowCount($ExecuteSql) == 1){
            $result = $pdo->pdoGetRow($sqlIdCourse, $dataIdCourse);
 		} else {
            header('Location: 404.php');
		}
    }else{
        header('Location: 404.php');
    }
#############################################################
# Get Reservation 
#############################################################

    if(isset($_GET['id'])){
		$id_rev = get_safe($_GET['id']);
		$sqlRev = "SELECT * FROM `reservation` WHERE `id`=:id";
		$dataRev[id] = $id_rev;
		$ExecuteSqlRev = $pdo->pdoExecute($sqlRev, $dataRev);
		if($pdo->pdoRowCount($ExecuteSqlRev) == 1){
            $resultRev = $pdo->pdoGetRow($sqlRev, $dataRev);
 		} else {
            header('Location: 404.php');
		}
    }else{
        header('Location: 404.php');
    }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
.printcode {
	width: 100%;
	font-family: "Times New Roman", Times, serif;
}
.printcode table {
	width: 95%;
	margin-right: auto;
	margin-left: auto;
}

.printcode td {
	border: 1px solid #000;
	padding: 15px;
	vertical-align: middle;
	font-size: 16px;
}
.printcode .title {
	background-color: #CCC;
	width: 25%;
	text-align: right;
	font-size: 20px;
}
</style>
</head>
<body onLoad="print()">

<div class="printcode">
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" dir="ltr">
  <tr>
    <td align="right"><?php echo $FullNameUser ?></td>
    <td class="title">اسم الطالب</td>
  </tr>
  <tr>
    <td align="right"><?php echo $result ['title'] ?></td>
    <td class="title">عنوان الدورة</td>
  </tr>
  <tr>
    <td align="right">
	                            <?php
							$group_fields = explode(",",$result['groups_id']);
							if($group_fields[0] == '5'){ echo 'مشرف, '; }
							if($group_fields[1] == '6'){ echo 'معلم, '; }
							if($group_fields[2] == '7'){ echo 'اداري, '; }
							if($group_fields[3] == '8'){ echo 'طالب, '; }
							if($group_fields[4] == '9'){ echo 'غير ذلك'; }
							
							?>
	</td>
    <td class="title">الفئة</td>
  </tr>
  <tr>
    <td align="right"><?php echo $result ['day_count'] ?></td>
    <td class="title">عدد الايام</td>
  </tr>
  <tr>
    <td align="right"><?php echo $result['date_h'] ?></td>
    <td class="title">تاريخ الدورة</td>
  </tr>
  <tr>
    <td align="right"><?php echo $result['trainer'] ?></td>
    <td class="title">المدرب</td>
  </tr>
  <tr>
    <td align="right"><?php echo $result ['location'] ?></td>
    <td class="title">المكان</td>
  </tr>
  <tr>
    <td align="right"><?php echo $result ['date_h'] ?></td>
    <td class="title">تاريخ الدورة</td>
  </tr>
  <tr>
    <td align="right"><?php echo $result ['time'] ?></td>
    <td class="title">وقت الدورة</td>
  </tr>
  <tr>
    <td align="right"><?php echo $result ['details'] ?></td>
    <td class="title">تفاصيل الدورة</td>
  </tr>
  <tr>
    <td colspan="2" align="center">

    <img src="tools/barcode/test_1D.php?text=<?php echo $resultRev ['barcode'] ?>" alt="barcode" />

    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
<img src="data/images/<?php echo $result['map'] ?>" />

</td>
    </tr>
</table>
</div>
</body>
</html>
