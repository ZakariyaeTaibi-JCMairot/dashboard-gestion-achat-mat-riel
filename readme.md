```
Projet Dashboard BackOffice - Gestion achat matériel
Ce dasboard devra être sécurisé par un système de login
 - Il doit permettre de :
	lister les produits
	Modifier un produit
	Supprimer un produit
	Ajouter un produit


Pour chaque produit je doit rentrer les informations suivantes
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
	- Manuel d'utlisation (Pas obligatoire si existe pas)


	les plus : On ne réalise les plus que si vous avez le temps
    Envoyer un email a p.moreno@onlineformapro.com
     en php 30 jours avant la date de fin garantie.

	Technos : PHP, GIT, HTML, CSS, FRAMEWORK CSS (optionnel)

   Equipes
	AOUINI ABDELKADER Front - RAMEAU CELIAl Back
	CHERIEF SAUFIANE Back - IBERT JEREMY Front
	GENIQUE YOANN Front - MARCELLIN ANTHONYt Back
	RORTAS SANAA Back - URCIA MIGUEL Front
	TAÏBI ZAKARIYAE back - MAIROT JEAN Front
	LOURIDI OSSAMA Back, CHAIR SOFIANE Front
	LIGOUREL TEEDJI Front - LEBAN AIMED Back
    BENSMINA WALLID FullStack-

	Lead DEV
		Anthony Marcelin, JC Mairot.

	Support Photoshop, Illustrator : Célia.

	Si dans son équipe personne ne peut pas résoudre le soucis alors ont fait appel au lead Dev


	A rendre pour 17/11/2020 à 15h00.

--------------------------------------------------------------------------------------------

    [ ] Page d'index :
        * Formulaire de login
    [ ] page produit :
        * Formulaire d'ajout de produits
        * Affichage des produits, bouton modifier et bouton supprimer
        * Click sur le bouton modifier prérempli un formulaire pour le modifier

    [ ] creation de la base de données
        * id_produit
        * url_achat
        * adresse_achat
        * nom_produit
        * reference
        * categorie (pour formulaire/ un select)
        * date_achat
        * date_garantie
        * prix
        * entretiens
        * photo_ticket
        * doc_produit

on travail sur des branch jc zak main


```
        * formulaire d'ajout de produits
        * Tableau de gestion de produits
            [ ] Affichage de la totalité des produits de la table (foreach)
            [ ] Suppression de produits
            [ ] Modification de produits (la totalité du produit)
			test
