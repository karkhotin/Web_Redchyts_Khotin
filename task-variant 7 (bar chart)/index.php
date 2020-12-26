<html>
<head>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jQuery/jquery-1.11.0.min.js"></script>
</head> 
<body> 
  <canvas width="500" height="500" id="canvas"></canvas> 
  <p id='demo'></p>
  <form method="POST">
	Add column <br>
	Number <input id="number" type="text" name="add_n"> 
	<button type="submit" id='submit' name = "insert" >add </button>
  </form>
   <form method="POST" >
	Del column <br>
	Number <input type="text" id="mydiv" name="add_n"> 
	<button type="submit" id="del" name = "del"> delete</button>
  </form>
<?php
if (isset($_POST['insert'])){
	
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('char.xml');
	$add_n =$_POST['add_n'];
	$rootTag = $xml->getElementsByTagName('list')->item(0);
	$columnTag = $xml->createElement('column');
		$numTag = $xml->createElement('num', $add_n);
		$columnTag->appendChild($numTag);
	$rootTag->appendChild($columnTag);
	$xml->save('char.xml');
}

if (isset($_POST['del'])){
	
	$xml = new DomDocument("1.0","UTF-8");
	$xml->load('char.xml');
	$add_n =$_POST['add_n'];
	
	$xpath = new DOMXPATH($xml);
	foreach($xpath->query("/list/column[num='$add_n']") as $node)
	{
		
		$node->parentNode->removeChild($node);
	}
	$xml->formatoutput = true;
	$xml->save('char.xml');	
}
?>


  <script> 
$(document).ready(function() {
 
 $("#submit").click(function() {
	$.ajax({
		type: "POST",
		url: "index.php",
		data: {add_n: add_n},
		success: function(data){
			console.log("HERE  " + data); 
		}
	});
 });
});
 
 $("#del").click(function() {
	$.ajax({
		type: "POST",
		url: "index.php",
		data: {add_n: add_n},
		success: function(data){
			console.log("HERE  " + data); 
		}
	});
 });

	var canvas = document.getElementById('canvas'); 
	var c = canvas.getContext('2d'); 
// рисуем
	c.fillStyle = "white"; 
	c.fillRect(0,0,500,500);
	c.fillStyle = "black"; 
	c.lineWidth = 2.0; 
	c.beginPath(); 
	c.moveTo(30,10); 
	c.lineTo(30,460); 
	c.lineTo(490,460); 
	c.stroke();
// рисуем текст и вертикальные линии
c.fillStyle = "black"; 
for(var i=0; i<6; i++) { 
  c.fillText((5-i)*15 + "",5, i*80+60); 
  c.beginPath(); 
  c.moveTo(25,i*80+60); 
  c.lineTo(30,i*80+60); 
  c.stroke(); 
}

let getData = function (){
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
       myFunction(this);
   }
};
xhttp.open("GET", "char.xml", true);
xhttp.send();}
var loopTimeout = function(i, max, interval, func) {
    if (i >= max) {
        return;
    }
    // Call the function
    func(i);
    i++;
    // "loop"
    setTimeout(function() {
        loopTimeout(i, max, interval, func);
    }, interval);
}
function myFunction(xml) {
    var xmlDoc = xml.responseXML;
	var q = xmlDoc.getElementsByTagName("column");
	loopTimeout(0, q.length, 2000, function(i){
		var x = q[i].getElementsByTagName("num")[0];
    var y = x.childNodes[0];
    document.getElementById("demo").innerHTML =
    y.nodeValue;
	console.log("HERE \n" + y.nodeValue);		
	c.fillStyle = "blue"; 
  var dp = y.nodeValue;
  c.fillRect(45 + i*50, 460-dp*5 , 30, dp*5);
	});
}

setInterval(getData,8000)
  </script> 
</body> 
</html>