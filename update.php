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


// Modifier un produit (UPDATE)
// if(isset($_POST['id_prod']) && $_POST['id_prod']){

if(isset($_POST['id_prod'])){
	$req = $pdo->prepare('UPDATE produitzak SET lieux_achat = :lieux_achat, nom_prod = :nom_prod, ref_prod = :ref_prod, cate_prod = :cate_prod, date_achat = :date_achat, fin_garantie = :fin_garantie, prix_prod = :prix_prod, manuel_prod = :manuel_prod, conseil_util = :conseil_util  where id_prod=:id_prod');
	$req->execute(array(
        'id_prod'=> $_POST['id_prod'],
		'lieux_achat' => $_POST['lieux_achat'],
		'nom_prod' => $_POST['nom_prod'],
		'ref_prod' => $_POST['ref_prod'],
		'cate_prod' => $_POST['cate_prod'],
		'date_achat' => $_POST['date_achat'],
		'fin_garantie' => $_POST['fin_garantie'],
		'prix_prod' => $_POST['prix_prod'],
		'manuel_prod' => $_POST['manuel_prod'],
		'conseil_util' => $_POST['conseil_util']
        ));
        header('Location: produit.php');
}

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
		<form method="POST" action="update.php">
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
					<div class="col">
					<input type="text" class="form-control" name="adresseElecUpDate" placeholder="Adresse electronique" value="">
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
