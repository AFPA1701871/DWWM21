<?php
include 'Head.php';
include 'Header.php';

echo '
<form action="AjouterClient.php" method="post">
     <div> 
        <label for="nomClient">Nom : </label>
        <input name="nomClient" value=""  />
    </div>
    <div> 
        <label for="prenomClient">Prenom : </label>
        <input name="prenomClient"  value=""   />
    </div>
    <div> 
        <label for="adresse">Adresse : </label>
        <input name="adresse"  value=""  />
    </div>
    <div> 
        <label for="ville">Ville : </label>
        <input name="ville"  value=""  />
    </div>
    <div class="btn"> 
    <button type="submit">Ajouter</button>
    <button type="reset"><a href="../../index.php">Annuler</a></button>
    </div>
</form>';