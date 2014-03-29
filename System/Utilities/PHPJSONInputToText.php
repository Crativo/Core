<?php
$data = json_decode(file_get_contents("php://input"));
touch($data->name.'.txt');
?>