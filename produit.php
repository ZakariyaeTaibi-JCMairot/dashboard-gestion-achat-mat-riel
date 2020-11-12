<?php
include_once('index.php');
// insertion du code php
// gérer l'accés à la table des produits
?>
<!-- navigation sticky pour rendre plus facile l'accés aux modules dashboard -->
<nav class="navbar sticky-top navbar-light bg-light">
  <a class="navbar-brand" href="#">Fiches des produits</a>
  <a class="navbar-brand" href="#">Modifier un produit</a>
  <a class="navbar-brand" href="#">Ajout d'un produit</a>
</nav>


<h1>DASHBOARD BACKOFFICE</h1>

<h2>PRODUITS</h2>
<!-- tableau read la base de donné pour afficahge dans un tableau / bouton suppr/ 
bouton motifier qui renvoie à un formulaire prés rempli 
avec les données du produit à modifier-->

<div id="cardProduit" class="ficheProduit">
	<!-- entête de la fiche produit -->
	<div class="headProduit">
		<div>
			<h2>Nom du produit</h2>
		</div>
		<div>
			<h3>reférence du produit</h3>
		</div>
		<div >
			<span class="badge badge-secondary">categorie</span>
		</div>
			
	</div>
	<hr>
	<!-- corps de la fich produit -->
	<div class="mainProduit">
		<div>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
			Molestiae, tempora aliquam. Omnis blanditiis ipsa similique
			illum itaque libero nostrum voluptatem amet ut! Molestias, 
			repudiandae. Vitae maiores fugit id a dolor!</p> 
			
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
		<div>Adresse achat</div>
		<div>Date d'achat</div>
		<div>Date de fin de garantie</div>
		<div class="prixProduit">Prix</div>
	</div>
</div>






<h2>MODIFIER UN PRODUIT</h2>
<!-- formulaire comme ajout mais prérempli en fonction du bouton modifier 
du tableau produit. ajout d'un select avec le nom et/ou ref du produit boucle 
foreach dans le menu select + un aucun produit selectionné par defaut-->
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



<!--formulaire d'ajout de produit-->

<!-- Pour chaque produit je doit rentrer les informations suivantes
	- Lieux d'achat (En vente directe ou e-commerce)
		Si vente directe - Possibilité de saisir l'adresse
		Si e-commerce - Possibilté de saisir l'url du e-commerce
	- Nom du produit
	- Référence du produit
	- Catégorie (Electroménager, TV-HIFI, Bricolage, Voiture....)
		Le produit n'appartiendra qu'à une seule catégorie
	- Date d'achat
	- Date de fin de garantie
	- Prix
	- Zone de saisie pour rentrer toutes les conseils d'entretiens du produit
	- Photo du tiket d'achat
	- Manuel d'utlisation (Pas obligatoire si existe pas) -->

<!-- Tableau pour la gestion des produits lister / supprimer / modifier-->
<!-- formulaire pour ajouter un nous produit -->