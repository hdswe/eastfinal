<div class="panel panel-default">
                    <div class="panel-body">
                         <form method="post">
                         <div class="col-xs-12 mb20">
                        <div class="pull-left">
                            <div class="btn-group mr10">
                <button name="delChecked" type="submit" id="delChecked" class="btn btn-primary"><span class="fa fa-trash-o"></span>&nbsp; حذف المحدد</button>


  </div>
                            
                            
                            
                            
                        </div><!-- pull-right -->
                        
                        <h4>أرشيف التذاكر</h4>
                        <div class="clearfix"></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-email mb30">
                              <tbody>
                              <?
                        $sql = "SELECT 
                        users.id AS userid,
                        users.full_name,
                        
                        ticket.id AS tickid,
                        ticket.user_id,
                        ticket.date,
                        ticket.title,
                        ticket.details,
                        ticket.status
                         
                        FROM
                        `ticket`,`users`
                        
                        WHERE
                        ticket.status='0' AND
                        ticket.user_id = users.id
                        
                        ORDER BY `tickid` DESC
                        
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
                        <td>
                        <div class="ckbox ckbox-success">
                        <input name="checkbox[]" type="checkbox" value="<?= $result['tickid'] ?>" id="checkbox1<?= $result['tickid'] ?>">
                        <label for="checkbox1<?= $result['tickid'] ?>"></label>
                        </div>
                                                  
                        </td>
                                  <td>
                                   <div class="media">
                                                  <div class="media-body">
<? 
    if ($result['status'] == '1') {
        $r_reply = $pdo->pdoGetRow("SELECT * FROM `reply` WHERE ticket_id=" . $result['tickid'] . " ORDER BY `id` DESC
LIMIT 1");
       // $r_reply = $db -> fetch($query_reply);
            if ($r_reply['answered'] == 0) {
                echo '<span class="label label-warning pull-left">مقدمة</span>';
            }

            if ($r_reply['answered'] == 1) {
               echo'<span class="label label-success pull-left">تم الاجابة</span>';
            }
            if ($r_reply['answered'] == 2) {
                echo '<span class="label label-danger pull-left">قام الطالب بالرد</span>';
            }

            } elseif ($record['status'] == '0') {
                echo '<span class="label label-default pull-left">مغلقة</span>';
            }
?>

                        <a href="?do=reply_support&amp;id=<? echo $result['tickid'] ?>"><h4 class="text-primary"><?= $result['full_name'] ?></h4></a>
                        <span class="media-meta"><?= date('Y / m / d', $result['date']) ?></span>

                                                          <small class="text-muted"></small>
                                                          <p class="email-summary"><?= $result['details'] ?></p>
                                                  </div>
                                                  </div>
                                  </td>
                                </tr>
                              <? } } ?>  
                              </tbody>
                            </table>
                        </div><!-- table-responsive -->
                        <div class="row pagin">
                          <div class="col-sm-8"><?= pagination($statement,$limit,$page,$url) ?></div>
                        </div>

                    </div><!-- panel-body -->
                </div>