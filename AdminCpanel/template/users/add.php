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
              <label class="col-sm-2 control-label">رقم الجوال</label>
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
                <label class="col-sm-2 control-label">المسمى الوظيفي </label>
                                      <div class="col-sm-6">
                                    <select name="groups_id" required class="form-control" id="groups_id">

                                                                                <option value="5">مشرف</option>
                                                                                <option value="6">معلم</option>
                                                                                <option value="7">اداري</option>
                                                                                <option value="8">طالب</option>
                                                                                <option value="9">غير ذلك</option>
                                                                                </select>

                                         </div>
            </div>
                                         
            <div class="form-group">
              <label class="col-sm-2 control-label">المدينة</label>
              <div class="col-sm-6">
                <input name="city" class="form-control" id="city">
              </div>
            </div>
            
			<div class="form-group">
              <label class="col-sm-2 control-label">الحي</label>
              <div class="col-sm-6">
                                            <select name="location" required class="form-control" id="location">

                                        <?
                                            $sql_neighborhood = "SELECT * FROM `neighborhood` ORDER BY `id` ASC";
                                            $rows_neighborhood = $pdo->pdoGetAll($sql_neighborhood);
                                            foreach($rows_neighborhood as $result_neighborhood) {
                                        ?>
                                        <option value="<?= $result_neighborhood['id'] ?>" <? if($result['neighborhood_id'] == $result_neighborhood['id']){ echo 'selected="selected"'; }else{ echo '';} ?>><?= $result_neighborhood['title'] ?></option>
                                        <? } ?>
                                        </select>
              </div>
            </div>
			
            <div class="form-group">
              <label class="col-sm-2 control-label">المسجد / الجامع</label>
              <div class="col-sm-6">
                                            <select name="mosque_id" required class="form-control" id="mosque_id">

                                        <?
                                            $sql_mosq = "SELECT * FROM `mosque` ORDER BY `id` ASC";
                                            $rows_mosq = $pdo->pdoGetAll($sql_mosq);
                                            foreach($rows_mosq as $result_mosq) {
                                        ?>
                                        <option value="<?= $result_mosq['id'] ?>" <? if($result['mosque_id'] == $result_mosq['id']){ echo 'selected="selected"'; }else{ echo '';} ?>><?= $result_mosq['title'] ?></option>
                                        <? } ?>
                                        </select>
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-sm-2 control-label">المركز</label>
              <div class="col-sm-6">
                                            <select name="center_id" required class="form-control" id="center_id">

                                        <?
                                            $sql_center = "SELECT * FROM `center` ORDER BY `id` ASC";
                                            $rows_center = $pdo->pdoGetAll($sql_center);
                                            foreach($rows_center as $result_center) {
                                        ?>
                                        <option value="<?= $result_center['id'] ?>" <? if($result['center_id'] == $result_center['id']){ echo 'selected="selected"'; }else{ echo '';} ?>><?= $result_center['title'] ?></option>
                                        <? } ?>
                                        </select>
              </div>
            </div>
            

            <div class="form-group">
              <label class="col-sm-2 control-label">الجنسية</label>
              <div class="col-sm-6">
                <input name="nationality" class="form-control" id="nationality">
              </div>
            </div>
            
            <div class="form-group">
                                            <label class="col-sm-2 control-label">المؤهل العلمي </label>
                                            <div class="col-sm-6">
                                            <select name="qualification" required class="form-control" id="qualification">
                                                    <option value="ثانوي">ثانوي</option>
                                                    <option value="دبلوم">دبلوم</option>
                                                    <option value="بكالوريوس" selected="selected">بكالوريوس</option>
                                                    <option value="ماجستير">ماجستير</option>
                                                    <option value="دكتوراه">دكتوراه</option>
                                            </select>
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
