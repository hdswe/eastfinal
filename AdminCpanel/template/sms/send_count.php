<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">ارسال الرسائل</h3>
        </div>
        <div class="panel-body">
              
              
<?

if (isset($_GET['startfrom']) and intval($_GET['startfrom']) > 0) {
	$startfrom = intval($_GET['startfrom']);
} else {
	$startfrom = 0;
}

if ($_GET['page'] == "group") {
	$query = "select * from `users` WHERE groups=" . $_GET['group'] . " limit $startfrom," . $_GET['count_msg'] . "";
}

if ($_GET['page'] == "gender") {
	$query =  "SELECT * FROM `users` WHERE `gender`=" . $_GET['gender'] . " limit $startfrom," . $_GET['count_msg'] . "";
}

if ($_GET['page'] == "send_all") {
	$query = "SELECT * FROM `users` limit $startfrom," . $_GET['count_msg'] . "";
}

if ($_GET['page'] == "course") {
	$course = $_GET['course'];
	$status = $_GET['status'];

	$query = "SELECT 
			reservation.id AS resid,
			reservation.users,
			reservation.course,
			reservation.status,

			course.id AS coid,
			
			users.id AS userid,
			users.username,
			users.first_name,
			users.middle_name,
			users.last_name
			
			FROM `reservation`,`course`,`users`
			
			WHERE
			reservation.course = course.id AND
			reservation.users = users.id AND
			reservation.status = $status AND
			course.id = $course
			limit $startfrom," . $_GET['count_msg'] . "
			";

}

if ($_GET['page'] == "send") {

	$query ="SELECT * FROM `send_all` limit $startfrom," . $_GET['count_msg'] . "";

}

$count_query = $pdo -> pdoExecute($query);
$count_result = $pdo -> pdoRowCount($count_query);
if ($count_result == 0) {
	echo '
    
    <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                تمت عملية الارسال بنجاح .
              </div>';
              
} else {

    $rows = $pdo->pdoGetAll($query);
                    
    foreach($rows as $record) {
		$mobile = $record['username'];
        echo $mobile;
		//code send

		$message = $_GET['msg'];

		$startfrom = $_GET['count_msg_old'] + $_GET['count_msg'];

		if ($_GET['page'] == 'send') { echo $record['username'] . " ...... تم الارسال <br>";
		} else {
			echo $record['first_name'] . " " . $record['middle_name'] . " " . $record['last_name'] . " ...... تم الارسال <br>
";
		}

		if ($_GET['page'] == "group") {
			$count_msg_old = $_GET['count_msg_old'] + $_GET['count_msg'];
			echo '<meta http-equiv="refresh" content="' . $_GET['time_msg'] . ';url=' . $_SERVER['PHP_SELF'] . '?do=send_count&group=' . $_GET['group'] . '&count_msg=' . $_GET['count_msg'] . '&count_msg_old=' . $count_msg_old . '&page=' . $_GET['page'] . '&time_msg=' . $_GET['time_msg'] . '&msg=' . $_GET['msg'] . '&startfrom=' . $startfrom . '" />';
		}

		if ($_GET['page'] == "course") {
			$count_msg_old = $_GET['count_msg_old'] + $_GET['count_msg'];
			echo '<meta http-equiv="refresh" content="' . $_GET['time_msg'] . ';url=' . $_SERVER['PHP_SELF'] . '?do=send_count&course=' . $_GET['course'] . '&status=' . $_GET['status'] . '&page=' . $_GET['page'] . '&count_msg=' . $_GET['count_msg'] . '&count_msg_old=' . $count_msg_old . '&time_msg=' . $_GET['time_msg'] . '&msg=' . $_GET['msg'] . '&startfrom=' . $startfrom . '" />';
		}

		if ($_GET['page'] == "gender") {
			$count_msg_old = $_GET['count_msg_old'] + $_GET['count_msg'];
			echo '<meta http-equiv="refresh" content="' . $_GET['time_msg'] . ';url=' . $_SERVER['PHP_SELF'] . '?do=send_count&gender=' . $_GET['gender'] . '&count_msg=' . $_GET['count_msg'] . '&count_msg_old=' . $count_msg_old . '&page=' . $_GET['page'] . '&time_msg=' . $_GET['time_msg'] . '&msg=' . $_GET['msg'] . '&startfrom=' . $startfrom . '" />';
		}

		if ($_GET['page'] == "send_all") {
			$count_msg_old = $_GET['count_msg_old'] + $_GET['count_msg'];
			echo '<meta http-equiv="refresh" content="' . $_GET['time_msg'] . ';url=' . $_SERVER['PHP_SELF'] . '?do=send_count&count_msg=' . $_GET['count_msg'] . '&page=' . $_GET['page'] . '&count_msg_old=' . $count_msg_old . '&time_msg=' . $_GET['time_msg'] . '&msg=' . $_GET['msg'] . '&startfrom=' . $startfrom . '" />';
		}

		if ($_GET['page'] == "send") {
			$count_msg_old = $_GET['count_msg_old'] + $_GET['count_msg'];
			echo '<meta http-equiv="refresh" content="' . $_GET['time_msg'] . ';url=' . $_SERVER['PHP_SELF'] . '?do=send_count&count_msg_old=' . $count_msg_old . '&count_msg=' . $_GET['count_msg'] . '&page=' . $_GET['page'] . '&time_msg=' . $_GET['time_msg'] . '&msg=' . $_GET['msg'] . '&startfrom=' . $startfrom . '" />';
		}

	}
}
?>



       
        </div><!-- panel-body -->
      </div>