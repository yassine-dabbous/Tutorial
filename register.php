<?php

require_once 'db_connect.php';
$conx = connect();



if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['password'])) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $date = time();
    $query = "INSERT INTO `users` VALUES (null,'$name',null,'$email','$password','0',$date)";
    $result = mysqli_query($conx, $query);
    $id = mysqli_insert_id($conx);
    if (!$result) {
	echo mysqli_error($conx);
        echo "yassine([{'id':'0','message':'<strong>mysql</strong>'}])";
    } else {
        $aaa = ["name" => $name, "email"=>$email, "message"=>"success"];
        echo "yassine([".json_encode($aaa)."])";
    }
    @mysqli_free_result($result);
} else {
    echo "yassine([{'id':'0','message':'<strong>error</strong>'}])";
}
return;
