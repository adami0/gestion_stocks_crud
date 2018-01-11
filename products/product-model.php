<?php

$db = connectDB("127.0.0.1", "gestion_stocks_crud", "root", "");


function getProduct($id) {
  global $db;
  $sql = "SELECT * FROM produits WHERE id = :id";
  $statement = $db->prepare($sql);
  $statement->bindParam(":id", $id, PDO::PARAM_INT);
  $statement->execute();
  return $statement->fetch(PDO::FETCH_OBJ);
}

function createProduct() {
  global $db;

  $sql = "INSERT INTO produits (nom, prix, description, image)
    VALUES (:nom, :prix, :description, :image)";

  //$age = (int)$_POST["age"];
  //$age = $_POST["age"] !== "" ? $_POST["age"] : null;
  //$email = $_POST["email"] !== "" ? $_POST["email"] : null;

  $statement = $db->prepare($sql);
  $statement->bindParam(":nom", $_POST["nom"], PDO::PARAM_STR);
  $statement->bindParam(":prix", $_POST["prix"], PDO::PARAM_STR);
  $statement->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
  $statement->bindParam(":image", $_POST["image"], PDO::PARAM_INT);
  $res = $statement->execute();
  $msg_crud = ($res === true) ? "insertion ok" : "soucis à l'insertion";
  header("Location: index.php");
}

function getProducts() {
  global $db;
  $sql = "SELECT * FROM produits";
  $exec = $db->query($sql);
  return $exec->fetchAll(PDO::FETCH_OBJ);
}

function updateProduct() {
  global $db;

  $sql = "UPDATE produits SET nom = :nom, prix = :prix, description = :description, image = :image WHERE id = :id";

  // $age = $_POST["age"] !== "" ? (int)$_POST["age"] : null;
  // $email = $_POST["email"] !== "" ? $_POST["email"] : null;

  $statement = $db->prepare($sql);
  $statement->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
  $statement->bindParam(":nom", $_POST["nom"], PDO::PARAM_STR);
  $statement->bindParam(":prix", $_POST["prix"], PDO::PARAM_INT);
  $statement->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
  $statement->bindParam(":image", $_POST["image"], PDO::PARAM_STR);
  $check = $statement->execute();
}
