<?php

/*
Plugin Name: Mon Image
Plugin URI: 
Description: Affiche un image et la change au survol de la souris.
Author: moi
Version: 1.0
Author URI: 
*/

// Affiche la div de l'image
function monImage() {
	
	echo '<div id="monImage"></div>';
}

//Ajoute l'action qui affiche l'image
add_action( 'the_content', 'monImage' );

// Retourne le CSS
function imageCSS() {
	echo "
	<style type='text/css'>
	#monImage{
		width: 480px;
		height: 320px;
		background-image: url('".plugins_url('monImage/img.jpg')."');
		background-size: contain;
		background-repeat: no-repeat;
	}
	#monImage:hover{
		background-image: url('".plugins_url('monImage/img2.jpg')."');
	}
	</style>
	";
}

//Ajoute l'action qui appelle le css
add_action( 'get_header', 'imageCSS' );
