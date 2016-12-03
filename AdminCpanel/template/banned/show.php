<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">حظر الأعضاء</h3>
        </div>
        <div class="panel-body">
        <form action="" method="post" id="showform" name="showform" onSubmit="return validate()">
          <div class="table-responsive">
          <div class="mb30">
          <div class="col-sm-7">
            <a class="btn btn-primary" href="?do=add"><span class="fa fa-pencil-square-o"></span>&nbsp; حظر عضو</a>
          <button name="delChecked" type="submit" id="delChecked" class="btn btn-primary"><span class="fa fa-trash-o"></span>&nbsp; حذف المحدد</button>
           <a class="btn btn-primary" href="banned_report.php"><span class="fa fa-pencil-square-o"></span>&nbsp; تقارير الحظر</a>

          
            </div>
        <div class="col-sm-5">
            <div class="form-group">
                <div class="col-sm-10">
                <input name="title" type="text" class="form-control input-sm" id="title" placeholder="إسم العضو">
                </div>
            <div class="col-sm-2">
                <input name="btnsearch" type="submit" class="btn btn-primary" id="btnsearch" value="بحث">
                </div>
            </div>
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
              <? if ($_GET['process'] == 'not_exist') { ?>
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <p>رقم البطاقة خطأ أو أن الشخص غير مسجل لدينا</p>
                  </div>
              <? } ?>
        
          <table class="table table-hidaction table-striped mb30">
            <thead>
              <tr>
                <th width="1"></th>
                <th width="50%">اسم العضو</th>
                <th>عدد ساعات الحظر</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
                <?
                if(isset($_POST['course_title'])){
                $where = "AND course.title LIKE '%".$_POST['course_title']."%'";
                }
                $sql = "SELECT
				users.id, users.full_name, 
				banned_course.id AS banned_id, banned_course.user_id, banned_course.banned_time
				FROM
				 `banned_course`, `users`
				 WHERE
				 users.id_number = banned_course.user_id
				 AND
				 banned_course.end_time>".time()."
				  LIMIT $startpoint , $limit";
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
                        <input name="checkbox[]" type="checkbox" value="<?= $result['banned_id'] ?>" id="checkbox1<?= $result['banned_id'] ?>">
                        <label for="checkbox1<?= $result['banned_id'] ?>"></label>
                        </div>
                                                  
                        </td>
                <td><a href="profile.php?id=<?= $result['banned_id'] ?>"><?= $result['full_name'] ?></a></td>
                <td><?= $result['banned_time'] ?></td>
                <td class="table-action">
                        <a href="?do=edit&id=<? echo $result['banned_id'] ?>" title="تعديل" data-placement="top" data-toggle="tooltip" class="tooltips"><i class="fa fa-pencil"></i></a>
                        <a href="?del=<? echo $result['banned_id'] ?>" title="حذف" data-placement="top" data-toggle="tooltip" class="tooltips" onclick="return confirm('هل انت متأكد من عملية الحذف؟ هذا الأجراء لايمكن التراجع عنه بعد تنفيذه')"><i class="fa fa-trash-o"></i></a>
                        
                        
                </td>
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