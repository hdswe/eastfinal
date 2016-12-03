<?php
	include('header.php');
    $id = get_safe($_GET['id']);
    $sql = "SELECT * FROM `pages` WHERE id=:id";
    $data[id] = $id;
    $result = $pdo->pdoGetRow($sql,$data);

?>
    <aside id="sidebar" class="medium-3 large-3 columns">
	<?php include('right-pages.php') ?>
    </aside>

    <div class="large-9 columns">

      <section class="section margin-top-off">

        <div class="page-title">
          <h1><?php echo $result['title'] ?></h1>

          <div class="breadcrumbs">
            <a href="home.php" title="">الرئيسية</a>
            <a href="page.php?id=<?php echo $result['id'] ?>" title=""><?php echo $result['title'] ?></a>
          
          </div>
        </div>

        <div class="information">
          <p><?php echo $result['details'] ?></p>
        </div>

      


     
      </section>
      <!--/ .section-->

    </div>
    <!--/ #main-->

    <!--/ #sidebar-->


<?php include('footer.php') ?>
