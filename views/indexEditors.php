
<h1> La liste des éditeurs</h1>

<ul>
    <?php foreach( $datas[ 'editors' ] as $editor ): ?>
        <li>
            <a href="?a=show&e=editors&id=<?php echo $editor -> id; ?>&with=books"><?php echo $editor -> name; ?></a>
        </li>
    <?php endforeach; ?>
</ul>
