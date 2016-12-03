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
              	<th>&nbsp;&nbsp;</th>
                <th>ID</th>
                <th width="50%">الاسم</th>
				<th>تاريخ بداية الحظر</th>
                <th>مدة الحظر</th>
				<th>تاريخ رفع الحظر</th>
              </tr>
            </thead>
            <tbody>
                <?
                $sql = "SELECT 
                        users.id AS userid,
                        users.username,
                        users.full_name,
						banned_time,
						start_time,
						end_time
                       
                        FROM banned_course, users
                        
                        WHERE
                        users.id_number=banned_course.user_id
						
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
                	<td>&nbsp;&nbsp;</td>
                        <td>
                        <?=  $countRow ?>
                                                  
                  </td>
                <td><?= $result['full_name'] ?></td>
                
                  
               
                <td><?=date('Y/m/d H:i:s', $result['start_time'])?></td>
		<td><?=$result['banned_time']?> ساعة </td>
		<td><?=date('Y/m/d H:i:s', $result['end_time'])?></td>
                
                </tr>
                <? } } ?>

            </tbody>
  </table>
  </body>
</html>