<?php
/*
Plugin Name: Hello World
Description: ecrit Hello World
Author: Martine
Version: 1.0
*/

class HelloWorld_Plugin{
	public function __construct(){
		include_once plugin_dir_path(__FILE__).'/helloClass.php';
		new HelloClass();
		//on crée une gestion d'événement sur activation du plug-in pour créer la table en base de données
		register_activation_hook(__FILE__, array('helloclass', 'install'));
		register_uninstall_hook(__FILE__, array('helloclass', 'uninstall'));
		// on ajoute une entrée dans le menu administrateur
		add_action('admin_menu', array($this, 'add_admin_menu'),20);
		
	}
	public function add_admin_menu()
	{	//on ajoute une page dans le menu administrateur
		add_menu_page('Hello World 2', 'Hello World plugin', 'manage_options', 'helloworld', array($this, 'menu_html'));
	}
	public function menu_html()
	{// formulaire de gestion des paramètres pour le module d'administration
	
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<form method="post" action="options.php">';
		settings_fields('helloworld_settings'); 
		echo '<label>Couleur</label>';
		echo '<input type="color" name="helloworld_couleur" value="'.get_option("helloworld_couleur").'"/>';
		echo '<label>Toto</label>';
		echo '<input type="color" name="helloworld_toto" value="'.get_option("helloworld_toto").'"/>';
		submit_button();
		echo '</form>';
	}
}
new HelloWorld_Plugin();
