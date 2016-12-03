<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
<?php $addToken = new Token; $addToken->protectForm(); ?> 
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">بيانات العضو</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
        <div class="form-group">
              <label class="col-sm-2 control-label">رقم بطاقة الاحوال / الاقامة </label>
              <div class="col-sm-6">
                <input name="id_number" type="text" required class="form-control" id="id_number">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">عدد الساعات</label>
              <div class="col-sm-6">
                <input name="banned_time" type="text" required class="form-control" id="banned_time">
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
