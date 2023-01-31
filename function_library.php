<?php
class api{
	public function api_insert(){
		global $db_connection;

	$jsondata = file_get_contents('php://input');

	$data= json_decode($jsondata);
	// print_r ($data);
	// die;
	
foreach ($data as $key => $value) {

		$fname = $value['fname'];
        $lname = $value['lname'];
        $phone = $value['phone'];

    	$sql = "INSERT INTO user SET `fname` = '".$fname."' ,`lname` = '".$lname."', `phone` = '".$phone."'";
    	echo ($sql);
    	// die;

    	if($db_connection-> query($sql)==true){
    		echo "insert successfully";
    	}else{
    		echo "Error: " . $sql  ;
    	}
	}
	}
	public function api_update($id){
		global $db_connection;

		$jsondata = file_get_contents('php://input');
		 $data2 = json_decode($jsondata);
		 // echo '<pre>';print_r($data2);exit;


			$fname= $data2[0]->fname;
			$lname= $data2[0]->lname;
			$phone= $data2[0]->phone;

			if(!empty($fname) && !empty($lname) && !empty($phone)){
	 			$query = "UPDATE user SET `fname` = '".$fname."' ,`lname` = '".$lname."', `phone` = '".$phone."' WHERE `id`='".$id."' LIMIT 1";
	 			$result = mysqli_query($db_connection, $query);
	 			echo $result;
	 			
	 			if($result){

	     			$data2 = array('status' => true, 'message' => 'Post Updated Successfully...');

	     		}else{

	     			$data2 = array('status' => false, 'message' => 'Cannot able to update a post details...');
     			}
			}
 
	}

	public function api_delete($id){
		global $db_connection;

		 // echo '<pre>';print_r($data2);exit;

			if(!empty($id)){
	 			$query = "DELETE FROM user WHERE `id`= '".$id."'";
	 			$result = mysqli_query($db_connection, $query);
	 			echo $result;
	 			
	 			if($result){

	     			$data2 = array('status' => true, 'message' => 'Post deleted Successfully...');

	     		}else{

	     			$data2 = array('status' => false, 'message' => 'Cannot able to delete a post details...');
     			}
			}

	}

}





?>