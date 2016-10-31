<?php
session_start();
if (!isset($_SESSION["is_auth"])) {
	header("location: secure_login.php");
	exit;
}

include('top.php'); 
include('db_connect.php');


if(isset($_GET['reset']) and $_GET['reset'] == 'tickets'){
    $db = connect();
    $result = mysqli_query($db,"UPDATE `tickets` SET `status`= '0', `uid`= '0'");
    if(!$result){echo $db->error;}
    @mysqli_free_result($result);
}


$data = execute('tickets');
 

echo '<center><a class="btn btn-primary" href="?reset=tickets">rréinitialiser les billets</a></center><br/>';

echo '<div class="row"><div class="col col-md-2"></div><div class="col col-md-8">';

echo '<ol class="breadcrumb"> <li><a href="/">Accueil</a></li> <li class="active">Les billets</li> </ol>';

echo '<table class="table table-hover table-striped"> <thead> <tr> <th>#</th> <th>Status</th> <th>Client</th> </tr> </thead><tbody>';


foreach($data as $user){
	if($user->status == '0') $user->status = 'LIBRE';
	else $user->status='réservé';
}

foreach($data as $user){
  echo '<tr>'.
  '<th scope="row">'.$user->id.'</th>'.
  '<td>'.$user->status.'</td>'.
  '<td>'.getName($user->uid).'</td>'.
  '</tr>';
}

echo '</tbody></table>';
paginate('tickets');
echo '</div><div class="col col-md-2"></div></div>';

include('bottom.php'); ?>