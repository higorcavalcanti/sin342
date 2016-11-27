<h2>Venda Detalhes</h2>

<b>Data:</b> <?= $this->venda->getData() ?><br>
<b>Usuário: </b><a href="admin/clientes/<?= $this->venda->getUsuario()->getId() ?>"><?= $this->venda->getUsuario()->getNome() ?> </a><br>
<b>Quantidade de itens:</b> <?= count($this->venda->getVendaItens()) ?><br>
<b>Valor da compra:</b> R$ <?= $this->venda->getValor() ?><br>
<br>

<?php if( count($this->venda->getVendaItens()) ): ?>
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
<?php endif; ?>