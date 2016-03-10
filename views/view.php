<!-- Main view -->

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="utf-8">
            <title><?php echo $datas[ 'page_title' ]; ?> </title>
        </head>
        <body>
            <?php include( 'partials/_main_navigation.php' ) ?>
            <?php include( $datas[ 'view' ] ); ?>
            <!--  la valeur dans l'include est la valeur qui sera dans la sous vue qu'on charge -->

        </body>
    </html>
