<?php
// insertion du code php
// gérer l'accés à la table des produits
?>
<!-- navigation sticky pour rendre plus facile l'accés aux modules dashboard -->
<nav>
	<ul>
		<li><a href="">Tableau des produits</a></li>
		<li><a href="">Modifier un produit</a></li>
		<li><a href="">Ajout d'un produit</a></li>
	</ul>
</nav>

<h1>DASHBOARD BACKOFFICE</h1>

<h2>PRODUITS</h2>
<!-- tableau read la base de donné pour afficahge dans un tableau / bouton suppr/ 
bouton motifier qui renvoie à un formulaire prés rempli 
avec les données du produit à modifier-->


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

<!-- Tableau pour la gestion des produits lister / suprimer / modifier-->
<!-- formulaire pour ajouter un nous produit -->