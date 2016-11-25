<h1>Meus Pedidos</h1>

<b>Data:</b> <?= $this->pedido->getData() ?><br>
<b>Quantidade de itens:</b> <?= count($this->pedido->getVendaItens()) ?>
<br><br>

<?php if( count($this->pedido->getVendaItens()) ): ?>
    <h3>Detalhes dos Itens</h3>
    <table width="100%" class="fonteTabelas">
        <thead>
        <tr>
            <th width="170px">Image</th>
            <th>Livro</th>
            <th>Autor</th>
            <th>Editora</th>
            <th>Quantidade</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
        <?php foreach($this->pedido->getVendaItens() as $item): ?>
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
<?php endif; ?>