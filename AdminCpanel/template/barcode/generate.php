

<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
<?php $addToken = new Token; $addToken->protectForm(); ?> 
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">التحقق من الباركود وتسجل الحضور</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
        <? if(isset($msg)) {
            echo'
                    <div class="form-group">
              <div class="col-sm-12">
                '.$msg.'

              </div>
            </div>'; } ?>

        
            <div class="form-group">
              <label class="col-sm-2 control-label">رقم الباركود</label>
              <div class="col-sm-6">
                <input name="barcode" type="text" autofocus required class="form-control" id="barcode" />
              </div>
            </div>

  <div class="form-group">
    <label class="col-sm-3 control-label">رقم الباركود:</label>
    <div class="col-sm-6"><? echo $record['barcode'] ?></div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">اسم الطالب:</label>
    <div class="col-sm-6">
      <div><? echo $record['full_name'] ?></div>
    </div>
    
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">عنوان الدورة:</label>
    <div class="col-sm-6">
      <div><? echo $record['title'] ?></div>
    </div>
    
  </div>
  
  
  <div class="form-group">
    <label class="col-sm-3 control-label">مكان الدورة:</label>
    <div class="col-sm-6">
      <div><? echo $record['location'] ?></div>
    </div>
    
  </div>
  


        </div><!-- panel-body --><!-- panel-footer -->
        
      </div>
</form>
