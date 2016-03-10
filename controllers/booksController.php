<?php

    class BooksController {
        private $books_model = null;

        public function __construct() {
            $this -> books_model = new Books();
        }
        //fct qui s'exécute quand on fait le new pour créer une instance
        //créer une instance du controleur => quand on fait new

        public function index() {
            $data[ 'page_title' ] = 'ebooks - liste des livres';
            $data[ 'books' ] = $this -> books_model -> getBooks();
            $data[ 'view' ] = 'views/' . $GLOBALS[ 'a'] . $GLOBALS[ 'e'] . '.php'; // = views/indexBooks.php
            // on crée un tableau avec deux clés, books et view
            return $data;
        }

        public function show() {
            if( isset( $_GET[ 'id' ] ) ) {
                $id = intval( $_GET[ 'id' ] ); // intval => pour être sûr qu'on ait un entier

                
                $data[ 'book' ] = $this -> books_model -> getBook( $id );
                $data[ 'view' ] = 'views/' . $GLOBALS[ 'a'] . $GLOBALS[ 'e'] . '.php';
                return $data;
            } else {
                die( 'Il manque l’id' );
            }
        }

    }
