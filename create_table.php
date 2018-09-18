<?php
require_once 'config.php';
require_once 'connect.php';

$query=$db->prepare("CREATE TABLE `fans` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(50) NULL,
`price` float NULL,
PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");
$query->execute();
header("Location: index.php");
?>

