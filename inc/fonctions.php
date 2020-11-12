<?php
// Fonction pour tester si user est connecté 
function userConnecte(){
	if(isset($_SESSION['membre'])){
		return true;
	}
	else{
		return false; 
	}
}

