<?php

	include( 'session.php' );

	

	if( isSet( $_POST['autor'] ) ) {

		$id = isSet( $_POST['id'] ) ? intval( $_POST['id'] ) : 0;

		if( $id > 0 ) {
			$sth = $pdo->prepare( 'UPDATE `regal` SET `autor`=:autor,`tytul`=:tytul,`recenzja`=:recenzja WHERE id = :id' );
			$sth->bindParam( ':id', $id );
		} else {

			$sth = $pdo->prepare( 'INSERT INTO `regal`(`autor`, `tytul`, `recenzja`) VALUES ( :autor, :tytul, :recenzja )' );

		}

		$sth->bindParam( ':autor', $_POST['autor'] );
		$sth->bindParam( ':tytul', $_POST['tytul'] );
		$sth->bindParam( ':recenzja', $_POST['recenzja'] );
        $sth->execute();

        header( 'location: loop.php' );

	}

	$idGet = isSet( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

	if( $idGet > 0 ) {

        $sth = $pdo->prepare( 'SELECT * FROM regal WHERE id = :id' );
		$sth->bindParam( ':id', $idGet );
        $sth->execute();

        $result = $sth->fetch();

	}

?>


<form method="post" action="add.php">

	<?php 

		if( $idGet > 0 ) {
			echo '<input type="hidden" name="id" value="' . $idGet . '">';
		}

	?>

	Autor: <input type="text" name="autor" <?php if( isSet( $result['autor'] ) ) { echo 'value="' . $result['autor'] . '"'; } ?>><br><br>
	Tytul: <input type="text" name="tytul"  <?php if( isSet( $result['tytul'] ) ) { echo 'value="' . $result['tytul'] . '"'; } ?>><br><br>
	Recenzja: <textarea name="recenzja"><?php if( isSet( $result['tytul'] ) ) { echo $result['recenzja']; } ?></textarea><br><br>
	<input type="submit" value="Zapisz">
</form>


