<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">أرشيف البرامج</h3>
        </div>
        <div class="panel-body">
        <form action="" method="post" id="showform" name="showform">
          <div class="table-responsive"><? if ($_GET['process'] == 'successfully') { ?>
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
                <th>الدورات داخل البرنامج</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
                <?
                if(isset($_POST['title'])){
                $where = "WHERE title LIKE '%".$_POST['title']."%'";
                }
                $sql = "SELECT * FROM `programs` WHERE archive='yes' ".$where." ORDER BY `id` DESC LIMIT $startpoint , $limit";
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
                <td><?
				$course_sql = "SELECT * FROM `course` where programs_id=".$result['id']."";
				$Execute_course_sql = $pdo->pdoExecute($course_sql);
				$count_course = $pdo->pdoRowCount($Execute_course_sql);
				echo $count_course;

				?></td>
				<td class="table-action">
                <a href="?do=unarchive&id=<? echo $result['id'] ?>" title="ألغاء أرشفة البرنامج" data-placement="top" data-toggle="tooltip" class="tooltips" onclick="return confirm('هل انت متأكد من ألغاء أرشفة البرنامج؟ سيتم ألغاء  أرشفة جميع الدورات داخل هذا البرنامج')"><i class="fa fa-eye-slash"></i></a>
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