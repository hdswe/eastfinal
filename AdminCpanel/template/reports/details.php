<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">تقارير</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
          
               

        
          <table class="table table-hidaction table-striped mb30">
            <thead>
              <tr>
              	<th>عنوان البرنامج</th>
                <th>عدد الدورات</th>
               <th>عدد المدربين</th>
                <th>عدد أيام البرنامج</th>
                <th>عدد ساعات البرنامج</th>
                <th>متوسط  الحضور </th>
                </tr>
            </thead>
            <tbody>
             <?
                $sql = "SELECT * FROM `programs` where programs.id ='".$_GET['programs_id']."'";
                    $ExecuteSql = $pdo->pdoExecute($sql);



                    if($pdo->pdoRowCount($ExecuteSql) < 1){
                    echo '
                    <tr>
                     <td colspan="6">
                        <div class="alert alert-warning">
                            <p>لايوجد نتائج</p>
                        </div>
                     </td>
                    </tr>
                    ';
                    } else {

                    $rows = $pdo->pdoGetAll($sql);
                    
                    foreach($rows as $result) {
                ?>
               <tr class="unread">
                        <td><?= $result['title'] ?></td>
                <td>
                        <?
                $query_rev_confirm = $pdo->pdoExecute("SELECT id FROM `course` where programs_id=".$result['id']."");
                
               $num_rev = $pdo->pdoRowCount($query_rev_confirm);
               echo $num_rev;
               
               ?>
                </td>
                
                        
                <td><?
                 $query = $pdo->pdoExecute("SELECT course.trainer FROM course,  `programs` WHERE programs.id = course.programs_id AND programs.id =".$result['id']."");
                 $num_trainer = $pdo->pdoRowCount($query );
                 echo $num_trainer;
                 ?></td>
                 <td><?= $result['dayCount']?></td>
                 <td><?= $result['duration']?></td>
                 <td><? 
                 $reg_att = $pdo->pdoExecute("SELECT registr_attend.user_id FROM  `registr_attend` , course, programs
WHERE programs.id =18 AND programs.id = course.programs_id AND course.id = registr_attend.course_id");
$reg_num = $pdo->pdoRowCount($reg_att);

                 
                 $res_query = $pdo->pdoExecute("SELECT reservation.user_id FROM  `reservation` , programs, course WHERE programs.id =18 AND programs.id = course.programs_id AND course.id = reservation.course_id");
                 
                 $res_num = $pdo->pdoRowCount($res_query);
                $av = $reg_num/$res_num;
               echo $av*100;
                 ?></td>
                        
                </tr>
                
                <? } } ?>
            </tbody>
          </table>
        <div class="row pagin">
          <div class="col-sm-8"><?


            ?></div>
          <div class="col-sm-4"><?    
 ?></div>
        </div>
          </div>
          
          <!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div>