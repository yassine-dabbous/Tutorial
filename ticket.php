<?php

require_once 'db_connect.php';
$db = connect();

$id = $_GET['id'];
$uid = $_GET['uid'];
$res = new stdClass();
$result = mysqli_query($db, "SELECT * FROM tickets WHERE `id` = '" . $id . "' and `status` = '0' ");
if (!$result) {
    echo $db->error;
    return;
}

$count = mysqli_num_rows($result);
if ($count == 0) {
    echo 'sarra_salima_error';//0;//json_encode($res);
    return;
}
@mysqli_free_result($result);

$query = "UPDATE `tickets` SET `status`=1,`uid`='$uid' WHERE `id` = '$id'";
$result = mysqli_query($db, $query); 
if (!$result) { echo mysqli_error($conx);        die();}
@mysqli_free_result($result);
echo $id;
return;








