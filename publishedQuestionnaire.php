<?php
	include('header.php');

#############################################################
# Add questionnaire
#############################################################

    if(isset($_POST['btnesave'])) {
   	
   	
        
                
                
                   	 foreach ($_POST as $key => $value){
   				
		                    	if(strpos($key ,'evaluation')!== false){
		                    		if(isset($value)&& trim($value)!="" && $value!=" " && $value!="" && $value!=null){
		                    			$lenght=strlen($key);
		                    			
		                    			$dataQ['question_id']=substr($key, 10,$lenght );
		                    			
		                    			$dataQ['rating']=$value;
		                    			}
		                    	}
		                    	if(strpos($key ,'why_acceptable')!== false){
		                    		if(isset($value)&& trim($value)!="" && $value!=" " && $value!="" && $value!=null){
		                    		if($dataQ['question_id']==substr($key, 14,$lenght )){
		                    			$dataQ['why_acceptable']=$value;
		                    			$insert = $pdo->pdoInsUpd('QuestionnaireValues', $dataQ);
	                				$isInsert = $pdo->pdoRowCount($insert);
	                				
		                    		}
		                    		}else{
		                    			$dataQ['why_acceptable']="";
		                    			$insert = $pdo->pdoInsUpd('QuestionnaireValues', $dataQ);
	                				$isInsert = $pdo->pdoRowCount($insert);
		                    		}

		                    	}
		                    	/*$insert = $pdo->pdoInsUpd('QuestionnaireValues', $dataQ);
	                		$isInsert = $pdo->pdoRowCount($insert);*/
	                    	
                   	 }
                   	 //header('Location: ?do=show&process=successfully');
                    
                
             
    }



?>
    <aside id="sidebar" class="medium-3 large-3 columns">
	<?php include('right-pages.php') ?>
    </aside>

  
    <div class="large-9 columns">


  
  <!--center-->
  <div  style="background-color:white;">

	<?php
	$sql = "SELECT * FROM `questionnaire` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
         
                    
                	
                	
	?>

﻿<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">

<div class="panel panel-default">
        <div class="panel-heading">
          
          <h4 class="panel-title">بيانات الاستبيان</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
              <label class="col-sm-2 control-label" >عنوان الاستبيان: </label>
              <div class="col-sm-6" style="font-size:14pt">
                <?echo $result['title'] ?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">الأسئلة: </label>
              </br>
              <div >
                </br>
                    <table class="table table-hidaction  mb30">
            
            <tbody>
                <?php
                $rows_groups = $pdo->pdoGetAll("SELECT * FROM `questionsGroups` WHERE questionsGroups.id IN(SELECT questionsOfquestionnair.qgroup_id FROM questionsOfquestionnair WHERE questionsOfquestionnair.questionnaire_id=".$_GET['id'].")");
                    $next=1;
                	foreach($rows_groups as $result_group) {
                	?>
                	<tr style="background-color:#d3d7db;">
                		<td colspan="2" width="30%"><?php echo $result_group['title']?></td>
                		<td width="10%">ممتاز</td>
               			<td width="10%">جيد جداً</td>
                		<td width="10%">مقبول</td> 
                		<td width="40%">سبب اختيار مقبول</td>              	
                	</tr>
                	<?php
                    $sql_cat = "SELECT * FROM `questionsOfquestionnair` WHERE questionnaire_id=".$result['id']." AND qgroup_id=".$result_group['id'];
                    $rows_cat = $pdo->pdoGetAll($sql_cat);
                    $next=1;
                	foreach($rows_cat as $result_cat) {?>
                <tr class="unread" style="background-color:white;">
                        <td width="4%">&nbsp;
                        
                                                  
                        </td>
                <td width="28%"><?php echo $result_cat['title'] ?></td>
                <td >
			<input type="radio" value="1" name="<?php echo'evaluation'.$result_cat['id']?>"/>
                </td>
                <td >
			<input type="radio" value="2" name="<?php echo'evaluation'.$result_cat['id']?>"/>
                </td>
                <td >
			<input type="radio" value="3" name="<?php echo'evaluation'.$result_cat['id']?>"/>
                </td>
                
                <td >
                	<textarea cols="45" name="<?php echo'why_acceptable'.$result_cat['id']?>"></textarea>
			
                </td>
              </tr>
                
                <?php }  } ?>
            </tbody>
          </table>
          
          
                    
                
              </div>
            </div>
        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                  <input name="btnesave" type="submit" id="btnesave" value="حفظ" class="btn btn-primary">&nbsp;
				</div>
			 </div>
		  </div><!-- panel-footer -->
        
      </div>
</form>
   </div>
</div>

<?php include('footer.php') ?>
