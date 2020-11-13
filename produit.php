<?php
// accés à la base de donnée
require_once('inc/init.php');

// -------- partie READ du CRUD -----

//variable de la requete sql
$sqlSelect='SELECT * FROM `produitzak`';
// variable preparatiuon de la requête
$query = $pdo->prepare($sqlSelect);
// execution de la requête
$query->execute();
$resultats=$query->fetchAll();

// pour le select de categorie dans le formulaire ajout de produits
$sqlCategorie='SELECT * FROM `categorie`';
$query= $pdo->prepare($sqlCategorie);
$query->execute();
$categories=$query->fetchAll();
// var_dump($categories);


// --------- partie CREATE du CRUD

if($_POST){

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
	if(execute()){
		header('location:produit.php');
	}
	
}

require_once('inc/header.php');
require_once('inc/nav.php');
?>
<div class="bgDashBoard">
	<h1 class="titleDashboard">DASHBOARD BACKOFFICE</h1>
	<!-- tableau read la base de donné pour afficahge dans un tableau / bouton suppr/ 
	bouton motifier qui renvoie à un formulaire prés rempli 
	avec les données du produit à modifier-->
	
	<div class="allProduit" id="allProduit">
		<h2 class="h2Produit">PRODUITS</h2>
		<!-- debut foreach read produitzak=>produit-->
		<?php foreach($resultats as $result): extract($result) ?>
			<div id="cardProduit" class="ficheProduit">

				<!-- entête de la fiche produit -->
				<div class="headProduit">
					<div>
					<!-- ?= -> php echo // $nom_prod variable créé à partir de la base de donnée grace à : extract($result)-->
						<h2><?=$nom_prod?> <?=$ref_prod?></h2>
					</div>
					<div >
						<span class="badge badge-primary"><?=$cate_prod?></span>
					</div>			
				</div>
				<hr>
				<!-- corps de la fich produit -->
				<div class="mainProduit">
					<div class="col-8">
						<p><?=$conseil_util?></p> 
						
					</div>
					<div class="container-fluid"><img class="ticketCaisse" src="<?=$ticket_prod?>" alt="ticket de caisse"></div> 
					<div class="adminProduit ">
						<button class="btn btn-dark btn-block">Modifier</button>
						<!-- suppression d'un produit -->
						<button class="btn btn-dark btn-block">Supprimer
							<a href="?action=supprimer&id=<?= $id_prod ?>" title="Supprimer le produit" onclick="return confirm('Etes-vous certain de vouloir supprimer ce produit ?')"> <i class="fas fa-trash-alt text-danger"></i> </a>
						</button>

						<button class="btn btn-dark btn-block"><a href="<?=$manuel_prod?>">Documentation</a></button>
					</div>
				</div>
				<hr>
				<!-- footer de l fiche produit -->
				<div class="footerProduit">
					<div><?=$lieux_achat?></div>
					<div>Date d'achat : <?=$date_achat?></div>
					<div>Date fin de garantie : <?=$fin_garantie?></div>
					<div class="prixProduit"><?=$prix_prod." €"?></div>
				</div>
			</div>
		<!-- fin foreach read produitzak=>produit-->
		<?php endforeach ?>

	</div>
<!-- update produit -->
	<div class="upDateProduit bg-light" id="upDateProduitId">
		<h2>MODIFIER LE PRODUIT : code php nom produit</h2>
		<form class="readProduit" method="POST">
		<select id="selectProduit" class="form-control">
			<option selected>Produit à modifier</option>
			<option>php tous les nom de produit avec la ref</option>
		</select>
		</form>
		<div class="formUpDate">
		<form method="POST">
			<!-- nom du produit / reference du produit / categorie  -->
			<div class="row">
				<div class="col">
				<input type="text" class="form-control" name="nameUpDate" placeholder="Nom du produit">
				</div>
				<div class="col">
				<input type="text" class="form-control" name="refUpDate" placeholder="reference du produit">
				</div>
				<div class="col">
				<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
					<option selected>Categorie</option>
					<option value="electroUpDate">Electroménager</option>
					<option value="tvUpDate">TV-HIFI</option>
					<option value="bricolageUpDate">Bricolage</option>
					<option value="voitureUpDate">voiture</option>
				</select>
				</div>
			</div>
			<!-- entretiens du produit -->
			<div class="row">
				<div class="col">
					<textarea class="form-control" id="exampleFormControlTextarea1" name="entretiensUpDate" rows="3" placeholder="conseils d'entretiens du produit"></textarea>
				</div>
			</div>
			<!-- adresse physique /  adresse electronique -->
				<div class="row">
					<div class="col">
					<input type="text" class="form-control" name="adressePhyUpDate" placeholder="Adresse physique">
					</div>
					<div class="col">
					<input type="text" class="form-control" name="adresseElecUpDate" placeholder="Adresse electronique">
					</div>
				</div>
				<!-- date d'achat / date fin de garantie / prix -->
				<div class="row">
					<div class="col">
						<label for="dateAchat">Date d'achat du produit:</label>
						<input type="date" id="dateAchat" name="dateAchatUpDate" min="1980-01-01" max="2025-12-31">
					</div>
					<div class="col">
						<label for="dateFinGar">Date d'achat du produit:</label>
						<input type="date" id="dateFinGar" name="dateFinGarUpDate" min="1980-01-01" max="2025-12-31">
					</div>
					<div class="col">
						<div class="form-group">
							<label for="exampleFormControlFile1">Documentation</label>
							<input type="file" class="form-control-file" name="docuUpDate" id="exampleFormControlFile1">
						</div>	
					</div>
					<div class="col">
						<input type="text" class="form-control" name="prixUpDate" placeholder="Prix">
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

	<!--formulaire d'ajout de produit-->

	<div class="createProduit" id="createProduit">
		<h2>AJOUT D'UN PRODUIT</h2>
		<div class="formCreate">
			<form method="POST" enctype="multipart/form-data">
			<!-- nom du produit / reference du produit / categorie  -->
			<div class="row">
				<div class="col">
				<input type="text" class="form-control" name="nom_prod" placeholder="Nom du produit">
				</div>
				<div class="col">
				<input type="text" class="form-control" name="ref_prod" placeholder="reference du produit">
				</div>
				<div class="col">
				<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="cate_prod">
					<?php foreach($categories as $categorie): extract($categorie) ?> 
      					<option value="<?=$categorie_value?>"><?=$categorie_type ?></option> 
     				<?php endforeach ?> 
				</select>
				</div>
			</div>
			<!-- entretiens du produit -->
			<div class="row">
				<div class="col">
					<textarea class="form-control" id="exampleFormControlTextarea1" name="conseil_util" rows="3" placeholder="conseils d'entretiens du produit"></textarea>
				</div>
			</div>
			<!-- adresse physique /  adresse electronique -->
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
</div>