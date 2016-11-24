<h1>Descrição do livro</h1>

Titulo: <?= $this->livro->getTitulo(); ?> <br>
Autor: <?= $this->livro->getAutor(); ?> <br>
Categoria: <?= $this->livro->getCategoria()->getNome(); ?> <br>
Editora: <?= $this->livro->getEditora()->getNome(); ?> <br>
