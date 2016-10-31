<?php 

session_start();
if (!isset($_SESSION["is_auth"])) {
	header("location: secure_login.php");
	exit;
}




include('top.php'); 
include('db_connect.php');

$users = all('users');
$tickets = all('tickets');
$versement = all('versement');
$retrait = all('retrait');
$mandate_send = all('mandate_send');
$mandate_receive = all('mandate_receive');

echo '<div class="row"><div class="col col-md-2"></div><div class="col col-md-8">';
echo '<ul class="list-group">';
  echo '<li class="list-group-item"><a href="users.php">Les utilisateurs </a><span class="badge">'.count($users).'</span></li>';
  echo '<li class="list-group-item"><a href="show_tickets.php">Les billets </a><span class="badge">'.count($tickets).'</span></li>';
  echo '<li class="list-group-item"><a href="show_versement.php">Les demandes de versement </a><span class="badge">'.count($versement).'</span></li>';
  echo '<li class="list-group-item"><a href="show_retrait.php">Les demandes de retrait </a><span class="badge">'.count($retrait).'</span></li>';
  echo '<li class="list-group-item"><a href="show_mandate_send.php">Les demandes d\'envoi d\'une mandate </a><span class="badge">'.count($mandate_send).'</span></li>';
  echo '<li class="list-group-item"><a href="show_mandate_receive.php">Les demandes du reception d\'une mandate </a><span class="badge">'.count($mandate_receive).'</span></li>';
echo '</ul>';
echo '</div><div class="col col-md-2"></div></div>';

include('bottom.php'); ?>