<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DELETE</title>

</head>
<body>


		<li>
          <a href="delete.php">Повернутися назад</a>
        </li>

<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "webs";
try {
    // Открываем соединение, указываем адрес сервера, имя бд, имя пользователя и пароль
    $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password);
    // Устанавливаем атрибут сообщений об ошибках (выбрасывать исключения)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Создаем массив, в котором будем хранить идентификаторы записей
    $ids_to_delete = array();
    // Переносим данные (отмеченные записи) из полей формы в массив
    foreach($_POST['delete_row'] as $selected){
        $ids_to_delete[] = $selected;
    }

    // Если пользователь не отметил ни одной записи для удаления,
    // то прерываем выполнение кода
    if(empty($ids_to_delete)){
        echo "Вы не выделили ни одной записи для удаления!";
        return;
    }


    // Если есть хоть одно заполненное поле формы (запись выделена для удаления),
    // то составляем запрос.
        // Запрос на удаление выделенных записей в таблице
        $sql = "DELETE FROM resources WHERE id IN (" . implode(',', array_map('intval', $ids_to_delete)) . ")";
        // Перед тем как выполнять запрос предлагаю убедится, что он составлен без ошибок.
        // echo $sql;

        // Подготовка запроса.
        $statement = $db->prepare($sql);

        // Выполняем запрос.
        $statement->execute();

        echo "Записи з id: " . implode(',', array_map('intval', $ids_to_delete)) .  " успішно видалені!";

}

catch(PDOException $e) {
    echo "Ошибка при удалении записи в базе данных: " . $e->getMessage();
}

// Закрываем соединение.
$db = null;
?>

</body>
</html>
