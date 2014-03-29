<?php


$fileContents= file_get_contents('XMLFILE.xml');

$fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);

$fileContents = trim(str_replace('"', "'", $fileContents));

$simpleXml = simplexml_load_string($fileContents);

$json = json_encode($simpleXml);


file_put_contents('JSONFILE.json', $json);

?>