<div id="blocoTotal">
    <div class="boxTitulo">
        <?= $this->livro->getTitulo(); ?>
    </div>
    <div class="blocoImagem">
        <?= $this->livro->image(); ?>
    </div>

    <div class="blocoConteudo">
        <b>Titulo:</b> <?= $this->livro->getTitulo(); ?> <br>
        <b>Autor:</b> <?= $this->livro->getAutor(); ?> <br>
        <b>Categoria: </b><?= $this->livro->getCategoria()->getNome(); ?> <br>
        <b>Editora:</b> <?= $this->livro->getEditora()->getNome(); ?> <br>
        <b>Descrição: </b> <?= $this->livro->getDescricao() ?> <br>
    </div>

    <div class="blocoValor">
        <div class="blocoPreco"><?= $this->livro->getPrecoFormatado() ?></div>
        <a href="carrinho/add/<?= $this->livro->getId(); ?>">
            <button class="blocoButton" type="button" value="add">Adicionar ao carrinho</button>
        </a>
    </div>
</div>