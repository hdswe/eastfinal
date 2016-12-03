<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">البرامج</h3>
        </div>
        <div class="panel-body">
        <form action="" method="post" id="showform" name="showform">
          <div class="table-responsive">
<div class="mb30">
          <div class="col-sm-7">
            <a class="btn btn-primary" href="?do=add"><span class="fa fa-pencil-square-o"></span>&nbsp; اضافة برنامج</a>

          
            </div>
        <div class="col-sm-5">
            <div class="form-group">
                <div class="col-sm-10">
                <input name="title" type="text" class="form-control input-sm" id="title" placeholder="عنوان البرنامج">
                </div>
            <div class="col-sm-2">
                <input name="btnsearch" type="submit" class="btn btn-primary" id="btnsearch" value="بحث">
                </div>
            </div>
        </div>
          <div class="clearfix"></div>
          </div>                  <? if ($_GET['process'] == 'successfully') { ?>
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
                <th width="1"></th>
                <th width="50%">اسم البرنامج</th>
                <th>حالة النشر</th>
                <th>الدورات داخل هذا البرنامج</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
                <?
                if(isset($_POST['title'])){
                $where = "WHERE title LIKE '%".$_POST['title']."%'";
                }
                $sql = "SELECT * FROM `programs` WHERE archive='no' ".$where." ORDER BY `id` DESC LIMIT $startpoint , $limit";
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
                        <input name="checkbox[]" type="checkbox" value="<?= $result['id'] ?>" id="checkbox1<?= $result['id'] ?>">
                        <label for="checkbox1<?= $result['id'] ?>"></label>
                        </div>
                                                  
                        </td>
                <td><?= $result['title'] ?></td>
                <td class="table-action"><?= $result['published'] == 'yes' ? "منشور" : "غير منشور" ?></td>
                <td class="table-action">
                <?
				$course_sql = "SELECT * FROM `course` where programs_id=".$result['id']."";
				$Execute_course_sql = $pdo->pdoExecute($course_sql);
				$count_course = $pdo->pdoRowCount($Execute_course_sql);
				echo $count_course;

				?>
                </td>
                <td class="table-action">
                        <a href="?do=edit&id=<? echo $result['id'] ?>" title="تعديل" data-placement="top" data-toggle="tooltip" class="tooltips"><i class="fa fa-pencil"></i></a>
                        <a href="?do=delete&id=<? echo $result['id'] ?>" title="حذف" data-placement="top" data-toggle="tooltip" class="tooltips" onclick="return confirm('هل انت متأكد من عملية الحذف؟ هذا الأجراء لايمكن التراجع عنه بعد تنفيذه')"><i class="fa fa-trash-o"></i></a>

                        <a href="?do=delete_archive&id=<? echo $result['id'] ?>" title="أرشفة البرنامج" data-placement="top" data-toggle="tooltip" class="tooltips" onclick="return confirm('هل انت متأكد من أرشفة البرنامج؟ سيتم أرشفة جميع الدورات داخل هذا البرنامج')"><i class="fa fa-eye-slash"></i></a>
                        
                </td>
              </tr>
                <? } } ?>
                
            </tbody>
          </table>
        <div class="row pagin">
          <div class="col-sm-8"><?= pagination($statement,$limit,$page);?></div>
        </div>
          </div>
          </form>
          <!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div>