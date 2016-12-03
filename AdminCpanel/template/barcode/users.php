<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">تسجيل حضور الاعضاء المؤكدين في الدورة</h3>
        </div>
        <div class="panel-body">
        <form action="" method="post" id="showform" name="showform" onsubmit="return validate()">
          <div class="table-responsive">
          <div class="mb30">
                <a href="print_attendance_reports.php?course=<?= $_GET['course'] ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span> &nbsp; طباعة الأعضاء</a>

              
        </div>
        
    <? if ($_GET['process'] == 'successfully') { ?>
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>تمت العملية بنجاح</p>
              </div>
         <? } ?>
        <? if ($_GET['process'] == 'failure') { ?>

              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>حدث خطأ قم بالتحقق وأعد المحاولة مرة اخرى</p>
              </div>
        <? } ?>
        <table class="table table-hidaction table-striped mb30">
                <thead>
              <tr>
                      <th>ID</th>
                <th width="70%">الاسم</th>
                <? 
				$id = $_GET['course'];
				$rows_day = $pdo->pdoGetAll("SELECT * FROM `day_course` WHERE course_id=".$id." ORDER BY `id` DESC");
				foreach($rows_day as $result_day) {

				?>
                <th><?= $result_day['day'] ?></th>
                <? } ?>
                </tr>
            </thead>
            <tbody>
                <?
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
                        <?= $result['userid'] ?>
                                                  
                        </td>
                <td><a href="profile.php?id=<?= $result['userid'] ?>"><?= $result['full_name'] ?></a><br>
                       <small> الدورة: <?= $result['title'] ?> </small></td>
                <? 
				$rows_day = $pdo->pdoGetAll("SELECT * FROM `day_course` WHERE course_id=".$id." ORDER BY `id` DESC");
				foreach($rows_day as $result_day) {

				$register_day = $pdo->pdoGetRow("SELECT * FROM `registr_attend` WHERE course_id=".$id." AND day_course_id=".$result_day['id']." AND user_id=".$result['userid']."");

				?>
                <td><? if($register_day['id'] != NULL){ echo '<span class="glyphicon glyphicon-ok"></span>'; } else { echo '<span class="glyphicon glyphicon-remove"></span>'; } ?></td>
                <? } ?>
                </tr>
                <? } } ?>
                
            </tbody>
  </table>
        <div class="row pagin">
          <div class="col-sm-8"><?


            ?></div>
          <div class="col-sm-4"><?    
 ?></div>
        </div>
          </div>
          </form>
          <!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div>
      