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
                <input name="id_number" type="text" required class="form-control" id="id_number" value="<?= $result['id_number'] ?>">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">اسم العضو</label>
              <div class="col-sm-2">
                <input name="first_name" type="text" class="form-control" id="first_name" placeholder="الاسم الأول" value="<?= $result['first_name'] ?>">
              </div>
              <div class="col-sm-2">
                <input name="father_name" type="text" class="form-control" id="father_name" placeholder="اسم الأب" value="<?= $result['father_name'] ?>">
              </div>
              <div class="col-sm-2">
                <input name="grand_father_name" type="text" class="form-control" id="grand_father_name" placeholder="اسم الجد" value="<?= $result['grand_father_name'] ?>">
              </div>

              <div class="col-sm-2">
                <input name="family_name" type="text" class="form-control" id="family_name" placeholder="اسم العائلة" value="<?= $result['family_name'] ?>">
              </div>

            </div>

<div class="form-group">
              <label class="col-sm-2 control-label">رقم الجوال</label>
              <div class="col-sm-6">
                <input name="username" type="text" required class="form-control" id="username" placeholder="0599157410" value="<?= $result['username'] ?>">
              </div>
            </div>
            
<div class="form-group">
              <label class="col-sm-2 control-label">كلمة المرور</label>
              <div class="col-sm-6">
                <input name="hdn_pass" type="hidden" id="hdn_pass" value="<?= $result['password'] ?>">
                <input name="password" type="password" class="form-control" id="password">
              </div>
            </div>  
            
            <div class="form-group">
              <label class="col-sm-2 control-label">الايميل</label>
              <div class="col-sm-6">
                <input name="email" type="email" required class="form-control" id="email" value="<?= $result['email'] ?>">
              </div>
            </div>

<div class="form-group">
                <label class="col-sm-2 control-label">المسمى الوظيفي </label>
                                      <div class="col-sm-6">
                    <select name="groups_id" required class="form-control" id="groups_id">
                                        <?
                                            $sql_gr = "SELECT * FROM `groups` ORDER BY `id` ASC";
                                            $rows_gr = $pdo->pdoGetAll($sql_gr);
                                            foreach($rows_gr as $result_gr) {
                                        ?>

                    <option value="<?= $result_gr['id'] ?>" <?= $result_gr['id'] == $result['groups_id'] ? "selected='selected'" : "" ?>><?= $result_gr['title'] ?></option>
                    
                    <? } ?>
                    
                    </select>

                </div>
            </div>
                                         
            <div class="form-group">
              <label class="col-sm-2 control-label">المدينة</label>
              <div class="col-sm-6">
                <input name="city" class="form-control" id="city" value="<?= $result['city'] ?>">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">الحي</label>
              <div class="col-sm-6">
                <input name="location" class="form-control" id="location" value="<?= $result['location'] ?>">
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
              <label class="col-sm-2 control-label">الجنسية</label>
              <div class="col-sm-6">
                <input name="nationality" class="form-control" id="nationality" value="<?= $result['nationality'] ?>">
              </div>
            </div>
            
            <div class="form-group">
                                            <label class="col-sm-2 control-label">المؤهل العلمي </label>
                                            <div class="col-sm-6">
                                            <select name="qualification" required class="form-control" id="qualification">
                                                    <option value="ثانوي" <?= $result['qualification'] == "ثانوي" ? "selected='selected'" : "" ?>>ثانوي</option>
                                                    <option value="دبلوم" <?= $result['qualification'] == "دبلوم" ? "selected='selected'" : "" ?>>دبلوم</option>
                                                    <option value="بكالوريوس" <?= $result['qualification'] == "بكالوريوس" ? "selected='selected'" : "" ?>>بكالوريوس</option>
                                                    <option value="ماجستير" <?= $result['qualification'] == "ماجستير" ? "selected='selected'" : "" ?>>ماجستير</option>
                                                    <option value="دكتوراه" <?= $result['qualification'] == "دكتوراه" ? "selected='selected'" : "" ?>>دكتوراه</option>
                                            </select>
                                            </div>
                                        </div>


            
            <div class="form-group">
              <label class="col-sm-2 control-label">الجنس</label>
              <div class="col-sm-6">
                <select name="gender" class="form-control mb15" id="type">
                                                    <option value="ذكر" <?= $result['gender'] == "ذكر" ? "selected='selected'" : "" ?>>ذكر</option>
                                                    <option value="انثى" <?= $result['gender'] == "انثى" ? "selected='selected'" : "" ?>>انثى</option>
                </select>
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
