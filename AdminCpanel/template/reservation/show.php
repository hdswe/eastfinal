<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">الحجوزات المقدمة</h3>
        </div>
        <div class="panel-body">
        <form action="" method="post" id="showform" name="showform" >
        <input name="category_filter" type="hidden" id="category_filter" value="<?= $_POST['category'] ?>">
          <div class="table-responsive">
          <div class="mb30">
          <div class="col-sm-7">
                <button type="submit" name="activeChecked" class="btn btn-primary"><span class="fa fa-check-square-o"></span> &nbsp; تأكيد حجز المحدد</button>

                <button type="submit" name="unActiveChecked" class="btn btn-primary"><span class="fa fa-trash-o"></span> &nbsp; ألغاء حجز المحدد</button>
            </div>
        <div class="col-sm-5">
            <div class="form-group">
                <div class="col-sm-10">
                <select name="category" class="form-control" id="category">
                    <option>---- اختر الدورة -----</option>
                    <?
                    $sql_cat = "SELECT * FROM `course` WHERE archive='no' ORDER BY `id` DESC";
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

        
          <table class="table table-hidaction table-striped mb30" id="reservationTabel" class ="draggable">
            <thead>
              <tr>
                <th>&nbsp;
					
				</th>
				
                <th width="25%">الاسم <span style="width: 200px;background-image: url(images/sort_icon.png)">&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
                <th>رقم الجوال <span style="width: 200px;background-image: url(images/sort_icon.png)">&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
                <th>الفئة &nbsp;<span style="width: 200px;background-image: url(images/sort_icon.png)">&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
                <th>الحي &nbsp;<span style="width: 200px;background-image: url(images/sort_icon.png)">&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
                <th>المسجد <span style="width: 200px;background-image: url(images/sort_icon.png)">&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
                <th>الحضور &nbsp;<span style="width: 200px;background-image: url(images/sort_icon.png)">&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
                <th>الغياب &nbsp;<span style="width: 200px;background-image: url(images/sort_icon.png)">&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
               
                <th>تاريخ الحجز <span style="width: 200px;background-image: url(images/sort_icon.png)">&nbsp;&nbsp;&nbsp;&nbsp;</span></th>
                <th>ملاحظات</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
                <?
                if(isset($_POST['category'])){
                $where = "reservation.course_id = ".$_POST['category']." AND";
                }elseif($_GET['category_filter'] != ''){
                $where = "reservation.course_id = ".$_GET['category_filter']." AND";
				}
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
						users.mosque_name,
						users.neighborhood_id,
						users.neighborhood_name,
						
						
						groups.title As gtitle
                        
                        FROM `reservation`,`course`,`users`,groups
                        
                        WHERE
                        
                        reservation.course_id = course.id AND
                        $where
                        reservation.user_id = users.id AND
                        reservation.status = '1' AND
						
						groups.id=users.groups_id
                        
                        ORDER BY `date` DESC
                        
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
                        <input name="checkbox[]" type="checkbox" value="<?= $result['resid'] ?>" id="checkbox1<?= $result['resid'] ?>">
                        
                        <label for="checkbox1<?= $result['resid'] ?>"></label>
                        <input name="cat_hid" type="hidden" id="cat_hid" value="<?= $_POST['category']?>">
                        </div>
                                                  
                        </td>
                <td><a href="profile.php?id=<?= $result['userid'] ?>"><?= $result['full_name'] ?></a><br>
                       <small> الدورة: <?= $result['title'] ?> </small></td>
                <td><?= $result['username'] ?></td>
				
                <td><?= $result['gtitle'] ?></td>
                <td><? if( $result['neighborhood_id']=='0' ){
					echo $result['neighborhood_name'];
				}else{
					$resultN=$pdo->pdoGetRow("SELECT title FROM neighborhood WHERE id=".$result['neighborhood_id']);
					echo $resultN['title'];
				}
				
				?></td>
                <td><? if( $result['mosque_id']=='0' ){
					echo $result['mosque_name'];
				}else{
					$resultM=$pdo->pdoGetRow("SELECT title FROM mosque WHERE id=".$result['mosque_id']);
					echo $resultM['title'];
				}
				
				?></td>
                <td>
                <?			
                            /*$sql_reservation_course = "SELECT
                             reservation.id AS reid,
                             reservation.user_id,
                             reservation.course_id,
                             reservation.date,
                             reservation.status,

                             course.id AS cid,
							 course.day_count,
                             
                             users.id AS uid,
							 users.notes
                             
                             
                             FROM `course`, `reservation`, `users` 
							 
							 WHERE
                             
                             reservation.user_id = users.id AND 
                             reservation.course_id = course.id AND
							 users.id = ".$result['userid']."
							 ORDER BY `date` DESC
                             
                             ";
							 $execute_sql_reservation_course = $pdo->pdoExecute($sql_reservation_course);
							 $count_reservation_course = $pdo->pdoRowCount($execute_sql_reservation_course);

							 
                            $rows = $pdo->pdoGetAll($sql_reservation_course);
							$i = 0;
                            foreach($rows as $result2) {

							$excute_count_day = $pdo->pdoExecute("SELECT * FROM `registr_attend` WHERE course_id=".$result2['cid']." AND user_id=".$result2['uid']."");
							$count_day = $pdo->pdoRowCount($excute_count_day);
							if($result2['day_count'] == $count_day){
							$i++;
							}


							}
							echo $i;
							*/
							$sql_course_attendance="SELECT day_course_id FROM registr_attend WHERE course_id=".$result['coid']." AND user_id=".$result['userid'];
							$execute_sql_course_attendance = $pdo->pdoExecute($sql_course_attendance);
							$count_course_attendance = $pdo->pdoRowCount($execute_sql_course_attendance);
							echo $count_course_attendance;
							

							
				
				?>
                </td>
                <td>
					<?
					$Today=date("m/d/Y");
					$sql_course_attendance="
					SELECT 
						day_course.day	
					FROM
						day_course,reservation
					WHERE
						day_course.course_id=".$result['coid']."
						AND
						reservation.course_id=day_course.course_id
						AND
						reservation.user_id=".$result['userid']."
						AND
						day_course.day<'".$Today."'
						AND
						reservation.user_id NOT IN(
						SELECT 
						registr_attend.user_id
						FROM registr_attend
						
						WHERE
							registr_attend.course_id=".$result['coid']."
						)
						
						;
					";
							$execute_sql_course_attendance = $pdo->pdoExecute($sql_course_attendance);
							$count_course_attendance = $pdo->pdoRowCount($execute_sql_course_attendance);
							echo $count_course_attendance;?>
				</td>
                <td><span title="<?= date('H:i:s - Y/m/d', $result['date']) ?>" data-placement="top" data-toggle="tooltip" class="tooltips" type="button"><?= date('Y/m/d', $result['date']) ?></span></td>
                <td class="table-action"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?= $result2['uid'] ?>">
  ملاحظات
