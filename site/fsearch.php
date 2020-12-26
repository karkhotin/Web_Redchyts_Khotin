
<!doctype html>

<html lang="ru">
<style>
	@import url("forma.css")
	</style>
<head>
  <title>Админ-панель</title>
</head>
<body>
 
        <li>
          <a href="main page(2).php" >Головна сторінка</a>
        </li>
		<li>
          <a href="table.php">Ресурси</a>
        </li>
		<h1 align='center' color='Rous'>Для пошуку введіть назву ресурсу </h1>
  <form class="decor" name="f1" method="post" action="search.php">
  <div class="form-left-decoration"></div>
  <div class="form-right-decoration"></div>
  <div class="circle"></div>
  <div class="form-inner">
  <form action="search.php" method="post">
            <input type="text" name="search">
            <input type="submit" name="sub" value="Знайти">
        </form>
  </div>
</form>
</body>
</html>
