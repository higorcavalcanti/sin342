<h1>Meus Pedidos</h1>

<?php if (empty($this->pedidos)): ?>
    <div class="vazioCarrinho">
        Nenhum pedido realizado!
    </div>
<?php else: ?>
    <table>
        <thead>
        <tr>
            <th>Data</th>
            <th>Quantidade de Itens</th>
            <th>Valor</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->pedidos as $pedido): ?>
            <tr>
                <td><?= $pedido->getData() ?></td>
                <td><?= count($pedido->getVendaItens()) ?></td>
                <td>R$ <?= $pedido->getValor() ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
