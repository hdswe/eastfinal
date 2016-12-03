<?php
    require ("header.php");

#############################################################
# Check Login User
#############################################################
	if ($UserLoggedIn->isLoggedIn() == false) {
		header('Location: login.php');
	}

#############################################################
# Check Ban User
#############################################################

	$sql_banned = "SELECT * FROM `banned_course` where user_id=:user_id ORDER BY id LIMIT 1";
	$data_banned[user_id] = $idUser;
	$result_banned = $pdo->pdoGetRow($sql_banned, $data_banned);
	if($result_banned['end_time'] > time()){
		$banned = 'yes';
	}
		
#############################################################
# Get Details Course
#############################################################
    if(isset($_GET['id'])){
		$id_course = get_safe($_GET['id']);
		$sqlIdCourse = "SELECT * FROM `course` WHERE `id`=:id";
		$dataIdCourse[id] = $id_course;
		$ExecuteSql = $pdo->pdoExecute($sqlIdCourse, $dataIdCourse);
		if($pdo->pdoRowCount($ExecuteSql) == 1){
            $result = $pdo->pdoGetRow($sqlIdCourse, $dataIdCourse);
            $hide_fields = explode(",",$result['hide_fields']);
            $ftitle             = $hide_fields[0];
            $fprograms_id       = $hide_fields[1];
            $fgroups_id         = $hide_fields[2];
            $fday_count         = $hide_fields[3];
            $fdate_h            = $hide_fields[4];
            $ftime              = $hide_fields[5];
            $ftrainer           = $hide_fields[6];
            $flocation          = $hide_fields[7];
            $fdependence_date   = $hide_fields[8];
            $fdependence_number = $hide_fields[9];
            $fmap               = $hide_fields[10];
            $fdetails           = $hide_fields[11];
            $fcon_reg           = $hide_fields[12];
			
			
            $group_fields = explode(",",$result['groups_id']);
			//check register group
			if (in_array($groupsUser,$group_fields)) {
				$registergroup = 'yes';
			} else {
				$registergroup = 'no';
			}


					
 		} else {
            header('Location: 404.php');
		}
    }else{
        header('Location: 404.php');
    }

#############################################################
# Check Register Course
#############################################################

    if(isset($_GET['id'])){
		$id_course = get_safe($_GET['id']);
		$sqlIdRes = "SELECT * FROM `reservation` WHERE `course_id`=:id AND `user_id`=:user_id";
		$dataIdRes[id] = $id_course;
		$dataIdRes[user_id] = $idUser;
		$resultRes = $pdo->pdoGetRow($sqlIdRes, $dataIdRes);
        $statusReservation = $resultRes['status'];
        
		$sqlIdUser = "SELECT * FROM `users` WHERE `id`=:id";
		$dataIdUser[id] = $idUser;
		$resultuser= $pdo->pdoGetRow($sqlIdUser , $dataIdUser);
    }
	

#############################################################
# Reservation Course
#############################################################
    if (isset($_POST['btnsend'])) {
		if($_GET['b'] == 'y') {
        header('Location: ?id='.$id_course.'&b='.$_GET['b'].'&do=banned');
		}
		else {
		$data['course_id']  = $id_course;
		$data['user_id']    = $idUser;
		$data['barcode']    = $id_course.$idUser;
		$data['status']     = '1';
		$data['date']       = time();
        $insert = $pdo->pdoInsUpd('reservation', $data);
        header('Location: ?b='.$_GET['b'].'&id='.$id_course.'&do=successfully');
        }
	}
#############################################################
# Cancel Reservation Course
#############################################################
    if (isset($_POST['btncancel'])) {
		$data['status']     = '3';
        $where[id] 			= $resultRes['id'];
        $update = $pdo->pdoInsUpd('reservation', $data, 'update', $where);
        header('Location: ?id='.$id_course.'&do=cansel_successfully');
        }

	if(isset($_GET['cancel'])){
		$id_reservation = get_safe($_GET['cancel']);
		$data['status']     = '3';
        $where[id] 			= $id_reservation;
        $update = $pdo->pdoInsUpd('reservation', $data, 'update', $where);
        echo 'hi';
        header('Location: ?id='.$id_course.'&do=cansel_successfully');
	}

