<?php

    class AuthorsController {
        private $authors_model = null;

        public function __construct() {
            $this -> authors_model = new Authors();
        }

        public function index() {

            $data[ 'page_title' ] = 'ebooks - liste des auteurs';
            $data[ 'authors' ] = $this -> authors_model -> getRows();
            $data[ 'view' ] = 'views/' . $GLOBALS[ 'a'] . $GLOBALS[ 'e'] . '.php';
            return $data;
        }

        public function show() {
            if( isset( $_GET[ 'id' ] ) ) {
                $id = intval( $_GET[ 'id' ] ); // intval => pour être sûr qu'on ait un entier

                $data[ 'page_title' ] = 'ebooks - fiche de' . $data[ 'author' ] -> name;
                $data[ 'author' ] = $this -> authors_model -> getRow( $id );
                $data[ 'view' ] = 'views/' . $GLOBALS[ 'a'] . $GLOBALS[ 'e'] . '.php';
                return $data;
            } else {
                die( 'Il manque l’id' );
            }
        }
    }
