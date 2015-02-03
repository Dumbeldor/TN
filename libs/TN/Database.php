<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=weblobsd_TN', 'root', '');
	   
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>