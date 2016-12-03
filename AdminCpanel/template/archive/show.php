<form action="" method="post" id="showforme" name="showforme">
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">الأرشيف</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
          <div class="mb30">
          <div class="col-sm-7">
            <a class="btn btn-primary" href="?do=select_program"><span class="fa fa-pencil-square-o"></span>&nbsp; اضافة أرشيف</a>
          <button name="delChecked" type="submit" id="delChecked" class="btn btn-primary"><span class="fa fa-trash-o"></span>&nbsp; حذف المحدد</button>

         
            </div>
        <div class="col-sm-5">
            <div class="form-group">
                <div class="col-sm-10">
                <input name="title" type="text" class="form-control input-sm" id="title" placeholder="عنوان الأرشيف">
                </div>
            <div class="col-sm-2">
                <input name="btnsearch" type="submit" class="btn btn-primary" id="btnsearch" value="بحث">
                </div>
            </div>
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
                <th width="50%">البرنامج - الدورة</th>
                <th>تاريخ اضافة الملف</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
                <?
                if(isset($_POST['title'])){
                $where = "WHERE title LIKE '%".$_POST['title']."%'";
                }
                $sql = "SELECT * FROM `archive` ".$where." ORDER BY `id` DESC";
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
                <td>
                <?
				$sql_program = "SELECT * FROM `programs` where id=:program_id";
				$data_program[program_id] = $result['program_id'];
				$result_program = $pdo->pdoGetRow($sql_program, $data_program);
				
				$sql_course = "SELECT * FROM `course` where id=:course_id";
				$data_course[course_id] = $result['course_id'];
				$result_course = $pdo->pdoGetRow($sql_course, $data_course);
				
				echo $result_program['title'];
				echo " - ";
				echo $result_course['title'];
				?>
                </td>
                <td><?= date('Y/m/d', $result['date_file']) ?></td>
                <td class="table-action">
                        <a href="?del=<? echo $result['id'] ?>" title="حذف" data-placement="top" data-toggle="tooltip" class="tooltips" onclick="return confirm('هل انت متأكد من عملية الحذف؟ هذا الأجراء لايمكن التراجع عنه بعد تنفيذه')"><i class="fa fa-trash-o"></i></a>

                        <a href="../data/files/<? echo $result['file'] ?>" title="تحميل الملف" data-placement="top" data-toggle="tooltip" class="tooltips"><i class="fa fa-download"></i></a>
                         
                                                
                </td>
              </tr>
                <? } } ?>
                
            </tbody>
          </table>
        <div class="row pagin">
          <div class="col-sm-8"><?= pagination($statement,$limit,$page,$url) ?></div>
        </div>
          </div>
          <!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div>
      
                </form>
