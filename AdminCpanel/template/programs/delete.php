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
          <h4 class="panel-title">حذف البرنامج</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
              <label class="col-sm-3 control-label">عدد الدورات داخل هذا البرنامج</label>
              <div class="col-sm-8">
                <label class="control-label"><?= $countCourse ?></label>
              </div>
            </div>

        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                  <input name="btndel" type="submit" id="btndel" value="حذف" class="btn btn-primary">&nbsp;
				</div>
			 </div>
		  </div><!-- panel-footer -->
        
      </div>
</form>
