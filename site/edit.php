<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>UPDATE</title>
    <style>
	
	@import url("forma.css")
        label{display: inline-block;width: 170px;}
        form > div{margin-bottom: 5px;}
        td:nth-child(5),td:nth-child(6){text-align:center;}
        table{border-spacing: 0;border-collapse: collapse;}
        td, th{padding: 10px;border: 1px solid black;}
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
    // Открываем соединение, указываем адрес сервера, имя бд, имя пользователя и пароль,
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
 
    echo "<table><tr><th>ID</th><th>Назва</th><th>Тип ресурсу</th><th>Посилання</th></tr>";
    foreach ($result_array as $result_row) {
        echo "<tr>";
        echo "<td>" . $result_row["id"]  . "</td>";
        echo "<td>" . $result_row["name"]    . "</td>";
        echo "<td>" . $result_row["Tres"]   . "</td>";
        echo "<td>" . $result_row["link"]    . "</td>";
        echo "</tr>";
    }
    echo "</table>"; 
}
 
catch(PDOException $e) {
    echo "Ошибка при создании записи в базе данных: " . $e->getMessage();
}
 
// Закрываем соединение
$db = null;
?> 
     
    <h2>Команда UPDATE</h2>
    <form action="update.php" method="POST">
        <div>
            <label for="id">Виберіть ID рядка *:</label>
            <input type="number" id="id" name="id" required>
        </div>
        <div>
            <label for="name">Назва ресурсу:</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="Tres">Тип ресурсу:</label>
            <input type="text" id="Tres" name="Tres">
        </div>
        <div>
            <label for="link">Посилання:</label>
            <input type="text" id="link" name="link">
        </div>
 
        <input type="submit" value="Оновити запис">
    </form>
</body>
</html>