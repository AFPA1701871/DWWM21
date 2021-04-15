<header>

    <div><img src="./IMG/Logo_afpa.jpg" alt=""></div>
    <div class="titre"><?php echo $titre;?></div>
    <div class="colonne">
        <?php

    if( isset($_SESSION['utilisateur']))
    {
        echo '<div class="itemsCenter">Bonjour '.$_SESSION['utilisateur']->getNom().'</div>';
        echo '<div><a href="index.php?codePage=deconnection">Déconnecter</a></div>';
    }
    else{
        echo '<a href="index.php?codePage=connection">Connecter</a>';
    }
?>

    </div>
</header>