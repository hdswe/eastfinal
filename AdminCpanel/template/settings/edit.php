<style>
  .form-control {height: 45px;} 
</style>
<div class="row">
<div class="col-md-12 mb30">
          
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="active"><a href="#home" data-toggle="tab"><strong>إعددات عامة</strong></a></li>
          <li><a href="#profile" data-toggle="tab"><strong>إعددات SMS</strong></a></li>
          <li><a href="#menu" data-toggle="tab"><strong>القوائم المسندلة</strong></a></li>
          <li><a href="#social" data-toggle="tab"><strong>مواقع التواصل الاجتماعي</strong></a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content mb30">
        <? if ($_GET['edit'] == 'successfully') { ?>
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>تم حفظ التعديلات بنجاح</p>
              </div>
         <? } ?>
        <? if ($_GET['edit'] == 'error') { ?>

              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>حدث خطأ قم بالتحقق من كتابة البيانات وأعد المحاولة مرة اخرى</p>
              </div>
        <? } ?>
              
          <div class="tab-pane active" id="home">
<div class="panel panel-default">
    <form method="post" class="form-horizontal form-bordered">
            <?php 
            $addToken = new Token; 
            $addToken->protectForm(); 
            ?> 
        <div class="panel-body panel-body-nopadding">
          
            <div class="form-group">
              <label class="col-sm-2 control-label">عنوان الموقع</label>
              <div class="col-sm-6">
                <input name="site_name" type="text" required class="form-control" id="site_name" value="<?= $row['site_name'] ?>">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">الشعار</label>
              <div class="col-sm-6">
                <input name="description" type="text" required class="form-control" id="description" value="<?= $row['description'] ?>">
                <span class="help-block">بكلمات قليلة، أكتب نبذة قصيرة عن الموقع.</span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">الكلمات المفتاحية</label>
              <div class="col-sm-6">
                      <input name="keyword" required class="form-control" id="keyword" value="<?= $row['keyword'] ?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">عنوان الموقع (URL)</label>
              <div class="col-sm-6">
                <input name="site_url" type="text" required class="form-control" id="site_url" value="<?= $row['site_url'] ?>">
              </div>
            </div>
          
            <div class="form-group">
              <label class="col-sm-2 control-label">عنوان البريد الإلكتروني</label>
              <div class="col-sm-6">
                <input name="site_email" type="text" required class="form-control" id="site_email" value="<?= $row['site_email'] ?>">
                <span class="help-block">هذا البريد الإلكتروني سيستخدم لأغراض الإدارة فقط، مثل التبليغ عن تسجيل عضو جديد.</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">التسجيل</label>
              <div class="col-sm-8">
                      
                <div class="ckbox ckbox-success col-sm-6">
                    <input name="register_case" type="checkbox" value="1" id="register_case" <? if($row['register_case'] == 1) echo 'checked="checked"'; ?>>
                    <label for="register_case">السماح بتسجيل العضو</label>
                </div>


                <div class="ckbox ckbox-success col-sm-6">
                    <input name="register_trainer" type="checkbox" value="1" id="register_trainer" <? if($row['register_trainer'] == 1) echo 'checked="checked"'; ?>>
                    <label for="register_trainer">السماح بتسجيل المدرب</label>
                </div>

              </div>
            </div>
            
            

        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                <input name="btnsave" type="submit" class="btn btn-primary" id="btnsave" value="حفظ">
				</div>
			 </div>
		  </div><!-- panel-footer -->
</form>
      </div>
          </div>
          <div class="tab-pane" id="profile">
            
            
            <form method="post" class="form-horizontal form-bordered">
            <?php 
            $addToken = new Token; 
            $addToken->protectForm(); 
            ?> 

        <div class="panel-body panel-body-nopadding">
          
            <div class="form-group">
              <label class="col-sm-2 control-label">بوابة الأرسال</label>
              <div class="col-sm-6">
                <input name="sms_gateway" type="text" required class="form-control" id="sms_gateway" value="<?= $row['sms_gateway'] ?>">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">اسم المستخدم</label>
              <div class="col-sm-6">
                <input name="sms_username" type="text" required class="form-control" id="sms_username" value="<?= $row['sms_username'] ?>">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">كلمة المرور</label>
              <div class="col-sm-6">
                      <input name="sms_password" required class="form-control" id="sms_password" value="<?= $row['sms_password'] ?>" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">اسم المرسل</label>
              <div class="col-sm-6">
                <input name="sms_sender" type="text" required class="form-control" id="sms_sender" value="<?= $row['sms_sender'] ?>">
              </div>
            </div>

          

        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                <input name="btnsavesms" type="submit" class="btn btn-primary" id="btnsavesms" value="حفظ">
				</div>
			 </div>
		  </div><!-- panel-footer -->
