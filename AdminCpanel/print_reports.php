<?php
    session_start();
    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/newFunction.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title><?= $settingsSiteName ?></title>

  <link href="css/style.default.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-fileupload.min.css" />
  <link rel="stylesheet" href="css/bootstrap-timepicker.min.css" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body onload="window.print()">
 <table class="table table-hidaction table-striped mb30">
            <thead>
              <tr>
                <th>الدورات	</th>
                <th> المشاركين</th>
                <th> المرشحين</th>
                <th>تم  الاعتذار منهم</th>
                <th>المتغيبين</th>
                <th>عدد الايام</th>
                <th>اسم المدرب</th>
                
                </tr>
            </thead>
            <tbody>
                <?
                if(isset($_POST['course_title'])){
                $where = "AND course.title LIKE '%".$_POST['course_title']."%'";
                }
                $sql = "SELECT course.trainer as trainer,course.day_count as day_count ,course.id as id,course.title as title FROM `course`,programs where course.programs_id = programs.id and course.programs_id='".$_GET['program_id']."' and course.status='".$_GET['status']."'";
                    $ExecuteSql = $pdo->pdoExecute($sql);



                    if($pdo->pdoRowCount($ExecuteSql) < 1){
                    echo '
                    <tr>
                     <td colspan="6">
                        <div class="alert alert-warning">
                            <p>لايوجد نتائج</p>
                        </div>
                     </td>
                    </tr>
                    ';
                    } else {

                    $rows = $pdo->pdoGetAll($sql);
                    
                    foreach($rows as $result) {
                ?>
                <tr class="unread">
				<td><?= $result['title'] ?></td>
                <td><?
                $query_rev_confirm = $pdo->pdoExecute("SELECT * FROM `reservation` WHERE status=1 AND course_id=".$result['id']."");
                
               $num_rev = $pdo->pdoRowCount($query_rev_confirm);
               echo $num_rev;
                ?> </td>
                <td><?
                $query_rev_confirm = $pdo->pdoExecute("SELECT * FROM `reservation` WHERE status=2 AND course_id=".$result['id']."");
                
               $num_rev = $pdo->pdoRowCount($query_rev_confirm);
               echo $num_rev;
                ?> </td>
                <td><?
                $query_rev_confirm = $pdo->pdoExecute("SELECT * FROM `reservation` WHERE status=3 AND course_id=".$result['id']."");
                
               $num_rev = $pdo->pdoRowCount($query_rev_confirm);
               echo $num_rev;
                ?> </td>
                <td><?
                $query_rev_confirm = $pdo->pdoExecute("SELECT * FROM `reservation` WHERE status=1 AND course_id=".$result['id']."");
                
               $num_rev = $pdo->pdoRowCount($query_rev_confirm);
               echo $num_rev;
                ?> </td>
                <td><?= $result['day_count']; ?> </td>
                 <td><?= $result['trainer']; ?> </td>
                </tr>
               <? }}?>
              
            </tbody>
            </table>
  </body>
</html>