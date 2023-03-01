<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
     <!-- подключение класса для работы с БД -->
     <?php include_once('./method.php'); ?>
    <!-- вывод существующих строк -->
    <h2>Список стран:</h2>
    <ul>
        <?php
            // получим все записи и выведем в список
            $connection = MyResort::getMySqlConnection('root', 'root', database: 'resort_db');
            MyResort::outputTable($connection);
            
        ?>
    </ul>
</body>