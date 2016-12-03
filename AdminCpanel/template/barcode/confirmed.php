<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">الحجوزات المؤكدة</h3>
        </div>
        <div class="panel-body">
        <form action="" method="post" id="showform" name="showform" onSubmit="return validate()">
          <div class="table-responsive">
          <div class="mb30">
          <div class="col-sm-7">
                <button type="submit" name="RegistrAttend" class="btn btn-primary"><span class="fa fa-pencil-square-o"></span> &nbsp; تحضير</button>
            </div>
        <div class="col-sm-5"></div>
          <div class="clearfix"></div>
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
                      <th>&nbsp;</th>
                <th width="50%">الاسم</th>
                <th>رقم الجوال</th>
                <th>الحي</th>
                <th>المسجد</th>
                <th>تاريخ الحجز</th>
              </tr>
            </thead>
            <tbody>
                <?
				$course = $_GET['course']; 
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
                        users.full_name,
						users.mosque_id,
						
						mosque.id,
						mosque.title AS mosq_title
                        
                        FROM `reservation`,`course`,`users`,`mosque`

                        WHERE
						course.id = reservation.course_id AND
                        reservation.course_id = ".$course." AND
                        reservation.user_id = users.id AND
                        reservation.status = '2' AND
						users.mosque_id = mosque.id

                        
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
                        <div class="ckbox ckbox-success">
                        <input name="checkbox[]" type="checkbox" value="<?= $result['userid'] ?>" id="checkbox1<?= $result['userid'] ?>">
                        <label for="checkbox1<?= $result['userid'] ?>"></label>
                        </div>
                                                  
                        </td>
                <td><a href="profile.php?id=<?= $result['userid'] ?>"><?= $result['full_name'] ?></a><br>
                       <small> الدورة: <?= $result['title'] ?> </small></td>
                <td><?= $result['username'] ?></td>
                <td><?= $result['location'] ?></td>
                <td><?= $result['mosq_title'] ?></td>
                <td><span title="<?= date('H:i:s - Y/m/d', $result['date']) ?>" data-placement="top" data-toggle="tooltip" class="tooltips" type="button"><?= date('Y/m/d', $result['date']) ?></span></td>
              </tr>
                <? } } ?>
                
            </tbody>
          </table>
        
          </div>
          </form>
          <!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div>
      