<?php
include "../controller/backend.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>produit</title>
    </head>
    <body>
        <h1>Ajouter un produit</h1>
        <form action="controller/backend.php" method="POST">
            <input placeholder="nom" name="nom" type="text"/>
            <input placeholder="prix" name="prix" type="number"/>
            <input placeholder="quantité" name="quantite" type="number"/>
            <select name="categorie" id="">
                <option value="alimentaire">alimentaire</option>
                <option value="cosmetique">cosmetique</option>
            </select>
            <select name="sousCategorie" id="">
                <option value="Biscuit">Biscuit</option>
                <option value="chocolat">chocolat</option>
            </select>
            <input type="submit" value="Ajouter produit" name="ajouter">
        </form>
        <!-- Supprimer -->
        <h1>Supprimer un produit</h1>

        <form action="controller/backend.php" method="POST">
            <label for="id">Choisir ID</label>
            <input placeholder="id" type="text" name="id">
            <input type="submit" name="supprimer">
        </form>
        <!-- Modifier -->
        <h1>Modifier un produit</h1>
        <form action="controller/backend.php" method="POST">
            <input placeholder="id" name="mid" type="text"/>
            <input placeholder="nom" name="mnom" type="text"/>
            <input placeholder="prix" name="mprix" type="number"/>
            <input placeholder="quantité" name="mquantite" type="number"/>
            <input type="submit" value="Modifier produit" name="modifier">
        </form>
    </body>
</html>
