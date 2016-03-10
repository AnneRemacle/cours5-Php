<?php
    function getAuthors() {
        $authorsStmnt = 'SELECT * FROM authors';
        // on stocke la requête dans une variable
        $pdoStmnt = $GLOBALS[ 'cn' ] -> query( $authorsStmnt );
        return $pdoStmnt -> fetchAll();
    }
    function getAuthor( $id ) {
        $authorSql = 'SELECT * FROM authors WHERE id= :id';
        $authorStmnt = $GLOBALS[ 'cn' ] -> prepare( $authorSql );
        // Toutes les variables qui sont dans le scope global sont récupérables avec $GLOBALS qui est une sorte de super-variable
        $authorStmnt -> execute( [ ':id' => $id ] );
        return $authorStmnt -> fetch();
    }
