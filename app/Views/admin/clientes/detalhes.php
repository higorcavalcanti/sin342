<h2>Detalhes do cliente: <?= $this->usuario->getNome(); ?></h2>

<b>Nome:</b> <?= $this->usuario->getNome() ?><br>
<b>Email:</b> <?= $this->usuario->getEmail() ?><br>
<b>Quantidade de compras:</b> <?= count($this->usuario->getCompras()) ?>
<br><br>

<?php if( count($this->usuario->getCompras()) ): ?>
<h3>Detalhes das compras</h3>
<table width="100%" class="fonteTabelas">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Quantidade de Itens</th>
            <th>Visualizar</th>
        </tr>
    </thead>
    <tbody style="text-align: center">
        <?php foreach($this->usuario->getCompras() as $item): ?>
        <tr>
            <td><?= $item->getId() ?></td>
            <td><?= $item->getData(); ?></td>
            <td><?= count($item->getVendaItens()) ?></td>
            <td><a href="admin/vendas/<?= $item->getId(); ?>">Visualizar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>