<?php
    if(isset($utilisateur)){
        echo "<b>".$utilisateur['User']['credit_temps']."</b> Heures";
    }else{
        echo "Erreur <!-- Aucun parametres renseignes -->";
    }
exit();