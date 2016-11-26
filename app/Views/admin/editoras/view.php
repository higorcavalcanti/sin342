<h2>Gerenciar Editoras</h2>
<table width="100%" class="fonteTabelas">
    <thead>
        <td width="10%"><b>Id</b></td>
        <td width="70%"><b>Nome</b></td>
        <td width="10%"><b>Editar</b></td>
        <td width="10%"><b>Remover</b></td>
    </thead>
    <tbody>
        <?php foreach($this->editoras as $editora): ?>
            <tr>
                <td width="10%"><?= $editora->getId(); ?></td>
                <td width="70%"><?= $editora->getNome(); ?></td>
                <td width="10%"><a href="admin/editoras/edit/<?= $editora->getId(); ?>">Editar</a></td>
                <td width="10%"><a href="admin/editoras/remove/<?= $editora->getId(); ?>">Remover</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<div>
    <a href="admin/editoras/add">
        <button class="carrinhoInput" type="button">Adicionar</button>
    </a>
</div>