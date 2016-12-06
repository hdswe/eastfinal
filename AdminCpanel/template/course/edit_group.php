<style>
  .form-control {height: 45px;} 
</style>
<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
<?php $addToken = new Token; $addToken->protectForm(); ?> 
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">بيانات الدورة</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
              <label class="col-sm-12 control-label">قم باعادة التأكد من الفئات المطلوبة</label>
              
            </div>
            

            
            <div class="form-group">
              <label class="col-sm-2 control-label">الفئة</label>
              <div class="col-sm-8">
                <?
               	    $course_id=$_GET['id'];
               	    $sql_course_groups = $pdo->pdoGetRow("SELECT groups_id FROM `course` WHERE id=".$course_id);
               	    $group_fields = explode(",",$sql_course_groups['groups_id']);
                    $sql_groups = "SELECT * FROM `groups` ORDER BY `id` ASC";
                    $rows_groups = $pdo->pdoGetAll($sql_groups);
                    $checked="";
                    foreach($rows_groups as $result_groups) {
						$checked="";
						

	                    foreach($group_fields as $groupid){
	                    	if($groupid==$result_groups['id']){
	                    		
	                    		$checked='checked="checked"';
	                    	}
						
			}
	                    
	                    
                ?>

                <div class="ckbox ckbox-success col-sm-4">
                    <input name="groups_id[]" type="checkbox" id="pr_login_admin<?= $result_groups['id'] ?>" value="<?= $result_groups['id'] ?>" <?echo $checked;?> />
                    <label for="pr_login_admin<?= $result_groups['id'] ?>"><?= $result_groups['title'] ?></label>
                </div>
                <? 
                	
                } ?>
              </div>
            </div>
            
            
            

        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                  <input name="btnedit_group" type="submit" id="btnedit_group" value="تعديل" class="btn btn-primary">&nbsp;
                  <a href="javascript: history.go(-1)" class="btn btn-default">خروج</a>
				</div>
			 </div>
		  </div><!-- panel-footer -->
        
      </div>
</form>