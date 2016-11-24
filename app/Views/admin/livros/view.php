<h2>Gerenciar Livros</h2>
<table>
    <thead>
        <th>Id</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Editora</th>
        <th>Categoria</th>
        <th>Preco</th>
        <th>Editar</th>
        <th>Remover</th>
    </thead>
    <tbody>
        <?php foreach($this->livros as $livro): ?>
            <tr>
                <td><?= $livro->getId(); ?></td>
                <td><?= $livro->getTitulo(); ?></td>
                <td><?= $livro->getAutor(); ?></td>
                <td><?= $livro->getEditora()->getNome(); ?></td>
                <td><?= $livro->getCategoria()->getNome(); ?></td>
                <td>R$<?= $livro->getPreco(); ?></td>
                <td><a href="admin/livros/edit/<?= $livro->getId(); ?>">Editar</a></td>
                <td><a href="admin/livros/remove/<?= $livro->getId(); ?>">Remover</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>