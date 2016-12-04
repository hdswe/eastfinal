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
          <div class="col-sm-4">
            <a class="btn btn-primary" href="?do=add"><span class="fa fa-pencil-square-o"></span>&nbsp; اضافة دورة</a>
          <button name="delChecked" type="submit" id="delChecked" class="btn btn-primary"><span class="fa fa-trash-o"></span>&nbsp; حذف المحدد</button>

          
            </div>
        <div class="col-sm-8">
        <div class="row">
		<div class="col-sm-5">
            <div class="form-group">
            <select class="form-control chosen-select" data-placeholder="اختر البرنامج">
                  <option value=""></option>
                  <?
				$sql = "SELECT * FROM `programs` WHERE archive='no' ORDER BY `id` DESC";
				$rows = $pdo->pdoGetAll($sql);
				foreach($rows as $result) {

				?>
                  <option value="United States"><?= $result['title'] ?></option>
				<? } ?>
                </select>
            </div>
            </div>
                <div class="col-sm-6">
                <input name="course_title" type="text" class="form-control input-sm" id="course_title" placeholder="عنوان الدورة">
                </div>
            <div class="col-sm-1">
                <input name="btnsearch" type="submit" class="btn btn-primary" id="btnsearch" value="بحث">
                </div>
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


        
          <table class="table table-hidaction table-striped mb30 draggable" id="courseStorable">
            <thead>
              <tr>
                <th></th>
                <th>عنوان الدورة <span style="width: 200px;background-image: url(images/sort_icon.png)">&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
<!--                <th>رابط الاستبيان</th>-->
                <th>البرنامج <span style="width: 200px;background-image: url(images/sort_icon.png)">&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
                <th>الحالة <span style="width: 200px;background-image: url(images/sort_icon.png)">&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
                <th>أيام الدورة<span style="width: 200px;background-image: url(images/sort_icon.png)">&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
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
                            course.programs_id,
                            course.status,
							course.archive,
                            course.day_count AS days, 
                            
                            programs.id AS prid,
                            programs.title AS prtitle
                            
                            FROM
                            `course`, `programs`
                            WHERE
                            programs_id=programs_id AND
                            programs.id = course.programs_id AND
							course.archive = 'no'
							ORDER BY course.id ASC
							LIMIT $startpoint , $limit
							
                            
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
<!--                <td><a href="../questionnaire.php?course=--><?//= $result['couid'] ?><!--">questionnaire.php?course=--><?//= $result['couid'] ?><!--</a></td>-->
                <td><?= $result['prtitle'] ?></td>
                <td><?
				if ($result['status'] == '1') {
					echo 'مفتوحة';
				} elseif ($result['status'] == '2') {
					echo 'ملغاة';
				} elseif ($result['status'] == '3') {
					echo 'مؤجلة';
				}
				?></td>
				<td>
				
				<?
				                $sql_day = "SELECT * FROM `day_course` WHERE course_id=".$result['couid']."";
                            
               
                    $ExecuteSql_day = $pdo->pdoExecute($sql_day);



                    
						?>
				<? if($pdo->pdoRowCount($ExecuteSql_day) >= 1){echo '<span style="color:green">مضاف</span>';}else{echo '<span style="color:red">غير مضاف</span>';} ?></td>
                <td class="table-action"> 
                        <a href="?do=edit&id=<? echo $result['couid'] ?>" title="تعديل" data-placement="top" data-toggle="tooltip" class="tooltips"><i class="fa fa-pencil"></i></a>
                        <a href="?del=<? echo $result['couid'] ?>" title="حذف" data-placement="top" data-toggle="tooltip" class="tooltips" onclick="return confirm('هل انت متأكد من عملية الحذف؟ هذا الأجراء لايمكن التراجع عنه بعد تنفيذه')"><i class="fa fa-trash-o"></i></a>
                        
                        <a href="?do=show_day&id=<? echo $result['couid'] ?>" title="أيام الدورات" data-placement="top" data-toggle="tooltip" class="tooltips"><i class="fa fa-calendar"></i></a>
                        
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
                  </div>

        </div><!-- panel-body -->
      </div>
      
                </form>