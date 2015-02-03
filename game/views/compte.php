<?php
	if(!empty($erreur))
		echo $erreur; ?>
<body>
	
			<div id="body_content">
			<hr />
			<div id="contentGen">
				<div id="content1">
					<div class="btTitleLvl">Mon Avatar</div>
					<p>
					Mon avatar actuel :
						<form enctype="multipart/form-data" action="#" method="post">
							<div id="cadre_photo" style="float:left;margin-right:5px;">
								<img src="<?php echo $avatar; ?>" width="100" height="100" alt="<?php echo $avatar; ?>"><br />
							</div>
							<div id="cadreUpload">
							<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
							<input name="avatar" type="file"/>
							<input type="submit" class="submAction2" value="Modifier mon avatar" style="margin-top:25px;">
							</div>
						</form>
					</p>
				</div>
				<div id="content2" style="min-height:245px;">
					<div class="btTitleLvl">Changement mot de passe</div>
					<p style="margin-top:22px;text-align:center;">
						<form action="" method="post">
							<div id="cadrePasse">
								<p style="text-align:center;"><input type="password" name="password" placeholder="Nouveau passe" class="input1"></p>
								<p style="text-align:center;"><input type="password" name="password2" placeholder="Saisir à nouveau" class="input1"></p>
								<p style="text-align:center;"><input type="submit" class="submAction1" value="Modifier mon mot de passe"></p>
							</div>
						</form>
					</p>
				</div>
			</div>
			<hr />
			<div id="contentGen">
				<div id="content1">
					<div class="btTitleLvl">Mon background</div>
					<p>
						Mon background actuel :
					</p>
					<div id="headBg"></div>
					<div id="bodyBg">
					<?php echo $background; ?>
					</div>
					<div id="footBg"></div>
				</div>
				<div id="content2" style="min-height:245px;">
					<div class="btTitleLvl">Modifier Background</div>
						<p style="margin-top:22px">
							<form action="#" method="post" id="background" name="background">
								<div id="headBg"></div>
								<div id="bodyBg">
									<textarea name="newBackground" placeholder="Taper ici votre nouveau background"></textarea>
								</div>
								<div id="footBg"></div>
								<p style="text-align:center;"><input type="submit" class="submAction1" value="Modifier mon background"></p>
							</form>
						</p>
					</div>
				</div>
			<hr />
			<div id="contentGen">
				<div id="content1">
					<div class="btTitleLvl">Mode vacances</div>
					<p>
						Le mode vacances est là pour vous permettre de vous absenter durant un certain temps sans risquer de vous faire attaquer. Cependant aucune ressource ne sera récoltée et vous ne produirez plus rien durant cette absence. La durée minimum d'un Mode Vacances est de 48h. Vous ne pourrez pas vous reconnecter durant ce laps de temps. 
					</p>
					<p>
						<form action="#" methode="post">
							<input type="hidden" name="id" value="1">
							<input type="submit" class="submAction1" value="Activer le mode vacances maintenant">
						</form>
					</p>
				</div>
				<div id="content2" style="min-height:245px;">
					<div class="btTitleLvl">Mon compte</div>
						<p>Remise à zéro de votre compte <span class="red"><em>(opération irréversible)</em></span></p>
						<form action="#" methode="post">
							<input type="hidden" name="reset" value="1">
							<input type="submit" class="submAction1" value="Remettre mon compte à Zéro">
						</form>
						<br /><br />
						<p>Suppression de votre compte <span class="red"><em>(opération irréversible)</em></span></p>
						<form action="#" methode="post">
							<input type="hidden" name="id" value="1">
							<input type="submit" class="submAction1" value="Supprimer mon compte définitivement">
						</form>
					</div>
				</div>
			<hr />
			</div>	
		</div>
	<div id="foot_content" style="margin-left:1px;"></div>
	</div>		
	<footer>
		
	</footer>
	</div>
<!--  Par ElYannick  -->
    <script type="text/javascript">
  
	$( "#bt_nav" ).click(function() {
		if ($("#cadre_menu").css('margin-top') == "-79px" ) {
			$("#cadre_menu").animate({ marginTop: "0px"  }, 400 );
			$(this).val("FERMER");
		}	else {
			$("#cadre_menu").animate({ marginTop: "-79px"  }, 400 );
			$("#cadreRessources").hide();
			$(this).val("MENU");
		}
	});
	
	$( ".ListDipBt" ).click(function() {
		if ($("#ListDip").css('display') == "none" ) {
			$("#ListDip").slideDown(400);
			$(this).val("Cacher le mode recherche");
		}	else {
			$("#ListDip").hide(400);
			$(this).val("Mode recherche de joueurs");
		}
	});
	
	$( ".bt_troupes" ).click(function() {
		if ($("#cadre_troupes").css('display') == "none" ) {
			$("#cadre_troupes").show(400);
			$(this).val("Cacher mes troupes");
		}	else {
			$("#cadre_troupes").hide(400);
			$(this).val("Afficher mes troupes");
		}
	});
	
	$(".bt_ressources").click(function(){
		if ($("#cadreRessources").css('display') == "none") {
			$("#cadreRessources").slideDown(400);
		} else {
			$("#cadreRessources").slideUp(400);
		}
	});
	
	$("#listeAttaque").click(function(){
		if ($("#Liste").css('display') == "none") {
			$("#Liste").slideDown(400);
			$(this).val("Cacher liste des joueurs attaquables");
		} else {
			$("#Liste").slideUp(400);
			$(this).val("Afficher liste des joueurs attaquables");
		}
	});
  </script>
</body>
</html>