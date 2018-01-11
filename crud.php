<?php
// inclusion du fichier de fonctions utilitaires
include_once "libs/utility.php";
// inclusions des fonctions crud pour le module users (utilisateurs)
include_once "products/product-model.php";
// exécution d'une fonction (@utility.php) pour affichage explicite des erreurs PHP
enablePHPMaxErros();

// mettre à jour $base_url ci-dessous avec la route de votre dossier crud1
$base_url = "http://localhost/simplon/mon-code/tp/TP5_gestion-crud/";

// au chargement de la page
// on récupère tous les utilisateurs stockés en bdd
$products = getProducts();

/*
  ##### Logique de l'application (SYNCHRONE) #####
  on utilise les verbes HTTP get ou post pour
  que le client (le navigateur) puisse envoyer des requêtes au serveur
*/

if (isset($_GET["id"])) {
  $product = getProduct($_GET["id"]);
}

if (isset($_POST["update_product"])) {
  updateProduct();
}

if (isset($_POST["delete_users"]) &&
    isset($_POST["delete_user_ids"]) &&
    count($_POST["delete_user_ids"])) {
        deleteUser();
}

if (isset($_POST["create_product"])) {
    createProduct();
}
