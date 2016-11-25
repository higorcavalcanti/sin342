<h2>Gerenciar Categorias</h2>
<table width="100%" style="font-size: 12px">
    <thead>
        <td><b>Id</b></td>
        <td width="30%" ><b>Pergunta</b></td>
        <td width="30%"><b>Editar</b></td>
        <td width="30%"><b>Remover</b></td>
    </thead>
    <tbody>
    <?php foreach($this->atendimentos as $atendimento): ?>
        <tr style="width: 100%" >
            <td width="10%"><?= $atendimento->getId(); ?></td>
            <td width="40%"><?= $atendimento->getResposta(); ?></td>
            <td width="30%"><a href="admin/atendimentos/edit/<?= $atendimento->getId(); ?>">Editar</a></td>
            <td width="20%"><a href="admin/atendimentos/remove/<?= $atendimento->getId(); ?>">Remover</a></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>