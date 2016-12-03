<?php
    require ("header.php");
    
#############################################################
# Check Id number - Step1
#############################################################
	if(isset($_POST['btnsend_step1'])){
		$id_number = $_POST['id_number'];
		$sqlIdNumber = "SELECT * FROM `users` WHERE `id_number`=:id_number";
		$dataIdNumber[id_number] = $id_number;
		$ExecuteSql = $pdo->pdoExecute($sqlIdNumber, $dataIdNumber);
		if($pdo->pdoRowCount($ExecuteSql) < 1){
            $_SESSION['id_number'] = $id_number;
            header('Location: ?do=step2');
		} else {
			$msg = 'انت مسجل مسبقاً';
		}
	}
#############################################################
# Get Banned
#############################################################
	$sql_banned = "SELECT * FROM `banned_course` WHERE `user_id`=:user_id";
	$data_banned[user_id] = $idUser;
	$result_banned = $pdo->pdoGetRow($sql_banned, $data_banned);
	$count_banned = $result_banned['course_number'];


?>


    <aside id="sidebar" class="medium-3 large-3 columns">
             <?php include('right-pages.php') ?>
 </aside>

    <div class="large-9 columns">

      <section class="section margin-top-off">

        <div class="page-title">
          <h1>التسجيل كمتدرب</h1>

          <div class="breadcrumbs">
            <a href="home.php" title="">الرئيسية</a>
            <a href="courses.php" title="">التسجيل متدرب</a>
          
          </div>
        </div>

<div class="relative">
               <ul class="accordion">
              <div class="row post-list two-cols">
                <?php
 $rows = $pdo->pdoGetAll("SELECT * FROM `programs` WHERE published='yes' AND archive='no' ORDER BY `id` DESC");
  foreach($rows as $result) 
   {
		echo '<li class="medium-12 large-12 columns accordion-navigation right">';
       
			echo '<a class="acc-trigger" data-mode=""  href="?program='.$result['id'].'">'.$result['title'].'</a>';
			echo'<div class="content" style="display: none;">'.$result['details'].'<br><hr>';
			echo '<h3>الدورات داخل البرنامج</h3>';
			echo'<table class="table table-striped table-bordered">
			  <tr>
				<td>اسم الدورة</td>
				<td>اسم المدرب</td>
				<td>التاريخ</td>
				<td>الفئة</td>
				<td>التفاصيل</td>
			  </tr>';
				$sql_c = $pdo->pdoGetAll("SELECT * FROM `course` WHERE programs_id=".$result['id']." AND archive='no' ORDER BY `id` DESC");
				foreach($sql_c as $result_c) {
			  echo'<tr>
				<td>'.$result_c['title'].'</td>
				<td>'.$result_c['trainer'].'</td>
				<td>'.$result_c['date_h'].'</td>
				<td>';
                    $sql_groups = $pdo->pdoGetAll("SELECT * FROM `groups` ORDER BY `id` DESC");
                    foreach($sql_groups as $result_groups) {
                        $required_groupsr = explode(",", $result_c['groups_id']);
                    if(in_array($result_groups['id'], $required_groupsr)) { echo $result_groups['title'].", ";
					 }
					}
				echo'</td>
				<td>';
                        // check reservation //
                        $sqlIdRes = "SELECT * FROM `reservation` WHERE `course_id`=:id AND `user_id`=:user_id";
                        $dataIdRes[id] = $result_c['id'];
                        $dataIdRes[user_id] = $idUser;
                        $resultRes = $pdo->pdoGetRow($sqlIdRes, $dataIdRes);
                        $statusReservation = $resultRes['status'];
			if($result_c['status'] == 1){
                            if($statusReservation == 1 ) {
                            echo '<a href="course_details.php?id='.$result_c['id'].'">بانتظار المراجعة</a>';
                            } elseif($statusReservation == 2 ) {
                            echo '<a href="course_details.php?id='.$result_c['id'].'">حجزك مؤكد</a>';
                            } elseif($statusReservation == 3 ) {
                            echo '<a href="course_details.php?id='.$result_c['id'].'">حجزك ملغي</a>';
                            }else {
                                                    echo '<a href="course_details.php?id='.$result_c['id'].'">التفاصيل</a>';
                            }
                                                }elseif($result_c['status'] == 2){
                                                    echo 'التسجيل مغلق';
                                                }elseif($result_c['status'] == 3){
                                                    echo 'التسجيل مغلق'; }
				echo'</td>
			  </tr>';
				}
			echo'</table>';


			echo'</div>';
		echo '</li>';
	}
?>
              </div>
            </ul>
            </div>

	



</section>
      <!--/ .section-->

    </div>


    <!--/ #sidebar-->


          <?php include('footer.php') ?>

