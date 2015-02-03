<?php 
include "../game/includes/define.php";
include "../game/includes/session.php";
include "../game/controllers/inscription.php";
include "../game/controllers/connexion.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Terre-noire ::: LA BETA </title>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/styleform.css"rel="stylesheet" type="text/css" media="all" />
	<link href="css/shinyform.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Files JS -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.shinyform.js" ></script>
	<script type="text/javascript">
	$(function(){
		$('input:radio,input:checkbox,input:file,select').shinyform();
	});
         </script>
</head>
<body>
<div id="wrapperGen">
		<div id="Wrapper">
			<?php include "../game/views/connexion.php";
				  include "../game/views/inscription.php"; ?>
            
            <div id="gridMiddle">
            &nbsp;</div>
            <div id="gridRight">
            	<span class="TN">Nombre de joueurs inscrits :</span>
            	<div id="gridRight1">
            	<?php $nbInscrit['test'] = 1547; echo $nbInscrit['test']; ?>
            	</div>
                <span class="TN">Terre Noire en vidéo :</span><br />
                <div id="gridRight2"><iframe class="size" src="include/video.php" frameborder="0" scrolling="no" allowfullscreen="yes"></iframe></div>
				<br />
                <span class="TN">Screenshots :</span>
                <div id="gridRight3">
            	A venir...
            	</div>
            </div>
			<footer>
				<span class="fond-lien">CGU</span>
				<span class="fond-lien">FAQ</span>
				<span class="fond-lien">Forum</span>
				<span class="fond-lien">Contact</span>
			</footer>
		</div>
	</div>
</body>
</html>