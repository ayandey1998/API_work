<?php
include "db.php";
include "function_library.php";
$crud= new api();
$action = $_REQUEST['action'];
$id = $_REQUEST['id'];



if ($action== "insert"){
	$crud->api_insert();
}else if ($action== "update"){
	$crud->api_update($id);
}
else if($action== "delete"){
	$crud->api_delete($id);
}


?>