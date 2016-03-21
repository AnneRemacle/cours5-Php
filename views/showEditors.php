<h1>Fiche de l'éditeur <?php echo $datas[ 'editor' ] -> name ; ?></h1>

<div class="logo">
    <img src="<?php echo $datas[ 'editor' ] -> logo ; ?>" alt="" />
</div>

<div class="summary">
    <?php echo $datas[ 'editor' ] -> summary ; ?>
</div>

<h2>Livres publiés par cet éditeur</h2>
<?php if( $datas[ 'books' ] ): ?>
    <ul class="books">
        <?php foreach( $datas[ 'books' ] as $book ): ?>
            <li class="book">
                <a href="?a=show&e=books&id=<?php echo $book -> id; ?>&with=authors,editors">
                    <?php echo $book -> title; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<h2>Auteurs publiés par cet éditeur</h2>
<?php if( $datas[ 'authors' ] ): ?>
    <ul class='authors'>
        <?php foreach( $datas[ 'authors' ] as $author ): ?>
            <li class='author'>
                <a href="?a=show&e=authors&id=<?php echo $author -> id; ?>&with=books,editors">
                    <?php echo $author -> name; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div>
    <a href="index.php?a=index&e=editors">Tous les éditeurs</a>
</div>
