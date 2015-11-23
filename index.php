<a href="http://localhost/webdev/index.php?strona=1">Strona 1</a> | 
<a href="http://localhost/webdev/index.php?strona=2">Strona 2</a> | 
<a href="http://localhost/webdev/index.php?strona=3">Strona 3</a>

<br><br><br>



<?php


	$strona = $_GET['strona'];

	if( $strona == 1 ) {

		echo 'Czesc jestem strona numer jeden';

	}

	if( $strona == 2 ) {

		echo 'Czesc jestem strona numer dwa';

	}

	if( $strona == 3 ) {

		echo 'Czesc jestem strona numer trzy';

	}