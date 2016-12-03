<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">الأعضاء</h3>
        </div>
        <div class="panel-body">
        <form action="" method="post" id="showform" name="showform" onSubmit="">
          <div class="table-responsive">
          <div class="mb30">
          <div class="col-sm-7">
            <a class="btn btn-primary" href="?do=add"><span class="fa fa-pencil-square-o"></span>&nbsp; اضافة عضو</a>
          <button name="delChecked" type="submit" id="delChecked" class="btn btn-primary"><span class="fa fa-trash-o"></span>&nbsp; حذف المحدد</button>

          
            </div>
        
          <div class="clearfix" style="margin-bottom:20px;"></div>
          <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
               <select name="groups" class="form-control" id="groups">
                    <option>---- أختر المجموعة -----</option>
                    <?
                    $sql_cat = "SELECT * FROM `groups` ORDER BY `id` DESC";
                    $rows_cat = $pdo->pdoGetAll($sql_cat);
                    foreach($rows_cat as $result_cat) {
                    ?>
                    <option value="<?= $result_cat['id'] ?>"><?= $result_cat['title'] ?></option>
                    <? } ?>
                </select>
                
            
            </div>
        </div>
			<div class="col-sm-3">
	<div class="form-group">
<input name="full_name" type="text" class="form-control" id="full_name" placeholder="الاسم">
</div>
            </div>
			<div class="col-sm-3">
	<div class="form-group">
<input name="mobile" type="text" class="form-control" id="mobile" placeholder="رقم الجوال">
</div>
            </div>
			<div class="col-sm-3">	<div class="form-group">
<input name="id_number" type="text" class="form-control" id="id_number" placeholder="رقم بطاقة الاحوال">
</div>
</div>
			<div class="col-sm-3"> <input name="btnsearch" type="submit" class="btn btn-primary" id="btnsearch" value="بحث"  style="margin-top:20px;"></div>
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

        
          <table class="table table-hidaction table-striped mb30" id="table">
            <thead>
              <tr>
                <th width="1"></th>
                <th>اسم العضو</th>
                <th>رقم الجوال</th>
                <th>الجنس</th>
                <th>المجموعة</th>
                <th>تاريخ التسجيل</th>
                <th>ملاحظات</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
                <?
                if(isset($_POST['groups'])&&$_POST['groups']!='---- أختر المجموعة -----'){
                
					if(isset($_GET['page'])&&$_GET['page']!='1'){
						 header('Location: ?do=show&groups='.$_POST['groups']);
					}
					$where = "users.groups_id=".$_POST['groups']."";
                } else if(isset($_POST['groups'])&&$_POST['groups']=='---- أختر المجموعة -----'){
					 header('Location: ?do=show');
				}else if(isset($_GET['groups'])){
					$where = "users.groups_id=".$_GET['groups']."";
				}else {
                $where = "users.groups_id=groups.id";
				$where = "1";
				
				}
				if(isset($_POST['full_name'])) {	$where = "`full_name` LIKE '%".$_POST['full_name']."%'"; }
				if(isset($_POST['mobile'])) {	$where = "`username` LIKE '".$_POST['mobile']."'"; }
				if(isset($_POST['id_number'])) {	$where = "`id_number` LIKE '".$_POST['id_number']."'"; }
                $sql = "SELECT *, users.id AS userid FROM `users`, `groups` WHERE ".$where." AND users.groups_id=groups.id AND users.is_admin='no' ORDER BY users.full_name ASC LIMIT $startpoint , $limit";
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
                        <input name="checkbox[]" type="checkbox" value="<?= $result['userid'] ?>" id="checkbox1<?= $result['userid'] ?>">
                        <label for="checkbox1<?= $result['userid'] ?>"></label>
                        </div>
                                                  
                        </td>
                <td><a href="profile.php?id=<?= $result['userid'] ?>"><?= $result['first_name']." ".$result['middle_name']." ".$result['last_name'] ?></a></td>
                <td><?= $result['username'] ?></td>
                <td><?= $result['gender']?></td>
                <td><?= $result['title']?></td>
                <td><?= date("Y-m-d",$result['date_reg']) ?></td>
                <td class="table-action">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?= $result['userid'] ?>">
  ملاحظات
</button>
                    

</td>
                <td class="table-action">
                        <a href="?do=edit&id=<? echo $result['userid'] ?>" title="تعديل" data-placement="top" data-toggle="tooltip" class="tooltips"><i class="fa fa-pencil"></i></a>
                        <a href="?del=<? echo $result['userid'] ?>" title="حذف" data-placement="top" data-toggle="tooltip" class="tooltips" onclick="return confirm('هل انت متأكد من عملية الحذف؟ هذا الأجراء لايمكن التراجع عنه بعد تنفيذه')"><i class="fa fa-trash-o"></i></a>      
				<a href="?do=note&id=<? echo $result['userid'] ?>" title="كتابة ملاحظات" data-placement="top" data-toggle="tooltip" class="tooltips"><i class="fa fa-question"></i></a>
                        <!-- Modal -->
                    <div class="modal fade" id="myModal<?= $result['userid'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?= $result['userid'] ?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">ملاحظات</h4>
                          </div>
                          <div class="modal-body">
						  
						  <textarea name="notes" for="<?echo $result['userid']?>" rows="10" cols="70" class="form-conrtrol" id="notes"><?= $result['notes']?></textarea>
							</div>
							<!--<input type="hidden" value="<? echo $result['userid'];?>" name="id"/>-->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                            
                            <!--<input name="save_note" type="submit" class="btn btn-primary" id="save_note" value="حفظ">-->
							<a  id="notebtnsave" attr="notebtnsave" class="btn btn-default" for="<?echo $result['userid']?>" href="?id=<?echo $result['userid']?>&note=">حفظ</a>
						
                            
                          </div>
                        </div>
                      </div>
                    </div>

                </td>
              </tr>
                <? } } ?>
                
            </tbody>
          </table>
        
          </div>
          </form>
        <div class="row pagin">
          <div class="col-sm-8"><?= pagination($statement,$limit,$page,$url);?></div>
        </div>
          <!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div>