</form>


          </div>
          
      
      <div class="tab-pane" id="menu">
            
            
            <form method="post" class="form-horizontal form-bordered">
            <?php 
            $addToken = new Token; 
            $addToken->protectForm(); 
            ?> 

        <div class="panel-body panel-body-nopadding">
          
            <div class="form-group">
              <label class="col-sm-2 control-label">قائمة المسجد</label>
              <div class="col-sm-6">
                <div class="rdio rdio-success">
                        <input name="mosque" type="radio" id="mosque1" value="yes" <?= $row['menu_mosque'] == 'yes' ? "checked='checked'" : "" ?>/>
                        <label for="mosque1">مفعل</label>
                </div>
                      <div class="rdio rdio-danger">
                        <input name="mosque" type="radio" id="mosque2" value="no" <?= $row['menu_mosque'] == 'no' ? "checked='checked'" : "" ?>/>
                        <label for="mosque2">ملغي</label>
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">قائمة الحي</label>
              <div class="col-sm-6">
                <div class="rdio rdio-success">
                        <input name="neighborhood" type="radio" id="Neighborhood1" value="yes" <?= $row['menu_neighborhood'] == 'yes' ? "checked='checked'" : "" ?>/>
                        <label for="Neighborhood1">مفعل</label>
                </div>
                      <div class="rdio rdio-danger">
                        <input name="neighborhood" type="radio" id="Neighborhood2" value="no" <?= $row['menu_neighborhood'] == 'no' ? "checked='checked'" : "" ?>/>
                        <label for="Neighborhood2">ملغي</label>
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">قائمة المركز</label>
              <div class="col-sm-6">
                <div class="rdio rdio-success">
                        <input name="center" type="radio" id="center1" value="yes" <?= $row['menu_center'] == 'yes' ? "checked='checked'" : "" ?>/>
                        <label for="center1">مفعل</label>
                </div>
                      <div class="rdio rdio-danger">
                        <input name="center" type="radio" id="center2" value="no" <?= $row['menu_center'] == 'no' ? "checked='checked'" : "" ?>/>
                        <label for="center2">ملغي</label>
                </div>
              </div>
            </div>
            
            
        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                <input name="btnsavemenu" type="submit" class="btn btn-primary" id="btnsavemenu" value="حفظ">
				</div>
			 </div>
		  </div><!-- panel-footer -->
</form>


          </div>
          

<div class="tab-pane" id="social">
            
            
            <form method="post" class="form-horizontal form-bordered">
            <?php 
            $addToken = new Token; 
            $addToken->protectForm(); 
            ?> 

        <div class="panel-body panel-body-nopadding">
          
            <div class="form-group">
              <label class="col-sm-2 control-label">فيسبوك</label>
              <div class="col-sm-6">

     
      <input name="fb" type="text" class="form-control"placeholder="ادخل رابط فيسبوك" id="usr">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">تويتر</label>
              <div class="col-sm-6">

<input name="tw" type="text" class="form-control"placeholder="ادخل رابط تويتر" id="usr">

              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">قووقل بلس</label>
              <div class="col-sm-6">

      <input name="go" type="text" class="form-control"placeholder=" ادخل رابط قوقل بلس" id="usr">

              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">انستغرام</label>
              <div class="col-sm-6">

      <input name="ins" type="text" class="form-control"placeholder="ادخل رابط انستغرام" id="usr">
              </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">يوتيوب</label>
                <div class="col-sm-6">

                        <input name="yo" type="text" class="form-control"placeholder="ادخل رابط يوتيوب" id="usr">
                </div>
            </div>
            
        </div><!-- panel-body -->
        
        <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
                <input name="btnsavesocial" type="submit" class="btn btn-primary" id="btnsavemenu" value="حفظ">
        </div>
       </div>
      </div><!-- panel-footer -->
</form>


          </div>


        </div>
        
      
        
      </div>
</div>