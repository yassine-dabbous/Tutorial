<?php
session_start();
if (!isset($_SESSION["is_auth"])) {
	header("location: secure_login.php");
	exit;
}

include('top.php'); 
include('db_connect.php');

$data = execute('retrait');

echo '<div class="row"><div class="col col-md-2"></div><div class="col col-md-8">';
echo '<ol class="breadcrumb"> <li><a href="/">Accueil</a></li> <li><a href="#">Demandes</a></li> <li class="active">Retrait</li> </ol>';

echo '<table class="table table-hover table-striped"> <thead> <tr> <th>#</th> <th>Client</th> <th>Mantant</th> <th>Date</th> <th>action</th> </tr> </thead><tbody>';
if(count($data))
foreach($data as $user){
  echo '<tr>'.
  '<th scope="row">'.$user->id.'</th>'.
  '<td>'.getName($user->uid).'</td>'.
  '<td>'.$user->amount.'</td>'.
  '<td>'.$user->date.'</td>'.
  '<td><button class="btn btn*default printiha" rel="'.$user->id.'">Imprimer</button>'.
  '<div style="display:none" id="ele'.$user->id.'">'.
  '<center><h1>Retrait d\'argent</h1></center><br/>'.
  '<strong>Mantant: </strong>'.$user->amount.'<br/>'.
  '<strong>bénéficiaire: </strong>'.getName($user->uid).'<br/>'.
  '<strong>Date: </strong>'.$user->date.'<br/>'.
  '<strong class="pull-right">Signature: </strong><br/>'.
  '</div>'.
  '</td>'.
  '</tr>';
}

echo '</tbody></table>';


paginate('retrait');

echo '</div><div class="col col-md-2"></div></div>';

echo "<div id='toprint'></div>";

include('bottom.php'); ?>