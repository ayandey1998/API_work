<?php
include "db.php";
$id= $_REQUEST['id'];


if(!empty($id)){
 $query = "DELETE FROM user WHERE `id`=
 '".$id."'";

 $result = mysqli_query($db_connection, $query);
 echo $result;
 
 if($result){

     $data = array('status' => true, 'message' => 'DELETED Successfully...');

     }else{

     	$data = array('status' => false, 'message' => 'Cannot able to delete a post detail...');
     }
}
 
    echo json_encode($data);

?>