<h2>Gerenciar Categorias</h2>
<table>
    <thead>
        <th>Id</th>
        <th>Pergunta</th>
        <th>Resposta</th>
        <th>Editar</th>
        <th>Remover</th>
    </thead>
    <tbody>
        <?php foreach($this->atendimentos as $atendimento): ?>
            <tr>
                <td><?= $atendimento->getId(); ?></td>
                <td><?= $atendimento->getPergunta(); ?></td>
                <td><?= $atendimento->getResposta(); ?></td>
                <td><a href="admin/atendimentos/edit/<?= $atendimento->getId(); ?>">Editar</a></td>
                <td><a href="admin/atendimentos/remove/<?= $atendimento->getId(); ?>">Remover</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>