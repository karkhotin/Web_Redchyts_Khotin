<!-- Через 10 секунд после появления сообщения об отправке или ошибке — отправляемся на сайт Кода :) -->
<meta http-equiv='refresh' content='10; url=http://thecode.local/'>
<meta charset="UTF-8" />
<!-- Начался блок PHP -->

<?php
// Получаем значения переменных из пришедших данных
$name = $_POST['name'];
$email = $_POST['email'];
$header = $_POST['header'];
$message = $_POST['message'];
// Формируем сообщение для отправки, в нём мы соберём всё, что ввели в форме
$mes = "Имя: $name \nE-mail: $email \nТема: $header \nТекст: $message";
// Пытаемся отправить письмо по заданному адресу
// Если нужно, чтобы письма всё время уходили на ваш адрес — замените первую переменную $email на свой адрес электронной почты
$send = mail($email, $header, $mes, "Content-type:text/plain; charset = UTF-8\r\nFrom:$email");
// Если отправка прошла успешно — так и пишем
if ($send == 'true') {echo "Сообщение отправлено";
<div id="current_date_time_block"></div>
<script type="text/javascript"> 
    /* функция добавления ведущих нулей */
    /* (если число меньше десяти, перед числом добавляем ноль) */
    function zero_first_format(value)
    {
        if (value < 10)
        {
            value='0'+value;
        }
        return value;
    }
    /* функция получения текущей даты и времени */
    function date_time()
    {
        var current_datetime = new Date();
        var day = zero_first_format(current_datetime.getDate());
        var month = zero_first_format(current_datetime.getMonth()+1);
        var year = current_datetime.getFullYear();
        var hours = zero_first_format(current_datetime.getHours());
        var minutes = zero_first_format(current_datetime.getMinutes());
        var seconds = zero_first_format(current_datetime.getSeconds());

        return day+"."+month+"."+year+" "+hours+":"+minutes+":"+seconds;
    }

    /* выводим текущую дату и время на сайт в блок с id "current_date_time_block" */
    document.getElementById('current_date_time_block').innerHTML = date_time();
</script>
}
// Если письмо не ушло — выводим сообщение об ошибке
else {echo "Ой, что-то пошло не так";}
?>