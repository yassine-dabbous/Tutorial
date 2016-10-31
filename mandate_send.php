<?php

require_once 'db_connect.php';
$conx = connect();



    $amount = $_GET['amount'];
    $recipient = $_GET['recipient'];
    $mandate_num = $_GET['mandate_num'];
    $uid = $_GET['uid'];
    $query = "INSERT INTO `mandate_send` VALUES (null,'$amount','$recipient','$mandate_num','$uid',null)";
    $result = mysqli_query($conx, $query);
    $id = mysqli_insert_id($conx);
    if (!$result) {
		echo 'sarra_salima_error';//0;
		return ;
    } else {
        echo $id;
    }
    @mysqli_free_result($result);

return;
