<form action="index.php?codePage=actionInscription" method="POST">
    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" required />
    </div>
    <div class="espaceHor"></div>
    <div>
        <label for="prenom">Prenom</label>
        <input type="text" name="prenom" required />
    </div>
    <div class="espaceHor"></div>
    <div>
        <label for="motDePasse">mot De Passe</label>
        <input type="password" name="motDePasse" required />
    </div>
    <div class="espaceHor"></div>
    <div>
        <label for="confirmation">Confirmation du mot de passe</label>
        <input type="password" name="confirmation" required />
    </div>
    <div class="espaceHor"></div>
    <div>
        <label for="adresseMail">Adresse mail</label>
        <input type="text" name="adresseMail" required />
    </div>
    <div class="espaceHor"></div>
    <div>
        <label for="role">Role (1 admin 2 user)</label>
        <input type="text" name="role" required />
    </div>
    <div class="espaceHor"></div>
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" required />
    </div>
    <div class="espaceHor"></div>
    <div><button type="submit">Valider</button></div>
</form>