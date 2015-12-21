<?php
	
	include( 'session.php' );

	$id = isSet( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

	if( $id > 0 ) {

		$sthCov = $pdo->prepare( 'SELECT cover FROM regal WHERE id = :id' );
		$sthCov->bindParam( ':id', $id );
		$sthCov->execute();

		$cover = $sthCov->fetch()['cover'];

		if( $cover ) {
			unlink( __DIR__ . '/img/' . $cover );
			unlink( __DIR__ . '/img/' . str_replace( 'cover_', 'org_', $cover ) );
		}



        $sth = $pdo->prepare( 'DELETE FROM regal WHERE id = :id' );
		$sth->bindParam( ':id', $id );
        $sth->execute();


        header( 'location: loop.php' );

	} else {
		header( 'location: loop.php' );
	}