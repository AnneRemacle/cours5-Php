<?php
    $booksStmnt = 'SELECT * FROM books';
    // on stocke la requête dans une variable
    $pdoStmnt = $cn -> query( $booksStmnt );
    $books = $pdoStmnt -> fetchAll();
