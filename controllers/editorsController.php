<?php

    class EditorsController {
        private $editors_model = null;

        public function __construct() {
            $this -> editors_model = new Editors();
        }

        public function index() {

            $data[ 'page_title' ] = 'ebooks - liste des éditeurs';
            $data[ 'editors' ] = $this -> editors_model -> all();
            $data[ 'view' ] = 'views/indexEditors.php';
            return $data;
        }
        public function show() {
            // regarder si un id est passé dans l'url

                $id = isset( $_GET[ 'id' ] ) ? intval( $_GET[ 'id' ] ) : 0;
                if( $id == 0 ) {
                    die( 'l’éditeur demandé nexiste pas' );
                }
                $data[ 'editor' ] = $this -> editors_model -> find( $id );
                $data[ 'page_title' ] = 'ebooks - fiche de' . $data[ 'editor' ] -> name;
                $data[ 'view' ] = 'views/showEditors.php';
                return $data;

            // construire le tableau data
        }
    }
