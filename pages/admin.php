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

    <!-- форма добавления страны-->
    <form method="post" action="/?page=4">
        <label for="country" ></label>
        <input type="text" id="country" name="country" minlength="2"/>
        
        <button> Add </button>
    </form>

    <!-- форма удаления страны-->
    <form method="post" action="/?page=4">
        <label for="id" ></label>
        <input type="text" id="id" name="id"/>
        
        <button> Delete </button>
    </form>

    

    <!-- вывод существующих строк -->
    <h2>Страны:</h2>
    <ul>
        <?php
            // получим все записи и выведем в список
            $connection = MyResort::getMySqlConnection('root', 'root', database: 'resort_db');
          MyResort::outputTable($connection);
            
        ?>
    </ul>

    <!-- форма добавления курорта-->
    <form method="post" action="/?page=4">
        <label for="resort" >Курорт</label>
        <input type="text" id="resort" name="resort" minlength="2"/>
        <label for="resort" >Рейтинг</label>
        <input type="number" id="rating" name="rating" />
        <label for="resort" >idCountry</label>
        <input type="number" id="idCountry" name="idCountry" />
        <button> Add </button>
    </form>

     <!-- форма удаления курорта-->
     <form method="post" action="/?page=4">
        <label for="id" ></label>
        <input type="text" id="id" name="id"/>
        
        <button> Delete </button>
    </form>

    <!-- вывод существующих курортов -->
    <h2>Курорты:</h2>
    <ul>
        <?php
            // получим все записи и выведем в список
            $connection = MyResort::getMySqlConnection('root', 'root', database: 'resort_db');
          MyResort::outputResort($connection);
            
        ?>
    </ul>

        <!-- обработчик удаления данных по id-->
    <?php 
        if (isset($_POST['id'])&& $_POST['id']!="") {
            // удаляем данные
            $connection = MyResort::getMySqlConnection('root', 'root', database: 'resort_db');
        
            MyResort::deleteById($_POST['id'],  $connection);
            header('Location: /?page=4');
        }
    ?>

    <!-- обработчик добавления данных в Country-->
    <?php 
        if (isset($_POST['country'])&& $_POST['country']!="") {
            // добавляем данные
            $connection = MyResort::getMySqlConnection('root', 'root', database: 'resort_db');
        
            MyResort::addString($_POST['country'],  $connection);
            header('Location: /?page=4');
        }
    ?>

    <!-- обработчик добавления данных в Resort-->
    <?php 
        if (isset($_POST['resort'])&& $_POST['resort']!="") {
            // добавляем данные
            $connection = MyResort::getMySqlConnection('root', 'root', database: 'resort_db');
        
            MyResort::addResort($_POST['resort'], $_POST['rating'], $_POST['idCountry'], $connection);
            header('Location: /?page=4');
        }
    ?>

    <!-- обработчик удаления курортов по id-->
    <?php 
        if (isset($_POST['id'])&& $_POST['id']!="") {
            // удаляем данные
            $connection = MyResort::getMySqlConnection('root', 'root', database: 'resort_db');
        
            MyResort::deleteResortById($_POST['id'],  $connection);
            header('Location: /?page=4');
        }
    ?>
</body>
</html>

</div>
<hr/>
<div class="row">
<div class=" col-sm-6 col-md-6 col-lg-6 left ">
<!-- section B: for form Resort -->
</div>

</div>