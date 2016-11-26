<h1>Meus Pedidos</h1>

<?php if (empty($this->pedidos)): ?>
    <div class="vazioCarrinho">
        Nenhum pedido realizado!
    </div>
<?php else: ?>
    <table style="width: 100%; text-align: center">
        <thead>
        <tr>
            <th width="40%">Data</th>
            <th width="20%">Quantidade de Itens</th>
            <th width="20%">Valor</th>
            <th width="20%">Detalhes</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->pedidos as $pedido): ?>
            <tr>
                <td><?= $pedido->getData() ?></td>
                <td><?= count($pedido->getVendaItens()) ?></td>
                <td>R$ <?= $pedido->getValor() ?></td>
                <td><a href="conta/pedidos/<?= $pedido->getId(); ?>">Detalhes</a> </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
