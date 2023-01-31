<?php

include "db.php";
$id= $_REQUEST['id'];
// echo $id;
$jsondata = file_get_contents('php://input');
// echo $jsondata;

$data = json_decode($jsondata);
// print_r ($data);
// die;

$fname= $data-> fname;
$lname= $data-> lname;
$phone= $data-> phone;

if(!empty($fname) && !empty($lname) && !empty($phone)){
 $query = "UPDATE user SET `fname` = '".$fname."' ,`lname` = '".$lname."', `phone` = '".$phone."' WHERE `id`=
 '".$id."' LIMIT 1";
 $result = mysqli_query($db_connection, $query);
 echo $result;
 die;
 if($result){

     $data = array('status' => true, 'message' => 'Post Updated Successfully...');

     }else{

     	$data = array('status' => false, 'message' => 'Cannot able to update a post details...');
     }
}
 
    echo json_encode($data);






?>