<?php

session_start();
if (!isset($_SESSION["is_auth"])) {
	header("location: secure_login.php");
	exit;
}

include('top.php'); 
include('db_connect.php');

$data = execute('mandate_send');
 

echo '<div class="row"><div class="col col-md-2"></div><div class="col col-md-8">';

echo '<ol class="breadcrumb"> <li><a href="/">Accueil</a></li> <li><a href="#">Demandes</a></li> <li class="active">Mandats à envoyer</li> </ol>';

echo '<table class="table table-hover table-striped"> <thead> <tr> <th>#</th> <th>mantant</th> <th>destinataire</th> <th>mandate_num</th> <th>Client</th> <th>date</th> <th>action</th> </tr> </thead><tbody>';

foreach($data as $user){
  echo '<tr>'.
  '<th scope="row">'.$user->id.'</th>'.
  '<td>'.$user->amount.'</td>'.
  '<td>'.$user->recipient.'</td>'.
  '<td>'.$user->mandate_num.'</td>'.
  '<td>'.getName($user->uid).'</td>'.
  '<td>'.$user->date.'</td>'.
  '<td><button class="btn btn*default printiha" rel="'.$user->id.'">Imprimer</button>'.
  '<div style="display:none" id="ele'.$user->id.'">'.
  '<center><h1>Mandat</h1></center><br/>'.
  '<strong>Mantant: </strong>'.$user->amount.'<br/>'.
  '<strong>Expéditeur: </strong>'.$user->recipient.'<br/>'.
  '<strong>Mandate_num: </strong>'.$user->mandate_num.'<br/>'.
  '<strong>bénéficiaire: </strong>'.getName($user->uid).'<br/>'.
  '<strong>Date: </strong>'.$user->date.'<br/>'.
  '<strong class="pull-right">Signature: </strong><br/>'.
  '</div>'.
  '</td>'.
  '</tr>';
}

echo '</tbody></table>';
paginate('mandate_send');
echo '</div><div class="col col-md-2"></div></div>';

echo "<div id='toprint'></div>";
include('bottom.php'); ?>