<?php
    namespace Model;

    class Editors extends Model {

        protected $table = 'editors';

        public function getEditorsByBookId( $id ) {
            $sql = 'SELECT editors.*
                    FROM editors
                    JOIN books
                    ON editor_id = editors.id
                    WHERE books.id = :id';

            $pdoSt = $this -> cn -> prepare( $sql );
            $pdoSt -> execute( [ ':id' => $id ] );
            return $pdoSt -> fetchAll();
        }
    }
