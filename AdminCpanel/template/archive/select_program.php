﻿<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
<?php $addToken = new Token; $addToken->protectForm(); ?> 
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">بيانات الأرشيف</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
              <label class="col-sm-2 control-label">البرنامج</label>
              <div class="col-sm-6">
                <select name="programs_id" class="form-control" id="programs_id">
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

        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                  <input name="next1" type="submit" id="next1" value="التالي" class="btn btn-primary">&nbsp;
                  <a href="javascript: history.go(-1)" class="btn btn-default">خروج</a>
				</div>
			 </div>
		  </div><!-- panel-footer -->
        
      </div>
</form>
