<?php
    class Editors {
        public function getEditors() {
            $sql = 'SELECT * FROM editors ORDER BY name';
            $pdostmnt = $GLOBALS[ 'cn' ] -> query( $sql );


            return $pdostmnt -> fetchAll();
        }

        public function getEditor( $id ) {
            $editorSql = 'SELECT * FROM editors WHERE id = :id'; // :id = joker
            $editorStmnt = $GLOBALS[ 'cn' ] -> prepare( $editorSql );
            $editorStmnt -> execute( [ ':id' => $id ] );
            return $editorStmnt -> fetch();
        }
    }
