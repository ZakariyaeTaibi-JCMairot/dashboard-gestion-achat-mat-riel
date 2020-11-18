<?php
// accés à la base de donnée
require_once('inc/init.php');

// pour supprimer un produit (DELETE)

if(isset($_GET['id_prod'])){
    
	$req = $pdo->exec("DELETE FROM produitzak WHERE id_prod = $_GET[id_prod]");
    header('Location: produit.php');
}
?>

<?php 
require_once('inc/header.php');
require_once('inc/nav.php');
?>