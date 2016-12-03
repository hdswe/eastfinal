<?php
    require ("header.php");
    
#############################################################
# Check Login User
#############################################################
    if(isset($idUser)){
		$sqlIdNumber = "SELECT * FROM `users` WHERE `id`=:id";
		$dataIdNumber[id] = $idUser;
		$result = $pdo->pdoGetRow($sqlIdNumber, $dataIdNumber);
    } else { 
        header('Location: index.php');
    }

#############################################################
# Update User Data
#############################################################
    if(isset($_POST['btnedit'])) {
            $data['first_name']             = trim($_POST['first_name']);
            $data['father_name']            = trim($_POST['father_name']);
            $data['grand_father_name']      = trim($_POST['grand_father_name']);
            $data['family_name']            = trim($_POST['family_name']);
            $data['full_name']              = $_POST['first_name']." ".$_POST['father_name']." ".$_POST['grand_father_name']." ".$_POST['family_name'];
            $data['email']		          = trim($_POST['email']);
            $data['gender']                 = trim($_POST['gender']);
            $data['city']		           = trim($_POST['city']);
            $data['neighborhood_id']		       = trim($_POST['neighborhood_id']);
            $data['mosque_id']		         = $_POST['mosque_id'];
            $data['nationality']            = trim($_POST['nationality']);
            $data['qualification']          = trim($_POST['qualification']);
            $data['username']          = trim($_POST['username']);
            $data['password']             = trim($_POST['password']);
            $where[id] = $idUser;
            $update = $pdo->pdoInsUpd('users', $data, 'update', $where);
			header('Location: ?do=successfully');

    }


?>

    <aside id="sidebar" class="medium-3 large-3 columns">
             <?php include('right-pages.php') ?>
 </aside>

    <div class="large-9 columns">

      <section class="section margin-top-off">

        <div class="page-title">
          <h1> بياناتي</h1>

          <div class="breadcrumbs">
            <a href="home.php" title="">الرئيسية</a>
            <a href="my_profile.php" title="">بياناتي</a>
          
          </div>
        </div>
<form method="post" role="form">
    <?php if(isset($_GET['do']) and $_GET['do'] == 'successfully') { ?>

        <div class="" role="alert">
            <p class="error">
              تم تعديل بياناتك بنجاح 
                <a href="#" class="alert-close"></a>
            </p>
        </div>
        <?php } ?>
                  <div class="form-group">             
                  <label>رقم بطاقة الاحوال / الاقامة</label>

                    <input type="text" name="id_number" disabled class="form-control" id="id_number" value="<?php echo $result['id_number'] ?>" readonly>
                   
                   </div>
               
                                <div class="row">        
                  <div class="col-md-3">            
                 <div class="form-group">                           
                 <label>الأسم </label>        
                    <input  type="text"name="first_name"  id="first_name" class="form-control" placeholder="الاسم الاول" value="<?php echo $result['first_name'] ?>" readonly>
                
                </div> 
                </div>

<div class="col-md-3">
                <div class="form-group">  
                <label>اسم الاب</label>  
                    <input  type="text"name="father_name"  id="father_name" class="form-control" placeholder="اسم الاب" value="<?php echo $result['father_name'] ?>" readonly>
                </div>  
                </div>

<div class="col-md-3">
                <div class="form-group">  
                <label>اسم الجد</label>   
                    <input  type="text"name="grand_father_name" class="form-control" id="grand_father_name" placeholder="اسم الجد" value="<?php echo $result['grand_father_name'] ?>" readonly>
               </div> 
               </div>

