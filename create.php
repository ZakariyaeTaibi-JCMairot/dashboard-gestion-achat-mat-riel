<?php
// accés à la base de donnée
require_once('inc/init.php');
	
// // Pour ajouter un produit (CREATE)


if(isset($_POST['lieux_achat']) && $_POST['lieux_achat']){
		
	$sqlInsert='INSERT INTO produitzak (lieux_achat,nom_prod,ref_prod,cate_prod,date_achat,fin_garantie,prix_prod,conseil_util) VALUES(:lieux_achat,:nom_prod,:ref_prod,:cate_prod,:date_achat,:fin_garantie,:prix_prod,:conseil_util)';
	// préparation de la requête
	$req = $pdo->prepare($sqlInsert);
	// execution de la requête 
	$req->execute(array(
		'lieux_achat'=>$_POST['lieux_achat'],
		'nom_prod'=>$_POST['nom_prod'],
		'ref_prod'=>$_POST['ref_prod'],
		'cate_prod'=>$_POST['cate_prod'],
		'date_achat'=>$_POST['date_achat'],
		'fin_garantie'=>$_POST['fin_garantie'],
		'prix_prod'=>$_POST['prix_prod'],
		'conseil_util'=>$_POST['conseil_util'],
	));
	echo '<h4>Le produit a bien été ajouté<h4>';
}
?>

<!--formulaire d'ajout de produit-->
<?php
require_once('inc/header.php');
require_once('inc/nav.php');
?>

<!--formulaire d'ajout de produit-->
<div class="createProduit" id="createProduit">
<h2>AJOUT D'UN PRODUIT</h2>
<div class="formCreate">
<form method="POST" enctype="multipart/form-data">
<!-- nom du produit / reference du produit / categorie -->
<div class="row">
<div class="col">
<input type="text" class="form-control" name="nom_prod" placeholder="Nom du produit">
</div>
<div class="col">
<input type="text" class="form-control" name="ref_prod" placeholder="reference du produit">
</div>
<div class="col">
<select class="custom-select mr-sm-2" name="cate_prod" id="inlineFormCustomSelect">
					<option>Categorie</option>
					<option>Electroménager</option>
					<option>TV-HIFI</option>
					<option>Bricolage</option>
					<option>voiture</option>
				</select>
</div>
</div>
<!-- entretiens du produit -->
<div class="row">
<div class="col">
<textarea class="form-control" id="exampleFormControlTextarea1" name="conseil_util" rows="3" placeholder="conseils d'entretiens du produit"></textarea>
</div>
</div>
<!-- adresse physique / adresse electronique -->
<div class="row">
<div class="col">
<input type="text" class="form-control" name="lieux_achat" placeholder="Adresse">
</div>
<!-- <div class="col">
<input type="text" class="form-control" name="adresseElecCreate" placeholder="Adresse electronique">
</div> -->
</div>
<!-- date d'achat / date fin de garantie / prix -->
<div class="row">
<div class="col">
<label for="dateAchat">Date d'achat du produit:</label>
<input type="date" id="dateAchat" name="date_achat" min="1980-01-01" max="2025-12-31">
</div>
<div class="col">
<label for="dateFinGar">Date fin de garantie:</label>
<input type="date" id="dateFinGar" name="fin_garantie" min="1980-01-01" max="2025-12-31">
</div>
<div class="col">
<div class="form-group">
<label for="exampleFormControlFile1">Documentation</label>
<input type="file" class="form-control-file" name="manuel_prod" id="exampleFormControlFile1">
</div>
</div>
<div class="col">
<div class="form-group">
<label for="exampleFormControlFile1">Ticket</label>
<input type="file" class="form-control-file" name="ticket_prod" id="exampleFormControlFile1">
</div>
</div>
<div class="col">
<input type="text" class="form-control" name="prix_prod" placeholder="Prix">
</div>
</div>
<div class="row">
<div class="col">
<button type="submit" class="btn btn-secondary btn-lg btn-block">Ajouter un produit</button>
</div>
</div>
</form>
</div>
</div> 