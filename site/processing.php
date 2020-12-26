<?php
// создадим переменную для формирования ответа
$output ='';
// если в массиве пост есть ключ nameUser, то
if (isset($_POST['nameUser'])) {
  // в переменную name помещаем переданное с помощью запроса имя
  $name = $_POST['nameUser'];
  // добавляем в переменную output строку приветствия с именем
  $output .= ' Вітаємо, '.$name.'! ';
  // добавляем в переменную output IP-адрес пользователя
  if ($_SERVER['REMOTE_ADDR']) {
    $output .= 'Ваша IP адреса: '. $_SERVER['REMOTE_ADDR'];
  }
  else {
   $output .= 'Ваша IP адреса невідома .';
  }
  // выводим ответ
  echo $output;
}
