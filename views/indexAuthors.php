<ul>

    <?php foreach ( $datas[ 'authors' ] as $author ): ?>
    <li>
        <a href="index.php?a=show&e=authors&id=<?php echo $author -> id; ?>&with=books"><?php echo $author -> name; ?> </a>
    </li>
<?php endforeach; ?>
</ul>
