<form action="" method="post" id="showforme" name="showforme">
<div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">فحص الحظر</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <div class="clearfix"></div>
          </div>        
                        

        <table class="table table-hidaction table-striped mb30">
            <thead>
              <tr>
                <th>الاسم</th>
                <th>الحالة</th>
              </tr>
            </thead>
            <tbody>
                <?

                $sql = "SELECT 
                        reservation.id AS resid,
                        reservation.user_id,
                        reservation.course_id,
                        reservation.date,
                        reservation.status,
                        
                        course.id AS coid,
                        course.title,
                        
                        users.id AS userid,
                        users.username,
                        users.full_name,
						users.mosque_id,
						
						mosque.id,
						mosque.title AS mosq_title
                        
                        FROM `reservation`,`course`,`users`,`mosque`
                        
                        WHERE
                        reservation.course_id = course.id AND
                        $where
                        reservation.user_id = users.id AND
                        reservation.status = '1' AND
						users.mosque_id = mosque.id
                        
                        ORDER BY `date` DESC
                        
                        LIMIT $startpoint , $limit
                            
                ";
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
                  <td><?= $result['coutitle'] ?></td>
                <td>d</td>
                
              </tr>
                <? } } ?>
                
            </tbody>
          </table>
          <!--table-->
          
          
                  </div>

        
          </div>
          <!-- table-responsive -->
          
        </div><!-- panel-body -->
      </div>
      
                </form>
