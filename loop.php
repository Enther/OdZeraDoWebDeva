<?php
	
	include( 'baza.php' );

	echo 'Lista kandydatów:<br>';


	$tbl = $pdo->query( 'SELECT * FROM `regal`' );

	echo '<table border="1">';
		echo '<tr>';

			echo '<th>Tytul</th>';
			echo '<th>Autor</th>';
			echo '<th>Recenzja</th>';
			echo '<th>Opcje</th>';

		echo '</tr>';

		foreach( $tbl->fetchAll() as $value ) {

			// echo '<pre>';
			// print_r( $value );

			echo '<tr>';

				echo '<td>' . $value['tytul'] . '</td>';
				echo '<td>' . $value['autor'] . '</td>';
				echo '<td>' . $value['recenzja'] . '</td>';
				echo '<td><a href="usun.php?id=' . $value['id'] . '">Usun</a></td>';

			echo '</tr>';

			

		}

	echo '</table>';