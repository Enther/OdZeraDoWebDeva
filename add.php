<?php

include( 'session.php' );


if( isSet( $_POST['autor'] ) ) {

    $id = isSet( $_POST['id'] ) ? intval( $_POST['id'] ) : 0;

    $fileName = 0;

    if( isSet( $_FILES['cover']['error'] ) && $_FILES['cover']['error'] == 0 ) {

        require( "vendor/autoload.php" );

        $uid = uniqid();

        $ext = pathinfo( $_FILES['cover']['name'], PATHINFO_EXTENSION );

        $fileName = 'cover_' . $uid . '.' . $ext;
        $fileNameOrg = 'org_' . $uid . '.' . $ext;

        $imagine = new Imagine\Gd\Imagine();
        $size    = new Imagine\Image\Box(200, 200);

        //$mode    = Imagine\Image\ImageInterface::THUMBNAIL_INSET;
        $mode    = Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND;

        $imagine->open( $_FILES['cover']['tmp_name'] )
            ->thumbnail( $size, $mode )
            ->save( __DIR__ . '/img/' . $fileName );


        move_uploaded_file( $_FILES['cover']['tmp_name'], __DIR__ . '/img/' . $fileNameOrg );
    }

    if( $id > 0 ) {

        if( $fileName ) {
            $sth = $pdo->prepare( 'UPDATE `regal` SET `autor`=:autor,`cat_id`=:cat_id,`tytul`=:tytul,`recenzja`=:recenzja, `cover`=:cover WHERE id = :id' );
            $sth->bindParam( ':cover', $fileName );

            $sthCov = $pdo->prepare( 'SELECT cover FROM regal WHERE id = :id' );
            $sthCov->bindParam( ':id', $id );
            $sthCov->execute();

            $cover = $sthCov->fetch()['cover'];

            if( $cover ) {
                unlink( __DIR__ . '/img/' . $cover );
                unlink( __DIR__ . '/img/' . str_replace( 'cover_', 'org_', $cover ) );
            }

        } else {
            $sth = $pdo->prepare( 'UPDATE `regal` SET `autor`=:autor,`cat_id`=:cat_id,`tytul`=:tytul,`recenzja`=:recenzja WHERE id = :id' );
        }


        $sth->bindParam( ':id', $id );
    } else {

        $sth = $pdo->prepare( 'INSERT INTO `regal`(`autor`, `cat_id`, `tytul`, `recenzja`, `cover`) VALUES ( :autor, :cat_id, :tytul, :recenzja, :cover )' );
        if( $fileName ) {
            $sth->bindParam( ':cover', $fileName );
        }

    }

    $sth->bindParam( ':autor', $_POST['autor'] );
    $sth->bindParam( ':cat_id', $_POST['cat_id'] );
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


$sth2 = $pdo->prepare( 'SELECT * FROM category ORDER BY name ASC' );
$sth2->bindParam( ':id', $idGet );
$sth2->execute();

$category = $sth2->fetchAll();

?>


<form method="post" action="add.php" enctype="multipart/form-data">

    <?php

    if( $idGet > 0 ) {
        echo '<input type="hidden" name="id" value="' . $idGet . '">';
    }

    ?>

    Autor: <input type="text" name="autor" <?php if( isSet( $result['autor'] ) ) { echo 'value="' . $result['autor'] . '"'; } ?>><br><br>
    Kategoria: <select name="cat_id">
        <?php

        foreach ( $category as $value ) {

            $selected = ( $value['id']  == $result['cat_id'] ) ? 'selected="selected"' : '';

            echo '<option ' . $selected . ' value="' . $value['id'] . '">' . $value['name'] . '</option>';
        }

        ?>
    </select>


    <br><br>
    Tytul: <input type="text" name="tytul"  <?php if( isSet( $result['tytul'] ) ) { echo 'value="' . $result['tytul'] . '"'; } ?>><br><br>
    Okladka: <input type="file" name="cover">
    <?php
    if( isSet( $result['cover'] ) && $result['cover'] ) {
        echo '<img src="img/' . $result['cover'] . '">';
    }
    ?>
    <br><br>
    Recenzja: <textarea name="recenzja"><?php if( isSet( $result['recenzja'] ) ) { echo $result['recenzja']; } ?></textarea><br><br>
    <input type="submit" value="Zapisz">
</form>

