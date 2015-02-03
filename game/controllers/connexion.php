<?php
if(empty($_POST['pseudo']))
{
	$post = false;
}
else{
	if(isset($_POST['pseudo']) && isset($_POST['pass']))
	{

		$post = true;
		$pass = sha1($_POST['pass']);

		$status = $userManager->connexion($_POST['pseudo'], $pass);

		if(!($userManager->exists($_POST['pseudo'])))
		{
			$erreur = "Vous vous êtes trompé de pseudo.";
		}
		elseif($status == "banni") //compte Banni
		{
			$erreur = "Compte banni !";
		}
		elseif($status == "mdp") //mauvais mdp
		{
			$erreur = "Mauvais mot de passe ou de nom de compte !";
		}
		else // bon mdp
		{
			$user = $userManager->get($_POST['pseudo']);
			$charactere = $charactereManager->get($user->id());
			$_SESSION['charactere'] = $charactere;
			$_SESSION['user'] = $user;
			header('Location: ../game/');
		}
	}
}
