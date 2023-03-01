<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!--bootstrap стили-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <!--подключаем function.php-->
    <?php include_once('./pages/functions.php')?>
    
    <div class="container">
        <div class="row">
            <header class="col-cm-12 col-md-12 col-lg-12">
                <!--Заголовок-->
            </header>
        </div>

        <div class="row">
            <nav class="col-cm-12 col-md-12 col-lg-12">
                <!--Меню навигации-->
                <?php include_once("./pages/menu.php")?> <!--встраиваем меню в страницу-->

            </nav>
        </div>

        <div class="row">
            <section class="col-cm-12 col-md-12 col-lg-12">
                <!--Контент-->
                <?php
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == 1){
                        include_once('./pages/home.php');
                    }elseif($page == 2){
                        include_once('./pages/country.php');
                    }elseif($page == 3){
                        include_once('./pages/resort.php');
                    } elseif ($page == 4) {
                        include_once('./pages/admin.php');
                    }else{
                        //временно обрабатываем ошибку так
                        echo '404? page not exist';
                    }
                }else{
                    //по умолчанию открывать index.php
                    include_once(('./index.php'));
                }
                ?>
            </section>
        </div>
    </div>



    <!--Boostrap скрипты-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>