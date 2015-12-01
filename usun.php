<?php
	
	include( 'session.php' );

	$id = isSet( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

	if( $id > 0 ) {


        $sth = $pdo->prepare( 'DELETE FROM regal WHERE id = :id' );
		$sth->bindParam( ':id', $id );
        $sth->execute();


        header( 'location: loop.php' );

	} else {
		header( 'location: loop.php' );
	}