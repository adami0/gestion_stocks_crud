<?php include_once "crud.php"; ?>

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
<body>
    <h1 class="title">
        <a href="index.php">CRUD 1</a>
    </h1>
    <h3 class="title">
        <span>Créer un nouvel utilisateur</span>
    </h3>
    <?php if (isset($msg_crud)) {
        echo "<p class=\"msg\">$msg_crud</p>";
    }?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="create f-col">
        <input name="nom" type="text" placeholder="nom" required>
        <input name="prix" type="number" placeholder="prix" required>
        <input name="description" type="text" placeholder="description" class="input" min="1" max="140">
        <input type="text" name="image" placeholder="image">
        <div class="f-row">
            <input name="create_product" type="submit" value="create product !" class="btn">
        </div>
    </form>
    <h3 class="title">products : Read + Update + Delete</h3>

    <?php if (isset($products) && !count($products)): ?>
        <p>Pas d'utilisateurs pour le moment...</p>
    <?php endif; ?>

    <?php if (isset($products) && count($products)): ?>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
            class="form list-user">
            <table id="products" class="tabler products">
                <thead>
                    <tr>
                        <?php foreach ($products[0] as $prop => $val) {
                            echo "<td>$prop</td>";
                        } ?>
                        <td class="update"><span>bill</span></td>
                        <td class="update"><span>update</span></td>
                        <td class="delete">
                            <input type="submit" name="delete_products"
                            value="delete" class="tabler-btn">
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) {
                        echo "<tr data-id-user=\"$product->id\">";
                        foreach ((array)$product as $prop => $val) {
                            $val = isset($val) ? $val : "N.R";
                            echo "<td>" . $val . "</td>";
                        }
                        echo "<td class=\"bill\">
                        <a class=\"tabler-btn\">facturer</a>
                        </td>";
                        echo "<td class=\"update\">
                        <a class=\"tabler-btn\" href=\"products/edit-product.php?id=$product->id\">edit</a>
                        </td>";
                        echo "<td class=\"delete\">
                        <input name=\"delete_user_ids[]\" type=\"checkbox\" value=\"$product->id\" />
                        </td>";
                        echo "</tr>";
                    } ?>
                </tbody>
            </table>
        </form>
    <?php endif; ?>
