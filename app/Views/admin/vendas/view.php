<h2>Visualizar Vendas</h2>
<table width="100%" class="fonteTabelas">
    <thead>
    <td width="10%"><b>Id</b></td>
    <td width="20%"><b>Data</b></td>
    <td width="30%"><b>Usuário</b></td>
    <td width="20%"><b>Quantidade</b></td>
    <td width="20%"><b>Visualizar</b></td>
    </thead>
    <tbody>
    <?php foreach($this->vendas as $venda): ?>
        <tr>
            <td><?= $venda->getId(); ?></td>
            <td><?= $venda->getData(); ?></td>
            <td><?= $venda->getUsuario()->getNome(); ?></td>
            <td><?= count($venda->getVendaItens()) ?> item(s)</td>
            <td><a href="admin/vendas/<?= $venda->getId(); ?>">Visualizar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>