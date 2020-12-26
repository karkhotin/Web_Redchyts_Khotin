<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DELETE</title>
    <style>
	@import url("style.css")
        table{border-spacing: 0;border-collapse: collapse;}
        td, th{padding: 10px;border: 1px solid black;}
        td:last-child{text-align:center;}
		
	
	
    </style>
</head>
<body>

        <li>
          <a href="main page(2).php" >Головна сторінка</a>
        </li>
		<li>
          <a href="table.php">Ресурси</a>
        </li>
		
<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "webs"; 
try {
    /// Открываем соединение, указываем адрес сервера, имя бд, имя пользователя и пароль,
    // также сообщаем серверу в какой кодировке должны вводится данные в таблицу бд.
    $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    // Устанавливаем атрибут сообщений об ошибках (выбрасывать исключения)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    // Запрос на вывод записей из таблицы
    $sql = "SELECT id, name, Tres, link FROM resources LIMIT 40";
    // Подготовка запроса
    $statement = $db->prepare($sql);
    // Выполняем запрос
    $statement->execute();
    // Получаем массив строк 
    $result_array = $statement->fetchAll();
 
    // Создаем таблицу вывода и форму для удаления записей
    echo "<form action='del.php' method='POST'><table>";
    echo "<tr><th>id</th><th>Назва</th><th>Тип ресурсу</th><th>Посилання</th><th>Видалити запис</th></tr>";
    foreach ($result_array as $result_row) {
        echo "<tr>";
        echo "<td>" . $result_row["id"] . "</td>";
        echo "<td>" . $result_row["name"] . "</td>";
        echo "<td>" . $result_row["Tres"] . "</td>";
        echo "<td>" . $result_row["link"] . "</td>";
        echo "<td><input type='checkbox' name='delete_row[]' value='" . $result_row["id"] . "'></td>";
        echo "</tr>";
    }
    echo "</table><br><input type='submit' value='Видалити виділені записи'></form>"; 
}
 
catch(PDOException $e) {
    echo "Ошибка при удалении записи в базе данных: " . $e->getMessage();
}
 
// Закрываем соединение
$db = null;
?>
 
</body>
</html>