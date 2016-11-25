<h2>Venda Detalhes</h2>

Data: <?= $this->venda->getData() ?>
<br>
Usuário: <?= $this->venda->getUsuario()->getNome() ?>
<br>
Quantidade de itens: <?= count($this->venda->getVendaItens()) ?>
<br>

<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Livro</th>
            <th>Autor</th>
            <th>Editora</th>
            <th>Quantidade</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($this->venda->getVendaItens() as $item): ?>
        <tr>
            <td><?= $item->getLivro()->imageLink(true) ?></td>
            <td><?= $item->getLivro()->getTitulo() ?></td>
            <td><?= $item->getLivro()->getAutor() ?></td>
            <td><?= $item->getLivro()->getEditora()->getNome() ?></td>
            <td><?= $item->getQuantidade() ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
