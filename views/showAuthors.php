
<h1><?php echo $datas[ 'author' ] -> name; ?></h1>

<div class="logo">
    <img src="<?php echo $datas[ 'author' ] -> logo ; ?>" alt="" />
</div>
<?php if( $datas[ 'author' ] -> bio ): ?>
    <div class="summary">
        <?php echo $datas[ 'author' ] -> bio; ?>
    </div>
<?php endif; ?>

<div>
    <a href="index.php?a=index&e=authors">Tous les auteurs</a>
</div>
