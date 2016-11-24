<h1>Atendimento Index</h1>
<?php foreach($this->atendimentos as $atendimento): ?>
    <h2><?= $atendimento->getPergunta(); ?></h2>
    <h3><?= $atendimento->getResposta(); ?></h3>
    <hr>
<?php endforeach; ?>
