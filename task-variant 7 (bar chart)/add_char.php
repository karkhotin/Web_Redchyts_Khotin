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
