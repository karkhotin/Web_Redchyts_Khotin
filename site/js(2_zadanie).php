<!doctype html>
<html>
<style>body{
  background:#D3D3D3; 
}
</style>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <title>Laba 4</title>

	<SCRIPT>
	var st
function time_scroll()
{
var d = new Date();
 st= d.getHours() +":"+d.getMinutes() +":"+
d.getSeconds();
setTimeout('time_scroll();',50);
return(d);
}
</SCRIPT>

</HEAD>
<BODY onLoad="time_scroll();">
<FORM><INPUT VALUE="&{d};" SIZE="&{l()};">
</FORM>
<CENTER>
<H1></H1>


<script type="text/javascript">
var hotText = 'Сторінку КПІ';
var URL = 'https://kpi.ua/';
document.write('Натисніть, щоб перейти на ' + hotText.link(URL));

</script>
<script type="text/javascript">

</script>


<p>Натисніть на кнопку щоб скрипт виконався.</p>
<input type='button' value='Натисни' onclick='showMessage()'>
<script>
function showMessage() {
  alert('Ви натиснули на кнопку!')
}
</script>
</br>
</br>
<body >
<div onmouseover="mOver(this)" onmouseout="mOut(this)" 
style="background-color:green;width:120px;height:20px;padding:40px;">
Mouse Over Me</div>

<script>
function mOver(obj) {
    obj.innerHTML = "Дякую"
}

function mOut(obj) {
    obj.innerHTML = "Наведіть курсор"
}
</script>
</body>
</html>