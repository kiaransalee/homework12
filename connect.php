<?php
require_once 'config.php';

 $connect_str = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
 $db = new PDO ($connect_str, DB_USER, DB_PASS);

?>