
    <ul>
        <?php foreach( $books as $book ): ?>
            <li>
                <a href="index.php?id=<?php echo $book -> id; ?>"><?php echo $book -> title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
