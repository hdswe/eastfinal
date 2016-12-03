<?
    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/tokenClass.php");
    require ("../include/newFunction.php");
    $chkToken= new Token(10);

#############################################################
# Pagination Setting
#############################################################

    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $limit = 10;
    $startpoint = ($page * $limit) - $limit;
    $url = "?do=show&";
    $statement = "`questionnaire`";

#############################################################
# Add questionnaire
#############################################################

    if(isset($_POST['btnadd'])) {
   	$group_id;
        if($chkToken->Check()) { 
                $data['title']= trim($_POST['title']);
                $data['course_id']=trim($_POST['course']);
                $insert = $pdo->pdoInsUpd('questionnaire', $data);
                $isInsert = $pdo->pdoRowCount($insert);
                $dataQ['questionnaire_id'] = $pdo->pdoLastInsertId();
                if($isInsert == 1){
                
                   	 foreach ($_POST as $key => $value){
   				if(isset($value)&& trim($value)!="" && $value!=" " && $value!="" && $value!=null){
		                    	if(strpos($key ,'groupfield')!== false){
		                    		$group_id="";
		                    			$dataG['title']=$value;
		                    			$insert = $pdo->pdoInsUpd('questionsGroups', $dataG);
	                				$isInsert = $pdo->pdoRowCount($insert);
	                				$group_id=$pdo->pdoLastInsertId();
	                				
	                				
	                				
		                    		
		                    	}else if(strpos($key ,'grouplist')!== false){
		                    		
		                    			$sqlG = "SELECT * FROM `questionsGroups` where id=:id";
		        				$datagroup[id] = $value;
		        				$resultG = $pdo->pdoGetRow($sqlG, $datagroup);
		        				$group_id=$resultG['id'];
		        				
		        				
		                    		
		                    	}else if(strpos($key ,'question')!== false){
	
		                    		if($group_id!=""&&$group_id!=" "&&$group_id!=null){
		                    			$dataQ['title']=$value;
			                    		$dataQ['qgroup_id']=$group_id;
			                    		$insert = $pdo->pdoInsUpd('questionsOfquestionnair', $dataQ);
		                			$isInsert = $pdo->pdoRowCount($insert);
		                			
		                			
		                    		}
		                    		
		                    		
		                    	
		                    	}
	                    	}
                   	 }
                   	 //header('Location: ?do=show&process=successfully');
                    
                }else{
                    header('Location: ?do=show&process=failure');
                }
            } else { 
               die(header("Location: login.php")); 
        }  
    }

#############################################################
# Edit questionnaire
#############################################################
    if($_GET['do'] == 'edit' and isset($_GET['id'])){
        $sql = "SELECT * FROM `questionnaire` where id=:id";
        $data[id] = $_GET['id'];
        $result = $pdo->pdoGetRow($sql, $data);
    }

    if(isset($_POST['btnedit'])) {
    
    	$group_id;
   	
        if($chkToken->Check()) { 
                $data['title']		          = trim($_POST['title']);
                $data['course_id']=trim($_POST['course']);
                $where[id] = $_GET['id'];
                $update = $pdo->pdoInsUpd('questionnaire', $data, 'update', $where);
                $dataQ['questionnaire_id']=$_GET['id'];
                	foreach ($_POST as $key => $value){
   				if(isset($value)&& trim($value)!="" && $value!=" " && $value!="" && $value!=null){
		                    	if(strpos($key ,'groupfield')!== false){
		                    			$group_id="";
		                    			$dataG['title']=$value;
		                    			$insert = $pdo->pdoInsUpd('questionsGroups', $dataG);
	                				$isInsert = $pdo->pdoRowCount($insert);
	                				$group_id=$pdo->pdoLastInsertId();
	                				
	                				
	                				
		                    		
		                    	}else if(strpos($key ,'grouplist')!== false){
		                    		
		                    			$sqlG = "SELECT * FROM `questionsGroups` where id=:id";
		        				$datagroup[id] = $value;
		        				$resultG = $pdo->pdoGetRow($sqlG, $datagroup);
		        				$group_id=$resultG['id'];
		        				
		        				
		                    		
		                    	}else if(strpos($key ,'question')!== false){
	
		                    		if($group_id!=""&&$group_id!=" "&&$group_id!=null){
		                    			$dataQ['title']=$value;
			                    		$dataQ['qgroup_id']=$group_id;
			                    		$insert = $pdo->pdoInsUpd('questionsOfquestionnair', $dataQ);
		                			$isInsert = $pdo->pdoRowCount($insert);
		                			
		                			
		                    		}
		                    		
		                    		
		                    		
		                    	
		                    	}
	                    	}
                   	 }
                

                header('Location: ?do=show&process=successfully');
            } else { 
               die(header("Location: login.php")); 
        }  
    }
    
 if(isset($_POST['btneditq'])) {
        if($chkToken->Check()) { 
                $dataq['title']		          = trim($_POST['title']);
                $whereq[id] = $_GET['idq'];
                $update = $pdo->pdoInsUpd('questionsOfquestionnair', $dataq, 'update', $whereq);

               header('Location: ?do=edit&id='.$_GET['id']);
            } else { 
               die(header("Location: login.php")); 
        	}  
    }
