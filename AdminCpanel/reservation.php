<?
    require ("../include/dbWrapperClass.php");
    require ("../include/config.php");
    require ("../include/tokenClass.php");
    require ("../include/newFunction.php");
    $chkToken= new Token(10);

#############################################################
# Pagination
#############################################################

    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    if(isset($_POST['category'])){
    $limit = 100;
    } else {
    $limit = 10;
    }
    $startpoint = ($page * $limit) - $limit;
    
    if($_GET['do'] == 'confirmed'){
    $statement = "`reservation`,`course`,`users`,`mosque`
                        WHERE
                        reservation.course_id = course.id AND
                        reservation.user_id = users.id AND
                        reservation.status = '2' AND
						users.mosque_id = mosque.id";
    $url = "?do=confirmed&";
    }elseif($_GET['do'] == 'show'){
    $statement = "`reservation`,`course`,`users`,`mosque`
                        WHERE
                        reservation.course_id = course.id AND
                        reservation.user_id = users.id AND
                        reservation.status = '1' AND
						users.mosque_id = mosque.id";
    $url = "?do=show&";
    }elseif($_GET['do'] == 'canceled'){
    $statement = "reservation.course_id = course.id AND
                        reservation.user_id = users.id AND
                        reservation.status = '3' AND
						users.mosque_id = mosque.id";
    $url = "?do=canceled&";
    }

#############################################################
# Active One Reservation
#############################################################

    if(isset($_GET['confirmed'])){
        $reservation_id = $_GET['confirmed'];
        $data['status']		= '2';
        echo $reservation_id;
        $where[id] = $reservation_id;
        $update = $pdo->pdoInsUpd('reservation', $data, 'update', $where);
            
        /* Send Sms */
        if($reservation_case == '0'){ 
            $get_user_id        = $pdo->pdoGetRow("SELECT id, user_id FROM `reservation` where id=".$reservation_id."");
            $get_user_mobile    = $pdo->pdoGetRow("SELECT * FROM `users` where id=".$get_user_id['user_id']."");
            $mobile             = $get_user_mobile['username'] ;
            $message            = $reservation_message;
            SendSms($message , $mobile);
        } 
        header('Location: ?do=show&process=successfully&category_filter='.$_GET['category_filter'].'');
    }
    
#############################################################
# Active Group Reservation
#############################################################

    if(isset($_POST['activeChecked'])){
        for($i = 0; $i < count($_POST['checkbox']); $i++){
            $reservation_id = intval($_POST['checkbox'][$i]);
            $data['status']		= '2';
            $where[id] = $reservation_id;
            $update = $pdo->pdoInsUpd('reservation', $data, 'update', $where);
            
            /* Send Sms */
            if($reservation_case == '0'){ 
            $get_user_id        = $pdo->pdoGetRow("SELECT id, user_id FROM `reservation` where id=".$reservation_id."");
            $get_user_mobile    = $pdo->pdoGetRow("SELECT * FROM `users` where id=".$get_user_id['user_id']."");
                $mobile             = $get_user_mobile['username'] ;
                $message            = $reservation_message;
                SendSms($message , $mobile);
                } 
				header('Location: ?do=show&process=successfully&category_filter='.$_POST['cat_hid'].'');

        }
    }

#############################################################
# Cancel One Reservation
#############################################################

    if(isset($_GET['canceled'])){
        $reservation_id = $_GET['canceled'];
        $data['status']		= '3';
        $where[id] = $reservation_id;
        $update = $pdo->pdoInsUpd('reservation', $data, 'update', $where);
            
        /* Send Sms */
        if($reservation_cancel_case == '0'){ 
            $get_user_id        = $pdo->pdoGetRow("SELECT id, user_id FROM `reservation` where id=".$reservation_id."");
            $get_user_mobile    = $pdo->pdoGetRow("SELECT * FROM `users` where id=".$get_user_id['user_id']."");
            $mobile             = $get_user_mobile['username'] ;
            $message            = $reservation_cancel_message;
            SendSms($message , $mobile);
        } 
        header('Location: ?do=show&process=successfully');
    }
    
#############################################################
# Cancel Group Reservation
#############################################################

    if(isset($_POST['unActiveChecked'])){
        for($i = 0; $i < count($_POST['checkbox']); $i++){
            $reservation_id = intval($_POST['checkbox'][$i]);
            $data['status']		= '3';
            $where[id] = $reservation_id;
            $update = $pdo->pdoInsUpd('reservation', $data, 'update', $where);
            
            /* Send Sms */
            if($reservation_cancel_case == '0'){ 
            $get_user_id        = $pdo->pdoGetRow("SELECT id, user_id FROM `reservation` where id=".$reservation_id."");
            $get_user_mobile    = $pdo->pdoGetRow("SELECT * FROM `users` where id=".$get_user_id['user_id']."");
                $mobile             = $get_user_mobile['username'] ;
                $message            = $reservation_cancel_message;
                SendSms($message , $mobile);
                } 
            $countCheckbox = count($_POST['checkbox']);
            if($countCheckbox = $i){
               header('Location: ?do=show&process=successfully');
            } 
        }
    }
	
#############################################################
# Delete One Reservation
#############################################################

    if(isset($_GET['del'])){
        $sql = "DELETE FROM `reservation` WHERE `id`=:id";
        $data[id] = $_GET['del'];
        $delete = $pdo->pdoExecute($sql, $data);
        $isDelete = $pdo->pdoRowCount($delete);
            if($isDelete == 1){
                header('Location: ?do=canceled&process=successfully');
            }else{
                header('Location: ?do=canceled&process=failure');
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
        switch($do) {
            case "show":
                include("template/reservation/show.php");
            break;
            case "add":
                include("template/reservation/add.php");
            break;
            case "confirmed":
                include("template/reservation/confirmed.php");
            break;
            case "canceled":
                include("template/reservation/canceled.php");
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
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/toggles.min.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/jquery.cookies.js"></script>
  <script src="js/jquery.tablesorter.min.js"></script>

<script src="js/custom.js"></script>
<script>
    jQuery(document).ready(function(){
        jQuery("#reservationTabel").tablesorter();
        jQuery('.ckbox input').click(function(){
            var t = jQuery(this);
            if(t.is(':checked')){
                t.closest('tr').addClass('selected');
            } else {
                t.closest('tr').removeClass('selected');
            }
        });
        
        
        
        jQuery("#CheckAll").click(function(){
        	var name=jQuery(this).attr('name');
        	var i=0;
        		
		if(name=="CheckALL"){
		
			
			
			var t=jQuery('input[name="checkbox[]"]');
        	  	t.each(function() {
        	  		i++;
				t.closest('tr').addClass('selected');
        	  		t.prop('checked', true);
			});
			if(i>0){
				jQuery(this).attr('name','UnCheckAll');
				jQuery(this).text('إلغاء التحديد');
			}
		}else if(name=="UnCheckAll"){
			jQuery(this).attr('name','CheckALL');
			jQuery(this).text('تحديد الكل');
			var t=jQuery('input[name="checkbox[]"]');
        	  	t.each(function() {
				t.closest('tr').removeClass('selected');
        	  		t.prop('checked', false);
			});
		}
	});
        
        
    });
</script>

<script>

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