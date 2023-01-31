<?php
    include "db.php";
    // include "user.json";

    $jsondata = file_get_contents('php://input');

    
    // print_r($jsondata);
    $data = json_decode($jsondata);
    echo '<pre>';
    print_r($data);

    
    for($i=0;$i<count($data);$i++) {
        $fname = $data[$i]->fname;
        $lname = $data[$i]->lname;
        $phone = $data[$i]->phone;

        $sql = "INSERT INTO user SET `fname` = '".$fname."' ,`lname` = '".$lname."', `phone` = '".$phone."'";
        if ($db_connection->query($sql) == TRUE) {
            echo "New records created successfully";
        } else { 
            echo "Error: " . $sql . "<br>" . $db_connection->error;
        }
    }
    		
  $db_connection->close();


?>  
