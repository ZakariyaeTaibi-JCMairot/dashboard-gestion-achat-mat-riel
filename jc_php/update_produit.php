<?php
// accés à la base de donnée
require_once('inc/init.php');


// update d'un produit

$modifProduit=$pdo->prepare('SELECT * FROM produitzak WHERE id_prod = :id');
$modifProduit->bindValue(':id',$_GET['produit'],PDO::PARAM_INT);
$execModifProduit = $modifProduit->execute();

$produitModif=$modifProduit->fetch();
var_dump($produitModif);

$produitUpdate = $pdo->prepare(
	'UPDATE produitzak set 
	lieux_achat=:lieux_achat, 
	nom_prod=:nom_prod, 
	ref_prod=:ref_prod, 
	date_achat=:date_achat, 
	fin_garantie=:fin_garantie, 
	prix_prod=:prix_prod, 
	conseil_util=:conseil_util, 
	cate_prod=:cate_prod, 
	ticket_prod=:ticket_prod, 
	manuel_prod=:manuel_prod
	WHERE id_prod= :id 
	LIMIT 1' 
	);

$produitUpdate->bindValue(':id',$_POST['produitUpdate'],PDO::PARAM_INT);
$produitUpdate->bindValue(':lieux_achat', $_POST['lieux_achat'], PDO::PARAM_STR);
$produitUpdate->bindValue(':nom_prod', $_POST['nom_prod'], PDO::PARAM_STR);
$produitUpdate->bindValue(':ref_prod', $_POST['ref_prod'], PDO::PARAM_STR);
$produitUpdate->bindValue(':cate_prod', $_POST['cate_prod'], PDO::PARAM_STR);
$produitUpdate->bindValue(':conseil_util', $_POST['conseil_util'], PDO::PARAM_STR);
$produitUpdate->bindValue(':prix_prod', $_POST['prix_prod'], PDO::PARAM_STR);
$produitUpdate->bindValue(':date_achat', $_POST['date_achat'], PDO::PARAM_STR);
$produitUpdate->bindValue(':fin_garantie', $_POST['fin_garantie'], PDO::PARAM_STR);

// bind des de l'image et de la doc : file
$produitUpdate->bindValue(':ticket_prod', $file_img , PDO::PARAM_STR);
$produitUpdate->bindValue(':manuel_prod', $file_doc , PDO::PARAM_STR);

$executeUpdate= $produitUpdate->execute();
if($executeUpdate){
	echo 'Le produit a été mis à jour';
}else{
	echo 'Echec de la mise à jour';
}

require_once('inc/header.php');
require_once('inc/nav.php');
?>
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
				<!-- input de type=hidden pour qu'il soit caché et qui reprend l'id du produit -->
				<input type="hidden" name="produitUpdate" value="<?=$produitModif['id_prod']?>">
					<input type="text" class="form-control" name="nom_prod" value="<?=$produitModif['nom_prod']?>" >
					</div>
					<div class="col">
					<input type="text" class="form-control" name="ref_prod" value="<?=$produitModif['ref_prod']?>">
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
					<textarea class="form-control" id="exampleFormControlTextarea1" name="conseil_util" rows="3" ><?=$produitModif['conseil_util']?></textarea>
				</div>
			</div>
			<!-- adresse physique /  adresse electronique -->
				<div class="row">
					<div class="col">
					<input type="text" class="form-control" name="lieux_achat" value="<?=$produitModif['lieux_achat']?>">
					</div>
				</div>
				<!-- date d'achat / date fin de garantie / prix -->
				<div class="row">
					<div class="col">
						<label for="dateAchat">Date d'achat du produit:</label>
						<input type="date" id="dateAchat" name="date_achat" min="1980-01-01" max="2025-12-31" value="<?=$produitModif['date_achat']?>">
					</div>
					<div class="col">
						<label for="dateFinGar">Date d'achat du produit:</label>
						<input type="date" id="dateFinGar" name="fin_garantie" min="1980-01-01" max="2025-12-31" value="<?=$produitModif['fin_garantie']?>">
					</div>
					<div class="col">
						<div class="form-group">
							<label for="exampleFormControlFile1">Documentation</label>
							<input type="file" class="form-control-file" name="manuel_prod" id="exampleFormControlFile1" value="<?=$produitModif['manuel_prod']?>">
						</div>	
					</div>
					<div class="col">
						<div class="form-group">
							<label for="exampleFormControlFile1">Ticket</label>
							<input type="file" class="form-control-file" name="ticket_prod" id="exampleFormControlFile1" value="ticket_prod">
						</div>	
					</div>
					<div class="col">
						<input type="text" class="form-control" name="prix_prod" value="<?=$produitModif['prix_prod']?>">
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
