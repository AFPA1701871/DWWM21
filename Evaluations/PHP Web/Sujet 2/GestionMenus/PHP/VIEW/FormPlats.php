<div></div>
<section>

    <?php

    $mode = $_GET['mode'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $obj = PlatsManager::findById($id);
    } else {
        $obj = new Plats();
    }
    $idHidden = '<input name= "idPlat" value="' . $obj->getIdPlat() . '" type= "hidden">';

    switch ($mode) {
        case "ajouter": {
                $idHidden = '';
                $disabled = '';
                $submit = '<button id="submit" class="bouton" type="submit"><i class="fas fa-paper-plane"></i>&nbsp Ajouter</button><div class="mini"></div>';
                break;
            }
        case "modifier": {
                $disabled = '';
                $submit = '<button id="submit" class="bouton"><i class="fas fa-edit"></i> &nbsp Modifier</button><div class="mini"></div>';
                break;
            }
        case "details": {
                $disabled = 'disabled';
                $submit = '';
                break;
            }
        case "supprimer": {
                $disabled = 'disabled';
                $submit = '<button class="bouton"><i class="fas fa-trash-alt"></i>&nbsp Supprimer</button>
            <div class="mini"></div>';
                break;
            }
    }
    $listeMenus = MenusManager::getList();
    $select = '<select id="idMenu" name="idMenu" >';     
    $select .= '<option value = "" >Choisir une valeur</option>';
   
    foreach ($listeMenus as  $value) {
        if ($value->getidMenu() == $obj->getIdMenu()) $selected = "selected";
        else $selected = "";
        $select .= '<option value = "' . $value->getIdMenu() . '" ' . $selected . '>' . $value->getLibelleMenu() . '</option>';
    }
    $select .= '</select>';
    echo '<form action="index.php?page=ActionPlats&mode=' . $mode . '" method="POST">';
    echo $idHidden;

    ?>
    <div class="colonne">

        <div class="info colonne ">
            <label class="titre centre" for="libellePlat">Plat :</label>
            <input type="text" id="libellePlat" <?= $disabled; ?> name="libellePlat" value="<?= $obj->getLibellePlat(); ?>" required>
        </div>
        <div class="info colonne ">
            <label class="titre centre" for="nbCalories">Nombre Calories :</label>
            <input type="text" id="nbCalories" <?= $disabled; ?> name="nbCalories" value="<?= $obj->getNbCalories(); ?>" required>
        </div>
        <div class="info colonne ">

            <label class="titre centre" for="idMenu">Menu :</label>
            <?= $select; ?>
        </div>
    </div>
    <div class="espaceHor"></div>
    <div>

        <?php
        echo $submit;
        echo '<a href="index.php?page=ListePlats"><div class="bouton"><i class="far fa-arrow-alt-circle-left"></i>&nbsp Retour</div></a>';
        ?>

    </div>

    </form>

</section>