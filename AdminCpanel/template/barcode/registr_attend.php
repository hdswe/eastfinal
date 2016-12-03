<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">تحضير يدوي</h3>
        </div>
        <div class="panel-body">
        <form action="" method="post" id="showform" name="showform">
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

        <div class="mb30">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-10">
                <select name="programs" class="form-control" id="programs">
                    <option>---- أختر البرنامج -----</option>
                    <?
                    $sql_cat = "SELECT * FROM `programs` ORDER BY `id` DESC";
                    $rows_cat = $pdo->pdoGetAll($sql_cat);
                    foreach($rows_cat as $result_cat) {
                    ?>
                    <option value="<?= $result_cat['id'] ?>"><?= $result_cat['title'] ?></option>
                    <? } ?>
                </select>
                </div>
            <div class="col-sm-2">
                <input name="btnsearch" type="submit" class="btn btn-primary" id="btnsearch" value="تصفية">
                </div>
            </div>
        </div>
          <div class="clearfix"></div>
          </div>
          
          <table class="table table-hidaction table-striped mb30">
            <thead>
              <tr>
                <th width="60%">الدورات</th>
                <th>استعراض الحضور</th>
                </tr>
            </thead>
            <tbody>
                <?
                if(isset($_POST['programs'])){
                $where = " WHERE programs_id=".$_POST['programs']."";
                } 
                $sql = "SELECT * FROM `course` $where";
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
                        <td><?= $result['title'] ?></td>
                <td><a href="?do=confirmed&course=<?= $result['id'] ?>">استعراض الحضور  (
                        <?
                $query_rev_confirm = $pdo->pdoExecute("SELECT * FROM `reservation` WHERE status=2 AND course_id=".$result['id']."");
                
               $num_rev = $pdo->pdoRowCount($query_rev_confirm);
               echo $num_rev;
                ?> )</a></td>
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