<h2>Gerenciar Atendimentos</h2>
<table width="100%" class="fonteTabelas">
    <thead>
        <td width="10%"><b>Id</b></td>
        <td width="70%" ><b>Pergunta</b></td>
        <td width="10%"><b>Editar</b></td>
        <td width="10%"><b>Remover</b></td>
    </thead>
    <tbody>
    <?php foreach($this->atendimentos as $atendimento): ?>
        <tr style="width: 100%" >
            <td width="10%"><?= $atendimento->getId(); ?></td>
            <td width="70%"><?= $atendimento->getPergunta(); ?></td>
            <td width="10%"><a href="admin/atendimentos/edit/<?= $atendimento->getId(); ?>">Editar</a></td>
            <td width="10%"><a href="admin/atendimentos/remove/<?= $atendimento->getId(); ?>">Remover</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>
<div>
    <a href="admin/atendimentos/add">
        <button class="carrinhoInput" type="button">Adicionar</button>
    </a>
</div>