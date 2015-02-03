<?php
include "includes/define.php";
include PATH_INCLUDE.'session.php';
include "controllers/_header.php";
include "views/_header.php";
include "controllers/_menu.php";
include "views/_menu.php";

if(!(empty($_GET['view']))) //Si la view est renseigné alors on affiche la page.
{
	if(file_exists(PATH_CONTROLLERS.$_GET['view'].'.php') AND file_exists(PATH_VIEWS.$_GET['view'].'.php'))
	{
		require (PATH_CONTROLLERS.$_GET['view'].'.php');
		require (PATH_VIEWS.$_GET['view'].'.php');
	} 
} else {
	require (PATH_CONTROLLERS.'index.php');
	require (PATH_VIEWS.'index.php');
} 
