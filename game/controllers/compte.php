<?php
/*
	Change password
*/
if(!(empty($_POST['password']) && empty($_POST['password2'])))
{
	if($_POST['password'] == $_POST['password2'])
	{
		$userManager->changePass($user->id(), sha1($_POST['password']));
		$user->setPass(sha1($_POST['password']));
	}
	else {
		$erreur = "Les mots de passe doivent être identique !";	
	}
}
/*
	Changement background
*/
if(!(empty($_POST['newBackground'])))
{
	$charactereManager->changeBackground($user->id(), $_POST['newBackground']);
	$charactere->setBackground($_POST['newBackground']);
}

/*
	Background
*/
$background = $charactere->background();
if(empty($background))
{
	$background = "<p>Aucun background n'est encore enregistré.</p>
						<br /><br /><br /><br />
						<p>La création d'un background pour votre personnage est obligatoire</p>";
}
else 
{
	$background = $charactere->background();
}

/*
	Modification Avatar
*/
if(!(empty($_FILES['avatar'])))
{
	$maxheight = 99999;
	$maxsize = 999999;
	$maxwidth = 999999;
	try
	{
		if($_FILES['avatar']['size'] > $maxsize)
		{
			throw new Exception("L'avatar est trop grand !");
		}
		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		$extension_upload = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1)  );
		if (!(in_array($extension_upload,$extensions_valides)))
		{
			throw new Exception("Extension incorrect !");
		}
		$image_sizes = getimagesize($_FILES['avatar']['tmp_name']);
		if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
		{
			 throw new Exception("Image trop grande"); 
		}
		$fichier = $user->pseudo();
		$avatar = "{$fichier}.{$extension_upload}";
		$nom = "theme/img/avatar/{$fichier}.{$extension_upload}";
		$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$nom);
		if (!$resultat)
		{
			throw new Exception("Transfert réussi");			
		}
		$charactereManager->changeAvatar($user->id(), $avatar);
		$charactere->setAvatar($avatar);	
	}
	catch(Exception $e)
	{
		$erreur = $e->getMessage();
	}
}


/*
	Affichage Avatar
*/
$avatar = $charactere->avatar();
if(empty($avatar))                 // Si le joueur n'a pas d'avatar alors on lui met celui par default !
{
	$avatar = "theme/img/no_avatar.jpg";
}
else
{
	$avatar = "theme/img/avatar/{$avatar}";
}
/*
	Remettre à zéro
*/
if(!(empty($_GET['reset'])))
{
	echo "TEST";
}