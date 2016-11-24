<h2><?= $this->titulo; ?></h2>
<form method="post" enctype="multipart/form-data">
    <label for="nome">Pergunta:</label>
    <input type="text" name="pergunta" value="<?= $this->atendimento->getPergunta(); ?>">

    <br>
    <label for="nome">Resposta:</label>
    <input type="text" name="resposta" value="<?= $this->atendimento->getResposta(); ?>">

    <br><br>
    <input type="submit" value="Enviar">
</form>