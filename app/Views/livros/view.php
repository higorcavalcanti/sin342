<h1>Descrição do livro</h1>

<img src="image/view/<?= $this->livro->getImageId() ?>"/>

<br>

Titulo: <?= $this->livro->getTitulo(); ?> <br>
Autor: <?= $this->livro->getAutor(); ?> <br>
Categoria: <?= $this->livro->getCategoria()->getNome(); ?> <br>
Editora: <?= $this->livro->getEditora()->getNome(); ?> <br>

<br><br><br>

<a href="carrinho/add/<?= $this->livro->getId();?>"> [BOTAO: Adicionar ao carrinho] </a>