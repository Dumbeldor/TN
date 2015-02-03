<?php
if(empty($_POST['pseudo']))
{
	$post = false;
}
 
else
{
	$post = true;
	try {
		if(empty($_POST['pseudo']) OR empty($_POST['email']) OR empty($_POST['password']) OR empty($_POST['repeat']) OR empty($_POST['sexe']))
			throw new Exception("Vous devez remplir tous les champs !");

		$blacklist = array('administrateur','administrator','moderateur','modo','moderator','sentenza di dio');
		if (in_array(strtolower($_POST['pseudo']), $blacklist))
			throw new Exception("Ce pseudo est réservé pour l\'administration du jeu");

		if(preg_match("#[.\-_\\/'\"()~<>{}\+\*|&]+#", $_POST['pseudo']))
			throw new Exception("Votre pseudo contient des caractères non autorisés.");

		if(!(strlen($_POST['pseudo']) <= 20))
			throw new Exception("Votre spseudo est trop long.");

		if(!(strlen($_POST['pseudo']) >= 4))
			throw new Exception("Votre pseudo est trop court.");

		if($_POST['password'] != $_POST['repeat'])
			throw new Exception("Les deux mots de passe saisis ne correspondent pas.");

		if(!(strlen($_POST['password']) >= 4))
			throw new Exception("Votre mot de passe est trop court.");

		if(!(strlen($_POST['password']) <= 25))
			throw new Exception("Votre mot de passe est trop long.");

		if(!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
			throw new Exception("Email incorrect.");

		if ($userManager->exists($_POST['pseudo']))
			throw new Exception("Le nom du personnage existe déjà !");

		if ($userManager->email($_POST['email']))
			throw new Exception("L'email est déjà utilisé !");

		$ville = $userManager->inscriptionVille();
		$comtes = $userManager->inscriptionComtes();
		$user = new User(array(
			'pseudo' => $_POST['pseudo'],
			'pass' => sha1($_POST['password']),
			'email' => $_POST['email'],
			'ip' => $_SERVER['REMOTE_ADDR'],
			'registration' => date("d.m.y")
			));
		$charactere = new Charactere(array(
			'town' => $ville,
			'earl' => $comtes['comtes'],
			'duchy' => $comtes['duche'],
			'gender' => $_POST['sexe'],
			'avatar' => "",
			'background' => "",
			'status' => "",
			'premium' => 0,
			'holiday' => 0,
			'dateHoliday' => 0,
			));

		$id = $userManager->add($user);
		$charactereManager->add($charactere);

		$userManager->registration($id);

	} catch (Exception $e) {
		$erreur = $e->getMessage();
	}
}