#############################################################
# Delete One questionnaire
#############################################################

    if(isset($_GET['del'])){
        $sql = "DELETE FROM `questionnaire` WHERE `id`=:id";
        $data[id] = $_GET['del'];
        $delete = $pdo->pdoExecute($sql, $data);
        $isDelete = $pdo->pdoRowCount($delete);
            if($isDelete == 1){
                header('Location: ?do=show&process=successfully');
            }else{
                header('Location: ?do=show&process=failure');
            }
    }
    
    
    
    
    if(isset($_GET['delQ'])){
        $sql = "DELETE FROM `questionsOfquestionnair` WHERE `id`=:id";
        $data[id] = $_GET['delQ'];
        $delete = $pdo->pdoExecute($sql, $data);
        $isDelete = $pdo->pdoRowCount($delete);
            if($isDelete == 1){
                header('Location: ?do=edit&id='. $_GET['id'].'');
            }else{
                header('Location: ?do=show&process=failure');
            }
    }
    
#############################################################
# Delete Group questionnaire
#############################################################

    if(isset($_POST['delChecked'])){
        for($i = 0; $i < count($_POST['checkbox']); $i++){
            $course_id = intval($_POST['checkbox'][$i]);
            $sql = "DELETE FROM `questionnaire` WHERE `id`=:id";
            $data[id] = $course_id;
            $delete = $pdo->pdoExecute($sql, $data);
            $countCheckbox = count($_POST['checkbox']);
            if($countCheckbox = $i){
               header('Location: ?do=show&process=successfully');
            }
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title><?= $settingsSiteName ?> - لوحة التحكم</title>

  <link href="css/style.default.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body>
    
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
  <? include ('mainMenu.php') ?>
  <div class="mainpanel">
    
    <? include ('headerBar.php') ?>
    <!-- headerbar -->
    
    
    <div class="contentpanel">
    <?
        $do = $_GET["do"];
        switch($do)
        {
        case "show":
        include("template/questionnaire/show.php");
        break;
        case "add":
        include("template/questionnaire/add.php");
        break;
        case "edit":
        include("template/questionnaire/edit.php");
         break;
        case "editQ":
        include("template/questionnaire/editQ.php");
        break;
        case "questions":
        include("template/questionnaire/questions.php");
        break;

        }
    
    ?>
    </div>
    <!-- contentpanel -->
    
  </div>
  <!-- mainpanel -->
  
  
  
</section>



<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-ui-1.10.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/toggles.min.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/jquery.cookies.js"></script>

<script src="js/wysihtml5-0.3.0.min.js"></script>
<script src="js/bootstrap-wysihtml5.js"></script>
<script src="js/ckeditor/ckeditor.js"></script>
<script src="js/ckeditor/adapters/jquery.js"></script>


<script src="js/custom.js"></script>


<script>
$(document).ready(function() {

  // CKEditor
  jQuery('#details').ckeditor();
  

    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });

    
        jQuery('.ckbox input').click(function(){
            var t = jQuery(this);
            if(t.is(':checked')){
                t.closest('tr').addClass('selected');
            } else {
                t.closest('tr').removeClass('selected');
            }
        });
        
var next =  parseInt(jQuery("#b0").attr('for'))-1;
var qnext=0;
    jQuery(".add-more").click(function(e){
    	/*var nameg= jQuery(this).attr("name");
    	alert();
        	if(nameg.indexOf('add')>=0){
        	}else{*/
        e.preventDefault();
        //var addto = "#field" + next;
        // var addRemove = "#field" + (next);
       // alert(jQuery(this.attr('for'));
        next = next + 1;
        var newIn = '<div style="border:1px solid black;padding:15px;" id="divGroup'+next+'">'
        +
        '<span> أكتب اسم مجموعة جديدة</span>'
        +
        '<input value="" autocomplete="off" class="input form-control" id="groupid' + next + '" name="groupfield' + next + '" type="text" >'
        +
        '<span>أو اختر مجموعة</span>'
        +
        '<select class="form-control" id="selectg'+next+'" name="grouplist'+next+'" ><option></option><?foreach($rows_groups as $result_groups ) {?><option value="'+"<?echo $result_groups['id'];?>"+'">'+"<?echo $result_groups['title'];?>"+'</option><?}?></select>'
        +
        '<br id="br'+next+'">'
        +
        '<div style="border:1px solid black;padding:15px;"><span>اضافة أسئلة للمجموعة</span>'
        +
        '<br id="br'+next+'">'
        +
        '<button id="b'+next+'" class="btn add-more" type="button" for="'+next+'" name="add'+next+'">+</button></div>'
        +
        '<br id="br'+next+'"><br id="br'+next+'">'
        +
        '<button name="removeg' + (next ) + '" id="removeg' + (next ) + '" class="btn btn-danger remove-me" type="button" style="width:151px">احذف المجموعة</button>'
        +
        '<br id="br'+next+'">'
        +
        '</div>'+'<br id="br'+next+'">';
        var newInput = jQuery(newIn);
        /*var removeBtn = '<button name="removeg' + (next ) + '" id="removeg' + (next ) + '" class="btn btn-danger remove-me" type="button" style="width:151px">احذف المجموعة</button></div>';*/
       // var removeButton = jQuery(removeBtn);
       // var br=jQuery('<br id="br'+next+'">');
        
        var addbefore=jQuery('#b0');
        /*jQuery(addto).after(newInput);
        jQuery(addRemove).after(removeButton);*/
        
        jQuery(addbefore).before(newInput);
        //jQuery(addbefore).before(removeButton);
        //jQuery(addbefore).before(br);
        
        
        //jQuery("#field" + next).attr('data-source',jQuery(addto).attr('data-source'));
        //jQuery("#count").val(next);  
        jQuery('.remove-me').click(function(){
        	var name= jQuery(this).attr("name");
        	if(name.indexOf('removeg')>=0){
  			e.preventDefault();
	                var fieldNum = this.id.substring(7,this.id.length);
	                //alert(fieldNum );
	                /*var fieldID = "#field" + fieldNum;
	                jQuery(this).remove();
	                jQuery(fieldID).remove();
	                jQuery("#br"+fieldNum).remove();
	                
	                */
	                jQuery(this).remove();
	                jQuery("#groupid"+fieldNum).remove();
	                jQuery("#selectg"+fieldNum).remove();
	                jQuery("#br"+fieldNum).remove();
	                jQuery("#divGroup"+fieldNum ).remove();
	                jQuery("#br"+fieldNum).remove();
        	}
            });
            
             	//jQuery('#b'+next).click(function(e){
             	jQuery(".add-more").click(function(e){
        		e.preventDefault();
        		var fieldNumq = this.id.substring(1,this.id.length);
        		if(fieldNumq !="0"){
        			qnext=qnext+1;
        			var newInq = 
        		       
        			'<span id="qspan'+qnext+'"><input value="" autocomplete="off" class="input form-control" id="questionid' + qnext + '" name="question' + qnext + '" type="text" >'
       		 +
        	'<button name="removeq' + (qnext ) + '" id="removeq' + (qnext ) + '" class="btn btn-danger remove-me" type="button" style="width:42px">-</button>'
       		 +'<br>'+
        	'<br></span>'
      		;
       		 var newInputq = jQuery(newInq);
        
       		 var addbeforeq=jQuery(this);
        
        	jQuery(addbeforeq).before(newInputq);
        	
        		jQuery('.remove-me').click(function(){
        			e.preventDefault();
        			var fieldNumqr = this.id.substring(7,this.id.length);
        			//alert(fieldNumqr);
	               		jQuery(this).remove();
	               		jQuery("#questionid"+fieldNumqr).remove();
	               		
	                	jQuery("#qspan"+fieldNumqr ).remove();
	                
	              
           		 });
        		}
        	
            	});
            
            });
        
    

    




} );



    function validate() {
        var chks = document.getElementsByName('checkbox[]');
        var hasChecked = false;
        for (var i = 0; i < chks.length; i++){
            if (chks[i].checked){
                hasChecked = true;
            break;
            }
        }
        if (hasChecked == false) {
            alert("يجب اختيار عنصر واحد على الاقل.");
            return false;
        }
        return true;
    }

</script>


</body>
</html>