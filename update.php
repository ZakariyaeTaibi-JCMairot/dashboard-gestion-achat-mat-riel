<?php
// accés à la base de donnée
require_once('inc/init.php');

//variable de la requete sql
$sqlSelect='SELECT * FROM `produitzak` WHERE id_prod = :id_prod';
// variable preparatiuon de la requête
$query = $pdo->prepare($sqlSelect);
// // execution de la requête
if(isset($_POST['id_prod'])){
    $id_prod = $_POST['id_prod'];
}
elseif(isset($_GET['id_prod'])){
    $id_prod = $_GET['id_prod'];
}
else{
    die('Produit non trouvé !');
}

$query->execute(array(
'id_prod'=>$id_prod,
));
$produit=$query->fetch();


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
		
		$produitInsert = $pdo->prepare('UPDATE produitzak SET lieux_achat = :lieux_achat, nom_prod = :nom_prod, ref_prod = :ref_prod, cate_prod = :cate_prod, date_achat = :date_achat, fin_garantie = :fin_garantie, prix_prod = :prix_prod, conseil_util = :conseil_util, manuel_prod=:manuel_prod, ticket_prod=:ticket_prod WHERE  id_prod=:id_prod');

	// binParam str
		$produitInsert->bindParam(':lieux_achat', $_POST['lieux_achat'], PDO::PARAM_STR);
		$produitInsert->bindParam(':nom_prod', $_POST['nom_prod'], PDO::PARAM_STR);
		$produitInsert->bindParam(':ref_prod', $_POST['ref_prod'], PDO::PARAM_STR);
		$produitInsert->bindParam(':cate_prod', $_POST['cate_prod'], PDO::PARAM_STR);
		$produitInsert->bindParam(':conseil_util', $_POST['conseil_util'], PDO::PARAM_STR);
		$produitInsert->bindParam(':prix_prod', $_POST['prix_prod'], PDO::PARAM_STR);
		$produitInsert->bindParam(':date_achat', $_POST['date_achat'], PDO::PARAM_STR);
		$produitInsert->bindParam(':fin_garantie', $_POST['fin_garantie'], PDO::PARAM_STR);
		$produitInsert->bindParam(':id_prod', $_POST['id_prod'], PDO::PARAM_STR);
	// bind des de l'image et de la doc : file
		$produitInsert->bindParam(':ticket_prod', $file_img , PDO::PARAM_STR);
		$produitInsert->bindParam(':manuel_prod', $file_doc , PDO::PARAM_STR);
		$produitInsert->execute();	
}



// code zak
// Modifier un produit (UPDATE)
// if(isset($_POST['id_prod']) && $_POST['id_prod']){
// if(isset($_POST['id_prod'])){
// 	$req = $pdo->prepare('UPDATE produitzak SET lieux_achat = :lieux_achat, nom_prod = :nom_prod, ref_prod = :ref_prod, cate_prod = :cate_prod, date_achat = :date_achat, fin_garantie = :fin_garantie, prix_prod = :prix_prod, manuel_prod = :manuel_prod, conseil_util = :conseil_util  where id_prod=:id_prod');
// 	$req->execute(array(
//         'id_prod'=> $_POST['id_prod'],
// 		'lieux_achat' => $_POST['lieux_achat'],
// 		'nom_prod' => $_POST['nom_prod'],
// 		'ref_prod' => $_POST['ref_prod'],
// 		'cate_prod' => $_POST['cate_prod'],
// 		'date_achat' => $_POST['date_achat'],
// 		'fin_garantie' => $_POST['fin_garantie'],
// 		'prix_prod' => $_POST['prix_prod'],
// 		'manuel_prod' => $_POST['manuel_prod'],
// 		'conseil_util' => $_POST['conseil_util']
//         ));
//         header('Location: produit.php');
// }

?>

<!-- update produit -->
<?php 
require_once('inc/header.php');
require_once('inc/nav.php');
?>

