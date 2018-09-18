<?php
require_once 'config.php';
require_once 'connect.php';

$field_name=$_GET['field'];
$table_name=$_GET['table'];

$sql = $db-> prepare ("ALTER TABLE $table_name DROP COLUMN $field_name;");
$sql->execute();

echo "Поле было успешно удалено.<br><a href='./table.php?name=$table_name'>Вернуться к таблице</a>";