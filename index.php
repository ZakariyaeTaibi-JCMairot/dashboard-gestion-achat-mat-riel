<?php

// connexion à la bdd
require_once('inc/init.php');

if($_POST){
    // vérifie que l'utilisateur existe bien
    $result = $pdo -> prepare("SELECT * FROM utilisateur WHERE email = :email ");
    $result -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $result -> execute();
    //si il y a un email qui existe dans la bdd
    if($result -> rowCount()> 0){
        // var pour ce que l'on fecth dans le $result
        $utilisateur=$result->fetch();
        //variable pour le mot de passe avec l'encodage md5
        $mdp=md5($_POST['password']);
        //vérifie que le mot de passe saisie correspond à celui du collaborateur
        if($mdp==$utilisateur['password']){
        // on stock les infos du membre dans la session
        $_SESSION['utilisateur']=$utilisateur;
        header('location:produit.php');
        }
        else{
			$error .= '<div class="alert alert-danger">Mauvais Mot de passe</div>';
		}
    }
    else{
		$error .= '<div class="alert alert-danger">Aucun compte existant</div>';
	}
}

require_once('inc/header.php');
?>

<div class="login">
<h1>Connexion</h1>
	<!----message d'erreur------>
	<?= $error ?> 
	<!-- formulaire pour le login -->
	<form method="post" action="" class="">
	
		<div class="form-group">
			<label>Email : </label>
			<input type="text" name="email" class="form-control" />
		</div>
		
		<div class="form-group">
			<label>Mot de passe : </label>
			<input type="password" name="password" class="form-control" />
		</div>
	
		<div class=" form-group">
			<input type="submit" class="btn btn-dark" value="Connexion"/>
		</div>
	</form>
</div>