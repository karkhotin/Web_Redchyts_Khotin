<!DOCTYPE html> <html> 
<!-- Служебная часть --> 
<head> 
<!-- Заголовок страницы --> 
<title>Заголовок</title> 
<!-- Настраиваем служебную информацию для браузеров --> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1"> 
 <style type="text/css"> 
 /*Задаём общие параметры для всей страницы: шрифт и отступы*/
 body { 
 /*text-align: center;*/ 
 margin: 10; 
 font-family: Verdana, Arial, sans-serif; 
 font-size: 16px; }
 /* Настраиваем внешний вид полей ввода*/ 
 input { 
 display: inline-block; 
 margin: 10px auto; 
 border: 2px solid #eee; 
 padding: 10px 20px; 
 font-family: Verdana, Arial, sans-serif;
 font-size: 16px; }
 textarea { 
 display: inline-block;
 margin: 10px auto; 
 border: 2px solid #eee; 
 padding: 10px 20px; 
 font-family: Verdana, Arial, sans-serif; font-size: 16px;
 }
 </style>
 <!-- Закрываем служебную часть страницы --> 
 </head> 
 <body> 
 <!-- Создаём форму и указываем её обработчик и метод -->
<form action="in.html" method="post" name="form">
  <!-- Поле ввода имени -->
  <input name="name" type="text" placeholder="Ваше ім*я" />
  <br>
  <!-- Поле ввода почты  -->
  <input name="email" type="text" placeholder="Ваша почта" />
  <br>
  <!-- Поле ввода для темы сообщения -->
  <input size="30" name="header" type="text" placeholder="Тема" />
  <br>
  <!-- Текстовое поле для самого сообщения -->
  <textarea cols="32" name="message" rows="5"> Текст повідомлення
  </textarea>
  <br>
  <!-- Кнопка с надписью «Отправить», которая запускает обработчик формы -->
  <input type="submit" value="Відправити" />
</form>
 </body> 
 <!-- Конец всей страницы --> 
 </html>