<div class="upDateProduit bg-light" id="upDateProduit">
		<h2>MODIFIER LE PRODUIT : <?php echo $produit['nom_prod']; ?></h2>
		<!-- <form class="readProduit" method="POST">
		<select id="selectProduit" class="form-control">
			<option selected>Produit à modifier</option>
			<option>php tous les nom de produit avec la ref</option>
		</select>
		</form> -->
		<div class="formUpDate">
		<form method="POST" action="update.php" enctype="multipart/form-data">
            <input type="hidden" name="id_prod" value="<?php echo $_GET['id_prod'] ?>" />
			<!-- nom du produit / reference du produit / categorie  -->
			<div class="row">
				<div class="col">
				<input type="text" class="form-control" name="nom_prod" placeholder="Nom du produit" value="<?php echo $produit['nom_prod']; ?>">
				</div>
				<div class="col">
				<input type="text" class="form-control" name="ref_prod" placeholder="reference du produit" value="<?php echo $produit['ref_prod']; ?>">
				</div>
				<div class="col">
				<select class="custom-select mr-sm-2" name="cate_prod" id="inlineFormCustomSelect">
					<option>Categorie</option>
					<option <?php if($produit['cate_prod'] =='electromenager'){echo 'selected';} ?> value="electroUpDate">Electroménager</option>
					<option <?php if($produit['cate_prod'] =='tvhifi'){echo 'selected';} ?> value="tvUpDate">TV-HIFI</option>
					<option <?php if($produit['cate_prod'] =='bricolage'){echo 'selected';} ?> value="bricolageUpDate">Bricolage</option>
					<option <?php if($produit['cate_prod'] =='voiture'){echo 'selected';} ?> value="voitureUpDate">voiture</option>
					<option <?php if($produit['cate_prod'] =='avion'){echo 'selected';} ?> value="avionUpDate">Avion</option>
				</select>
				</div>
			</div>
			<!-- entretiens du produit -->
			<div class="row">
				<div class="col">
					<textarea class="form-control" id="exampleFormControlTextarea1" name="conseil_util" rows="3" placeholder="conseils d'entretiens du produit" value="<?php echo $produit['conseil_util']; ?>"></textarea>
				</div>
			</div>
			<!-- adresse physique /  adresse electronique -->
				<div class="row">
					<div class="col">
					<input type="text" class="form-control" name="lieux_achat" placeholder="Adresse physique" value="<?php echo $produit['lieux_achat']; ?>">
					</div>
				</div>
				<!-- date d'achat / date fin de garantie / prix -->
				<div class="row">
					<div class="col">
						<label for="dateAchat">Date d'achat du produit:</label>
						<input type="date" id="dateAchat" name="date_achat" value="<?php echo $produit['date_achat']; ?>" min="1980-01-01" max="2025-12-31">
					</div>
					<div class="col">
						<label for="dateFinGar">Date de fin de garantie:</label>
						<input type="date" id="dateFinGar" name="fin_garantie" value="<?php echo $produit['fin_garantie']; ?>" min="1980-01-01" max="2025-12-31">
					</div>
					<div class="col">
						<div class="form-group">
							<label for="exampleFormControlFile1">Documentation</label>
							<input type="file" class="form-control-file" name="manuel_prod" id="exampleFormControlFile1" value="<?php echo $produit['manuel_prod']; ?>">
						</div>	
					</div>
					<div class="col">
						<div class="form-group">
							<label for="exampleFormControlFile1">Ticket</label>
							<input type="file" class="form-control-file" name="ticket_prod" id="exampleFormControlFile1" value="<?php echo $produit['ticket_prod']; ?>">
						</div>
					</div>
					<div class="col">
						<input type="text" class="form-control" name="prix_prod" placeholder="Prix" value="<?php echo $produit['prix_prod']; ?>">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<button type="submit" class="btn btn-secondary btn-lg btn-block">Modifier le produit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
