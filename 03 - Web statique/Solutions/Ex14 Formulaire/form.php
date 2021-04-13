<form action="resultat.php" method="post">
    <label for="nom1">Nom : </label>
    <input type="text" name="nom" value="toto" required />
    <input type="text" name="prenom" placeholder="entrer votre prenom">
    <input type="number" name="age" min="0" max="100" step="0.1"/>
    <button type="submit">Soumettre</button>
</form>