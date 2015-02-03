<?php
/*
	Affichage Avatar
*/

if(!empty($charactere))
{
	$avatar = $charactere->avatar();
	if(empty($avatar))                 // Si le joueur n'a pas d'avatar alors on lui met celui par default !
	{
		$avatar = "theme/img/no_avatar.jpg";
	}
	else
	{
		$avatar = "theme/img/avatar/{$avatar}";
	}
	$pseudo = $user->pseudo();
}
?>