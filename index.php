<?php 
require_once 'config.php';
require_once 'connect.php';

$query=$db->prepare("SHOW TABLES");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Мои таблицы</title>
</head>
<body>
    <h1>Мои таблицы</h1>
    <ol>
        <?php 
        foreach ($result as $tables){
            foreach ($tables as $table){
                echo "<li><a href='./table.php?name=$table'>".$table."</li>";
            }
        }
        ?>
    </ol>
</body>
</html>