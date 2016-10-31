<?php 
session_start();
if (!isset($_SESSION["is_auth"])) {
	header("location: secure_login.php");
	exit;
}

include('top.php'); 
include('db_connect.php');

$data = execute('users');

echo '<div class="row"><div class="col col-md-2"></div><div class="col col-md-8">';
echo '<table class="table table-hover table-striped"> <thead> <tr> <th>#</th> <th>username</th> <th>email</th> <th>cin</th> <th>account_num</th> <th>date</th> </tr> </thead><tbody>';

foreach($data as $user){
  echo '<tr>'.
  '<th scope="row">'.$user->id.'</th>'.
  '<td>'.$user->username.'</td>'.
  '<td>'.$user->email.'</td>'.
  '<td>'.$user->cin.'</td>'.
  '<td>'.$user->account_num.'</td>'.
  '<td>'.$user->date.'</td>'.
  '</tr>';
}

echo '</tbody></table>';
echo '</div><div class="col col-md-2"></div></div>';

include('bottom.php'); ?>