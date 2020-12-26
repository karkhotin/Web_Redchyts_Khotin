<html>
    <head>
        <title> Результати пошука</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
    </head>
 
    <body>
        <?php 
        if(isset($_POST['search'])){
            $data = array();
            $search = $_POST['search'];
            $mysqli = mysqli_connect("localhost", "root", "", "webs");
            $res = mysqli_query($mysqli, "select * from `resources` where `name` like '%".$search."%'");
            if($res){
                while($row = mysqli_fetch_assoc($res)){
                    $data[] = $row;
                }
            }
        }
        ?>
        <h3>Список знайдених результатів(назва ресурсу, тип ресурсу, посилання):</h3>
       <?php 
       if(!empty($data)){ 
          foreach($data as $aticle){ 
           ?>
        <p><a href="table.php?aticle=<?php echo $aticle['id'];?>"><?php echo $aticle['name'];?><br><?php echo $aticle['Tres'];?>
		<br><?php echo $aticle['link'];?></a></p>
          <?php }?>
       <?php } else { ?>
        <p>По вашему запросу нет результатов</p>
       <?php }?>
       
    </body> 
</html>