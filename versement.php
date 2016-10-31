<?php

require_once 'db_connect.php';
$conx = connect();

    $amount = $_GET['amount'];
    $recipient = $_GET['recipient'];
    $rid = $_GET['rid'];
    $uid = $_GET['uid'];
    $query = "INSERT INTO `versement` VALUES (null,'$amount','$recipient','$rid','$uid',null)";
    $result = mysqli_query($conx, $query);
    $id = mysqli_insert_id($conx);
    if (!$result) {
		echo 'sarra_salima_error';//0;// mysqli_error($conx);
		return ;
    } else {
        echo $id;
    }
    @mysqli_free_result($result);

return;
