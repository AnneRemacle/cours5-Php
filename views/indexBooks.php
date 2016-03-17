
    <ul>
        <?php foreach( $datas[ 'books' ] as $book ): ?>
            <li>
                <a href="index.php?a=show&e=books&id=<?php echo $book -> id; ?>&with=authors,editors"><?php echo $book -> title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
