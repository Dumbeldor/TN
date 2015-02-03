<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Terre-noire ::: Bêta 1</title>
	<link href="<?php echo PATH_CSS; ?>style.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo PATH_CSS; ?>styleform.css"rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo PATH_CSS; ?>shinyform.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Files JS -->	
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="<?php echo "PATH_JS"; ?>/jquery.min.js"></script>	
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="js/excanvas.js"></script>
	<![endif]-->
	<script type="text/javascript" src="<?php echo "PATH_JS"; ?>/spinners.min.js"></script>
	<script type="text/javascript" src="<?php echo "PATH_JS"; ?>/tipped.js"></script>
	<script type="text/javascript" src="<?php echo "PATH_JS"; ?>/jquery.shinyform.js" ></script>
	<script type="text/javascript">
	
	jQuery(document).ready(function($) {
  /*
   * Demonstrations: Skins
   */
	  Tipped.create("#demo_skins_blue1", "Dacres", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue2", "Or", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue3", "Fer", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue4", "Blé", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue5", "Farine", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue6", "Pain", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue7", "Bétail", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue8", "Viande", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue9", "Peau", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue10", "Cuir", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue11", "Pêche", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue12", "Poisson", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue13", "Huile", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue14", "Raisin", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue15", "Vin", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue16", "Laine", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue17", "Vêtements", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue18", "Bois", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue19", "Planches", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue20", "Meubles", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue21", "Pierre", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue22", "Lait", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue23", "Fromages", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue24", "Armes", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue25", "Armures", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue26", "Gestion des attaques", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue27", "Mes notifications", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue28", "Ma messagerie", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue29", "Forum", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue30", "Panneau d'administration", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue31", "Premium", { skin: 'tiny' });
	  Tipped.create("#demo_skins_blue32", "Déconnexion", { skin: 'tiny' });
	  
	});

	
	$(function(){
		$('input:radio,input:checkbox,input:file,select').shinyform();
	});
	
	$(document).ready(function(){
        $(".select_box").click(function(event){   
            event.stopPropagation();
            $(this).find(".option").toggle().find(".option").slideDown();
            $(this).parent().siblings().find(".option").hide();
        });
        $(document).click(function(event){
            var eo=$(event.target);
            if($(".select_box").is(":visible") && eo.attr("class")!="option" && !eo.parent(".option").length)
            $('.option').hide();                                      
        });
        /*Assigned to a text box*/
        $(".option a").click(function(){
            var value=$(this).text();
            $(this).parent().siblings(".select_txt").text(value);
            $("#select_value").val(value)
        })
    })
	
	$(document).ready(function(){
        $(".select_box1").click(function(event){   
            event.stopPropagation();
            $(this).find(".option1").toggle().find(".option1").slideDown();
            $(this).parent().siblings().find(".option1").hide();
        });
        $(document).click(function(event){
            var eo=$(event.target);
            if($(".select_box1").is(":visible") && eo.attr("class")!="option1" && !eo.parent(".option1").length)
            $('.option1').hide();                                      
        });
        /*Assigned to a text box*/
        $(".option1 a").click(function(){
            var value=$(this).text();
            $(this).parent().siblings(".select_txt1").text(value);
            $("#select_value1").val(value)
        })
    })
	
	$(document).ready(function(){
        $(".select_box2").click(function(event){   
            event.stopPropagation();
            $(this).find(".option2").toggle().find(".option2").slideDown();
            $(this).parent().siblings().find(".option2").hide();
        });
        $(document).click(function(event){
            var eo=$(event.target);
            if($(".select_box2").is(":visible") && eo.attr("class")!="option2" && !eo.parent(".option2").length)
            $('.option2').hide();                                      
        });
        /*Assigned to a text box*/
        $(".option2 a").click(function(){
            var value=$(this).text();
            $(this).parent().siblings(".select_txt2").text(value);
            $("#select_value2").val(value)
        })
    })
	
	$(document).ready(function(){
        $(".select_box3").click(function(event){   
            event.stopPropagation();
            $(this).find(".option3").toggle().find(".option3").slideDown();
            $(this).parent().siblings().find(".option3").hide();
        });
        $(document).click(function(event){
            var eo=$(event.target);
            if($(".select_box3").is(":visible") && eo.attr("class")!="option3" && !eo.parent(".option3").length)
            $('.option3').hide();                                      
        });
        /*Assigned to a text box*/
        $(".option3 a").click(function(){
            var value=$(this).text();
            $(this).parent().siblings(".select_txt3").text(value);
            $("#select_value3").val(value)
        })
    })
	
	$(document).ready(function(){
        $(".select_box4").click(function(event){   
            event.stopPropagation();
            $(this).find(".option4").toggle().find(".option4").slideDown();
            $(this).parent().siblings().find(".option4").hide();
        });
        $(document).click(function(event){
            var eo=$(event.target);
            if($(".select_box4").is(":visible") && eo.attr("class")!="option4" && !eo.parent(".option4").length)
            $('.option4').hide();                                      
        });
        /*Assigned to a text box*/
        $(".option4 a").click(function(){
            var value=$(this).text();
            $(this).parent().siblings(".select_txt4").text(value);
            $("#select_value4").val(value)
        })
    })

	function shownone() {
		$('#assaut').hide(500);
		$('#pillage').hide(500);
		$('#siege').hide(500);
		$('#espionnage').hide(500);
		$('#deplacement').hide(500);
	}
	
	function showassaut() {
		$('#assaut').show();
		$('#pillage').hide(500);
		$('#siege').hide(500);
		$('#espionnage').hide(500);
		$('#deplacement').hide(500);
	}
	
	function showpillage() {
		$('#pillage').show();
		$('#assaut').hide(500);
		$('#siege').hide(500);
		$('#espionnage').hide(500);
		$('#deplacement').hide(500);
	}
	
	function showsiege() {
		$('#siege').show();
		$('#assaut').hide(500);
		$('#pillage').hide(500);
		$('#espionnage').hide(500);
		$('#deplacement').hide(500);
	}
	
	function showespionnage() {
		$('#espionnage').show();
		$('#assaut').hide(500);
		$('#pillage').hide(500);
		$('#siege').hide(500);
		$('#deplacement').hide(500);
	}
	
	function showdeplacement() {
		$('#deplacement').show();
		$('#assaut').hide(500);
		$('#pillage').hide(500);
		$('#siege').hide(500);
		$('#espionnage').hide(500);
	}
     
	function show() {
		document.getElementById('innerBTC').style.display = 'block';
	}
	
	function hide() {
		document.getElementById('innerBTC').style.display = 'none';
	}
	
	function calculateDacres()	{
		var rate = document.getElementById("rate").innerHTML;
		var howMuch = document.getElementById("howMuch");
		var user = document.getElementById("userDacres").value;
		var calculate = parseInt(rate) * parseInt(user);

		howMuch.innerHTML=calculate;
	}
	
	$(document).ready(function(){
		if($('button#toogleDiplomatie').click(function(){
			$('div#attaques').hide('2000');
			$('div#defense').hide('2000');
			$('div#productions').hide('2000');
			$('div#actionsMilitaires').hide('2000');
			$('div#espionnages').hide('2000');
			$('div#commandants').hide('2000');
			$('div#diplomatie').slideDown('2000'); 
		})); 
		if($('button#toogleAttaques').click(function(){
			$('div#diplomatie').hide('2000');
			$('div#defense').hide('2000');
			$('div#productions').hide('2000');
			$('div#actionsMilitaires').hide('2000');
			$('div#espionnages').hide('2000');
			$('div#commandants').hide('2000');
			$('div#attaques').slideDown('2000'); 
		})); 
		if($('button#toogleDefense').click(function(){
			$('div#diplomatie').hide('2000');
			$('div#attaques').hide('2000');
			$('div#productions').hide('2000');
			$('div#actionsMilitaires').hide('2000');
			$('div#espionnages').hide('2000');
			$('div#commandants').hide('2000');
			$('div#defense').slideDown('2000'); 
		})); 
		if($('button#toogleProductions').click(function(){
			$('div#diplomatie').hide('2000');
			$('div#attaques').hide('2000');
			$('div#defense').hide('2000');
			$('div#actionsMilitaires').hide('2000');
			$('div#espionnages').hide('2000');
			$('div#commandants').hide('2000');
			$('div#productions').slideDown('2000'); 
		})); 
		if($('button#toogleActionsMilitaires').click(function(){
			$('div#diplomatie').hide('2000');
			$('div#attaques').hide('2000');
			$('div#defense').hide('2000');
			$('div#productions').hide('2000');
			$('div#espionnages').hide('2000');
			$('div#commandants').hide('2000');
			$('div#actionsMilitaires').slideDown('2000'); 
		})); 
		if($('button#toogleEspionnages').click(function(){
			$('div#diplomatie').hide('2000');
			$('div#attaques').hide('2000');
			$('div#defense').hide('2000');
			$('div#productions').hide('2000');
			$('div#actionsMilitaires').hide('2000');
			$('div#commandants').hide('2000');
			$('div#espionnages').slideDown('2000'); 
		})); 
		if($('button#toogleCommandants').click(function(){
			$('div#diplomatie').hide('2000');
			$('div#attaques').hide('2000');
			$('div#defense').hide('2000');
			$('div#productions').hide('2000');
			$('div#actionsMilitaires').hide('2000');
			$('div#espionnages').hide('2000');
			$('div#commandants').slideDown('2000'); 
		})); 
		if($('button#close').click(function(){
			$('div#diplomatie').hide('2000');
			$('div#attaques').hide('2000');
			$('div#defense').hide('2000');
			$('div#productions').hide('2000'); 
			$('div#actionsMilitaires').hide('2000');
			$('div#espionnages').hide('2000');
			$('div#Liste').hide();
		})); 
	});
	</script>

</head>