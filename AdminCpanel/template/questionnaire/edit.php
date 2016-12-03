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
                <input name="title" type="text" class="form-control" id="title" value="<?= $result['title'] ?>" />
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
							if($result['course_id']==$result_course['id']){
								echo '<option value="'.$result_course['id'].'" selected>'.$result_course['title'].'</option>';
								
							}else{
								echo '<option value="'.$result_course['id'].'">'.$result_course['title'].'</option>';
							}
                    		
                    	}
                    	 echo'</select>';
                    	 
                    
                 	
            
            ?>
              </div>
            </div>
            
            
            
            <div class="form-group">
              <label class="col-sm-2 control-label">الأسئلة</label>
              <div class="col-sm-6">
                <!--<input autocomplete="off" class="input form-control"  id="field1" name="prof1" type="text" placeholder="" data-items="8"/>-->
                
                    <table class="table table-hidaction table-striped mb30">
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th width="50%">السؤال</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
                <?
                    $sql_cat = "SELECT * FROM `questionsOfquestionnair` WHERE questionnaire_id=".$result['id'];
                    $rows_cat = $pdo->pdoGetAll($sql_cat);
                    $next=1;
                	foreach($rows_cat as $result_cat) {?>
                <tr class="unread">
                        <td>
                        &nbsp;
                                                  
                        </td>
                <td><?= $result_cat['title'] ?></td>
                <td class="table-action">
                        <a href="?id=<?echo $result['id']?>&do=editQ&idq=<? echo $result_cat['id'] ?>" title="تعديل" data-placement="top" data-toggle="tooltip" class="tooltips"><i class="fa fa-pencil"></i></a>
                        <a href="?id=<? echo $result['id']?>&delQ=<? echo $result_cat['id'] ?>" title="حذف" data-placement="top" data-toggle="tooltip" class="tooltips" onclick="return confirm('هل انت متأكد من عملية الحذف؟ هذا الأجراء لايمكن التراجع عنه بعد تنفيذه')"><i class="fa fa-trash-o"></i></a>
                        
                </td>
              </tr>
                
                <?}?>
            </tbody>
          </table>
          
          	<?
            $sql_group = "SELECT * FROM `questionsGroups` ";
                    $rows_groups = $pdo->pdoGetAll($sql_group );
                	
            
            ?>
                    
                <button id="b0" class="btn add-more" type="button" for="<?=$next?>">أضف مجموعة أسئلة</button>
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