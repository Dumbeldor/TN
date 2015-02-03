<?php
if(empty($user) OR $_GET['view'] == "connexion" OR $_GET['view'] == "inscription")
{	
	header('Location: ../portal/');   
}