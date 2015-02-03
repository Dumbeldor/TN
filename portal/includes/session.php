<?php
include("../libs/TN/Database.php");
include("/opt/lampp/htdocs/tn-client/game/includes/autoloader.php");
session_start();

$userManager = new UserManager($db);
$charactereManager = new CharactereManager($db);

if (isset($_SESSION['user'])) // Si la session user existe, on restaure l'objet.
{
  $user = $_SESSION['user'];
  $charactere = $_SESSION['charactere'];
}

if (isset($user)) // Si on a créé un user, on le stocke dans une variable session afin d'économiser une requête SQL.
{
  $_SESSION['user'] = $user;
  $_SESSION['charactere'] = $charactere;
}
if (isset($_GET['deconnexion']))
{
	$userManager->update($user);
  $charactereManager->update($charactere);
  session_destroy();
  header('Location: .');
  exit();
}
 ?>