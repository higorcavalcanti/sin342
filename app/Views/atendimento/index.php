<div id="conteudo">
    <h1>Atendimento - Perguntas frequentes</h1>
    <br>
    <div class="atendimento">
        <?php foreach($this->atendimentos as $atendimento): ?>
            <h2><?= $atendimento->getPergunta(); ?></h2>
            <p><?= $atendimento->getResposta(); ?></p><br>
            <hr>
        <?php endforeach; ?>
    </div>

</div>