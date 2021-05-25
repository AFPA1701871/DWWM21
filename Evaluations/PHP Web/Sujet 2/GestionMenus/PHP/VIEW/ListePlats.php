
<?php
$plats = PlatsManager::getList();
echo '<section class="colonne">
        <div class="espaceHor"></div>
        <div>
            <div class="centre"><a href="index.php?page=FormPlats&mode=ajouter"><button class="bouton"><i
                            class="fas fa-plus-circle"></i> &nbsp Ajouter</button></a></div>
            <div class="centre"><a href="index.php?page=ListeMenus"><button class="bouton"><i class="far fa-arrow-alt-circle-left"></i> &nbsp Gérer les menus</button></a></div>
            
                            </div>
        <div class="espaceHor"></div>';
echo '  <div class="info ">
            <div class=" triple">
                <div class="  centre double" >Plats</div>
                <div class="  centre " >Nombre de calories</div>
            </div>
            <div class=" triple"></div>
        </div>
        <div class="espaceHor"></div>';

foreach ($plats as $obj) {
     echo '<div class="info ">
                <div class="case triple">
                    <div class="double">' . $obj->getLibellePlat() . '</div>
                    <div class="">' . $obj->getNbCalories() . '</div>
                </div>

                <div class="triple centerItem">
                    <div class="mini"></div>
                    <a href="index.php?page=FormPlats&mode=details&id=' . $obj->getIdPlat() . '"><button class="bouton"><i class="fas fa-info-circle"></i> Détail</button></a>
                    <div class="mini"></div>
                    <div class="mini"></div>
                    <a href="index.php?page=FormPlats&mode=modifier&id=' . $obj->getIdPlat() . '"><button class="bouton"><i class="fas fa-edit"></i> Modifier</button></a>
                    <div class="mini"></div>
                    <div class="mini"></div>
                    <a href="index.php?page=ActionPlats&mode=supprimer&id=' . $obj->getIdPlat() . '"><button class="bouton"><i class="fas fa-trash-alt"></i> Supprimer</button></a>
                    <div class="mini"></div>
                </div>';

    echo '</div>';
}

echo '</section>';
