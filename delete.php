<?php
// accés à la base de donnée
require_once('inc/init.php');

// pour supprimer un produit (DELETE)

if(isset($_GET['id_prod'])){
    
    $sqlSelect='SELECT * FROM `produitzak` WHERE id_prod = :id_prod';
// variable preparatiuon de la requête
$query = $pdo->prepare($sqlSelect);
// // execution de la requête
$query->bindParam(':id_prod',$_GET['id_prod'],PDO::PARAM_INT);
$query->execute();
$produit=$query->fetch();

    // $sqlDelete = 'DELETE FROM produitzak WHERE id_prod = $_GET[id_prod]';
    
	// préparation de la requête
	$req = $pdo->exec("DELETE FROM produitzak WHERE id_prod = $_GET[id_prod]");
	// execution de la requête 
    // $req->execute();
    header('Location: produit.php');
}
?>

<?php 
require_once('inc/header.php');
require_once('inc/nav.php');
?>