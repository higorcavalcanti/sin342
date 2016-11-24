<h2>Gerenciar Categorias</h2>
<table>
    <thead>
        <th>Id</th>
        <th>Nome</th>
        <th>Editar</th>
        <th>Remover</th>
    </thead>
    <tbody>
        <?php foreach($this->categorias as $categoria): ?>
            <tr>
                <td><?= $categoria->getId(); ?></td>
                <td><?= $categoria->getNome(); ?></td>
                <td><a href="admin/categorias/edit/<?= $categoria->getId(); ?>">Editar</a></td>
                <td><a href="admin/categorias/remove/<?= $categoria->getId(); ?>">Remover</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>