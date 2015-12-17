<?php

     function t1($val, $min, $max) {
         return ($val >= $min && $val <= $max);
     }

	include( 'session.php' );


	$count = $pdo->query( 'SELECT COUNT(id) as cnt FROM regal' )->fetch()['cnt'];

    //echo $count;

    $page = isSet( $_GET['page'] ) ? intval( $_GET['page'] - 1 ) : 1;

    $limit = 10;

    $from = $page * $limit;

    $allPages = ceil( $count / $limit );

    echo 'PAGE: ' . $page . '<br>';
    echo 'COUNT: ' . $count . '<br>';
    echo 'FROM: ' . $from . '<br>';
    echo 'ALL PAGES: ' . $allPages . '<br>';

    $sql = 'SELECT r.*, c.name FROM regal r LEFT JOIN category c ON r.cat_id = c.id ORDER BY r.id DESC LIMIT ' . $from . ', ' . $limit;

    echo 'SQL: ' . $sql . '<br>';

	$tbl = $pdo->query( $sql  );

	echo '<br><a href="add.php">Dodaj Ksiazke</a><br>';

	echo '<table border="1">';
		echo '<tr>';

			echo '<th>ID</th>';
			echo '<th>Tytul</th>';
			echo '<th>Autor</th>';
			echo '<th>Kategoria</th>';
			echo '<th>Recenzja</th>';
			echo '<th>Opcje</th>';

		echo '</tr>';

		foreach( $tbl->fetchAll() as $value ) {

            // echo '<pre>';
            // print_r( $value );

            echo '<tr>';

            echo '<td>' . $value['id'] . '</td>';
            echo '<td>' . $value['tytul'] . '</td>';
            echo '<td>' . $value['autor'] . '</td>';
            echo '<td>' . $value['name'] . '</td>';
            echo '<td>' . $value['recenzja'] . '</td>';
            echo '<td><a href="usun.php?id=' . $value['id'] . '">Usun</a> | <a href="add.php?id=' . $value['id'] . '">Edytuj</a></td>';

            echo '</tr>';



        }

	echo '</table>';


    for( $i = 1; $i <= $allPages; $i++ ) {

        if( t1( $i, ( $page - 3 ), ( $page + 5 ) ) ) {

            $bold = ($i == ($page + 1)) ? 'style="font-size: 24px;font-weight: bold;"' : '';

            echo '<a ' . $bold . ' href="loop.php?page=' . $i . '">' . $i . '</a> | ';

        }
    }