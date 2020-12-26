<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>EDIT</title>
    
</head>
<body>

      
		<li>
          <a href="edit.php">Повернутися назад</a>
        </li>
		
<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "webs";
 
try {
    // Открываем соединение, указываем адрес сервера, имя бд, имя пользователя и пароль,
    // также сообщаем серверу в какой кодировке должны вводится данные в таблицу бд.
    $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    // Устанавливаем атрибут сообщений об ошибках (выбрасывать исключения).
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Переносим данные из полей формы в переменные.
    $id =       $_POST['id'];
    $name =    $_POST['name'];
    $Tres =   $_POST['Tres'];
    $link =    $_POST['link'];
    
    // Если пользователь не указал (номер Id) какую запись будем редактировать,
    // то прерываем выполнение кода.
    if(empty($id)){
        echo "Вы не задали ID строки для обновления данных!";
        return;
    }
 
    // Составвлям массив колонок для запроса обновления.
    // Если поле формы не пустое, то его значение будет добавлено в запрос.
    $update_columns = array();
    if(trim($name) !== "")   { $update_columns[] = "name = :name"; }
    if(trim($Tres) !== "")  { $update_columns[] = "Tres = :Tres"; }
    if(trim($link) !== "")   { $update_columns[] = "link = :link"; }
    
    // Если есть хоть одно заполненное поле формы,
    // то составляем запрос.    
    
        // Запрос на создание записи в таблице
        $sql = "UPDATE resources SET " . implode(", ", $update_columns) . " WHERE id=:id";
        // Перед тем как выполнять запрос предлагаю убедится, что он составлен без ошибок.
        // echo $sql;
       
        // Подготовка запроса.
        $statement = $db->prepare($sql);
 
        // Привязываем к псевдо переменным реальные данные,
        // если они существуют (пользователь заполнил поле в форме).        
        $statement->bindParam(":id", $id);
        if(trim($name) !== ""){
            $statement->bindParam(":name", $name);
        }
        if(trim($Tres) !== ""){
            $statement->bindParam(":Tres", $Tres);
        }
        if(trim($link) !== ""){
            $statement->bindParam(":link", $link);
        }
        
        
        // Выполняем запрос.
        $statement->execute();
    
        echo "Запис з ID: " . $id . " успішно редагований!";
    
}
 
catch(PDOException $e) {
    echo "Ошибка при обновлении записи в базе данных: " . $e->getMessage();
}
 
// Закрываем соединение.
$db = null;
?>

</body>
</html>
