<?php
try{
	$pdo = new PDO('mysql:host=localhost;dbname=micro_blog_soltysiak_samuel', 'root', '');
}catch (PDOException $e){
	echo 'Connexion échouée : ' . $e->getMessage();
}

?>
