<?php

	session_start();

	if( !isSet( $_SESSION['liczba'] ) ) {

		$_SESSION['liczba'] = rand( 1, 10 );

	}

	echo $_SESSION['liczba'];

	echo '<br><br><br>';

	if( !isSet( $liczba ) ) {

		$liczba = rand( 1, 10 );

	}

	echo $liczba;
