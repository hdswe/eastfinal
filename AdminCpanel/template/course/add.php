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
                <input name="title" type="text" required class="form-control" id="title" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ')"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">البرنامج</label>
              <div class="col-sm-6">
                <select name="programs_id" required class="form-control" id="programs_id">
                	<option value=""></option>
                <?
                    $sql = "SELECT * FROM `programs` ORDER BY `id` DESC";
                    $rows = $pdo->pdoGetAll($sql);
                    foreach($rows as $result) {
                ?>
              
                    <option value="<?= $result['id']; ?>"><?= $result['title']; ?></option>
                <? } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">الفئة</label>
              <div class="col-sm-8">
                <?
                    $sql_groups = "SELECT * FROM `groups` ORDER BY `id` ASC";
                    $rows_groups = $pdo->pdoGetAll($sql_groups);
                    foreach($rows_groups as $result_groups) {
                ?>
                <div class="ckbox ckbox-success col-sm-4">
                    <input name="groups_id[]" type="checkbox" value="<?= $result_groups['id'] ?>" id="pr_login_admin<?= $result_groups['id'] ?>">
                    <label for="pr_login_admin<?= $result_groups['id'] ?>"><?= $result_groups['title'] ?></label>
                </div>
                <? } ?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">عدد الأيام</label>
              <div class="col-sm-6">
				<select name="day_count" class="form-control">
                <? for($i=0; $i<101; $i++) { ?>
				  <option value="<?= $i ?>"><?= $i ?></option>
                <? } ?>		
                </select>

              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"> عدد الساعات اليومية</label>
                <div class="col-sm-6">
                    <select name="day_hours" class="form-control">
                        <? for($i=1; $i<25; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <? } ?>
                        </select>

                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">تاريخ الدورة بالهجري</label>
              <div class="col-sm-6">
              <div class="input-group mb15">
                <input name="date_h" type="text" class="form-control" id="date_h" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ')"/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">تاريخ الدورة بالميلادي</label>
              <div class="col-sm-6">
              <div class="input-group mb15">
                <input name="date_m" type="text" required class="form-control" id="date_m" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ')"/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
              </div>
            </div>

                        
            <div class="form-group">
              <label class="col-sm-2 control-label">الوقت</label>
              <div class="col-sm-6">
                <input name="time" type="text" required class="form-control" id="time" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ')"/>
              </div>
            </div>

		<div class="form-group">
              <label class="col-sm-2 control-label">عدد ساعات الغاء الحجز</label>
              <div class="col-sm-6">
                <input name="cancel_reservation_time" type="text" class="form-control" id="cancel_reservation_time" onchange="try{setCustomValidity('')}catch(e){}" value="1" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ')"/>
              </div>
          </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">المدرب</label>
              <div class="col-sm-6">
                <input name="trainer" type="text" required class="form-control" id="trainer" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ')"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">مكان انعقاد الدورة</label>
              <div class="col-sm-6">
                <input name="location" type="text" required class="form-control" id="location" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('لايمكن ترك الحقل فارغ')"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">رقم الأعتماد</label>
              <div class="col-sm-6">
                <input name="dependence_number" type="text" class="form-control" id="dependence_number" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">تاريخ الأعتماد</label>
              <div class="col-sm-6">
              <div class="input-group mb15">
                <input name="dependence_date" type="text" class="form-control" id="dependence_date" />
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
              </div>
            </div>
            
        <div class="form-group">
              <label class="col-sm-2 control-label">الكروكي</label>
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
              <label class="col-sm-2 control-label">أهداف الدورة</label>
              <div class="col-sm-6">
			<textarea name="details" id="wysiwyg" placeholder="" class="form-control" rows="5"></textarea>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">شروط التسجيل</label>
              <div class="col-sm-6">
			<textarea name="con_reg" id="con_reg" placeholder="" class="form-control" rows="5"></textarea>
              </div>
            </div>
            
<div class="form-group">
              <label class="col-sm-2 control-label">أخفاء الحقول</label>
              <div class="col-sm-8">
                      
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="ftitle" type="checkbox" value="1" id="ftitle">
                    <label for="ftitle">عنوان الدورة</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="fprograms_id" type="checkbox" id="fprograms_id" value="1">
                    <label for="fprograms_id">البرنامج</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="fgroups_id" type="checkbox" value="1" id="fgroups_id">
                    <label for="fgroups_id">الفئة</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="fday_count" type="checkbox" value="1" id="fday_count">
                    <label for="fday_count">عدد الأيام</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="fdate_h" type="checkbox" value="1" id="fdate_h">
                    <label for="fdate_h">تاريخ الدورة بالهجري</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="ftime" type="checkbox" value="1" id="ftime">
                    <label for="ftime">الوقت</label>
                </div>
             
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="ftrainer" type="checkbox" value="1" id="ftrainer">
                    <label for="ftrainer">المدرب</label>
                </div>
                
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="flocation" type="checkbox" value="1" id="flocation">
                    <label for="flocation">مكان انعقاد الدورة</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="fdependence_number" type="checkbox" value="1" id="fdependence_number">
                    <label for="fdependence_number">رقم الأعتماد</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="fdependence_date" type="checkbox" value="1" id="fdependence_date">
                    <label for="fdependence_date">تاريخ الأعتماد</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="fmap" type="checkbox" value="1" id="fmap">
                    <label for="fmap">الكروكي</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="fdetails" type="checkbox" value="1" id="fdetails">
                    <label for="fdetails">أهداف الدورة</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="fcon_reg" type="checkbox" value="1" id="fcon_reg">
                    <label for="fcon_reg">شروط التسجيل</label>
                </div>
                


              </div>
            </div>
            
            
            <div class="form-group">
              <label class="col-sm-2 control-label">فتح واغلاق التسجيل التلقائي</label>
              <div class="col-sm-3">
                      <div class="rdio rdio-success">
                        <input name="open_close_register" type="radio" id="radioSuccess1" value="1" />
                        <label for="radioSuccess1">مفعل</label>
                      </div>


                      <div class="rdio rdio-danger">
                        <input name="open_close_register" type="radio" id="radioDanger1" value="0" checked="checked" />
                        <label for="radioDanger1">ملغي</label>
                      </div>


              </div>
                <div class="col-sm-3">
                <input name="open_register_date" type="text" class="form-control" id="open_register_date" placeholder="فتح التسجيل" />
                </div>
                <div class="col-sm-3">
                <input name="close_register_date" type="text" class="form-control" id="close_register_date" placeholder="اغلاق التسجيل" />
                </div>

            </div>
            
            
            
            <div class="form-group">
              <label class="col-sm-2 control-label">حالة الدورة</label>
              <div class="col-sm-6">
                      <div class="rdio rdio-success">
                        <input name="status" type="radio" id="radioSuccess" value="1" checked="checked" />
                        <label for="radioSuccess">مفتوحة</label>
                      </div>


                      <div class="rdio rdio-warning">
                        <input type="radio" name="status" value="2" id="radioWarning" />
                        <label for="radioWarning">ملغاة</label>
                      </div>


                      <div class="rdio rdio-danger">
                        <input type="radio" name="status" value="3" id="radioDanger2" />
                        <label for="radioDanger2">مؤجلة</label>
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