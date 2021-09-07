<?php
class horaireWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('horaire', 'Horaire', array('description' => 'Un plug-in qui affiche des horaires personalisées.'));
        add_action('wp_enqueue_scripts', array($this, 'CSS'), 15);
    }

    // CSS personalisé du widget
    public function CSS()
    {
        wp_enqueue_style('CSS', plugins_url('horaire/style.css'));
    }

    // Personalisation du titre du widget
    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php
}

    // Affichage du widget
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo $args['before_title'];
        echo apply_filters('widget_title', $instance['title']);
        echo $args['after_title'];

        global $wpdb;
        // on récupère la liste des horaires
        $list = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}horaire");
        // on récupère le premier jour à afficher et si on affiche tous les jours ou non
        $firstDay = get_option('horaire_first', 1);
        $allDay = get_option('horaire_all', true);
        
        //Déplacer les horaires journaliers de une case jusqu'a ce que le premier element correspond au jour selectionné dans les options
        while($list[0]->id != $firstDay){
            $list[] = array_shift($list);
        }
        
        if ($list == null) {
            echo 'Pas encore d\'horaires enregistrées.';
        } else {
            foreach ($list as $res) {
                if ($allDay) { // CAS N°1 : si AllDay == true
                    echo '<div class="line">';
                    echo '<div class="day">' . $res->jour . ' </div>';
                    if (empty($res->horaire_matin) && empty($res->horaire_apresMidi)) { // si les deux horaires sont vides, on affiche "fermeture"
                        echo '<div class="morning">Fermeture</div>';
                        echo '<div class="afternoon"></div>';
                    } else { // sinon on affiche les horaires normalement
                        echo '<div class="morning">' . $res->horaire_matin . '</div>';
                        echo '<div class="afternoon">' . $res->horaire_apresMidi . '</div>';
                    }
                    echo '</div>';
                } else { // CAS N°2 : si AllDay != true
                    if (!empty($res->horaire_matin) || !empty($res->horaire_apresMidi)) { // si les deux horaires sont vides, on ne les affiche pas du tout
                    echo '<div class="line">';
                    echo '<div class="day">' . $res->jour . ' </div>';
                    echo '<div class="morning">' . $res->horaire_matin . '</div>';
                    echo '<div class="afternoon">' . $res->horaire_apresMidi . '</div>';
                    echo '</div>';
                    }
                }
            }
        }
        echo $args['after_widget'];
    }
}