<?php
// accés à la base de donnée
require_once('inc/init.php');
//variable de la requete sql
$sqlSelect='SELECT * FROM `produitzak`';
// variable preparatiuon de la requête
$query = $pdo->prepare($sqlSelect);
// // execution de la requête
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
						<span class="badge badge-secondary"><?=$cate_prod?></span>
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
						<button class="btn btn-dark btn-block">
							<a href="update.php?id_prod=<?php echo $id_prod; ?>">Modifier</a>
						</button>
						<button class="btn btn-dark btn-block">
							<a href="delete.php?id_prod=<?php echo $id_prod; ?>">Supprimer</a>
						</button>
						<button class="btn btn-dark btn-block">
							<a href="<?=$manuel_prod?>">Documentation</a></button>
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
</div>
