<?php

#############################################################
# DataBase Connect
#############################################################
    $dbServer      = 'localhost';
    $dbDatabase    = 'east-ala';
    $dbUser        = 'root';
    $dbPass        = '';
    
    $pdo = new PdoWrapper();
    $pdo->pdoConnect($dbServer, $dbUser, $dbPass, $dbDatabase);

#############################################################
# Error Reporting
#############################################################

	error_reporting(0);
   
#############################################################
# Admin Folder
#############################################################

    $adminFolder = 'AdminCpanel';

?>