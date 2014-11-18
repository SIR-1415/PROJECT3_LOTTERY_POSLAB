<?php
header('Access-Control-Allow-Origin: *');
include_once "CKey.php";
//existe alguma var codificada na url chamada "format"
//se sim, verifica se é "xml" e escreve chave em xml
//senao escreve em json

$f = "json";

if(isset($_GET["format"])) {
	if ($_GET["format"] == "xml") {
		$f = "xml";
	}
}

$the_key = new CKeyGenerator();

if ($f == "xml") {
	header("Content-Type:application/xml");
	echo $the_key->asXML();
} else {
	header("Content-Type:application/json");
	echo $the_key->asJSON();
}

?>