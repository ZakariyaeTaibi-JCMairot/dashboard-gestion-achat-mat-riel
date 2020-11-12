<?php
// Fonction pour tester si user est connecté 
function userConnecte(){
	if(isset($_SESSION['utilisateur'])){
		return true;
	}
	else{
		return false; 
	}
}

