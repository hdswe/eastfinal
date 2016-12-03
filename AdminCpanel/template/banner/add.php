<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
<?php $addToken = new Token; $addToken->protectForm(); ?> 
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">بيانات البنر</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
              <label class="col-sm-2 control-label">عنوان البنر</label>
              <div class="col-sm-6">
                <input name="title" type="text" class="form-control" id="title" />
              </div>
            </div>
            
            
            
            <div class="form-group">
              <label class="col-sm-2 control-label">رابط البنر</label>
              <div class="col-sm-6">
                <input name="url" type="text" class="form-control" id="url" />
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
            <label class="col-sm-2 control-label">حالة البنر</label>
              <div class="col-sm-6">
                      <div class="rdio rdio-success">
                        <input name="status" type="radio" id="radioSuccess" value="1" checked="checked" />
                        <label for="radioSuccess">اظهار</label>
                      </div>


                      <div class="rdio rdio-danger">
                        <input type="radio" name="status" value="0" id="radioDanger" />
                        <label for="radioDanger">أخفاء</label>
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
