	<div class="relative">
					<h2 class="section-title">قائمة البرامج</h2>
           <ul class="accordion">
             <div class="row post-list two-cols">
				





<?php
 $rows = $pdo->pdoGetAll("SELECT * FROM `programs` WHERE published='yes' AND archive='no' ORDER BY `id` DESC");
  foreach($rows as $result) 
   {
		echo '<li class="medium-6 large-6 columns accordion-navigation right">';
       
		if($result['published_details'] == 'yes')
			{
			echo '<a class="acc-trigger" data-mode=""  href="?program='.$result['id'].'">'.$result['title'].'</a>';
			echo'<div class="content" style="display: none;">'.$result['details'].'</div>';
			}
			elseif ($result['published_details'] == 'no')
			{
			echo '<a class="acc-trigger1" data-mode=""  href=#">'.$result['title'].'</a>';
			
			}	
		echo '</li>';
	}
?>
			</div>
		</ul>
  </div>