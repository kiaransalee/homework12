<?php
require_once 'config.php';
require_once 'connect.php';

$table_name = $_GET['name'];
$query=$db->prepare("DESCRIBE $table_name");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$new_field = !empty($_POST['field']) ? $_POST['field'] : '';
$new_type = !empty($_POST['type']) ? $_POST['type'] : '';
$new_null = !empty($_POST['null']) ? $_POST['null'] : '';
$new_key = !empty($_POST['key']) ? $_POST['key'] : '';
$new_extra = !empty($_POST['extra']) ? $_POST['extra'] : '';
$new_table = !empty($_POST['table']) ? $_POST['table'] : '';


if($new_field){
    
    foreach($new_field as $key=>$nfield){
            $types = $new_type["$key"];
            foreach($types as $type=>$tp){
            $type=strtoupper($type);
            $sql = $db->prepare("ALTER TABLE $table_name CHANGE $key $nfield $type;");
            $sql->execute();
      
        
    }
}
}

if(!empty($new_type)){
    foreach($new_type as $ftype=>$ntype){
        foreach($ntype as $otype) {
            $otype=strtoupper($otype);
             $sql = $db->prepare("ALTER TABLE $table_name MODIFY $ftype $otype;");
            $sql->execute();
        }
    }
}
    
$query=$db->prepare("DESCRIBE $table_name");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Таблица <?php echo $table_name; ?></title>
</head>
<body>
    <h1>Таблица <?php echo $table_name; ?></h1>
    <form method="POST">
    <table border=1>
        <tr style="font-weight:bold; text-align:center;">
            <td>Название поля</td>
            <td>Изменить</td>
            <td>Тип поля</td>
            <td>Изменить</td>
            <td>Значение Null</td>
            <td>Primary Key</td>
            <td>Extra</td>
            </tr>
        <?php
        if ($result){
        foreach($result as $fields){
             echo "<tr>
            <td>{$fields['Field']} (<a href='./delete.php?table={$table_name}&field={$fields['Field']}'>удалить</a>)</td>
            <td><input type='text' name='field[{$fields['Field']}]' placeholder='Новое название поля'></td>
            <td>{$fields['Type']}</td>
            <td><input type='text' name='type[{$fields['Field']}][{$fields['Type']}]' placeholder='Новый тип поля'></td>
            <td>{$fields['Null']}</td>
            <td>{$fields['Key']}</td>
            <td>{$fields['Extra']}</td>
            </tr>";
         
        }
       
        }
 
        ?>
    </table>
    <button type="submit" name="submit">Обновить</button>
    </form>
    <a href="./index.php">Вернуться назад</a>