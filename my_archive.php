<?php
    require ("header.php");
    require ("include/Hijri_GregorianConvert.php");
	$DateConv=new Hijri_GregorianConvert;



?>

    <aside id="sidebar" class="medium-3 large-3 columns">
             <?php include('right-pages.php') ?>
 </aside>

    <div class="large-9 columns">

      <section class="section margin-top-off">

        <div class="page-title">
          <h1> الدورات التي التحقت بها</h1>

          <div class="breadcrumbs">
            <a href="home.php" title="">الرئيسية</a>
            <a href="myarchive.php" title="">الدورات التي التحقت بها</a>
          
          </div>
        </div>



<?php if(!isset($_GET['course'])){ ?>
            
                        <?php
                        if(!empty($msg)) {
                               echo '<div data-alert="" class="alert-box secondary">'. $msg .'</div>' ;
                        } else {
                        ?>
                        

                                <table  class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان الدورة</th>
                                            <th>تاريخ التسجيل</th>
                                            <th>أيام الدورة</th>
                                            <th>عدد ايام الحظور</th>
                                            <th>التفاصيل</th>
                                            <th>التقييم</th>
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
                             course.archive,
                             course.day_count,
                             
                             users.id
                             
                             
                             FROM `course`, `reservation`, `users` 
                             
                             WHERE
                             
                             reservation.user_id = users.id AND 
                             reservation.course_id = course.id AND 
                             reservation.status=2 AND
                             users.id=".$_SESSION['user_id'];
                            $rows = $pdo->pdoGetAll($sqlIdCourse);
                            foreach($rows as $result) {

                            ?>
                                        <tr>
                                            <td><?php echo $result['reid'] ?></td>
                                            <td><?php echo $result['title'] ?></td>
                                            <td><?php echo date('Y / m / d', $result['date']) ?></td>
                                            <td><?php echo $result['day_count'] ?> أيام</td>
                                            <td>
                                            <?php 
    $excute_count_day = $pdo->pdoExecute("SELECT * FROM `registr_attend` WHERE course_id=".$result['cid']." AND user_id=".$idUser."");
    $count_day = $pdo->pdoRowCount($excute_count_day);
    echo $count_day." أيام";
                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                            if($count_day == $result['day_count']) {
                                                echo '<a href="?course='.$result['cid'].'">التفاصيل</a>';
                                            } else {
                                                echo 'لم تحضر الدورة';
                                            }
                                            ?>
                                            
                                            </td>
                                            <td>
                                                <?php
                                                $excute_rating = $pdo->pdoExecute("SELECT * FROM `questionnaire` WHERE course_id=".$result['cid']." AND user_id=".$idUser."");
                                                $rating = $pdo->pdoRowCount($excute_rating);

                                                if($rating == 1) {
                                                    echo 'غير متاح حاليا';
                                                } else {
                                                    echo '<a href="questionnaire.php?course='.$result['cid'].'">تقيم الدورة</a>';
                                                }
                                                ?>

                                        </tr>
                                     <?php } ?>
                                        
                                    </tbody>
                                </table>
                                                        <?php } ?>
                       
    <?php } ?>
    
            <?php if(isset($_GET['course'])){ ?>
         
                          
                                    <table class="table-header table-tr"  style="width:100%">
                <thead>
                <tr>  <h3> 
                تقرير الحضور : 
                        <?php
                        $sql_course = "SELECT id,title FROM `course` WHERE `id`=:id";
                        $data_course[id] = $_GET['course'];
                        $result_course = $pdo->pdoGetRow($sql_course, $data_course);
                        echo $result_course['title']."<br><br>
";

                        ?>
                       </h3>    

                 
                   </tr>
              <tr>
                      <th>ID</th>
                <?php 
                $id = $_GET['course'];
                $rows_day = $pdo->pdoGetAll("SELECT * FROM `day_course` WHERE course_id=".$id." ORDER BY `id` DESC");
                foreach($rows_day as $result_day) {

                ?>
                <th>
                <?php
                $format="DD/MM/YYYY";
                $date= $result_day['day'];
                $result_hr=$DateConv->GregorianToHijri($date,$format);
                ?>
                <?php echo $result_hr  ?></th>
                <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT 
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
                        reservation.user_id = users.id AND
                        reservation.status = '2' AND 
                        users.id = ".$idUser." AND
                        course.id = ".$id."
                        ORDER BY `resid` DESC
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
                    
                    foreach($rows as $result) {
                ?>
                <tr class="unread">
                        <td>
                        <?php echo $result['userid'] ?>
                                                  
                        </td>
                <?php 
                $rows_day = $pdo->pdoGetAll("SELECT * FROM `day_course` WHERE course_id=".$id." ORDER BY `id` DESC");
                foreach($rows_day as $result_day) {

                $register_day = $pdo->pdoGetRow("SELECT * FROM `registr_attend` WHERE course_id=".$id." AND day_course_id=".$result_day['id']." AND user_id=".$result['userid']."");

                ?>
                <td><?php if($register_day['id'] != NULL){ echo '<span class="glyphicon glyphicon-ok"></span>'; } else { echo '<span class="glyphicon glyphicon-remove"></span>'; } ?></td>
                    <td><?php if($register_day['id'] != NULL){ echo '<span class="glyphicon glyphicon-ok"></span>'; } else { echo '<span class="glyphicon glyphicon-remove"></span>'; } ?></td>

                <?php }  ?>
                </tr>
                <?php } } ?>
                
            </tbody>
  </table>
    <?php } ?>



       
</section>
      <!--/ .section-->

    </div>



          <?php include('footer.php') ?>

