<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
<?php $addToken = new Token; $addToken->protectForm(); ?> 

<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">خصائص SMS</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
       
        
            <div class="form-group">
              <label class="col-sm-2 control-label">تفعيل ارسال الرسائل عند</label>
              <div class="col-sm-6">
                      
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="register_case" type="checkbox" value="0" id="register_case" <?= $result['register_case'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="register_case">تسجيل طالب في المركز</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="reservation_case" type="checkbox" id="reservation_case" value="0" <?= $result['register_case'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="reservation_case">تأكيد الحجز</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="reservation_cancel_case" type="checkbox" value="0" id="reservation_cancel_case" <?= $result['reservation_cancel_case'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="reservation_cancel_case">الغاء الحجز</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="password_case" type="checkbox" value="0" id="password_case" <?= $result['password_case'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="password_case">تغيير كلمة المرور</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="support_case" type="checkbox" value="0" id="support_case" <?= $result['support_case'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="support_case">الرد على تذكرة الدعم الفني</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="reg_course_case" type="checkbox" value="0" id="reg_course_case" <?= $result['reg_course_case'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="reg_course_case">عند التسجيل في دورة</label>
                </div>
                
                
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="welcome_trainer" type="checkbox" value="0" id="welcome_trainer"<?= $result['welcome_trainer'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="welcome_trainer">الترحيب بمدرب</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="notifyabs" type="checkbox" value="0" id="notifyabs"<?= $result['block_notify'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="notifyabs">التنبيه بالغياب</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="notfiyban" type="checkbox" value="0" id="notfiyban"<?= $result['block_notify'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="notfiyban">التنبيه بالحظر</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="notfiyoban" type="checkbox" value="0" id="notfiyoban"<?= $result['unblock_notify'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="notfiyoban">التنبيه برفع الحظر</label>
                </div>
                              </div>
            </div>
                
                
            <div class="form-group">
              <label class="col-sm-2 control-label">رسالة تسجيل طالب في المركز</label>
              <div class="col-sm-6">
                <textarea name="register_message" rows="2" class="form-control" id="autoResizeTA"><?= $result['register_message'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">رسالة تأكيد الحجز</label>
              <div class="col-sm-6">
                <textarea name="reservation_message" rows="2" class="form-control" id="autoResizeTA"><?= $result['reservation_message'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">رسالة الغاء الحجز</label>
              <div class="col-sm-6">
                <textarea name="reservation_cancel_message" rows="2" class="form-control" id="autoResizeTA"><?= $result['reservation_cancel_message'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">رسالة تغيير كلمة المرور</label>
              <div class="col-sm-6">
                <textarea name="password_message" rows="2" class="form-control" id="autoResizeTA"><?= $result['password_message'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">رسالة الرد على تذكرة الدعم الفني</label>
              <div class="col-sm-6">
                <textarea name="support_message" rows="2" class="form-control" id="autoResizeTA"><?= $result['support_message'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">رسالة التسجيل في دورة</label>
              <div class="col-sm-6">
                <textarea name="reg_course_message" rows="2" class="form-control" id="autoResizeTA"><?= $result['reg_course_message'] ?></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="col-sm-2 control-label">رسالة الترحيب بمدرب</label>
              <div class="col-sm-6">
                <textarea name="welcome_trainer_message" rows="2" class="form-control" id="autoResizeTA"><?= $result['welcome_trainer_message'] ?></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="col-sm-2 control-label">رسالة التنبيه بالغياب</label>
              <div class="col-sm-6">
                <textarea name="absence_notify_message" rows="2" class="form-control" id="autoResizeTA"><?= $result['absence_notify_message'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">رسالة التنبيه بالحظر</label>
              <div class="col-sm-6">
                <textarea name="block_notify_message" rows="2" class="form-control" id="autoResizeTA"><?= $result['block_notify_message'] ?></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="col-sm-2 control-label">رسالة التنبيه برفع الحظر</label>
              <div class="col-sm-6">
                <textarea name="unblock_notify_message" rows="2" class="form-control" id="autoResizeTA"><?= $result['unblock_notify_message'] ?></textarea>
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