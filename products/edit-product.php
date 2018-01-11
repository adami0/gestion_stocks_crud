<?php include_once "../crud.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD 1</title>
    <base href="<?php echo $base_url ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<?php if (!isset($product) OR $product === false): ?>
<p>Aucun utilisateur ne correspond votre recherche.</p>
<?php endif; ?>

<?php if(isset($product) AND  $product !== false): ?>

<form method="post" action="index.php" class="create f-col">
  <input type="hidden" name="id" value="<?php echo $product->id ?>">
  <label for="nom">Nom</label>
  <input id="nom" name="nom" type="text" value="<?php echo $product->nom ?>" required>
  <label for="prix">Prix</label>
  <input id="prix" name="prix" type="number" value="<?php echo $product->prix ?>" required>
  <label for="description">Description</label>
  <input id="description" name="description" type="text" value="<?php echo $product->description ?>"
  class="input" min="16" max="140">
  <label for="image">image</label>
  <input id="email" name="email" type="text" class="input" value="<?php echo $product->image ?>">
  <div class="f-row">
    <input name="update_product" type="submit" value="edit user !" class="btn">
  </div>
</form>


<?php endif; ?>
