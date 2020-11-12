<?php
// accés à la base de donnée
require_once('inc/init.php');
//variable de la requete sql
$sqlSelect='SELECT * FROM `produitzak`';
// variable preparatiuon de la requête
$query = $pdo->prepare($sqlSelect);
// execution de la requête
$query->execute();
$resultats=$query->fetchAll();





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
						<h2><?=$nom_prod?> <?=$ref_prod?></h2>
					</div>
					<div >
						<span class="badge badge-primary"><?=$cate_prod?></span>
					</div>			
				</div>
				<hr>
				<!-- corps de la fich produit -->
				<div class="mainProduit">
					<div>
						<p><?=$conseil_util?></p> 
						
					</div>
					<div class="div-vide"><img src="" alt=""></div> 
					<div class="adminProduit ">
						<button class="btn btn-dark btn-block">Modifier</button>
						<button class="btn btn-dark btn-block">Supprimer</button>
						<button class="btn btn-dark btn-block">Documentation</button>
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
	<div class="upDateProduit bg-light" id="upDateProduit">
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
			<form method="POST">
			<!-- nom du produit / reference du produit / categorie  -->
			<div class="row">
				<div class="col">
				<input type="text" class="form-control" name="nameCreate" placeholder="Nom du produit">
				</div>
				<div class="col">
				<input type="text" class="form-control" name="refCreate" placeholder="reference du produit">
				</div>
				<div class="col">
				<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
					<option selected>Categorie</option>
					<option value="electroCreate">Electroménager</option>
					<option value="tvCreate">TV-HIFI</option>
					<option value="bricolageCreate">Bricolage</option>
					<option value="voitureCreate">voiture</option>
				</select>
				</div>
			</div>
			<!-- entretiens du produit -->
			<div class="row">
				<div class="col">
					<textarea class="form-control" id="exampleFormControlTextarea1" name="entretiensCreate" rows="3" placeholder="conseils d'entretiens du produit"></textarea>
				</div>
			</div>
			<!-- adresse physique /  adresse electronique -->
				<div class="row">
					<div class="col">
					<input type="text" class="form-control" name="adressePhyCreate" placeholder="Adresse physique">
					</div>
					<div class="col">
					<input type="text" class="form-control" name="adresseElecCreate" placeholder="Adresse electronique">
					</div>
				</div>
				<!-- date d'achat / date fin de garantie / prix -->
				<div class="row">
					<div class="col">
						<label for="dateAchat">Date d'achat du produit:</label>
						<input type="date" id="dateAchat" name="dateAchatCreate" min="1980-01-01" max="2025-12-31">
					</div>
					<div class="col">
						<label for="dateFinGar">Date d'achat du produit:</label>
						<input type="date" id="dateFinGar" name="dateFinGarCreate" min="1980-01-01" max="2025-12-31">
					</div>
					<div class="col">
						<div class="form-group">
							<label for="exampleFormControlFile1">Documentation</label>
							<input type="file" class="form-control-file" name="docuCreate" id="exampleFormControlFile1">
						</div>	
					</div>
					<div class="col">
						<input type="text" class="form-control" name="prixCreate" placeholder="Prix">
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