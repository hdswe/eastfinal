
	</main>
	<!--/ #content -->


	<!-- - - - - - - - end MAIN - - - - - - - -->

	<!-- - - - - - - - FOOTER - - - - - - - -->

	<footer id="footer">

		<div class="footer-top">

			<div class="row">

				<div class="large-4 columns">

					<div id="text-2" class="widget widget_text">
						<h3 class="widget-title">عن مركز الشرق</h3>

						<div class="textwidget">
							<p>
								Nascetur fugiat corporis cillum nihil illo! Ullamcorper, lectus, imperdiet etiam
								quibusdam mi, accumsan placeat blandit dolor? Voluptates sint, eius litora minima?
								Mollitia ullamcorper, at cupidatat voluptate ullam, eius nulla.
							</p>
						</div>
					</div>

					<div class="widget widget_social clearfix">

						<h3 class="widget-title">تابعنا عبر المواقع الاجتماعية</h3>

						<ul class="social-icons">
							<li class="twitter">
								<a target="_blank" href="#">Twitter</a>
							</li>

							<li class="facebook">
								<a target="_blank" href="#">Facebook</a>
							</li>


							<li class="gplus">
								<a target="_blank" href="#">Google Plus</a>
							</li>

							<li class="instagram">
								<a target="_blank" href="#">Instagram</a>
							</li>

						</ul>

					</div>
					<!--/ .widget_social-->

					
					<!--/ .widget-container-->
				</div>

				<div class="large-4 columns">

					<div class="widget widget_nav_menu">
						<h3 class="widget-title">روابط</h3>

						<div class="menu-issues-container">
							<ul id="menu-issues" class="menu">
								<li>
									<a href="#">الرئيسية</a>
								</li>
								<li>
									<a href="#">من نحن</a>
								</li>
								<li>
									<a href="#">تسجيل مدرب</a>
								</li>
								<li>
									<a href="#">تسجيل متدرب</a>
								</li>
								<li>
									<a href="#">الدورات</a>
								</li>
								<li>
									<a href="#">اتصل بنا</a>
								</li>
							</ul>
						</div>
					</div>

					
				</div>

				<div class="large-4 columns">
					<div class="widget widget_recent_entries">
						<h3 class="widget-title">اخر الأخبار</h3>
						<ul>
						<?php
                        $sql = "SELECT * FROM `news` ORDER BY id DESC LIMIT 3 ";
                        $rows = $pdo->pdoGetAll($sql);
                        foreach($rows as $result) {
                        ?>
							<li>
								<a href="single-post.html"><?php echo $result['title'] ?></a>
								<span class="post-date"><?php echo date('d/m/Y',$result['date']) ?></span>
							</li>
                        <? } ?>
						</ul>
					</div>

					

				</div>

			</div>
			<!--/ .row-->
<div class="row">
<div class="large-12 columns" style="border-top:1px solid #5D5D5F;">

					<div class="widget widget_latest_tweets">

						<h3 class="widget-title">جديد التغريدات</h3>

						<div class="tweets-container" id="tweet"></div>

					</div>

				</div>

</div>
		</div>
		<!--/ .footer-top-->

		<div class="footer-bottom">

			<div class="row">

				<div class="large-6 columns">
					<div class="copyright">
						كافة الحقوق محفوظة لمركز الشرق © 2016
					</div>
				</div>

				<div class="large-6 columns">
					<div class="developed">
						برمجة وتطوير <a target="_blank" href="http://www.dreams.com.sa/">مجموعة الأحلام ديزاين</a>
					</div>
				</div>

			</div>
			<!--/ .row-->

		</div>
		<!--/ .footer-bottom-->

	</footer>
	<!--/ #footer-->

	<!-- - - - - - - - END FOOTER - - - - - - - -->

</div>
<!--/ #wrapper-->

<!-- - - - - - - -  END WRAPPER  - - - - - - - -->

<!-- Vendor
================================================== -->
<script src="js/vendor/jquery-1.11.3.min.js"></script>
<!--[if lt IE 9]>
<script src="js/vendor/respond.min.js"></script>
<script src="js/vendor/jquery.selectivizr.min.js"></script>
<![endif]-->

<script src="js/vendor/mediaelement/mediaelement-and-player.min.js"></script>
<script src="js/vendor/widgets/twitterFetcher_min.js"></script>
<script src="js/vendor/owlcarousel/owl.carousel.min.js"></script>
<script src="js/vendor/plugins.js"></script>
<script src="js/vendor/modals.js"></script>


<!-- External libraries: GreenSock
================================================== -->
<script src="js/vendor/layerslider/js/greensock.js" type="text/javascript"></script>

<!-- LayerSlider script files
 ================================================== -->
<script src="js/vendor/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="js/vendor/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- Theme Base, Components and Settings
================================================== -->
<script src="js/config.js"></script>
<script src="js/theme.js"></script>
</body>
</html>
<? ob_flush() ?>