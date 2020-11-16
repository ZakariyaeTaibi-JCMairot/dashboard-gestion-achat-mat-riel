<?php
// accés à la base de donnée
require_once('inc/init.php');
	
// // Pour ajouter un produit (CREATE)

// if(isset($_POST['lieux_achat']) && $_POST['lieux_achat']){

if($_POST){
// codejc	
	// importation du ticket de caisse
	$file_name = $_FILES['ticket_prod']['name'];//atteindre le name 
    $file_type = strrchr($file_name, ".");//pour check .png etc...
    $file_tmp_name = $_FILES['ticket_prod']['tmp_name'];//fichier le chemin tempo
    $file_img= "img/" . $file_name;//var 
    $type_autorisees = array('.jpg','.gif','.png','.jpeg');//fichier que l'on controle
    copy($file_tmp_name,$file_img);//prend dans le dossier tempo pour le placer dans le dossier img

	// importation de la doc
	$file_name2 = $_FILES['manuel_prod']['name'];//atteindre le name 
    $file_type2 = strrchr($file_name2, ".");//pour check .png etc...
    $file_tmp_name2 = $_FILES['manuel_prod']['tmp_name'];//fichier le chemin tempo
    $file_doc= "doc/" . $file_name2;//var 
    $type_autorisees2 = array('.pdf','.doc','.txt');//fichier que l'on controle
    copy($file_tmp_name2,$file_doc);//prend dans le dossier tempo pour le placer dans le dossier img

	

	// sql =INSERT INTO `produitzak`(`id_prod`, `lieux_achat`, `nom_prod`, `ref_prod`, `cate_prod`, `date_achat`, `fin_garantie`, `prix_prod`, `ticket_prod`, `manuel_prod`, `conseil_util`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])
	// variable pour l'insertion de nouveau produit
	// attention remettre la categorie
	$produitInsert = $pdo->prepare(
		'INSERT INTO produitzak(lieux_achat, nom_prod, ref_prod, date_achat, fin_garantie, prix_prod, conseil_util, cate_prod, ticket_prod, manuel_prod) 
		VALUES (:lieux_achat, :nom_prod, :ref_prod, :date_achat, :fin_garantie, :prix_prod, :conseil_util, :cate_prod, :ticket_prod,:manuel_prod)'
		);
// binParam str
	$produitInsert->bindParam(':lieux_achat', $_POST['lieux_achat'], PDO::PARAM_STR);
	$produitInsert->bindParam(':nom_prod', $_POST['nom_prod'], PDO::PARAM_STR);
	$produitInsert->bindParam(':ref_prod', $_POST['ref_prod'], PDO::PARAM_STR);
	$produitInsert->bindParam(':cate_prod', $_POST['cate_prod'], PDO::PARAM_STR);
	$produitInsert->bindParam(':conseil_util', $_POST['conseil_util'], PDO::PARAM_STR);
	$produitInsert->bindParam(':prix_prod', $_POST['prix_prod'], PDO::PARAM_STR);
	$produitInsert->bindParam(':date_achat', $_POST['date_achat'], PDO::PARAM_STR);
	$produitInsert->bindParam(':fin_garantie', $_POST['fin_garantie'], PDO::PARAM_STR);

// bind des de l'image et de la doc : file
	$produitInsert->bindParam(':ticket_prod', $file_img , PDO::PARAM_STR);
	$produitInsert->bindParam(':manuel_prod', $file_doc , PDO::PARAM_STR);

	$produitInsert->execute();	
// code zak
	// $sqlInsert='INSERT INTO produitzak (lieux_achat,nom_prod,ref_prod,cate_prod,date_achat,fin_garantie,prix_prod,conseil_util) VALUES(:lieux_achat,:nom_prod,:ref_prod,:cate_prod,:date_achat,:fin_garantie,:prix_prod,:conseil_util)';
	// // préparation de la requête
	

	// $req = $pdo->prepare($sqlInsert);
	// // execution de la requête 
	// $req->execute(array(
	// 	'lieux_achat'=>$_POST['lieux_achat'],
	// 	'nom_prod'=>$_POST['nom_prod'],
	// 	'ref_prod'=>$_POST['ref_prod'],
	// 	'cate_prod'=>$_POST['cate_prod'],
	// 	'date_achat'=>$_POST['date_achat'],
	// 	'fin_garantie'=>$_POST['fin_garantie'],
	// 	'prix_prod'=>$_POST['prix_prod'],
	// 	'conseil_util'=>$_POST['conseil_util'],
		
	// ));
	
	// echo '<h4>Le produit a bien été ajouté<h4>';
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
					<option>Avion</option>
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