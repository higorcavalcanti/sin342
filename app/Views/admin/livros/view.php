<h2>Gerenciar Livros</h2>
<table width="100%" class="fonteTabelas">
    <thead>
        <td width="5%"><b>Id</b></td>
        <td width="30%"><b>Titulo</b></td>
        <td width="25%"><b>Autor</b></td>
        <td width="10%"><b>Editora</b></td>
        <td width="10%"><b>Categoria</b></td>
        <td width="10%"><b>Preco</b></td>
        <td width="5%"><b>Editar</b></td>
        <td width="5%"><b>Remover</b></td>
    </thead>
    <tbody>
        <?php foreach($this->livros as $livro): ?>
            <tr>
                <td width="5%"><?= $livro->getId(); ?></td>
                <td width="30%"><?= $livro->getTitulo(); ?></td>
                <td width="25%"><?= $livro->getAutor(); ?></td>
                <td width="10%"><?= $livro->getEditora()->getNome(); ?></td>
                <td width="10%"><?= $livro->getCategoria()->getNome(); ?></td>
                <td width="10%">R$<?= $livro->getPreco(); ?></td>
                <td width="5%"><a href="admin/livros/edit/<?= $livro->getId(); ?>">Editar</a></td>
                <td width="5%"><a href="admin/livros/remove/<?= $livro->getId(); ?>">Remover</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>