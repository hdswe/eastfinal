<div class="widget widget_upcoming_events">
        <h3 class="widget-title">جوائز</h3>
        <img src="images/logo2.png" class="img-responsive pull-left" alt=""/>

  </div>


<div class="widget widget_upcoming_events">
  <h3 class="widget-title">بنرات اعلانية</h3>
  <ul>
<?php
    $rows_banner = $pdo->pdoGetAll("SELECT * FROM `banner` WHERE `status` = 1");
     foreach($rows_banner as $result_banner) {  ?>
  <li class="has-thumb">
    <div class="event-container">
     

      <div class="event-media">
        <div class="item-overlay">
          <img src="data/images/<?php echo $result_banner['images']?>" alt="">
        </div>
          <div class="event-content with-excerpt">
          <h4 class="event-title">
            <a href="<?php  echo $result_banner['link'] ?>"><?php echo $result_banner['title'] ?></a>
          </h4>
              </div>
      </div>
    </div>

  </li>
<?php } ?>
  </ul>
</div>








<div id="categories-2" class="widget widget_categories  slideUpRun">
        <h3 class="widget-title">مواقع صديقة</h3>
        <ul>

<?php
     $rows_site_frind = $pdo->pdoGetAll("SELECT * FROM `site_frind` ORDER BY `id` DESC");
     foreach($rows_site_frind as $result_site_frind) { ?>


          <li class="cat-item ">
            <a href="<?php echo  $result_site_frind['url'] ?>"><?php echo $result_site_frind['title'] ?></a>
          </li>
<?php } ?>    
        </ul>
      </div>

