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
    $limit = 15;
    $startpoint = ($page * $limit) - $limit;
    
    if($_GET['do'] == 'support'){
    $statement = "`ticket`,`users` WHERE ticket.status='1' AND ticket.user_id = users.id";
    $url = "?do=support&";
    }elseif($_GET['do'] == 'closed'){
    $statement = "`ticket`,`users` WHERE ticket.status='0' AND ticket.user_id = users.id";
    $url = "?do=closed&";
    }
    
#############################################################
# Show Reply Support
#############################################################
    if($_GET['do'] == 'reply_support' and isset($_GET['id']) or $_GET['do'] == 'reply_confirmation' and isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT
                ticket.*,
                users.id AS uid,
                users.full_name,
                users.username
                FROM `ticket`, `users`
                WHERE ticket.id=".$id." AND
                users.id = ticket.user_id";
        $result = $pdo->pdoGetRow($sql);
        
        // update read Ticket
	  	$datas['is_read']    = '1';
        $where[id]          = $_GET['id'];
        $update = $pdo->pdoInsUpd('ticket', $datas, 'update', $where);

    }

#############################################################
# Reply Ticket Support
#############################################################
    if ($_POST['btnsend'] == "ارسال") {
		$data['ticket_id'] = $_GET['id'];
		$data['user_id'] = $idUser;
		$data['answered'] = '1';
		$data['details'] = trim($_POST['details']);
		$data['date'] = time();
        $insert = $pdo->pdoInsUpd('reply', $data);
        
		if ($_POST['status'] == '0'){
			$dataclose['status'] = '0';
            $where[id] = $_GET['id'];
            $update = $pdo->pdoInsUpd('ticket', $dataclose, 'update', $where);
			header('Location: ?do=closed');
            }
            
        if($support_case == '0'){
            $user_id = $_POST['user_id'];
            $get_user_mobile = $pdo->pdoGetRow("SELECT * FROM `users` where id=".$user_id."");
            $number = $get_user_mobile['username'];
            $message =$support_message;
            SendSms($message , $number);

            }
    }

#############################################################
# Delete Group Ticket
#############################################################

    if(isset($_POST['delChecked'])){
        for($i = 0; $i < count($_POST['checkbox']); $i++){
            $ticket_id = intval($_POST['checkbox'][$i]);
            $sql = "DELETE FROM `ticket` WHERE `id`=:id";
            $data[id] = $ticket_id;
            $delete = $pdo->pdoExecute($sql, $data);
            $countCheckbox = count($_POST['checkbox']);
            if($countCheckbox = $i){
               header('Location: ?do=show&process=successfully');
            }
        }
    }

#############################################################
# Closed Group Ticket
#############################################################

    if(isset($_POST['ClosedChecked'])){
        for($i = 0; $i < count($_POST['checkbox']); $i++){
            $ticket_id = intval($_POST['checkbox'][$i]);
            $data[status] = 0;
            $where[id] = $ticket_id;
            $update = $pdo->pdoInsUpd('ticket', $data, 'update', $where);
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
  <link rel="stylesheet" href="css/bootstrap-fileupload.min.css" />
  <link rel="stylesheet" href="css/bootstrap-timepicker.min.css" />

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
    
    
    <div class="contentpanel panel-email">

        <div class="row">
            <div class="col-sm-4 col-lg-3">
                
                <ul class="nav nav-pills nav-stacked nav-email">
                    <li <?= $_GET['do'] == 'support' ? "class='active'" : "" ?>>
                        <a href="?do=support"><i class="fa fa-users"></i> تذاكر الدعم الفني
                            </a>
                    </li>
                    <li <?= $_GET['do'] == 'closed' ? "class='active'" : "" ?>>
                    <a href="?do=closed"><i class="fa fa-trash-o"></i> ارشيف التذاكر
                    </a>
                    </li>


                </ul>
             
                
            </div><!-- col-sm-3 -->
            
            <div class="col-sm-8 col-lg-9">
                
            <? 
                $do = $_GET["do"];
                switch($do) {
                    case "support":
                    include("template/support/support.php");
                    break;
                    case "closed":
                    include("template/support/closed.php");
                    break;
                    case "reply_support":
                    include("template/support/reply_support.php");
                    break;
                     } 
            
            ?>

                
            </div><!-- col-sm-9 -->
            
        </div><!-- row -->
    
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

<script src="js/jquery.autogrow-textarea.js"></script>
<script src="js/bootstrap-fileupload.min.js"></script>
<script src="js/bootstrap-timepicker.min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script src="js/jquery.tagsinput.min.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/chosen.jquery.min.js"></script>
<script src="js/dropzone.min.js"></script>
<script src="js/colorpicker.js"></script>


<script src="js/custom.js"></script>


<script>
$(document).ready(function() {



    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });

    
	  // Input Masks
  jQuery("#date").mask("99/99/9999");
  jQuery("#dateh").mask("99/99/9999");
  jQuery("#first_day").mask("99/99/9999");
  jQuery("#second_day").mask("99/99/9999");
  
  // Time PiWcker
  jQuery('#timepicker').timepicker({defaultTIme: false});


        jQuery('.ckbox input').click(function(){
            var t = jQuery(this);
            if(t.is(':checked')){
                t.closest('tr').addClass('selected');
            } else {
                t.closest('tr').removeClass('selected');
            }
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
