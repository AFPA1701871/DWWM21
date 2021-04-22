<?php
$mode = $_GET['mode'];
echo '<div class="demiPage colonne">';
echo '<div id="DivSousTitre" >';

//en fonction du mode, on modifie l'entet du form
echo '<form id="formulaire" method="post" action="index.php?codePage=actionProduit&mode='.$mode.'" enctype="multipart/form-data">';
switch ($mode)
{
    case "ajout":
            {
            echo '<h5>Ajouter un nouveau produit</h5></div>';
            $disabled = "";
            $submit = '<div class="ligneDetail"><input type="submit" value="Ajouter" class=" crudBtn crudBtnEdit"/>';
            break;
        }
    case "edit":
            {
            echo '<h5>Editer un produit</h5></div>';
            $disabled = " disabled ";
            $submit = '';
            break;
        }
    case "modif":
            {
            echo '<h5>Modifier un  produit</h5></div>';
            $disabled = "";
            $submit = '<div class="ligneDetail"><input type="submit" value="Modifier" class=" crudBtn crudBtnModif"/>';
            break;
        }
    case "delete":
            {
            echo '<h5>Supprimer un  produit</h5></div>';
            $disabled = " disabled ";
            $submit = '<div class="ligneDetail"><input type="submit" value="Supprimer" class=" crudBtn crudBtnSuppr"/>';
            break;
        }
}
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

?>
<input type="hidden" name="idProduit"  value="' <?=$prod->getIdProduit()?> ">
<div class="ligneDetail">
    <div class="libelleInput"> Libelle :</div>
    <div class="input"> <input type="text" name="libelleProduit"
            value="<?=$prod->getLibelleProduit()?>" <?=$disabled?>></div>
</div>
<div class="ligneDetail">
    <div class="libelleInput">
        Prix :</div>
    <div class="input"> <input type="number" name="prix" value="<?=$prod->getPrix()?>" <?=$disabled?>></div>
</div>
<div class="ligneDetail">
    <div class="libelleInput">
        Date de peremption :</div>
    <div class="input">
        <input type="date" name="dateDePeremption"
           value="<?=$prod->getDateDePeremption()?> " <?=$disabled?> >
    </div>
</div>

<?php 
if ($mode!="ajout") 
{
echo '<div class="ligneDetail"><img alt="'.$prod->getLibelleProduit().'" src="'.$prod->getImage().'"></div>';
}
if ($mode=="modif"|| $mode=="ajout"){
echo '<div class="ligneDetail">
    <div class="libelleInput">
       Changer d\'image :</div>
    <div class="input">
        <input type="file" name="image"
            '.$disabled.' >
    </div>
</div>'; 
}
?>
<div class="ligneDetail">
    <div class="libelleInput">
        Categorie  :</div>
    <div class="input">
<select name="idCategorie" <?=$disabled?> >
    <?php
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

// en fonction du mode, on affiche les boutons utils
echo $submit;
// dans tous les cas, on met le bouton annuler
?>
    <a href="index.php?codePage=listeProduit" class=" crudBtn crudBtnRetour">Annuler</a>
</div>
</div>
</form>