<?php
/**
 * @package Horaire
 * @version 1
 */
/*
Plugin Name: Horaire
Plugin URI: 
Description: Un plug-in qui affiche des horaires personalisées
Author: moi
Version: 1
Author URI: 
 */

class horairePlugin
{
    public function __construct()
    {
        include_once plugin_dir_path(__FILE__) . '/horaireClass.php';
        register_activation_hook(__FILE__, array('horaireClass', 'install'));
        register_deactivation_hook(__FILE__, array('horaireClass', 'uninstall'));
        add_action('admin_menu', array($this, 'add_admin_menu'), 20);
        new horaireClass();
    }

    // Ajout de la page de paramétrage
    public function add_admin_menu()
    {
        add_menu_page('Horaire', 'Horaire', 'manage_options', 'horaire', array($this, 'admin_settings'));
    }

    // Contenu de la page ajoutée dans la fonction précédente
    public function admin_settings()
    {
    $firstDay = get_option('horaire_first', 1);
    $allDay = get_option('horaire_all', 1);
    ?>
    <h1><?php echo get_admin_page_title() ; ?></h1>
        <h2>Paramétrer le widget</h2>
            <form method="post" action="options.php">
                <div class="formLine">
                    <div class="formBloc">
                        <label for="horaire_first">Premier jour de la semaine</label>
                    </div>
                    <div class="formBloc">
                    <select name="horaire_first" required>
                            <option value="1" <?php if ($firstDay == 1) echo "SELECTED"; ?>>Lundi</option>
                            <option value="2" <?php if ($firstDay == 2) echo "SELECTED"; ?>>Mardi</option>
                            <option value="3" <?php if ($firstDay == 3) echo "SELECTED"; ?>>Mercredi</option>
                            <option value="4" <?php if ($firstDay == 4) echo "SELECTED"; ?>>Jeudi</option>
                            <option value="5" <?php if ($firstDay == 5) echo "SELECTED"; ?>>Vendredi</option>
                            <option value="6" <?php if ($firstDay == 6) echo "SELECTED"; ?>>Samedi</option>
                            <option value="7" <?php if ($firstDay == 7) echo "SELECTED"; ?>>Dimanche</option>
                        </select>
                    </div>
                </div>
                <div class="formLine">
                    <div class="formBloc">
                        <label>Afficher tous les jours</label>
                    </div>
                    <div class="formBloc">
                        <input type="checkbox" name="horaire_all" value="true" <?php if ($allDay == "true") echo "CHECKED"; ?>>
                    </div>
                </div>
            <?php settings_fields('horaire_settings');
            submit_button();?>
            </form>
            <?php
    }

}

new horairePlugin();
