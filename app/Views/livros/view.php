<div id="conteudo">
    <h1><?= $this->livro->getTitulo(); ?></h1>

    <?= $this->livro->image(); ?>

    <br>

    Titulo: <?= $this->livro->getTitulo(); ?> <br>
    Autor: <?= $this->livro->getAutor(); ?> <br>
    Categoria: <?= $this->livro->getCategoria()->getNome(); ?> <br>
    Editora: <?= $this->livro->getEditora()->getNome(); ?> <br>

    <br><br><br>

    <a href="carrinho/add/<?= $this->livro->getId();?>"> [BOTAO: Adicionar ao carrinho] </a>
</div>