<!DOCKTYPE>
<html>
<head>

	<title>Інфа ро запит</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/ico">
    <meta property="og:title" content="Google" />
    <meta property="og:description" content="This is Google!" />
    <meta property="og:url" content="http://google.com" />
    <meta property="og:image" content="https://www.google.co.uk/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" />

    <link rel="stylesheet" href="sharetastic.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
	</script>
	<script src="sharetastic.js"></script>
	<style>
	@import url("style.css")
	</style>
</head>
<body>
<!-- <script>
let d = new Date();
document.body.innerHTML = "<h4 > Час: " + d.getHours() 
+ ":" + d.getMinutes() + ":" + d.getSeconds()
"</h4>"
</script> -->

<header>
 <h4>   <img src="12.jpg" alt="Иллюстрация" 
style="position:absolute;top:35px;right:0px width="300" height="190" class="rightpic">
<script type="text/javascript">
i=0;
dt=new Array("white", "A00000", "00A000", "00A0A0", "A000A0", "A0A000");
function cl() // эта функция будет менять цвет текста
{document.getElementById("web").style.color=dt[i++];
if (i>dt.length) i=0;
setTimeout("cl()",1000);}
</script>
<h1 id='web'  font-style: italic>КПІ ІНФО </h1>

<script type="text/javascript">
cl();	// первый вызов размещаю после определения объекта
</script>

</h4>
 
 </header>


   
     <div class="container ">
	 <span>
	 <div class = "navv tip" data = "Тематичні розділи">
	 <nav>
     

        <li>
          <a href="main page(2).php" >Головна сторінка</a>
        </li>
	
		
		<li>
          <a href="table.php">Ресурси</a>
        </li>
		<li>
          <a href="creating.php">Додати ресурс</a>
        </li>
		
      </ul>
	  </nav>
	  </div>
	  <script  src="3.js"></script>
	  </span>
	  <span id = "search" >
	  <div class="search-box tip" data = "Пошук на сторінці"  >
        <input type="text" placeholder=" " /><span ></span>
		</div>
	  </span>
	 </div>
     
	<!-- <script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script> -->
  <!-- <div onmouseover="mOver(this)" onmouseout="mOut(this)">Розділ 1</div>
  <script>
function mOver(obj) {
    obj.innerHTML = "Тимчасово не працює"
}

function mOut(obj) {
    obj.innerHTML = "Розділ 1"
}
</script>
  <div> <a href="editor.html" style = "color: white;">Створення статті</a></div>
  <div>Розділ 3</div> --> 

  <article>
  <main class="main columns">
  <section class="column main-column">
    <a class="article first-article" href="#">
    
      <div class="article-body tip" data = "Основна стаття">

<?php


    // Переменные с формы
   $name = $_POST['name'];
$Tres = $_POST['Tres'];
$link = $_POST['link'];
 
// Параметры для подключения
$db_host = "localhost"; 
$db_user = "root"; // Логин БД
$db_password = ""; // Пароль БД
$db_base = 'webs'; // Имя БД
$db_table = "resources"; // Имя Таблицы БД
    
	// Подключение к базе данных
    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

    // Если есть ошибка соединения, выводим её и убиваем подключение
	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
    
    $result = $mysqli->query("INSERT INTO ".$db_table." (name,Tres, link) VALUES ('$name','$Tres', '$link')");
    
    if ($result == true){
    	echo "Інформація занесена в базу даних";
    }else{
    	echo "Інформація не занесена в базу даних";
    }

?>
       
      </div>
    </a>

    
  </section>
    

  </article>
</section>

<footer>
<div id = "media">
<div class="sharetastic"></div>           </div>
<script>
	$('.sharetastic').sharetastic();
</script>
	<div class = "form tip" data = "Отримуй новини на електронну пошту">
        <h3><b>Підписатися на </b><i>розсилку</i></h3>
        <form id="subscribe" method="post" >
                <input class= "input" type="text" placeholder="Введіть e-mail" value="" name="email">
                <input class= "submit" type="submit" value="Підписатися" id="subscribe_submit" name="submit">
        </form>
		</div>
</footer>

 <script language="javascript" type="text/javascript">
var xoff = 0; 
var yoff = 30; 
$(".tip").unbind().hover(function(e){
  this.top = (e.pageY + yoff);
  this.left = (e.pageX + xoff);
  var data = $(this).attr("data");
  if(typeof(data)!='undefined'){
    var tipcontainer = '<div class="tip" id="tipcontainer">'+data+'<div>';
    $('body').append(tipcontainer);
    $("#tipcontainer").css({"position":"absolute","top":this.top + "px","left":this.left + "px"}).fadeIn("fast");
  }
},function(){
   $("#tipcontainer").fadeOut("slow").remove();
}).mousemove(
  function (e) {
    this.top = (e.pageY + yoff);
    this.left = (e.pageX + xoff);
    $("#tipcontainer").css({"position":"absolute","top":this.top + "px","left":this.left + "px"});
  }
);        
</script>
</body>

</html>
</!DOCKTYPE>
