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
              <label class="col-sm-2 control-label">الأسم</label>
              <div class="col-sm-6">
              <?= $result['full_name'] ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">رقم الجوال</label>
              <div class="col-sm-6">
              <?= $result['mobile'] ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">الايميل</label>
              <div class="col-sm-6">
              <?= $result['email'] ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">مجالات التدريب</label>
              <div class="col-sm-6">
              <?= $result['training'] ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">هل سبق لك التدريب في مؤسسة خيرية</label>
              <div class="col-sm-6">
              <?= $result['have_you_training'] ?>
              -
			  <?= $result['institutions_trained'] ?>

              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">ملاحظات اضافية</label>
              <div class="col-sm-6">
              <?= $result['additional_notes'] ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">السيرة الذاتية</label>
              <div class="col-sm-6">
              <a href="../data/files/<?= $result['file_cv'] ?>"><?= $result['file_cv'] ?></a>
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
