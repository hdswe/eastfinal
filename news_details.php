<? 
	include('header.php');
	if(isset($_GET['id'])){
		$id_news = get_safe($_GET['id']);
		$sqlIdNews = "SELECT * FROM `news` WHERE `id`=:id";
		$dataIdNews[id] = $id_news;
		$ExecuteSql = $pdo->pdoExecute($sqlIdNews, $dataIdNews);
		if($pdo->pdoRowCount($ExecuteSql) == 1){
            $result = $pdo->pdoGetRow($sqlIdNews, $dataIdNews);
			$title=$result['title'];
			$image=$result['image'];
			$details=$result['details'];
			$date=$result['date'];
					
 		} else {
            header('Location: 404.php');
		}
    }else{
        header('Location: 404.php');
    }

?>
    <aside id="sidebar" class="medium-3 large-3 columns">
	<?php include('right-pages.php') ?>
    </aside>

    <div id="main" class="medium-9 large-9 columns">

			<div class="post full-width">

				<a href="data/images/<?= $image ?>" class="image-post item-overlay single-image-link">
					<img src="data/images/<?= $image ?>" alt="Congue iure curabitur incididunt consequat">
				</a>

				<header class="entry-header">
					<h2 class="entry-title"><?= $title ?></h2>

					<div class="entry-meta">
						<span class="posted-on"><a href="#"><?= date('d/m/Y', $date) ?></a></span>
					</div>
				</header>

				<div class="entry-content">

					<?= $details ?>
				</div>

				

			</div>
			<!--/ .post-->

			<div class="social-shares">
				<ul class="social-icons">
					<li class="twitter">
						<a href="http://twitter.com/" target="_blank" title="Twitter">Twitter</a>
					</li>
					<li class="facebook">
						<a href="http://www.facebook.com/" target="_blank" title="Facebook">Facebook</a>
					</li>
					<li class="pinterest">
						<a href="//pinterest.com/" target="_blank" title="Pinterest">Pinterest</a>
					</li>
					<li class="gplus">
						<a href="http://plus.google.com/" target="_blank" title="Google+">Google+</a>
					</li>
					<li class="rss">
						<a href="http://diplomat.webtemplatemasters.com/feed/" target="_blank" title="RSS">RSS</a>
					</li>
				</ul>
			</div>

			

			

			<div class="related-article-area">
				<h2 class="section-title">مقالات ذات صلة</h2>

				<div class="row">
				<?php
                $sql = "SELECT * FROM `news` ORDER BY RAND() LIMIT 4";
                $rows = $pdo->pdoGetAll($sql);
                foreach($rows as $result) {
                ?>					
					<div class="large-3 columns">

						<article class="post related">
							<a href="data/images/<?= $result['image'] ?>" class="image-post item-overlay single-image-link">
								<img src="data/images/<?= $result['image'] ?>" alt="">
							</a>
							<header class="entry-header">
								<h4 class="entry-title">
									<a href="news_details.php?id=<?= $result['id']?>"><?= $result['title'] ?></a>
								</h4>
							</header>

							<footer class="entry-footer">
								<span class="posted-on"><a href="#"><?= date('d/m/Y', $result['date']) ?></a></span>
							</footer>
						</article>

					</div>
					<? } ?>


				</div>
				<!--/ .row-->

			</div>
			<!--/ .related-article-area-->


			

		</div>
<? include('footer.php') ?>
