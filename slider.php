<div id="layerslider_1_1" class="ls-wp-container"
						 style="width:1140px;height:500px;max-width:1140px;margin:0 auto;margin-bottom: 0px;">
    <?php
    $sql = "SELECT * FROM `slide` WHERE `status` = 1 ORDER BY `id` DESC";
    $rows = $pdo->pdoGetAll($sql);
    foreach($rows as $result) :?>
				<div class="ls-slide" data-ls="transition2d:11;">
					<img src="data/images/<?php echo $result['image'] ?>" class="ls-bg" alt="slide-4"/>

					<h2 class="ls-l" style="top:210px;left:50%;font-size:48px;white-space: nowrap;"
						data-ls="offsetxin:0;durationin:600;delayin:500;easingin:easeInOutExpo;scalexin:0.5;scaleyin:0.5;offsetxout:0;durationout:600;easingout:easeInOutExpo;scalexout:0;scaleyout:0;">
						<?php echo $result['title'] ?></h2>

					<h3 class="ls-l" style="top:270px;left:50%;font-size:36px;white-space: nowrap;"
						data-ls="offsetxin:0;offsetyin:20;durationin:500;delayin:1000;easingin:linear;scalexin:0.7;scaleyin:0.7;offsetxout:0;durationout:600;scalexout:0;scaleyout:0;">
						<?php echo $result['details'] ?></h3>
				</div>
			<?php endforeach ?>

			<a class="ls-nav-prev" href="#" style="visibility: visible; display: none;"></a>
			<a class="ls-nav-next" href="#" style="visibility: visible; display: block; opacity: 1;"></a>
</div>	