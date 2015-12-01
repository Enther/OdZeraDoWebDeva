<?php

    try {
	
        $pdo = new PDO('mysql:host=localhost;dbname=ksiazki;encoding=utf8', 'root', '123qwe');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );

    } catch( PDOException $e ) {

        echo 'ERROR: ' . $e->getMessage();        

    }