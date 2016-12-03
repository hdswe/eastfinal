<?php
	include('userClass.php');
	$UserLoggedIn = new Login();
	
#############################################################
# Get Settings
#############################################################

    $query_settings         = "SELECT * FROM `settings` where id=1";    
    $genralSettings         = $pdo->pdoGetRow($query_settings);
    $settingsSiteName       = $genralSettings['site_name'];
    $settingsSiteUrl        = $genralSettings['site_url'];
    $settingsRegisterCase   = $genralSettings['register_case'];
    $settingsRegisterTrainer = $genralSettings['register_trainer'];
    $settingsDescription    = $genralSettings['description'];
    $settingsKeyword        = $genralSettings['keyword'];
    $settingsGetBarcode     = $genralSettings['get_barcode'];
    $settingsReservation    = $genralSettings['cancel_reservation'];
    $settingsSmsGateway     = $genralSettings['sms_gateway'];
    $settingsSmsUsername    = $genralSettings['sms_username'];
    $settingsSmsPassword    = $genralSettings['sms_password'];
    $settingsSmsSender      = $genralSettings['sms_sender'];
    $settingsVisit          = $genralSettings['visit'];
    $settingsMenuMosque		= $genralSettings['menu_mosque'];
    $settingsMenuNeighborhood	= $genralSettings['menu_neighborhood'];
    $settingsMenuCenter	= $genralSettings['menu_center'];

#############################################################
# Check Foler And Filename
#############################################################

	$cur_dir = getcwd();
	$script = $_SERVER['SCRIPT_NAME'];
	$script_floder = dirname($script);
	$name_dir = substr($script_floder, 1);
	$this_url_page = basename($_SERVER['REQUEST_URI']);
 	if (strpos($this_url_page, "?") !== false) $this_url_page = reset(explode("?", $this_url_page));
#############################################################
# Check Admin Login
#############################################################
if($name_dir == $adminFolder){
    if ($UserLoggedIn->isLoggedIn() == false) {
        if($this_url_page != 'login.php'){
            header('Location: login.php');
        }
    }
}

