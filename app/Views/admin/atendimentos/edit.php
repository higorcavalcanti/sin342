<h2><?= $this->titulo; ?></h2>
<form method="post" enctype="multipart/form-data">
    <label for="pergunta">Pergunta:</label><br>
    <input type="text" name="pergunta" value="<?= $this->atendimento->getPergunta(); ?>">

    <br>
    <label for="resposta">Resposta:</label><br>
    <textarea type="text" name="resposta" cols="50" ><?= $this->atendimento->getResposta(); ?></textarea>

    <br><br>
    <input type="submit" value="Enviar">
</form>