<?php
include_once('index.php');
// insertion du code php
// gérer l'accés à la table des produits
?>
<!-- navigation sticky pour rendre plus facile l'accés aux modules dashboard -->
<nav>
	<ul>
		<li><a href="#cardProduit">Tableau des produits</a></li>
		<li><a href="">Modifier un produit</a></li>
		<li><a href="">Ajout d'un produit</a></li>
	</ul>
</nav>

<h1>DASHBOARD BACKOFFICE</h1>

<h2>PRODUITS</h2>
<!-- tableau read la base de donné pour afficahge dans un tableau / bouton suppr/ 
bouton motifier qui renvoie à un formulaire prés rempli 
avec les données du produit à modifier-->

<div id="cardProduit" class="ficheProduit test">
	<!-- entête de la fiche produit -->
	<div class="headProduit">
		<div>
			<h2>Nom du produit</h2>
		</div>
		<div>
			<h3>reférence du produit</h3>
		</div>
		<div>
			Badge categorie
		</div>
	</div>
	<!-- corps de la fich produit -->
	<div class="mainProduit">
		<div>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
			Molestiae, tempora aliquam. Omnis blanditiis ipsa similique
			illum itaque libero nostrum voluptatem amet ut! Molestias, 
			repudiandae. Vitae maiores fugit id a dolor!</p> 
			
		</div>
		<div class="test div-vide"><img src="" alt=""></div> 
		<div class="adminProduit test">
			<div><button class="btn btn-dark btn-block">Modifier</button></div>
			<div><button class="btn btn-dark btn-block">Supprimer</button></div>
			<div><button class="btn btn-dark btn-block">Documentation</button></div>
		</div>
	</div>
	<!-- footer de l fiche produit -->
	<div class="footerProduit">
		<div>Adresse achat</div>
		<div>Date d'achat</div>
		<div>Date de fin de garantie</div>
		<div class="prixProduit test">Prix</div>
	</div>
</div>






<h2>MODIFIER UN PRODUIT</h2>
<!-- formulaire comme ajout mais prérempli en fonction du bouton modifier 
du tableau produit. ajout d'un select avec le nom et/ou ref du produit boucle 
foreach dans le menu select + un aucun produit selectionné par defaut-->

<h2>AJOUT D'UN PRODUIT</h2>
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