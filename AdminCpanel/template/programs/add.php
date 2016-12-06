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
          <h4 class="panel-title">بيانات البرنامج</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
              <label class="col-sm-2 control-label">اسم البرنامج</label>
              <div class="col-sm-6">
                <input name="title" type="text" class="form-control" id="title" />
              </div>
            </div>
			
            <div class="form-group">
              <label class="col-sm-2 control-label">أهداف البرنامج</label>
              <div class="col-sm-10">
			<textarea name="details" id="details" placeholder="" class="form-control" rows="5">
			</textarea>
              </div>
            </div>
            
			<div class="form-group">
              <label class="col-sm-2 control-label">مدة البرنامج</label>
              <div class="col-sm-6">
                <input name="duration" type="text" class="form-control" id="duration" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-sm-2 control-label">عدد أيام البرنامج</label>
              <div class="col-sm-6">
                <input name="dayCount" type="integer" class="form-control" id="dayCount" />
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-sm-2 control-label">الفئة المستهدفة</label>
              <div class="col-sm-6">
				<select name="groups_id" required class="form-control" id="groups_id">
				<?
					$sql_query = "SELECT * FROM `groups` ";
					$rows_groups = $pdo->pdoGetAll($sql_query);
					foreach($rows_groups as $result_groups) {
						echo '<option value="'.$result_groups['id'].'">'.$result_groups['title'].'</option>';
					}?>
				</select>
                
              </div>
            </div>
			
			
			
			<div class="form-group">
              <label class="col-sm-2 control-label">رقم الاتصال</label>
              <div class="col-sm-6">
                <input name="contactNumber" type="tel" class="form-control" id="contactNumber" />
              </div>
            </div>
		
			<div class="form-group">
              <label class="col-sm-2 control-label">شروط التسجيل</label>
              <div class="col-sm-6">
			<textarea name="conditions" id="conditions" placeholder="" class="form-control" rows="5"></textarea>
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-sm-2 control-label">أخرى</label>
              <div class="col-sm-6">
			<textarea name="others" id="others" placeholder="" class="form-control" rows="5"></textarea>
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-sm-2 control-label">التفاصيل</label>
              <div class="col-sm-6">
                      <div class="rdio rdio-success">
                        <input name="published_details" type="radio" id="radioSuccess" value="yes" checked="checked" />
                        <label for="radioSuccess">منشور</label>
                </div>

                      <div class="rdio rdio-danger">
                        <input type="radio" name="published_details" value="no" id="radioDanger" />
                        <label for="radioDanger">غير منشور</label>
                </div>
              </div>
            </div>
            
			<div class="form-group">
              <label class="col-sm-2 control-label">البرنامج</label>
              <div class="col-sm-6">
                      <div class="rdio rdio-success">
                        <input name="published" type="radio" id="radioSuccess1" value="yes" checked="checked" />
                        <label for="radioSuccess1">منشور</label>
                </div>

                      <div class="rdio rdio-danger">
                        <input type="radio" name="published" value="no" id="radioDanger1" />
                        <label for="radioDanger1">غير منشور</label>
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
