<?php
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

	
	if (file_exists('data/users.dat'))
		$aUsuarios = json_decode(file_get_contents('data/users.dat'), true);
	else
		$aUsuarios = array();

	$response["code"] = 200;
	$response["data"] = $aUsuarios;
    echo json_encode($response);
?>