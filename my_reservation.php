<?php
    require ("header.php");
    
#############################################################
# Check Register Course
#############################################################
    $sqlIdRes = "SELECT * FROM `reservation` WHERE `user_id`=:user_id";
    $dataIdRes[user_id] = $idUser;
    $resultRes = $pdo->pdoGetRow($sqlIdRes, $dataIdRes);

    $ExecuteSql = $pdo->pdoExecute($sqlIdRes, $dataIdRes);
    if($pdo->pdoRowCount($ExecuteSql) < 1) {
        $msg = 'لايوجد لديك اي حجز في اي دورة';
    }

#############################################################
# Cancel Reservation Course
#############################################################
    if (isset($_GET['cansel'])) {
		$data['status']     = '3';
        $where[id] 			= $_GET['cansel'];
        $update = $pdo->pdoInsUpd('reservation', $data, 'update', $where);
        header('Location: ?do=cansel_successfully');
        }

?>

    <aside id="sidebar" class="medium-3 large-3 columns">
             <?php include('right-pages.php') ?>
 </aside>


    <div class="large-9 columns">



      <section class="section margin-top-off">

        <div class="page-title">
          <h1>الدورات التي التحقت بها</h1>

          <div class="breadcrumbs">
            <a href="home.php" title="">الرئيسية</a>
            <a href="my_reservation.php" title="">الدورات التي التحقت بها</a>
          
          </div>
        </div>
         <?php
        if(!empty($msg)) {
            echo  '<div class="alert alert-danger" role="alert"> <p>'.$msg.'</p><a class="alert-close" href="#"></a></div>';
                        } 
        else {
        if(isset($_GET['do']) and $_GET['do'] == 'cansel_successfully') { ?>
        <div class="alert alert-success" role="alert">
             <p>تم الغاء حجزك في هذه الدورة بنجاح</p>
             <a class="alert-close" href="#"></a>
        </div>
     <?php } ?>

                            

        <table  class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>م</th>
                    <th>عنوان الدورة</th>
                    <th>تاريخ التسجيل</th>
                    <th>حالة التسجيل</th>
                </tr>
            </thead>
             <tbody>
                <?php
                     $sqlIdCourse = "SELECT
                             reservation.id AS reid,
                             reservation.user_id,
                             reservation.course_id,
                             reservation.status,
                             reservation.date,

                             course.id AS cid,
                             course.title,
							 course.date_m,
							 course.cancel_reservation_time,
							 course.close_register_date,
							 course.day_count,
                             
                             users.id AS uid
                             
                             
                             FROM `course`, `reservation`, `users` WHERE
                             
                             reservation.user_id = users.id AND 
                             reservation.course_id = course.id AND
							 reservation.user_id = ".$idUser."
                             
                             ";
                $rows = $pdo->pdoGetAll($sqlIdCourse);
				$Today=strtotime(date("Y/m/d"));
				$waiting_time_before_remove = 24 * 3600;
				//$dayToRemove=$Today+$waiting_time_before_remove;
                foreach($rows as $result) {
				$course_start_date = strtotime($result['date_m']);
				$cours_day_count=$result['day_count'] *24*3600;
				$dayToRemove=$course_start_date+$cours_day_count+$waiting_time_before_remove;
//				if($Today<$dayToRemove){
				?>
                <tr>
                    <td><?php echo $result['reid'] ?></td>
                    <td>
                        <a href="course_details.php?id=<?php echo $result['cid'] ?>">
                        <?php echo $result['title'] ?></a></td>
                    <td>
                        <?php echo date('Y / m / d', $result['date']) ?></td>
                    <td>
                        <?php if($result['status'] == 1 ) { ?>
                            <input class="btn btn-warning btn-sm" value="بانتظار المراجعة">
                            <?php } elseif($result['status'] == 2 ) { ?>
                            <input class="btn btn-success btn-sm" value="حجزك مقبول">
                            <?php } elseif($result['status'] == 3 ) { ?>
                            <input class="btn btn-danger btn-sm" value="حجزك ملغي">
                         <?php } ?>
    					 <?php 
                            if($result['status'] != 3 ) {
            					$cancel_reservation_time = $result['cancel_reservation_time'] * 3600;
            					?>
                                  <a href="?cansel=<?php echo $result['reid'] ?>" class="btn btn-danger">ألغاء حجزك</a>
                        <?php }  ?>


                    </td>
                </tr>
            <?php }
//					} ?>
                                        
           </tbody>
        </table>
                        
       <?php } ?>
                        


  </section>
      <!--/ .section-->

    </div>
    <!--/ #main-->



          <?php include('footer.php') ?>