#############################################################
# Get Permission & Data Users
#############################################################
    if ($UserLoggedIn->isLoggedIn() == true) {
        $query_users            = "SELECT * FROM `users` WHERE id=:id";   
        $data_user_array['id']  = $_SESSION['user_id'];
        $dataUser               = $pdo->pdoGetRow($query_users,$data_user_array);
        $idUser                 = $dataUser['id'];
        $firstNameUser          = $dataUser['first_name'];
        $familyNameUser         = $dataUser['family_name'];
        $FullNameUser           = $dataUser['full_name'];
        $genderUser             = $dataUser['gender'];
        $dateUser               = $dataUser['date'];
        $groupsUser             = $dataUser['groups_id'];
		$IsAdmin				= $dataUser['is_admin'];
        $prLoginAdminUser       = $dataUser['pr_login_admin'];
        $prSettingsUser         = $dataUser['pr_settings'];
        $prCourseUser           = $dataUser['pr_course'];
        $prGroupUser            = $dataUser['pr_group'];
        $prTrainerUser          = $dataUser['pr_trainer'];
        $prReservationUser      = $dataUser['pr_reservation'];
        $prSupportUser          = $dataUser['pr_support'];
        $prBarcodeUser          = $dataUser['pr_barcode'];
        $prPagesUser            = $dataUser['pr_pages'];
        $prSlideUser            = $dataUser['pr_slide'];
        $prBannerUser           = $dataUser['pr_banner'];
        $prSiteFrindUser        = $dataUser['pr_site_frind'];
        $prArchiveUser          = $dataUser['pr_archive'];
        $prRevenuesUser         = $dataUser['pr_revenues'];
        $prCityUser             = $dataUser['pr_city'];
        $prReportsUser          = $dataUser['pr_reports'];
        $prUsersUser            = $dataUser['pr_users'];
        $prSmsUser              = $dataUser['pr_sms'];
        $prMosque              	= $dataUser['pr_mosque'];
        $prBan              	= $dataUser['pr_ban'];
        $prCertificate			= $dataUser['pr_certificate'];

		if($name_dir == $adminFolder){
			if($IsAdmin == 'yes'){
				if($this_url_page == 'settings.php') {
					$pageheader = "الأعددات الرئيسية";
					$iconheader = "fa fa-home";
					if($prSettingsUser == 0){ header('Location: permission.php');}
				}
				elseif($this_url_page == 'course.php'){
					$pageheader = "الدورات";
					$iconheader = "fa fa-home";
					if($prCourseUser == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'group.php'){
					$pageheader = "المجموعات";
					$iconheader = "fa fa-home";
					if($prGroupUser == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'trainer.php'){
					$pageheader = "المدربين";
					$iconheader = "fa fa-home";
					if($prTrainerUser == 0) header('Location: permission.php');
				}
                
				elseif($this_url_page == 'reservation.php'){
					$pageheader = "الحجوزات";
					$iconheader = "fa fa-home";
					if($prReservationUser == 0) header('Location: permission.php');
				}	
				elseif($this_url_page == 'support.php'){
					$pageheader = "الدعم الفني";
					$iconheader = "fa fa-home";
					if($prSupportUser == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'barcode.php'){
					$pageheader = "الباركود";
					$iconheader = "fa fa-home";
					if($prBarcodeUser == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'mosque.php'){
					$pageheader = "المساجد";
					$iconheader = "fa fa-home";
					if($prMosque == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'pages.php'){
					$pageheader = "الصفحات الخاصة";
					$iconheader = "fa fa-home";
					if($prPagesUser == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'revenues.php'){
					$pageheader = "الأيرادات";
					$iconheader = "fa fa-home";
					if($prRevenuesUser == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'slide.php'){
					$pageheader = "السلايدات";
					$iconheader = "fa fa-home";
					if($prSlideUser == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'banner.php'){
					$pageheader = "البنرات";
					$iconheader = "fa fa-home";
					if($prBannerUser == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'site_frind.php'){
					$pageheader = "مواقع صديقة";
					$iconheader = "fa fa-home";
					if($prSiteFrindUser == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'archive.php'){
					$pageheader = "الأرشيف";
					$iconheader = "fa fa-home";
					if($prArchiveUser == 0) header('Location: permission.php');
				}
                
                
				elseif($this_url_page == 'reports.php'){
					$pageheader = "التقارير";
					$iconheader = "fa fa-home";
					if($prReportsUser == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'users.php'){
					$pageheader = "الأعضاء";
					$iconheader = "fa fa-home";
					if($prUsersUser == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'certificate.php'){
					$pageheader = "طباعة الشهادات";
					$iconheader = "fa fa-home";
					if($prCertificate == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'sms.php'){
					$pageheader = "رسائل SMS";
					$iconheader = "fa fa-home";
					if($prSmsUser == 0) header('Location: permission.php');
				}
				elseif($this_url_page == 'banned.php'){
					$pageheader = "حظر الأعضاء";
					$iconheader = "fa fa-home";
					if($prSmsUser == 0) header('Location: permission.php');
				}
				
			}else{
				header('Location: permission.php?do=no');
			}
		}
    }


#############################################################
# Function SendSms
#############################################################

    function SendSms($msg , $number ) {
        global $settingsSmsGateway;
        global $settingsSmsUsername;
        global $settingsSmsPassword;
        global $settingsSmsSender;
        $msg        = urlencode($msg);
        $sender     = urlencode($settingsSmsSender);
        $userd      = $settingsSmsUsername;
        $passd      = urlencode($settingsSmsPassword);
        $number     = substr( $number , 1 , 9 );
        $numberd    = '966'.$number ;
        $url        = $settingsSmsGateway."?"."user=".$settingsSmsUsername."&password=".$settingsSmsPassword."&numbers=".$numberd."&sender=".$settingsSmsSender."&message=".$msg."&lang=ar";
		$hompage     = file_get_contents($url);
		return $hompage ;
	  }
      
#############################################################
# Function Pagination
#############################################################
 
   function pagination($stmt, $per_page = 10,$page = 1, $url = '?'){  
        global $pdo;
        $query = "SELECT * FROM ".$stmt."";
    	$rowCount = $pdo->pdoExecute($query);
    	$row = $pdo->pdoRowCount($rowCount);
    	$total = $row;
        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $lastpage = ceil($total/$per_page);
    	$lpm1 = $lastpage - 1;
    	
    	$pagination = "";
    	if($lastpage > 1)
    	{	
    		$pagination .= "<ul class='pagination'>";
    		if ($lastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $lastpage; $counter++)
    			{
    				if ($counter == $page)
    					$pagination.= "<li class='active'><a>$counter</a></li>";
    				else
    					$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    			}
    		}
    		elseif($lastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li class='active'><a>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    				}
    				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
    				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
    				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li class='active'><a>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    				}
    				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
    				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
    			}
    			else
    			{
    				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
    				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
    				$pagination.= "<li class='dot'>..</li>";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li class='active'><a>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
    			$pagination.= "<li><a href='{$url}page=$next'>التالى</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'>الاخيرة</a></li>";
    		}else{
    			$pagination.= "<li><a class='current'>التالى</a></li>";
                $pagination.= "<li><a class='current'>الاخيرة</a></li>";
            }
    		$pagination.= "</ul>";		
    	}
    
            return $pagination;
    } 

#############################################################
# Cut Text
#############################################################

    function cutText($string, $length) {
		if ($length < strlen($string)) {
			while ($string{$length} != " ") {
				$length--;
			}
			return substr($string, 0, $length);
		} else
			return $string;
    }
	
#############################################################
# Safe GET
#############################################################
    function get_safe($num){
        return htmlspecialchars(trim(abs(ceil(intval($num)))));
    }
  
#############################################################
# Generate Random Number
#############################################################

    function RandNumber($e){
        for($i=0;$i<$e;$i++){
		    $rand =  $rand .  rand(0, 9);  
		 }
        return $rand;
    }

#############################################################
# Generate Random Hash
#############################################################

    function GeraHash($qtd){
        $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
        $QuantidadeCaracteres = strlen($Caracteres);
        $QuantidadeCaracteres--;
        $Hash=NULL;
        for($x=1;$x<=$qtd;$x++){
            $Posicao = rand(0,$QuantidadeCaracteres);
            $Hash .= substr($Caracteres,$Posicao,1);
        }
        return $Hash;
    }






?>


