<h1><?= $this->title ?></h1>
<div id="produtos">
    <ul><?php foreach($this->livros as $livro): ?>
        <li>
            <div class="boxProduto">
                <div class="image"><?= $livro->imageLink(); ?></div>
                <div> <?= $livro->getTitulo(); ?></div>
                <div> <?= $livro->getAutor(); ?> </div>
            </div>
        </li>
    <?php endforeach; ?></ul>
</div>
<div style="clear:both"></div>