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
              <label class="col-sm-2 control-label">عنوان الدورة</label>
              <div class="col-sm-6">
                <input name="title" type="text" class="form-control" id="title" value="<?= $result['title'] ?>" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">تفاصيل الصفحة</label>
              <div class="col-sm-9">
            <textarea name="details" rows="5" class="form-control" id="details"><?= $result['details'] ?>
            </textarea>
              </div>
            </div>


        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                  <input name="btnedit" type="submit" id="btnedit" value="تعديل" class="btn btn-primary">&nbsp;
                  <a href="javascript: history.go(-1)" class="btn btn-default">خروج</a>
				</div>
			 </div>
		  </div><!-- panel-footer -->
        
      </div>
</form>
