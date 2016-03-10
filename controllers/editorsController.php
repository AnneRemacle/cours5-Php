<?php

    function index() {
        include( 'models/editors.php' );
        $data[ 'page_title' ] = 'ebooks - liste des éditeurs';
        $data[ 'editors' ] = getEditors();
        $data[ 'view' ] = 'views/indexEditors.php';
        return $data;
    }
    function show() {
        // regarder si un id est passé dans l'url
            include( 'models/editors.php' );
            $id = isset( $_GET[ 'id' ] ) ? intval( $_GET[ 'id' ] ) : 0;
            if( $id == 0 ) {
                die( 'l’éditeur demandé nexiste pas' );
            }
            $data[ 'editor' ] = getEditor( $id );
            $data[ 'page_title' ] = 'ebooks - fiche de' . $data[ 'editor' ] -> name;
            $data[ 'view' ] = 'views/showEditors.php';
            return $data;

        // construire le tableau data
    }