</button></td>
                <td class="table-action">
                    <a href="?confirmed=<? echo $result['resid'] ?>&category_filter=<?= $_POST['category']?>" title="تأكيد الحجز" data-placement="top" data-toggle="tooltip" class="tooltips"><i class="fa fa-check-square-o"></i></a>
                    
                    <a href="?canceled=<? echo $result['resid'] ?>&category_filter=<?= $_POST['category']?>" title="ألغاء الحجز" data-placement="top" data-toggle="tooltip" class="tooltips" onclick="return confirm('هل انت متأكد من عملية الحذف؟ هذا الأجراء لايمكن التراجع عنه بعد تنفيذه')"><i class="fa fa-times"></i></a>
                    <div class="modal fade" id="myModal<?= $result2['uid'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?= $result2['uid'] ?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">ملاحظات</h4>
                          </div>
                          <div class="modal-body">
                          
<?= $result2['notes']?>                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
              </tr>
                <? } } ?>
                
            </tbody>
          </table>
        <div class="row pagin">
          <div class="col-sm-8"><?= pagination($statement,$limit,$page,$url) ?></div>
        </div>
		
          </div>
		  
          </form>
		  <button name="CheckALL" id="CheckAll" class="btn btn-primary"><span class="fa fa-check-square-o"></span> تحديد الكل</button>
          <!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div>
      