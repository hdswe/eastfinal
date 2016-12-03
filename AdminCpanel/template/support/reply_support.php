<div class="panel panel-default">
                    <div class="panel-body">
                        
                        <div class="pull-right">
                            <div class="btn-group mr10">
                                <button class="btn btn-white tooltips" type="button" data-toggle="tooltip" title="اغلاق التذكرة"><i class="glyphicon glyphicon-hdd"></i></button>
                                
                                <button class="btn btn-white tooltips" type="button" data-toggle="tooltip" title="حذف التذكرة"><i class="glyphicon glyphicon-trash"></i></button>
                            </div>
                            
                            
                        </div><!-- pull-right -->
                        
                        <div class="btn-group mr10">
                            <button class="btn btn-white tooltips" type="button" data-toggle="tooltip" title="التذكرة السابقة">
                            
                            <i class="glyphicon glyphicon-chevron-right"></i>
                            
                            </button>
                            <button class="btn btn-white tooltips" type="button" data-toggle="tooltip" title="التذكرة التالية">
                            
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            
                            </button>
                        </div>
                        
                        <div class="read-panel">
                            
                            <div class="media">
                                    <div class="media-body">
                                            <span class="media-meta pull-left"><?= date('Y / m / d', $result['date']) ?></span>
                                            <h4 class="text-primary"><?= $result['full_name'] ?></h4>
                                    <small class="text-muted">الجوال: <?= $result['username'] ?></small>
                        </div>
                            </div><!-- media -->

                            
                        <p><?= $result['details'] ?></p>
                            
                            <br />
                            
                            <div class="media">
                            <form method="post">
                                    <div class="media-body">
                                    
                                    <div class="form-group">
              <div class="col-sm-12">
                                        <input name="user_id" type="hidden" id="user_id" value="<? echo $result['users'] ?>" />
                        <input name="location" type="hidden" id="location" value="reply_s" />

                                            <textarea name="details" class="form-control" id="details" placeholder="قم بكتابة الرد هنا..."></textarea>
              </div>
            </div>
            
<div class="form-group">
              <div class="col-sm-4">
                                           <div class="ckbox ckbox-danger">
                        <input name="status" type="checkbox" id="checkboxDanger" value="0">
                        <label for="checkboxDanger">اغلاق التذكره بعد هذا الرد</label>
                      </div>
              </div>
            </div>
            
            <div class="form-group">
              
              <div class="col-sm-5">
            <span class="formRow">
            <input name="btnsend" type="submit" id="btnsend" value="ارسال" class="btn btn-primary" />
            </span></div>
            </div>
            

            
                       
                        </div>
                        </form>
                            </div><!-- media -->
                        
                        </div><!-- read-panel -->
                        
                        
          
                    </div><!-- panel-body -->
                </div>
<div class="panel panel-default">
    <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">×</a>
            <a href="" class="minimize">−</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">الردود</h3>
        </div>
        <div class="panel-body">
                            <table class="table table-email">
                              <tbody>
            <?
            $coul = 1;
        $queryReply = $pdo->pdoGetAll("SELECT * FROM `reply` WHERE ticket_id=$id ORDER BY `id` DESC");                    
        foreach($queryReply as $result) {
            ?>

                <tr class="unread">
                        <td><?= $coul ?></td>
                                  <td>
                                          <div class="media">
                                                  <div class="media-body">

                       <h4 class="text-primary">                        <?
						if($result['users'] == '0')
							echo '<span class="red">الإدارة</span>';
						else
							echo '<span class="green">الطالب</span>';
						?>
</h4>
                        <span class="media-meta"><?= date("Y-m-d H:i:s",$result['date']) ?></span>

                                                          <small class="text-muted"></small>
                                                          <p class="email-summary"><?= $result['details'] ?></p>
                                                  </div>
                                                  </div>
                                  </td>
                                </tr>
<? $coul++; } ?>
                              </tbody>
                            </table>
                        
                                
        </div><!-- panel-body -->
      </div>