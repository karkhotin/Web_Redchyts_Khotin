<?php 
header("Content-type: text/plain; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
sleep(1); // время ожидания
// echo "Ajax проработал запрос<br>";


               
     
		echo "<small>".date("Y-m-d H:i:s")."</small>";
		
while(list ($key, $val) = each ($_POST))
{

                $val = iconv("UTF-8","UTF-8", $_POST[$key]);
                echo "<pre>".stripslashes($val)."</pre>";

}

?>