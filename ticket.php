<?php
    require ("header.php");
    
#############################################################
# Add Ticket
#############################################################

	if (isset($_POST['btnsend'])) {
        if (strtolower ( $_POST ['captcha'] ) != strtolower ( $_SESSION ['captcha'] )) {
			$msg = '<div class="alert alert-danger" role="alert">خطأ في رمز التحقق</div>';
        } else {
            $data['user_id']		    = $idUser;
            $data['date']		       = time();
            $data['title']		      = trim($_POST['title']);
            $data['details']	        = trim($_POST['details']);
            $insert = $pdo->pdoInsUpd('ticket', $data);
            $isInsert = $pdo->pdoRowCount($insert);
            if($isInsert == 1){
                header('Location: ?do=successfully');
            } else {
                header('Location: ?do=failure');
            }

        }
    }
?>

    <aside id="sidebar" class="medium-3 large-3 columns">
             <?php include('right-pages.php') ?>
 </aside>

    <div class="large-9 columns">

      <section class="section margin-top-off">

        <div class="page-title">
          <h1>بطاقاتي</h1>

          <div class="breadcrumbs">
            <a href="home.php" title="">الرئيسية</a>
            <a href="ticket.php" title="">بطاقاتي</a>
          
          </div>
        </div>
            <?php if(isset($_GET['do']) and $_GET['do'] == 'successfully') { ?>
                 <div class="" role="alert">
                     <p class="alert alert-success">   تم ارسال بطاقتك بنجاح, وسيتم إعلامك فور الرد عليها برساله على جوالك ...
                        <a class="alert-close" href="#"></a>
                     </p>
                 </div>
            <?php } ?>
             <?php if(isset($_GET['do']) and $_GET['do'] == 'failure') { ?>
                     <div class="" role="alert">
                         <p class="alert alert-danger">  حدث خطأ, قم بالمحاولة مرة اخرى
                            <a class="alert-close" href="#"></a>
                         </p>
                    </div>  
            <?php } 
                 echo '<div data-alert="alert alert-warning" class="alert-box secondary">'. $msg .'</div>' ; 
             ?>

<div class="relative">
                   
           <ul class="accordion">
             <div class="row post-list two-cols">
                  <li class=" medium-12 large-12 columns accordion-navigation right">
                <!--  <button class="button large colored" data-toggle="modal" data-target="#addTicket"></button>-->
                      <a class="acc-trigger" data-mode=""  href="?program='.$result['id'].'">إرسال بطاقة</a>
                      <div class="content" style="display: none;">
                          

                            
                            <form method="post">
                                    
                                               

                                        <div class="form-group">
                                         <label>عنوان البطاقة </label>
                                                <input tybe="text" class="form-control" name="title" id="title">
                                               
                                              </div>


                                        <div class="form-group">
                                            <label>التفاصيل </label>
                                                <textarea name="details" rows="3"  class="form-control" id="details"></textarea>
                                               
                                              </div>

                                        <div class="form-group">
                                            <label>رمز التحقق  </label>
                                                <img src="tools/captcha/showCaptcha.php" alt="captcha" />
                                                <input type="text" name="captcha" class="form-control" id="captcha" placeholder="قم بكتابة الرمز الذي تراه هنا">
                                          
                                      </div>
                                                                        
                                               
                                             <div class="form-group">  
                                                <input name="btnsend" type="submit" class="btn btn-primary btn-lg" id="btnsend" value="ارسال">
                                             </div>   
                                            
                              </form>




                      </div>
                 </li>
            </div>
        </ul>
</div>









             
         
            <?php
                $sqlIdUser = "SELECT * FROM `ticket` WHERE `user_id`=:user_id ORDER BY id DESC";
                $dataIdUser[user_id] = $idUser;
                $ExecuteSql = $pdo->pdoExecute($sqlIdUser, $dataIdUser);
                if($pdo->pdoRowCount($ExecuteSql) < 1) {
                echo '<div data-alert="" class="alert-box secondary">لايوجد أي بطاقة مدخله من قبلك</div>';
                } else {
            ?>
             <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>م</th>
                        <th>عنوان البطاقة</th>
                        <th>تاريخ الارسال</th>
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $rowsa = $pdo->pdoGetAll($sqlIdUser, $dataIdUser);
                foreach($rowsa as $result) {
                ?>
                    <tr>
                        <td><?php echo $result['id'] ?></td>
                        <td><a href="ticket_details.php?id=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a></td>
                        <td><?php echo date('Y / m / d', $result['date']) ?></td>
                        <td><?php echo $result['status'] == '0' ? "مغلقة" : "مفتوحة" ?></td>
                    </tr>
                 <?php } ?>
                    
                </tbody>
            </table>
                <?php } ?>
                            





       
</section>
      <!--/ .section-->

    </div>

          <?php include('footer.php') ?>