?>

<aside id="sidebar" class="medium-4 large-4 columns">
  <?php include('right-pages.php') ?>
</aside>
<div class="large-8 columns">
  <section class="section margin-top-off">
    <div class="page-title">
      <h1> <?php echo $result['title'] ?></h1>
      <div class="breadcrumbs"> <a href="home.php" title="">الرئيسية</a> <a href="course_details.php?id=<?php echo $result['id'] ?>" title=""> <?php echo $result['title'] ?></a> </div>
    </div>
    <form method="post">
      <?php if(isset($_GET['do']) and $_GET['do'] == 'successfully') { ?>
      <div class="alert alert-success" role="alert"> تم تسجيلك في الدورة, سيتم ابلاغك من قبل الادارة برسالة على جوالك فور تفعيلك </div>
      <?php } ?>
      <?php if(isset($_GET['do']) and $_GET['do'] == 'cansel_successfully') { ?>
      <div class="" role="alert">
        <p class="error"> تم الغاء حجزك في هذه الدورة بنجاح <a class="alert-close" href="#"></a></p>
      </div>
      <?php } ?>
      <?php if(isset($_GET['do']) and $_GET['do'] == 'banned') { ?>
      <div class="" role="alert">
        <p class="error"> انت محظور ولا يمكنك التسجيل في هذه الدورة <a class="alert-close" href="#"></a></p>
      </div>
      <?php } ?>
      <table class="table table-striped table-bordered">
        <tbody>
          <?php if($ftitle == 1){ ?>
          <tr>
            <th>عنوان الدور</th>
            <td><?php echo $result['title'] ?></td>
          </tr>
          <?php } ?>
          <?php if($fprograms_id == 1){ ?>
          <tr>
            <th>الفئة</th>
            <td><?
					$sql_groups = $pdo->pdoGetAll("SELECT * FROM `groups` ORDER BY `id` DESC");
                    foreach($sql_groups as $result_groups) {
                        $required_groupsr = explode(",", $result['groups_id']);
                    if(in_array($result_groups['id'], $required_groupsr)) { echo $result_groups['title'].", ";
					 }
					}
											?></td>
          </tr>
          <?php } ?>
          <?php if($fday_count == 1){ ?>
          <tr>
            <th>عدد الايام</th>
            <td><?php echo $result['day_count'] ?></td>
          </tr>
          <?php } ?>
          <?php if($fdate_h == 1){ ?>
          <tr>
            <th>تاريخ الدورة </th>
            <td><?php echo $result['date_h'] ?></td>
          </tr>
          <?php } ?>
          <?php if($ftime == 1){ ?>
          <tr>
            <th>الوقت </th>
            <td><?php echo $result['time'] ?></td>
          </tr>
          <?php } ?>
          <?php if($ftrainer == 1){ ?>
          <tr>
            <th>المدرب </th>
            <td><?php echo $result['trainer'] ?></td>
          </tr>
          <?php } ?>
          <?php if($flocation == 1){ ?>
          <tr>
            <th>المكان </th>
            <td><?php echo $result['location'] ?></td>
          </tr>
          <?php } ?>
          <?php if($fdetails == 1){ ?>
          <tr>
            <th>أهداف الدورة </th>
            <td><?php echo $result['details'] ?></td>
          </tr>
          <?php } ?>
          <?php if($fcon_reg == 1){ ?>
          <tr>
            <th>شروط التسجيل</th>
            <td><?php echo $result['con_reg'] ?></td>
          </tr>
          <?php } ?>
          <?php if($fdependence_number == 1){ ?>
          <tr>
            <th>رقم الاعتماد </th>
            <td><?php echo $result['dependence_number'] ?></td>
          </tr>
          <?php } ?>
          <?php if($fdependence_date == 1){ ?>
          <tr>
            <th>تاريخ الاعتماد </th>
            <td><?php echo $result['dependence_date'] ?></td>
          </tr>
          <?php } ?>
          <?php if($result['map'] != ''){ ?>
          <tr>
            <th>الكروكي </th>
            <td><a href="data/images/<?php echo $result['map'] ?>" target="_blank">لمشاهدة الكروكي اضغط هنا</a></td>
          </tr>
          <?php } ?>
          <?php if($statusReservation == 1){ ?>
          <tr>
            <th>حالة التسجيل </th>
            <td><input class="btn btn-warning" value="بانتظار المراجعة"></td>
          </tr>
          <?php } ?>
          <?php if($statusReservation == 2){ ?>
          <tr>
            <th colspan="2"><img style="display:block;" src="tools/barcode/test_1D.php?text=<?php echo $resultRes['barcode'] ?>" alt="barcode" /> <br>
            <a href="generatebarcode.php?id=<?php echo $resultRes['id'] ?>&course=<?php echo $_GET['id'] ?>" target="_blank" class="btn btn-success" >طباعة ورقة الحظور</a></th>
          <tr>
            <?php } ?>
            <?php  if($day2 > $Today){  ?>
            <td><a href="<?php echo '?id='.$id_course.'&cancel='.$resultRes['id'] ?>" class="button large defaultr" >إلغاء حجزك</a> 
              <!--?id=<?$id_course?>&cansel=<?php echo $resultRes['id'] ?>--></td>
          </tr>
          <?php } ?>
          <?php if($statusReservation == 3){ ?>
          <tr>
            <td>حالة التسجيل </td>
            <td><input class="btn btn-danger" value="حجزك ملغي" /></td>
          </tr>
          <?php } ?>
          <?php  if($banned == 'yes'){ ?>
          <tr>
            <td>حالة التسجيل </td>
            <td><input class="btn btn-danger" value="حجزك ملغي" /></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <tr>
        <?php      if($banned == 'yes') 
                            { 

                            echo '<input class="btn btn-danger" value="الحساب محظور">';

                            } else 
                            { 
                            if ($statusReservation == NULL) {
                                if ($result['open_close_register'] == '1') 
                                {
                                    $this_day = time();
                                    $open_register_date = strtotime($result['open_register_date']);
                                    $close_register_date = strtotime($result['close_register_date']);
                                    if ($open_register_date > $this_day)
                                     {
                                        echo '<div class="alert alert-info" role="alert">لم يتم فتح التسجيل في هذه الدورة حتى الان سيتم فتح التسجيل في تاريخ ' . $result['open_register_date'] . '</div>';
                                     }
                                    elseif ($close_register_date < $this_day) 
                                    {

                                        echo '<input class="btn btn-danger" value="التسجيل مغلق">';
                                    }
                                    else 
                                    {
                                        if($registergroup == 'yes')
                                        {
                                           echo '<input name="btnsend" class="btn btn-primary" type="submit" id="btnsend" value="التسجيل في الدورة">';

                                        } elseif($registergroup == 'no')
                                        {
                                            echo '<p class="alert alert-danger">الفئة الخاصة بك غير مسموح لها بالتسجيل في هذه الدورة</p>';
                                        }
                                    }
                                }
                            
                                if ($result['open_close_register'] == '0') {
                                    if($registergroup == 'yes'){
                                     echo '<input name="btnsend" class="btn btn-primary" type="submit" id="btnsend" value="التسجيل في الدورة">';

                                    } elseif($registergroup == 'no'){
                                        echo '<p class="alert alert-danger">الفئة الخاصة بك غير مسموح لها بالتسجيل في هذه الدورة</p>';
                                    }
                                }
                            
                                if ($statusReservation == 1) {
                                    $day1 = strtotime($result['date_m']);
                                    $day2 = $day1 - 172800;
                                    if ($day1 < $day2) {
                                        echo '<input type="submit" name="btncancel" class="btn btn-danger" id="btncancel" value="ألغاء حجزك">';
                                    }
                                }
                            }

                        }
                            ?>
      </tr>
    </form>
  </section>
  <!--/ .section--> 
  
</div>
<?php include('footer.php') ?>
