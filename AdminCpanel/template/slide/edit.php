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
          <h4 class="panel-title">بيانات السلايد</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
              <label class="col-sm-2 control-label">عنوان السلايد</label>
              <div class="col-sm-6">
                <input name="title" type="text" class="form-control" id="title" value="<?=  $result['title'] ?>" />
              </div>
            </div>
            
            
            
            <div class="form-group">
              <label class="col-sm-2 control-label">رابط السلايد</label>
              <div class="col-sm-6">
                <input name="url" type="text" class="form-control" id="url" value="<?=  $result['url'] ?>" />
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">الصورة الحالية</label>
              <div class="col-sm-6">
                <img src="../data/images/<?=  $result['image'] ?>" width="200"  alt=""/>
                <input name="images_old" type="hidden" id="images_old" value="<?=  $result['image'] ?>">
              </div>
            </div>

        <div class="form-group">
              <label class="col-sm-2 control-label">الصورة</label>
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
                      <input name="fileimage" type="file" id="fileimage" />
                    </span>
                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">حذف</a>
                  </div>
                </div>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">التفاصيل</label>
              <div class="col-sm-6">
                <textarea name="details" rows="5" class="form-control" id="autoResizeTA"><?=  $result['details'] ?>
                </textarea>
              </div>
            </div>

		

            <div class="form-group">
              <label class="col-sm-2 control-label">حالة السلايد</label>
              <div class="col-sm-6">
                      <div class="rdio rdio-success">
                        <input name="status" type="radio" id="radioSuccess" value="1" <?= $result['status'] == '1' ? "checked='checked'" : "" ?> />
                        <label for="radioSuccess">اظهار</label>
                      </div>


                      <div class="rdio rdio-danger">
                        <input type="radio" name="status" value="0" id="radioDanger" <?= $result['status'] == '0' ? "checked='checked'" : "" ?> />
                        <label for="radioDanger">أخفاء</label>
                      </div>


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