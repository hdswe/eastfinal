<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
<?php $addToken = new Token; $addToken->protectForm(); ?> 
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">بيانات الاستبيان</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
              <label class="col-sm-2 control-label">عنوان الاستبيان</label>
              <div class="col-sm-6">
                <input name="title" type="text" class="form-control" id="title" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">حول دورة</label>
              
              <div class="col-sm-6">
                <?
            $sql_course = "SELECT * FROM `course` ";
                    $rows_course = $pdo->pdoGetAll($sql_course );
                        
                    	echo '<select class="form-control"  name="course"><option></option>';
       			foreach($rows_course as $result_course){
                    		echo '<option value="'.$result_course['id'].'">'.$result_course['title'].'</option>';
                    	}
                    	 echo'</select>';
                    	 
                    
                 	
            
            ?>
              </div>
            </div>
            <?
            $sql_group = "SELECT * FROM `questionsGroups` ";
                    $rows_groups = $pdo->pdoGetAll($sql_group );
                	
            
            ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">الأسئلة</label>
              <div class="col-sm-6">
                <!--<input autocomplete="off" class="input form-control"  id="field1" name="prof1" type="text" placeholder="" data-items="8"/>-->
                <button id="b0" class="btn add-more" type="button" for="1">أضف مجموعة أسئلة</button>
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