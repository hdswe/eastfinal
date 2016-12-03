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
                      <th>ID</th>
                <th width="70%">الاسم</th>
                <th>المركز</th>
		<th>الحي</th>
                <? 
				$id = $_GET['course'];
				$sql_course_days="SELECT * FROM `day_course` WHERE course_id=".$id." ORDER BY `id` DESC";
				$execute_sql_course_days = $pdo->pdoExecute($sql_course_days);
				$count_course_days = $pdo->pdoRowCount($execute_sql_course_days);
				if($count_course_days>1){
					header("Location:print_attendance_reports.php?course=$id ");
				}else if($count_course_days==1){
					$record_day = $pdo->pdoGetRow($sql_course_days);?>
					<th><?= $record_day['day'] ?></th>
				<?
				}
				?>
				
                </tr>
            </thead>
            <tbody>
                <?
                $sql = "SELECT 
                        users.id AS userid,
                        users.username,
                        users.full_name,
                        center.title AS center_name,
                        neighborhood.title AS neighborhood_name

                        FROM registr_attend, users,neighborhood,center
                        
                        WHERE
                        center.id=users.center_id AND
                        neighborhood.id=users.neighborhood_id AND
						registr_attend.day_course_id=".$record_day['id']."
						AND
						users.id=registr_attend.user_id
						
                        ORDER BY users.full_name ASC
					";
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
                     $countRow=0;
                    foreach($rows as $result) {
                     $countRow++;
                ?>
                <tr class="unread">
                        <td>
                        <?=  $countRow ?>
                                                  
                  </td>
                <td><?= $result['full_name'] ?></td>
                
                  
               
                <td><?=$result['center_name']?></td>
                 <td><?= $result['neighborhood_name'] ?></td>
                <td align="center"><? echo '<span class="glyphicon glyphicon-ok"></span>'; ?></td>
                </tr>
                <? } } ?>
                
            </tbody>
  </table>
  </body>
</html>