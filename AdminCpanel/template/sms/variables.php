<form action="?do=send_count" method="get" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    	<input name="do" type="hidden" id="do" value="send_count" />
                   	<input name="page" type="hidden" id="page" value="gender" />

<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">متغيرات الرسائل</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
        
            <div class="form-group">
            
            <div class="col-sm-3">
                <label class="col-sm-12 control-label">عنوان الدورة</label>
                <input type="text" class="form-control col-sm-12" value="cTitle" readonly />
            </div>

            <div class="col-sm-3">
                <label class="col-sm-12 control-label">البرنامج</label>
                <input type="text" class="form-control col-sm-12" value="cPrograms" readonly />
            </div>

            <div class="col-sm-3">
                <label class="col-sm-12 control-label">تاريخ الدورة بالهجري</label>
                <input type="text" class="form-control col-sm-12" value="cDate" readonly />
            </div>

            <div class="col-sm-3">
                <label class="col-sm-12 control-label">وقت الدورة</label>
                <input type="text" class="form-control col-sm-12" value="cTime" readonly />
            </div>

            </div>



<div class="form-group">
            
            <div class="col-sm-3">
                <label class="col-sm-12 control-label">الفئة</label>
                <input type="text" class="form-control col-sm-12" value="cGroups" readonly />
            </div>

            <div class="col-sm-3">
                <label class="col-sm-12 control-label">حالة الدورة</label>
                <input type="text" class="form-control col-sm-12" value="cStatus" readonly />
            </div>

            <div class="col-sm-3">
                <label class="col-sm-12 control-label">عدد ايام الدورة</label>
                <input type="text" class="form-control col-sm-12" value="cDayCount" readonly />
            </div>

            <div class="col-sm-3">
                <label class="col-sm-12 control-label">المدرب</label>
                <input type="text" class="form-control col-sm-12" value="cTrainer" readonly />
            </div>

            </div>
            


<div class="form-group">
            
            <div class="col-sm-3">
                <label class="col-sm-12 control-label">اسم العضو الأول</label>
                <input type="text" class="form-control col-sm-12" value="uFirstName" readonly />
            </div>

            <div class="col-sm-3">
                <label class="col-sm-12 control-label">الأسم الكامل</label>
                <input type="text" class="form-control col-sm-12" value="uFullName" readonly />
            </div>

            <div class="col-sm-3">
                <label class="col-sm-12 control-label">رقم الجوال</label>
                <input type="text" class="form-control col-sm-12" value="uMobile" readonly />
            </div>

            <div class="col-sm-3">
                <label class="col-sm-12 control-label">الايميل</label>
                <input type="text" class="form-control col-sm-12" value="uEmail" readonly />
            </div>

            </div>
            
            <?             
            $old_string = "welcome to the world of PHP";
            $new_string = str_replace("PHP", www.montadaphp.net, $old_string);
            echo $new_string;

            ?>
            

            
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
