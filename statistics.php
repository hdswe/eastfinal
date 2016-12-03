<ul class="block-with-icons">

 
	<li>
		<a href="issues.html">
			<i class="icon-group"></i>
			<h5>الساعة الان</h5>
			<span><?php echo date("h:i") ?></span>
		</a>
	</li>
	<li>
		<a href="volunteer.html">
		<i class="icon-thumbs-up-4"></i>
		<h5>تاريخ اليوم</h5>
		<span><?php echo date("Y/m/d") ?></span>
	</a>
</li>
<li>
	<a href="event-calendar.html">
		<i class="icon-calendar-inv"></i>
		<h5>عدد الزيارات</h5>
		<span><?php echo $settingsVisit ?></span>
	</a>
</li>
</ul>
