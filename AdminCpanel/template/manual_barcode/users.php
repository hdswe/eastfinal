<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">طباعة تقرير الحضور</h3>
        </div>
        <div class="panel-body">
        <form action="" method="post" id="showform" name="showform" onsubmit="return validate()">
          <div class="table-responsive">
          <div class="mb30">
                <a href="print_attendance_reports.php?course=<?= $_GET['course'] ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span> &nbsp; طباعة الأعضاء</a></div>
          <table class="table table-hidaction table-hover mb30">
                  <thead>
              <tr>
                      <th>&nbsp;</th>
                <th width="50%">الاسم</th>
                <th>رقم الجوال</th>
                <th class="case_day">اليوم الأول</th>
                <th class="case_day">اليوم الثاني</th>
                </tr>
            </thead>
            <tbody>
                <?
			    $course = $_GET['course'];
                $sql = "SELECT 
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
                        
                        ORDER BY `resid`
                    ";

                    $rows = $pdo->pdoGetAll($sql);
                    $i =1;
                    foreach($rows as $result) {
                ?>
                <tr class="unread">
                        <td>
                        <?= $i ?>
                        
                                                  
                        </td>
                <td><a href="profile.php?id=<?= $result['userid'] ?>"><?= $result['first_name']." ".$result['middle_name']." ".$result['last_name'] ?></a><br>
                </td>
                <td><?= $result['username'] ?></td>
                <td class="case_day">
                <? 
                if($result['day1'] == '0')
                    echo '<span class="fa fa-check"> </span>';
                if($result['day1'] == '1')
                    echo '<span class="fa fa-times"></span>';
                ?>  
                </td>
                <td class="case_day">
                <? 
                if($result['day2'] == '0')
                    echo '<span class="fa fa-check"> </span>';
                if($result['day2'] == '1')
                    echo '<span class="fa fa-times"></span>';
                ?>  
                </td>
                </tr>
                <? $i ++; }  ?>
                
            </tbody>
  </table>
        
          </div>
          </form>
          <!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div>
      