<h1>Conheça os livros mais vendidos</h1>
<div id="produtos">
    <ul><?php foreach($this->livros as $livro): ?>
        <li>
            <div class="boxProduto">
                <div class="image">
                    <a href="livros/view/<?=$livro->getId();?>">
                        <img src="image/view/<?= $livro->getImage()->getId(); ?>">
                    </a>
                </div>
                <div> <?= $livro->getTitulo(); ?></div>
                <div> <?= $livro->getAutor(); ?> </div>
            </div>
        </li>
    <?php endforeach; ?></ul>
</div>
<div style="clear:both"></div>