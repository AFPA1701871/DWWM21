<?php
echo '<div><div></div>';
if (isset($_SESSION['utilisateur']))
{
    if ($_SESSION['utilisateur']->getRole() == 1)
    {

        echo '<div><button><a href="index.php?codePage=admin">admin</a></button></div>';
        echo '<div class="demi"></div>';
    }
    
    echo '<div><button><a href="index.php?codePage=user">user</a></button></div>';
}
echo '<div></div></div>';