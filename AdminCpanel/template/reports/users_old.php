<div class="statsRow">
        <div class="wrapper">
        	<div class="controlB">
            	<ul>
                    <li><a href="javascript:window.print()" title=""><img src="images/icons/control/32/statistics.png" alt="" /><span>طباعة تقرير الحضور</span></a></li>
                    

                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
<form action="" method="post" class="form">
        <fieldset>

<div class="widget">
        <div class="title"><span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span><h6>تسجيل حضور الاعضاء المؤكدين في الدورة</h6></div>
          <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck" id="checkAll">
              <thead>
                  <tr>
                      <td><img src="images/icons/tableArrows.png" alt="" /></td>
                      <td>اسم الطالب</td>
                      <td>رقم الهاتف</td>
                      <td>اليوم الأول</td>
                      <td><p>اليوم الثاني</p></td>
                  </tr>
              </thead>
              <tbody>
			<?
			if($_GET['do'] == "users"){
			$course = $_GET['course'];
			$query = "SELECT 
			reservation.id AS resid,
			reservation.users,
			reservation.status,
			reservation.day1,
			reservation.day2,

			course.id AS coid,
			course.title,
			course.city,
			course.location,
			
			users.id AS userid,
			users.username,
			users.first_name,
			users.middle_name,
			users.last_name
			
			FROM `reservation`,`course`,`users`
			
			WHERE
			reservation.course = course.id AND
			reservation.users = users.id AND
			course.id = $course AND
			reservation.status = '0'
			
			ORDER BY `resid`";
			$rows = $db->query($query);
			while($record = $db->fetch($rows)){
			?>
                  <tr>
                      <td><input name="cbselect[]" type="checkbox" id="titleCheck2" value="<? $id = $record['resid']; echo $id ?>" /></td>
                      <td><? echo $record['first_name']." ".$record['middle_name']." ".$record['last_name'] ?></td>
                      <td><? echo $record['username'] ?></td>
                      <td align="center"><? 
						 if($record['day1'] == '0')
						  echo "<img src='images/icons/notifications/accept.png' width='24' height='24'>";
						  if($record['day1'] == '1')
						  echo "<img src='images/icons/notifications/exclamation.png' width='24' height='24'>";
					  ?>                                            
                      <td align="center"><? 
						 if($record['day2'] == '0')
						  echo "<img src='images/icons/notifications/accept.png' width='24' height='24'>";
						  if($record['day2'] == '1')
						  echo "<img src='images/icons/notifications/exclamation.png' width='24' height='24'>";
					  ?>
                </tr>
             <? } } ?>     
              </tbody>
          </table>
          <div class="formRow"></div>
        </div>
        
        		</fieldset>          
        </form>