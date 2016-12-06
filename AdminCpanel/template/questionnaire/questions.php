<style>
  .form-control {height: 45px;} 
</style>
<?
	$sql = "SELECT * FROM `questionnaire` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
         
                    
                	
                	
?>

﻿<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
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
                <?echo $result['title'] ?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">الأسئلة</label>
              <div >
                <!--<input autocomplete="off" class="input form-control"  id="field1" name="prof1" type="text" placeholder="" data-items="8"/>-->
                
                    <table class="table table-hidaction  mb30">
            
            <tbody>
                <?
                $rows_groups = $pdo->pdoGetAll("SELECT * FROM `questionsGroups` WHERE questionsGroups.id IN(SELECT questionsOfquestionnair.qgroup_id FROM questionsOfquestionnair WHERE questionsOfquestionnair.questionnaire_id=".$_GET['id'].")");
                    $next=1;
                	foreach($rows_groups as $result_group) {
                	?>
                	<tr style="background-color:#d3d7db;">
                		<td colspan="2" width="44%"><?= $result_group['title']?></td>
                		<td width="22%">ممتاز</td>
               			<td width="22%">جيد جداً</td>
                		<td width="22%">مقبول</td>               	
                	</tr>
                	<?
                    $sql_cat = "SELECT * FROM `questionsOfquestionnair` WHERE questionnaire_id=".$result['id']." AND qgroup_id=".$result_group['id'];
                    $rows_cat = $pdo->pdoGetAll($sql_cat);
                    $next=1;
                	foreach($rows_cat as $result_cat) {?>
                <tr class="unread" style="background-color:white;">
                        <td width="4%">
                        &nbsp;
                                                  
                        </td>
                <td width="40%"><?= $result_cat['title'] ?></td>
                <td >
			<input type="radio" value="1" name="<? echo'evaluation'.$result['id']?>"/>
                </td>
                <td >
			<input type="radio" value="2" name="<? echo'evaluation'.$result['id']?>"/>
                </td>
                <td >
			<input type="radio" value="3" name="<? echo'evaluation'.$result['id']?>"/>
                </td>
              </tr>
                
                <?}}?>
            </tbody>
          </table>
          
          
                    
                
              </div>
            </div>
        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
                  <input name="btnedit" type="submit" id="btnedit" value="حفظ" class="btn btn-primary">&nbsp;
                  <a href="javascript: history.go(-1)" class="btn btn-default">خروج</a>
				</div>
			 </div>
		  </div><!-- panel-footer -->
        
      </div>
</form>