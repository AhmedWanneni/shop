<?php
// DATABASE : shop
$conn = new mysqli("localhost", "root", "", "shop");
if ($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}

?>
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
<?php
$sql = "SELECT * FROM produits";
$result = $conn->query($sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
    echo "<p>".$row["id"]."</p>";
    echo "<p>".$row["nom"]."</p>";
}
}

?>