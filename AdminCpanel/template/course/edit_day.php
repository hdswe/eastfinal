<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
<?php $addToken = new Token; $addToken->protectForm(); ?> 
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">أيام الدورة</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
              <label class="col-sm-2 control-label">عدد الأيام</label>
              <div class="col-sm-6">
               <?= $count_day ?> أيام
               
               <br>
                <?= $d2 ?>
              </div>
            </div>


            <?
            foreach($row_day as $result_day) {
            ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">تاريخ اليوم <?= $i+1 ?></label>
              <div class="col-sm-6">
              <div class="input-group mb15">
                <input name="day[]" type="text" required class="form-control" id="day<?= $i ?>" value="<?= $result_day['day'] ?>" />
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
              </div>
            </div>
            <?   }?>


        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                  <input name="btnaeditday" type="submit" id="btnaeditday" value="تعديل" class="btn btn-primary">&nbsp;
                  <a href="javascript: history.go(-1)" class="btn btn-default">خروج</a>
				</div>
			 </div>
		  </div><!-- panel-footer -->
        
      </div>
</form>
