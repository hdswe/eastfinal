<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">حظر العضو عن التسجيل في دورات محددة</h3>
        </div>
        <div class="panel-body">
        <form action="" method="post" id="showform" name="showform" onSubmit="return validate()">
          <div class="table-responsive">
          <div class="mb30">
          <div class="col-sm-7">
          <button name="bannedChecked" type="submit" id="bannedChecked" class="btn btn-primary"><span class="fa fa-eye-slash"></span>&nbsp; حظر العضو عن الدورات المحددة</button>

          
            </div>
        
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
                <th></th>
                <th width="50%">عنوان الدورة</th>
                <th>البرنامج</th>
                <th>الحالة</th>
                </tr>
            </thead>
            <tbody>
                <?
                if(isset($_POST['course_title'])){
                $where = "AND course.title LIKE '%".$_POST['course_title']."%'";
                }
                $sql = "SELECT 
                            course.id AS couid,
                            course.title AS coutitle,
                            course.programs_id,
                            course.status,
                            
                            programs.id AS prid,
                            programs.title AS prtitle
                            
                            FROM
                            `course`, `programs`
                            WHERE
                            programs_id=programs_id AND
                            programs.id = course.programs_id
                            
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
                        <input name="checkbox[]" type="checkbox" value="<?= $result['couid'] ?>" id="checkbox1<?= $result['couid'] ?>">
                        <label for="checkbox1<?= $result['couid'] ?>"></label>
                        </div>
                                                  
                        </td>
                <td><?= $result['coutitle'] ?></td>
                <td><?= $result['prtitle'] ?></td>
                <td><? if($result['status'] == '0') echo 'مفتوحة'; if($result['status'] == '1') echo 'مغلقة'; if($result['status'] == '2') echo 'معطلة'; ?></td>
                </tr>
                <? } } ?>
                
            </tbody>
          </table>
        
          </div>
          </form>
        <div class="row pagin">
          <div class="col-sm-8"><?= pagination($statement,$limit,$page);?></div>
        </div>
          <!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div>
      
      
      
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">دورات محظور فيها مسبقاَ</h3>
        </div>
        <div class="panel-body">
        <form action="" method="post" id="showform" name="showform" onSubmit="return validate()">
          <div class="table-responsive">
          
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
                <th></th>
                <th width="50%">عنوان الدورة</th>
                <th>البرنامج</th>
                <th>الحالة</th>
                </tr>
            </thead>
            <tbody>
                <?
                $sql = "SELECT 
                            course.id AS couid,
                            course.title AS coutitle,
                            course.programs_id,
                            course.status,
                            
                            programs.id AS prid,
                            programs.title AS prtitle,
                            
                            banned_course.id,
                            banned_course.user_id,
                            banned_course.course_id
                            
                            FROM
                            `course`, `programs`, `banned_course`
                            WHERE
                            programs_id=programs_id AND
                            programs.id = course.programs_id AND
                            banned_course.course_id = course.id AND
                            banned_course.user_id = ".$_GET['id']."
                            
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
                        <input name="checkbox[]" type="checkbox" value="<?= $result['couid'] ?>" id="checkbox1<?= $result['couid'] ?>">
                        <label for="checkbox1<?= $result['couid'] ?>"></label>
                        </div>
                                                  
                        </td>
                <td><?= $result['coutitle'] ?></td>
                <td><?= $result['prtitle'] ?></td>
                <td><? if($result['status'] == '0') echo 'مفتوحة'; if($result['status'] == '1') echo 'مغلقة'; if($result['status'] == '2') echo 'معطلة'; ?></td>
                </tr>
                <? } } ?>
                
            </tbody>
          </table>
        
          </div>
          </form>
          <!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div>      