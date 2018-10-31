<?php

//Récuperer l'url apres le nom de domaine
//Utilisation d'une variable SUPER GLOBALE
//Accessible partout, commenence par $_ et en majuscule
//c'est toujours un tableau
//Elle est créée par le serveur et alimenté par le serveur
//Vous ne pouvez que la consulter

$slug = $_SERVER["REQUEST_URI"];

//pour palier aux paramètres GET
$slugExploded = explode("?", $slug);
$slug = $slugExploded[0];

//  /users/add/
$slug = trim($slug, "/");
//  users/add
//différencier le controller de l'action
$slugExploded = explode("/", $slug);
//Array ( [0] => users [1] => add )

//donc on se retrouve aves $c et $a
$c = ucfirst(!empty($slugExploded[0])?$slugExploded[0]:"pages")."Controller";
$a = (!empty($slugExploded[1])?$slugExploded[1]:"default")."Action";
$cPath = "controllers/".$c.".class.php";
//echo $c." ".$a;
//UsersController addAction

//vérifier l'existence du fichier et de la class controller
if( file_exists($cPath) ){
	include $cPath;
	if( class_exists($c)){
		//instancier dynamiquement le controller
		$cObject = new $c();
		//vérifier que la méthode (l'action) existe
		if( method_exists($cObject, $a) ){
			//appel dynamique de la méthode	
			$cObject->$a();
		}else{
			die("La methode ".$a." n'existe pas");
		}
		
	}else{
		die("La class controller ".$c." n'existe pas");
	}
}else{
	die("Le fichier controller ".$c." n'existe pas");
}


