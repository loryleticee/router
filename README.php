<?php

// Fonction de rappel pour la comparaison des tableaux
$comparerTableaux = function ($a, $b) {
    // Comparaison des clés et des valeurs
    return ($a == $b);
};

// Filtrer les doublons en utilisant array_filter avec la fonction de rappel
$listeFiltree = array_filter($liste, function ($valeur, $index) use ($liste, $comparerTableaux) {
    return array_reduce(array_keys($liste), function ($acc, $i) use ($valeur, $liste, $comparerTableaux, $index) {
        // Ignorer le tableau lui-même lors de la comparaison
        if ($i != $index) {
            return $acc || $comparerTableaux($valeur, $liste[$i]);
        }
        return $acc;
    }, false);
}, ARRAY_FILTER_USE_BOTH);

// Afficher la liste filtrée
print_r($listeFiltree);
?>
