<? include('header.php') ?>
    <aside id="sidebar" class="medium-3 large-3 columns">
	<?php include('right-pages.php') ?>
    </aside>

    <div class="large-9 columns">

      <section class="section margin-top-off">

        <div class="page-title">
          <h1>أخبار الجمعية</h1>

          <div class="breadcrumbs">
            <a href="home.php" title="">الرئيسية</a>
            <a href="news.php">أخبار الجمعية</a>
          
          </div>
        </div>


    <div class="row post-list two-cols">


<?php
    $sql = "SELECT * FROM `news` ORDER BY id DESC LIMIT 8 ";
    $rows = $pdo->pdoGetAll($sql);
    foreach($rows as $result) {
    ?>
              <article class="medium-12 large-12 columns">

                <div class="post border post-alternate-2 slideUpRun">

                  <div class="entry-media">

                    <a href="news_details.php?id=<?php echo $result['id']?>"  class="image-post item-overlay ">
                      <img style="height:90px ; width:120px"  src="data/images/<?php echo $result['image'] ?>" alt="">
                    </a>

                  </div>

                  <div class="entry-content">

                    <header class="entry-header">
                                            <span class="cat-links">
                                            <h3><a href="news_details.php?id=<?php echo $result['id']?>" rel="category tag"><?php echo $result['title'] ?></a></h3>

                      </span>
                      <h4 class="entry-title"><a href="news_details.php?id=<?php echo $result['id']?>">

                      <?php $txt = cutText($result['details'],300);
                           echo $txt . ' ....'; 
                           ?>


                        </a></h4>
                    </header>

                    

                  </div>
                </div>
                <!--/ .post-extra-->

              </article>

   <?php } ?>
   </div>



</section>
</div>
<? include('footer.php') ?>
