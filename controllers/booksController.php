<?php

    function index() {
        include( 'models/' . $GLOBALS[ 'e' ] . '.php' );
        $data[ 'books' ] = getBooks();
        $data[ 'view' ] = 'views/' . $GLOBALS[ 'a'] . $GLOBALS[ 'e'] . '.php';
        return $data;
    }

    function show() {
        if( isset( $_GET[ 'id' ] ) ) {
            $id = intval( $_GET[ 'id' ] ); // intval => pour être sûr qu'on ait un entier
            include( 'models/' . $GLOBALS[ 'e' ] . '.php' );
            $data[ 'book' ] = getBook( $id );
            $data[ 'view' ] = 'views/' . $GLOBALS[ 'a'] . $GLOBALS[ 'e'] . '.php';
            return $data;
        } else {
            die( 'Il manque l’id' );
        }
    }
