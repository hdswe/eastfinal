<form action="?do=send_count" method="get" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    	<input name="do" type="hidden" id="do" value="send_count" />
                   	<input name="page" type="hidden" id="page" value="gender" />

<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">ارسال رسالة الى مجموعة محددة</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
              <label class="col-sm-2 control-label">ارسال الى</label>
              <div class="col-sm-6">
                <div class="rdio rdio-success col-sm-3">
                        <input type="radio" name="gender" value="1" id="radioSuccess">
                        <label for="radioSuccess">بنين</label>
                      </div>
                      
                      <div class="rdio rdio-success col-sm-3">
                        <input type="radio" name="gender" value="2" id="radioSuccess2">
                        <label for="radioSuccess2">بنات</label>
                      </div>
              </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">عدد الرسائل في كل دفعة</label>
              <div class="col-sm-6">
                <input name="count_msg" type="text" class="form-control" id="count_msg" />
              </div>
    </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">عدد الثواني بين كل دفعة</label>
              <div class="col-sm-6">
                <input name="time_msg" type="text" class="form-control" id="time_msg" />
              </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">الرسالة</label>
              <div class="col-sm-6">
                <textarea name="msg" rows="2" class="form-control" id="autoResizeTA"></textarea>
              </div>
    </div>
        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                  <input name="btnsend_count" type="submit" id="btnsend_count" value="ارسال" class="btn btn-primary">&nbsp;
                  <a href="javascript: history.go(-1)" class="btn btn-default">خروج</a>
				</div>
			 </div>
		  </div><!-- panel-footer -->
        
      </div>
</form>
