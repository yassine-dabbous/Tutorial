<?php

require_once 'db_connect.php';
$db = connect();

$username = $_GET['username'];
$password = $_GET['password'];
$res = new stdClass();
$result = mysqli_query($db, "SELECT * FROM users WHERE `username` = '" . $username . "' and `password` = '$password' ");
if (!$result) {
    echo $db->error;
    return;
}

$count = mysqli_num_rows($result);
if ($count == 0) {
    $res->success = 0;
    echo 0;//json_encode($res);
    return;
}
$r = mysqli_fetch_object($result);
$res->id = $r->id;
$res->username = $r->username;
$res->success = 1;
echo $res->id;
//echo json_encode($res);
return;






