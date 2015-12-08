<?php

	include( 'session.php' );

	$sql = 'SELECT * FROM `regal` WHERE id = ' . $_GET['id'];

	echo $sql;

	echo '<br><br>';

	$tbl = $pdo->query( $sql );



	$result = $tbl->fetchAll();

	echo '<pre>';
	print_r( $result );