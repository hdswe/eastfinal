<form action="" method="post" id="showforme" name="showforme">
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">الدورات</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
          <div class="mb30">
            <div class="col-sm-5">
            <div class="form-group">
                <div class="col-sm-10">
                <input name="course_title" type="text" class="form-control input-sm" id="course_title" placeholder="عنوان الدورة">
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
                <th width="50%">عنوان الدورة</th>
                <th>البرنامج</th>
                <th>الاعضاء المنتسبين</th>
                <th>الطباعة</th>
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
                <td><a href="?do=confirmed&course_id=<?= $result['couid'] ?>">شاهد الاعضاء</a></td>
                <td class="table-action">
                        <a href="print_certificate.php?course_id=<?= $result['couid'] ?>" title="طباعة" target="_blank" class="tooltips" data-placement="top" data-toggle="tooltip">طباعة الشهادات</a>
                        
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
