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
            <label class="col-sm-2 control-label">اسم العضو</label>
              <div class="col-sm-2">
                <input name="first_name" type="text" class="form-control" id="first_name" placeholder="الاسم الأول">
              </div>
              <div class="col-sm-2">
                <input name="father_name" type="text" class="form-control" id="father_name" placeholder="اسم الأب">
              </div>
              <div class="col-sm-2">
                <input name="grand_father_name" type="text" class="form-control" id="grand_father_name" placeholder="اسم الجد">
              </div>

              <div class="col-sm-2">
                <input name="family_name" type="text" class="form-control" id="family_name" placeholder="اسم العائلة">
              </div>

            </div>

<div class="form-group">
              <label class="col-sm-2 control-label">أسم المستخدم</label>
              <div class="col-sm-6">
                <input name="username" type="text" required class="form-control" id="username" placeholder="0599157410">
              </div>
            </div>
            
<div class="form-group">
              <label class="col-sm-2 control-label">كلمة المرور</label>
              <div class="col-sm-6">
                <input name="password" type="password" required class="form-control" id="password">
              </div>
            </div>  
            
            <div class="form-group">
              <label class="col-sm-2 control-label">الايميل</label>
              <div class="col-sm-6">
                <input name="email" type="email" required class="form-control" id="email">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">الجنس</label>
              <div class="col-sm-6">
                <select name="gender" class="form-control mb15" id="type">
                  <option value="ذكر">ذكر</option>
                  <option value="انثى">انثى</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">الصلاحيات</label>
              <div class="col-sm-8">
                      
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_login_admin" type="checkbox" value="1" id="pr_login_admin" <?= $result['pr_login_admin'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_login_admin">الدخول على لوحة التحكم</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_settings" type="checkbox" id="pr_settings" value="1" <?= $result['pr_settings'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_settings">التحكم في الاعددات</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_course" type="checkbox" value="1" id="pr_course" <?= $result['pr_course'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_course">التحكم في الدورات</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_reservation" type="checkbox" value="1" id="pr_reservation" <?= $result['pr_reservation'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_reservation">التحكم في الحجوزات</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_group" type="checkbox" value="1" id="pr_group" <?= $result['pr_group'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_group">التحكم في المجموعات</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_support" type="checkbox" value="1" id="pr_support" <?= $result['pr_support'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_support">التحكم في الدعم الفني</label>
                </div>
             
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_pages" type="checkbox" value="1" id="pr_pages" <?= $result['pr_pages'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_pages">التحكم في الصفحات</label>
                </div>
                
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_barcode" type="checkbox" value="1" id="pr_barcode" <?= $result['pr_barcode'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_barcode">التحكم في الباركود</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_revenues" type="checkbox" value="1" id="pr_revenues" <?= $result['pr_revenues'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_revenues">التحكم في الايرادات</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_city" type="checkbox" value="1" id="pr_city" <?= $result['pr_city'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_city">التحكم في المدن</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_reports" type="checkbox" value="1" id="pr_reports" <?= $result['pr_reports'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_reports">التحكم في التقارير</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_users" type="checkbox" value="1" id="pr_users" <?= $result['pr_users'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_users">التحكم في الاعضاء</label>
                </div>
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="pr_sms" type="checkbox" value="1" id="pr_sms" <?= $result['pr_sms'] == '0' ? "checked='checked'" : "" ?>>
                    <label for="pr_sms">التحكم في SMS</label>
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
