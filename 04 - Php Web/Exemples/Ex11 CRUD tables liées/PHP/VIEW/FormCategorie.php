<?php
$mode = $_GET['mode'];

echo '<div id="DivSousTitre">';
if (isset($_GET['id']))
{
    $categ = CategoriesManager::findById($_GET['id']);
}
else
{
    $categ = new Categories();
}
//en fonction du mode, on modifie l'entet du form
switch ($mode)
{
    case "ajout":
            {
            $sousTitre = '<h5>Ajouter une nouvelle catégorie</h5></div>';
            $dis = "";
            $submit = '<div class="ligneDetail"><input type="submit" value="Ajouter" class=" crudBtn crudBtnEdit"/>';
            break;
        }
    case "edit":
            {
            $sousTitre = '<h5>Editer une catégorie</h5></div>';
            $dis = " disabled ";
            $submit = '';

            break;
        }
    case "modif":
            {
            $sousTitre = '<h5>Modifier une catégorie</h5></div>';
            $dis = "";
            $submit = '<div class="ligneDetail"><input type="submit" value="Modifier" class=" crudBtn crudBtnModif"/>';
            break;
        }
    case "del":
            {
            $sousTitre = '<h5>Supprimer une catégorie</h5></div>';
            $dis = " disabled ";
            $submit = '<div class="ligneDetail"><input type="submit" value="Supprimer" class=" crudBtn crudBtnSuppr"/>';
            break;
        }
}

echo $sousTitre;
echo '<form id="formulaire" method="post" action="index.php?codePage=actionCategorie&mode=' . $mode . '">';
if ($mode != "ajout")
{
    echo '
<input type="hidden" name="idCategorie" value="' . $categ->getIdCategorie() . '" >';
}

echo '
<div class="ligneDetail">
    <div class="libelleInput"> Libelle :</div>
    <div class="input"> <input type="text" name="libelleCategorie"
            value="' . $categ->getLibelleCategorie() . '" ' . $dis . '></div>
</div>';
echo $submit;
// dans tous les cas, on met le bouton annuler
?>
    <a href="index.php?codePage=listeCategorie" class=" crudBtn crudBtnRetour">Annuler</a>
</div>

</form>
