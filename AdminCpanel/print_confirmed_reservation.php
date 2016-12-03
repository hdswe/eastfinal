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
<title>Untitled Document</title>
</head>

<body>
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0">
          <thead>
            <tr>
            <th align="center">الاسم</th>
            <th align="center">رقم الجوال</th>
            </tr>
          </thead>
          <tbody>
			<?
			$course = $_GET['id'];	
			$query = "SELECT 
                        reservation.id AS resid,
                        reservation.user_id,
                        reservation.course_id,
                        reservation.date,
                        reservation.status,
                        
                        course.id AS coid,
                        course.title,
                        
                        users.id AS userid,
                        users.username,
                        users.full_name
                        
                        FROM `reservation`,`course`,`users`
                        
                        WHERE
                        reservation.course_id = course.id AND
                        $where
                        reservation.user_id = users.id AND
                        reservation.status = '2' AND
						reservation.course_id = ".$_GET['id']."
                        
                        ORDER BY `resid` DESC			";
            $rows = $pdo->pdoGetAll($query);
            foreach($rows as $record) {
			?>
            <tr>
            <td align="center"><?= $record['full_name'] ?></td>
            <td align="center"><?= $record['username'] ?></td>
            </tr>
            <? }  ?>
            
          </tbody>
        </table>
</body>
</html>