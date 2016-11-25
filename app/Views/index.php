<h1>Conheça os livros mais vendidos</h1>
<div id="produtos">
    <ul><?php foreach($this->livros as $livro): ?>
        <li>
            <div class="boxProduto">
                <p id="image"><?= $livro->imageLink(true); ?></p>
                <p class="tituloProduto"> <?= $livro->getTitulo(); ?></p>
                <p class="autorProdutos"> <?= $livro->getAutor(); ?> </p>
            </div>
        </li>
    <?php endforeach; ?></ul>
</div>
<div style="clear:both"></div>