<h2>Visualizar Vendas</h2>
<table width="100%" class="fonteTabelas">
    <thead>
    <td width="10%"><b>Id</b></td>
    <td width="30%"><b>Nome</b></td>
    <td width="30%"><b>Email</b></td>
    <td width="20%"><b>Compras Realizadas</b></td>
    <td width="10%"><b>Visualizar</b></td>
    </thead>
    <tbody>
    <?php foreach($this->usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario->getId(); ?></td>
            <td><?= $usuario->getNome(); ?></td>
            <td><?= $usuario->getEmail(); ?></td>
            <td><?= count($usuario->getCompras()) ?> compra(s)</td>
            <td><a href="admin/clientes/<?= $usuario->getId(); ?>">Visualizar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>