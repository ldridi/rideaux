<?php
	include('config.php');
	$req= mysql_query("delete from panier where id_panier = '$_GET[id_su]'");
	

	header('location:panier.php');

?>