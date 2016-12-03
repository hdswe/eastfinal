<form action="" method="post" id="showforme" name="showforme">
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">أيام الدورة</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
          <div class="mb30">
          <div class="col-sm-7">
            <a class="btn btn-primary" href="?do=add_day&id=<?= $_GET['id'] ?>"><span class="fa fa-pencil-square-o"></span>&nbsp; اضافة يوم</a>
          <button name="delChecked_day" type="submit" id="delChecked" class="btn btn-primary"><span class="fa fa-trash-o"></span>&nbsp; حذف المحدد</button>
          </div>
          <div class="clearfix"></div>
          </div>        
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
                <th width="50%">اليوم</th>
                <th>الدورة</th>
                <th>&nbsp;</th>
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
                            
                            day_course.id AS day_id,
                            day_course.course_id,
                            day_course.day
                            
                            FROM
                            `course`, `day_course`
                            WHERE
                            day_course.course_id=course.id AND
                            course.id = ".$_GET['id']."
                            
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
                        <input name="checkbox[]" type="checkbox" value="<?= $result['day_id'] ?>" id="checkbox1<?= $result['day_id'] ?>">
                        <label for="checkbox1<?= $result['day_id'] ?>"></label>
                        </div>
                                                  
                        </td>
                <td><?= $result['day'] ?></td>
                <td><?= $result['coutitle'] ?></td>
                <td class="table-action">
                        <a href="?del_day=<? echo $result['day_id'] ?>&id=<?= $_GET['id'] ?>" title="حذف" data-placement="top" data-toggle="tooltip" class="tooltips" onclick="return confirm('هل انت متأكد من عملية الحذف؟ هذا الأجراء لايمكن التراجع عنه بعد تنفيذه')"><i class="fa fa-trash-o"></i></a>
                                                
                </td>
              </tr>
                <? } } ?>
                
            </tbody>
          </table>
        
          </div>
          <!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div>
      
                </form>
