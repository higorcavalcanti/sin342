<h2 xmlns="http://www.w3.org/1999/html"><?= $this->titulo; ?></h2>
<form method="post" enctype="multipart/form-data">
    <label for="nome">Pergunta:</label><br>
    <input type="text" name="pergunta" value="<?= $this->atendimento->getPergunta(); ?>">

    <br>
    <label for="nome">Resposta:</label><br>
    <textarea type="text" name="resposta"><?= $this->atendimento->getResposta(); ?></textarea>

    <br><br>
    <input type="submit" value="Enviar">
</form>