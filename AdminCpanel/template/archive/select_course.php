﻿<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
<?php $addToken = new Token; $addToken->protectForm(); ?> 
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">بيانات الأرشيف</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
        <input name="program_id" type="hidden" id="program_id" value="<?= $_GET['program'] ?>">
            <div class="form-group">
              <label class="col-sm-2 control-label">الدورة</label>
              <div class="col-sm-6">
                <select name="course_id" class="form-control" id="course_id">
                <?
                    $sql = "SELECT * FROM `course` WHERE programs_id=".$_GET['program']." ORDER BY `id` DESC";
                    $rows = $pdo->pdoGetAll($sql);
                    foreach($rows as $result) {
                ?>
                    <option value="<?= $result['id']; ?>"><?= $result['title']; ?></option>
                <? } ?>
                </select>
              </div>
            </div>

<div class="form-group">
              <label class="col-sm-2 control-label">الملف</label>
              <div class="col-sm-6">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="input-append">
                    <div class="uneditable-input">
                      <i class="glyphicon glyphicon-file fileupload-exists"></i>
                      <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-default btn-file">
                      <span class="fileupload-new">اختيار ملف</span>
                      <span class="fileupload-exists">تغيير</span>
                      <input name="fileattach" type="file" id="fileattach" />
                    </span>
                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">حذف</a>
                  </div>
                </div>
              </div>
            </div>
            
        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                  <input name="btnadd" type="submit" id="btnadd" value="اضافة" class="btn btn-primary">&nbsp;
                  <a href="javascript: history.go(-1)" class="btn btn-default">خروج</a>
				</div>
			 </div>
		  </div><!-- panel-footer -->
        
      </div>
</form>
