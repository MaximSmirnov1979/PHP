<?php
class MyResort{
    // 1. статический метод установки соединения
  public static function getMySqlConnection($user, $password, $host="localhost", $database="php_test_db") {
   
      // подключение к СУБД
      $connection = mysqli_connect($host, $user, $password, $database);
      if (!$connection) {
        // ошибка
        throw new Exception(''.mysqli_connect_error());
     }
     return $connection;
    }

    //2. статический метод добавления записи в таблицу Country
    public static function addString($country, $connection){
        // 1. сформировать строку запроса
        $query = 'INSERT INTO country_t SET country_f = ?;';
        // 2. делаем из запроса выражение с параметрами
       
        $stmt = $connection->prepare($query);
        // 3. привязываем параметры
        $stmt->bind_param('s',  $country);
        // 4. выполняем
        $result = $stmt->execute();
        // 5. Проверяем результат
        if (!$result) {
            throw new Exception('Bad insert');
        }
    }

    //3. метод получения данных
    public static function outputTable($connection){
        
     $query = 'SELECT * FROM country_t';        // 1) сформировать строку запроса
     $result = mysqli_query($connection, $query);      // 2) выполнить запрос
     $rows = [];
      while ($row = mysqli_fetch_array($result)) {
        array_push($rows, $row);
        echo $row['id_f'].'-'.$row['country_f'].'<br>';
      }
      return $rows;
    }

    // 4. метод удаления по id
    public static function deleteById($id, $connection){
        $query = "DELETE FROM country_t WHERE id_f=?";
        $stmt= $connection->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        if (!$result) {
            throw new Exception('no given id');
        }

    }

    // 5. метод редактирования строки
    public static function updateString($id, $country, $connection){
        $query = "UPDATE country_t SET country_f=? WHERE id_f=?";
        $stmt= $connection->prepare($query);
        $stmt->bind_param("si", $country,  $id);
        $stmt->execute();
    }

    //6. статический метод добавления записи в таблицу Resort
    public static function addResort($resort, $rating, $idCountry, $connection){
        // 1. сформировать строку запроса
        $query = 'INSERT INTO resort_t SET name_f = ?, rating_f = ?, country_id_f = ?;';
        // 2. делаем из запроса выражение с параметрами
       
        $stmt = $connection->prepare($query);
        // 3. привязываем параметры
        $stmt->bind_param('sii',  $resort, $rating, $idCountry);
        // 4. выполняем
        $result = $stmt->execute();
        // 5. Проверяем результат
        if (!$result) {
            throw new Exception('Bad insert');
        }
    }
    //7. метод получения данных Resort
    public static function outputResort($connection){
        
        $query = 'SELECT * FROM resort_t';        // 1) сформировать строку запроса
        $result = mysqli_query($connection, $query);      // 2) выполнить запрос
        $rows = [];
         while ($row = mysqli_fetch_array($result)) {
           array_push($rows, $row);
           echo $row['id_f'].'-'.$row['name_f'].'-'.$row['rating_f'].'-'.$row['country_id_f'].'<br>';
         }
         return $rows;
       }

       // 8. метод удаления курортов по id
    public static function deleteResortById($id, $connection){
        $query = "DELETE FROM resort_t WHERE id_f=?";
        $stmt= $connection->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        if (!$result) {
            throw new Exception('no given id');
        }

    }
    

    
}
//тестирование
//$connection = MyResort::getMySqlConnection("root", "root");//установка соединения
//MyResort::addString("Алеся", "Беларусь", 14, $connection);//добавление строки
//MyResort::outputTable($connection);//вывод всей таблицы
//MyResort::deleteById(6, $connection);//удаление по id
//MyResort::updateString(5, "Нива", "Россия", 24, $connection);//замена строки