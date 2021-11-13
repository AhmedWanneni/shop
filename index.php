<?php
// DATABASE : shop
$conn = new mysqli("localhost", "root", "", "shop");
if ($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>produit</title>
    </head>
    <body>
        <h1>Ajouter un produit</h1>
        <form action="index.php" method="POST">
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

        <form action="index.php" method="POST">
            <label for="id">Choisir ID</label>
            <input placeholder="id" type="text" name="id">
            <input type="submit" name="supprimer">
        </form>
        <!-- Modifier -->
        <h1>Modifier un produit</h1>
        <form action="index.php" method="POST">
            <input placeholder="id" name="mid" type="text"/>
            <input placeholder="nom" name="mnom" type="text"/>
            <input placeholder="prix" name="mprix" type="number"/>
            <input placeholder="quantité" name="mquantite" type="number"/>
            <input type="submit" value="Modifier produit" name="modifier">
        </form>
    </body>
</html>
<?php


    if($_POST["ajouter"]){
        $nom = $_POST["nom"];
        $prix = $_POST["prix"];
        $quantite = $_POST["quantite"];
        $categorie = $_POST["categorie"];
        $sousCategorie = $_POST["sousCategorie"];
        $sql = "INSERT INTO produits(nom,prix,quantite) VALUES ('".$nom."','".$prix."','".$quantite."')";
        if($conn->query($sql) === TRUE){
            echo "record true";
        }
        else{
            echo $conn->error;
        }
    }
    if($_POST["modifier"]){
        $id = $_POST["mid"];
        $nom = $_POST["mnom"];
        $prix = $_POST["mprix"];
        $quantite = $_POST["mquantite"];
        if($id){
        if($nom) {$sql = "UPDATE produits SET nom='".$nom."' WHERE id=".$id."";}
        elseif($prix) {$sql = "UPDATE produits SET prix='".$prix."' WHERE id=".$id."";}
        elseif($quantite) {$sql = "UPDATE produits SET quantite='".$quantite."' WHERE id=".$id."";}
        else {echo "Il faut changer une seule valeur";}
        
        if($conn->query($sql) === TRUE){
            echo "modifier";
        }
        else{
            echo $conn->error;
        }}
    }

    if($_POST["supprimer"]){
        $id = $_POST["id"];
        $sql = "DELETE FROM produits WHERE id=".$id."";
        if($conn->query($sql) === TRUE){
            echo "supprimer";
        }
        else{
            echo $conn->error;
        }
    }
?>