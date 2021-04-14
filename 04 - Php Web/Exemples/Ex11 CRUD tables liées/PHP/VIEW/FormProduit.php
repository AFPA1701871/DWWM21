<?php
$mode = $_GET['mode'];

echo '<div id="DivSousTitre">';
if (isset($_GET['id']))
{
    $prod = ProduitsManager::findById($_GET['id']);
    $idCateg = $prod->getIdCategorie();
}
else
{
    $prod = new Produits();
    $idCateg = 1;
}
$listeCateg = CategoriesManager::getList();

//en fonction du mode, on modifie l'entet du form
switch ($mode)
{
    case "ajout":
            {
            $sousTitre = '<h5>Ajouter un nouveau produit</h5></div>';
            $dis = "";
            $submit = '<div class="ligneDetail"><input type="submit" value="Ajouter" class=" crudBtn crudBtnEdit"/>';
            break;
        }
    case "edit":
            {
            $sousTitre = '<h5>Editer un produit</h5></div>';
            $dis = " disabled ";
            $submit = '';

            break;
        }
    case "modif":
            {
            $sousTitre = '<h5>Modifier un  produit</h5></div>';
            $dis = "";
            $submit = '<div class="ligneDetail"><input type="submit" value="Modifier" class=" crudBtn crudBtnModif"/>';
            break;
        }
    case "del":
            {
            $sousTitre = '<h5>Supprimer un  produit</h5></div>';
            $dis = " disabled ";
            $submit = '<div class="ligneDetail"><input type="submit" value="Supprimer" class=" crudBtn crudBtnSuppr"/>';
            break;
        }
}
echo $sousTitre;
echo '<form id="formulaire" method="post" action="index.php?codePage=actionProduit&mode=' . $mode . '">';
if ($mode != "ajout")
{
    echo '
            <input type="hidden" name="idProduit" value="' . $prod->getIdProduit() . '">';
}

echo '
            <div class="ligneDetail">
            <div class="libelleInput"> Libelle :</div>
            <div class="input"> <input type="text" name="libelleProduit"
                    value="' . $prod->getLibelleProduit() . '" ' . $dis . '></div>
            </div>
            <div class="ligneDetail">
                <div class="libelleInput">
                    Prix :</div>
                <div class="input"> <input type="number" name="prix" value="' . $prod->getPrix() . '" ' . $dis . '>
                </div>
            </div>
            <div class="ligneDetail">
                <div class="libelleInput">
                    Date de peremption :</div>
                <div class="input">
                    <input type="date" name="dateDePeremption"
                        value="' . $prod->getDateDePeremption() . '"' . $dis . ' >
                </div>
            </div>
            <div class="ligneDetail">
                <div class="libelleInput">
                    Categorie  :</div>
                <div class="input">
            <select name="idCategorie" >';

foreach ($listeCateg as $uneCategorie)
{
    $sel = "";
    if ($uneCategorie->getIdCategorie() == $idCateg)
    {
        $sel = "selected";
    }

    echo '<option value="' . $uneCategorie->getIdCategorie() . '" ' . $sel . ' >' . $uneCategorie->getLibelleCategorie() . '</option>';
}

echo '
</select></div>
</div>';
echo $submit;
// dans tous les cas, on met le bouton annuler
?>
    <a href="index.php?codePage=listeProduit" class=" crudBtn crudBtnRetour">Annuler</a>
</div>

</form>
