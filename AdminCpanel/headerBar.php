<div class="headerbar">
      
      <a class="menutoggle"><i class="fa fa-bars"></i></a>
      
      <form class="searchform"  method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
      </form>
      
      <div class="header-left">
        <ul class="headermenu">
                <li>
                        <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <?= $FullNameUser ?>
                                        <span class="caret"></span>
                                        </button>
                                <ul class="dropdown-menu dropdown-menu-usermenu pull-left">
              <li><a href="users.php?do=edit&id=<?= $idUser ?>"><i class="fa fa-cog"></i> <span>الملف الشخصي</span></a></li>
              <li><a href="settings.php"><i class="fa fa-question-circle"></i> <span>الإعددات</span></a></li>
              <li><a href="?logout"><i class="fa fa-sign-out"></i> <span>تسجيل خروج</span></a></li>
                                        </ul>
                                </div>
                </li>
        </ul>
      </div><!-- header-right -->
      
    </div>
    
    
    
    
    
        <div class="pageheader">
      <h2><i class="<?= $iconheader ?>"></i><?= $pageheader ?></h2>
      
    </div>