<div class="col-md-3">
               <div class="form-group">  
                <label>اسم العائلة</label> 
                    <input  type="text"name="family_name" class="form-control" id="family_name" placeholder="اسم العائلة" value="<?php echo $result['family_name'] ?>" readonly>
                 </div> 
                 </div>                           
                       </div>    

                <div class="form-group">                        
                    <label>الايميل </label>
                        <input type="email" name="email"  id="email" class="form-control" value="<?php echo $result['email'] ?>" readonly>
                  
                   </div> 
                

                    <input name="hdn_pass" type="hidden" id="hdn_pass" class="form-control" value="<?php echo $result['password'] ?>">
                   
                <div class="form-group">
                    <label>كلمة المرور </label>
                        <input  type="password" name="password"  class="form-control" id="password">
                   
                    </div>
               
               <div class="form-group">                         
                    <label>اعد كلمة المرور</label> 
                        <input type="password" name="repassword" class="form-control" id="repassword">                     
                    </div>


                 <div class="form-group">
                     <label>المدينة </label> 
                        <input type="text" name="city"  id="city" class="form-control" value="<?php echo $result['city'] ?>">
                    
                     </div>            
                     <div class="form-group">

                     <label>الحي</label>   
							<select name="neighborhood_id"  id="neighborhood_id" class="form-control">
							<option><?php echo $result['neighborhood_name'] ?></option>
                                        <?php
                                            $sql_na = "SELECT * FROM `neighborhood` ORDER BY `id` ASC";
                                            $rows_na = $pdo->pdoGetAll($sql_na);
                                            foreach($rows_na as $result_na) {
                                        ?>
                                        <option value="<?php echo $result_na['id'] ?>" <?php echo $result['neighborhood_id'] == $result_na['id'] ? "selected='selected'" : "" ?>><?php echo $result_na['title'] ?></option>
                                          <?php } ?>
                            </select>
                                        
                  </div>
                  <div class="form-group">

                     <label>رقم الجوال </label>  
                          <input type="text" name="username" class="form-control" id="username" value="<?php echo $result['username'] ?>">
                                               
                                            
                  </div>
                  <div class="form-group">

                     <label>المسجد /  الجامع</label>
                         <select name="mosque_id" required class="form-control" id="mosque_id">        
                  
						<option><?=$result['mosque_name'] ?></option>
                                        <?php
                                            $sql_mosq = "SELECT * FROM `mosque` ORDER BY `id` ASC";
                                            $rows_mosq = $pdo->pdoGetAll($sql_mosq);
                                            foreach($rows_mosq as $result_mosq) {
                                        ?>
                                        <option value="<?php echo $result_mosq['id'] ?>" <?php if($result['mosque_id'] == $result_mosq['id']){ echo 'selected="selected"'; }else{ echo '';} ?>><?php echo $result_mosq['title'] ?></option>
                                        <?php } ?>
                                        </select>
                                       
                                        
                   </div>
                   <div class="form-group">

                     <label>الجنسية </label>
                        <input type="text" name="nationality" class="form-control" id="nationality" value="<?php echo $result['nationality'] ?>" readonly>  
                                            
                     </div>            
                  <div class="form-group">

                    <label>الجنس</label>
                    <select name="gender" disabled  id="gender" class="form-control">
                            <option value="ذكر" <?php echo $result['gender'] == "ذكر" ? "selected='selected'" : "" ?>>ذكر</option>
                            <option value="انثى" <?php echo $result['gender'] == "انثى" ? "selected='selected'" : "" ?>>انثى</option>
                    </select>
                    </div>                   
                                       
                  <div class="form-group">

                    <label>المؤهل العلمي </label>
                    <select name="qualification"  id="qualification" class="form-control">
                            <option value="ثانوي" <?php echo $result['qualification'] == "ثانوي" ? "selected='selected'" : "" ?>>ثانوي</option>
                            <option value="دبلوم" <?php echo $result['qualification'] == "دبلوم" ? "selected='selected'" : "" ?>>دبلوم</option>
                            <option value="بكالوريوس" <?php echo $result['qualification'] == "بكالوريوس" ? "selected='selected'" : "" ?>>بكالوريوس</option>
                            <option value="ماجستير" <?php echo $result['qualification'] == "ماجستير" ? "selected='selected'" : "" ?>>ماجستير</option>
                            <option value="دكتوراه" <?php echo $result['qualification'] == "دكتوراه" ? "selected='selected'" : "" ?>>دكتوراه</option>
                    </select>
                    </div>
                          <div class="form-group">      
                            <input name="btnedit" type="submit" class="btn btn-primary btn-lg" id="btnedit" value="تعديل">
                             </div>   
                        </form>
       
</section>
      <!--/ .section-->

    </div>


    <!--/ #sidebar-->

      </main>
    <!--/ #main-->

    



          <?php include('footer.php') ?>
