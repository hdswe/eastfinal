<?php
#############################################################
/*
 * This is an example file for the class PdoWrapper in pdo_wrapper_class.php
 *
 * This file creates a table 'pdo_wrapper_test' in a database and inserts/updates/reads some records
 * 
 * configuration: configure the variable in the first 4 lines
 * 
 * Then just run this file in your browser and have a look at the output and your database afterwards
 */ 

#############################################################
# configuration
#############################################################
$CONF[db_server] = 'localhost';
$CONF[db_user] = 'root';
$CONF[db_password] = '';
$CONF[db_database] = '_test';
#############################################################
# end configuration
#############################################################


include('pdo_wrapper_class.php');
include('dd.php');

#############################################################
$pdo = new PdoWrapper();
$pdo->pdoConnect($CONF[db_server], $CONF[db_user], $CONF[db_password], $CONF[db_database]);
$pdo->useTablecols = 1;
$pdo->useDatadumper = 1;
$tablecols[pdo_wrapper_test] = array('id', 'lastname', 'age');

#############################################################
$sql = "drop table if exists pdo_wrapper_test";
$result = $pdo->pdoExecute($sql);

#############################################################
$sql = "CREATE TABLE pdo_wrapper_test(id INT UNSIGNED NOT NULL AUTO_INCREMENT ,lastname VARCHAR(255) NOT NULL ,age INT NOT NULL ,PRIMARY KEY (id) );";
$result = $pdo->pdoExecute($sql);

#############################################################
$insert[lastname] = 'Obama';
$insert[age] = 45;
$result = $pdo->pdoInsUpd('pdo_wrapper_test', $insert);
$id = $pdo->pdoLastInsertId();
d($id);

#############################################################
$insert[lastname] = 'Churchill';
$insert[age] = 57;
$result = $pdo->pdoInsUpd('pdo_wrapper_test', $insert);
$id = $pdo->pdoLastInsertId();
d($id);

#############################################################
$insert[lastname] = 'Schwarzenegger';
$insert[age] = 52;
$result = $pdo->pdoInsUpd('pdo_wrapper_test', $insert);
d($pdo->sql);
$id = $pdo->pdoLastInsertId();
d($id);

#############################################################
$insert = array();
$insert[age] = 57;
$where[id] = $id;
$result = $pdo->pdoInsUpd('pdo_wrapper_test', $insert, 'update', $where);
d($pdo->sql);

#############################################################
$sql = "select id, lastname, age from pdo_wrapper_test where id=:id";
$data[id] = $id;
$row = $pdo->pdoGetRow($sql, $data);
d($row);

#############################################################
$sql = "delete from pdo_wrapper_test where id=:id";
$data[id] = 2;
$pdo->pdoExecute($sql, $data);

#############################################################
$sql = "select id, lastname, age from pdo_wrapper_test";
$rows = $pdo->pdoGetAll($sql);
d($rows);
$rows = $pdo->pdoGetAssoc($sql);
d($rows);

#############################################################
# generate Exception
#############################################################
echo "<hr><h2>Generate Exception<p>";
$sql = "slct";
$result = $pdo->pdoExecute($sql);

