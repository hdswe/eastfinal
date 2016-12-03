<?php
    require ("header.php");
    
#############################################################
# Get Details Ticket
#############################################################

    if(isset($_GET['id'])){
		$id_ticket = get_safe($_GET['id']);
		$sqlIdTicket = "SELECT * FROM `ticket` WHERE `id`=:id";
		$dataIdTicket[id] = $id_ticket;
		$ExecuteSql = $pdo->pdoExecute($sqlIdTicket, $dataIdTicket);
		if($pdo->pdoRowCount($ExecuteSql) == 1){
            $result = $pdo->pdoGetRow($sqlIdTicket, $dataIdTicket);
            $openTicket = $result['status'];
 		} else {
            header('Location: 404.php');
		}
    }else{
        header('Location: 404.php');
    }
    
#############################################################
# Reply Ticket Support
#############################################################
    if ($_POST['btnsend'] == "ارسال") {
		$data['ticket_id'] = $_GET['id'];
		$data['user_id'] = $idUser;
		$data['answered'] = '2';
		$data['details'] = trim($_POST['details']);
		$data['date'] = time();
        $insert = $pdo->pdoInsUpd('reply', $data);
        }
?>

<aside id="sidebar" class="medium-3 large-3 columns">
  <?php include('right-pages.php') ?>
</aside>
<div class="large-9 columns">
  <section class="section margin-top-off">
    <div class="page-title">
      <h1> <?php echo $result['title'] ?></h1>
      <div class="breadcrumbs"> <a href="home.php" title="">الرئيسية</a> <a href="ticket_details.php?id=<?php echo $result['id']  ?>" title=""> <?php echo $result['title'] ?></a> </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
      <tbody>
        <tr>
          <th>بتاريخ</th>
          <td><?php echo date('Y / m / d', $result['date']) ?></td>
        </tr>
        <tr>
          <th>حالة البطاقة</th>
          <td><?php echo $result['status'] == '0' ? "مغلقة" : "مفتوحة" ?></td>
        </tr>
        <tr>
          <th>التفاصيل</th>
          <td><?php echo $result['details'] ?></td>
        </tr>
      </tbody>
    </table>
  </section>
  <div class="row"> <br />
    <h2> الردود</h2>
    <hr>
    <div class="relative ">
      <?php
                $queryReply = $pdo->pdoGetAll("SELECT * FROM `reply` WHERE ticket_id=".$id_ticket." ORDER BY `id` DESC");                    
                foreach($queryReply as $result) {
                ?>
      <h4>
        <?php 
                    $queryUser = $pdo->pdoGetAll("SELECT * FROM `users` WHERE id=".$result['user_id']." ORDER BY `id` DESC");                    
                    $queryUser = "SELECT * FROM `users` WHERE id=:id";
                    $datauser[id] = $result['user_id'];
                    $rowuser = $pdo->pdoGetRow($queryUser, $datauser);
                    echo '<a href="#">'.$rowuser['full_name'].'</a>';

                    ?>
        <small> <?php echo date('Y / m / d - H:i', $result['date']) ?></small> </h4>
      <p><?php echo $result['details'] ?> .</p>
      <div class="clear"></div>
      <div class="divider-1"></div>
      <?php } ?>
    </div>
    <?php if($openTicket == '1') { ?>
    <form method="post">
    <div class="form-group">
    <textarea name="details" rows="5" class="form-control" id="details"></textarea>
    </div>
    <div class="form-group">
    <input name="btnsend" class="btn btn-primary btn-lg" type="submit" id="btnsend" value="ارسال">
    </div>
    </form>
    <?php } ?>
    </section>
    <!--/ .section--> 
    
  </div>
</div>
<?php include('footer.php') ?>
