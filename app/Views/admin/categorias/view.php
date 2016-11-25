<h2>Gerenciar Categorias</h2>
<table width="100%" class="fonteTabelas">
    <thead>
        <td width="10%"><b>Id</b></td>
        <td width="70%"><b>Nome</b></td>
        <td width="10%"><b>Editar</b></td>
        <td width="10%"><b>Remover</b></td>
    </thead>
    <tbody>
        <?php foreach($this->categorias as $categoria): ?>
            <tr>
                <td width="10%"><?= $categoria->getId(); ?></td>
                <td width="70%"><?= $categoria->getNome(); ?></td>
                <td width="10%"><a href="admin/categorias/edit/<?= $categoria->getId(); ?>">Editar</a></td>
                <td width="10%"><a href="admin/categorias/remove/<?= $categoria->getId(); ?>">Remover</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>