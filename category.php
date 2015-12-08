<?php
	
	include( 'session.php' );



	$tbl = $pdo->query( 'SELECT * FROM `category`' );

	echo '<br><a href="add_cat.php">Dodaj kategorie</a><br>';

	echo '<table border="1">';
		echo '<tr>';

			echo '<th>Nazwa</th>';
			echo '<th>Opcje</th>';

		echo '</tr>';

		foreach( $tbl->fetchAll() as $value ) {

			// echo '<pre>';
			// print_r( $value );

			echo '<tr>';

				echo '<td>' . $value['name'] . '</td>';
				echo '<td><a href="usun_cat.php?id=' . $value['id'] . '">Usun</a> | <a href="add_cat.php?id=' . $value['id'] . '">Edytuj</a></td>';

			echo '</tr>';

			

		}

	echo '</table>';