<?php
	
	include( 'session.php' );

	$id = isSet( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

	if( $id > 0 ) {


        $sth = $pdo->prepare( 'DELETE FROM category WHERE id = :id' );
		$sth->bindParam( ':id', $id );
        $sth->execute();


        header( 'location: category.php' );

	} else {
		header( 'location: category.php' );
	}