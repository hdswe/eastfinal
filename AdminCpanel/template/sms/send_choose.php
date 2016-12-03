<form action="" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">

<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">ارسال رسالة الى ارقام مختارة</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
        <?
        
        
        $query = "SELECT id,username FROM `send_all` ORDER BY `id` DESC";
        $ExecuteSql = $pdo->pdoExecute($query);
        if($pdo->pdoRowCount($ExecuteSql) != 0){
        echo " <div style='padding:20px; text-align:center;'>جداول البيانات المؤقتة ممتلئة يرجى افراغها <a href='?case=TRUNCATE'>بالضغط هنا</a> </div>";
        } else{
            ?>

            <div class="form-group">
            <label class="col-sm-2 control-label">الأرقام</label>
                <div class="col-sm-6">
                <textarea name="number" rows="8" class="form-control" id="autoResizeTA"></textarea>
                </div>
            </div>
            
            <? } ?>
            
        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                  <input name="send_choose" type="submit" id="send_choose" value="ارسال" class="btn btn-primary">&nbsp;
                  <a href="javascript: history.go(-1)" class="btn btn-default">خروج</a>
				</div>
			 </div>
		  </div><!-- panel-footer -->
        
      </div>
</form>
