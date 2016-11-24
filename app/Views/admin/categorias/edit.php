<h2><?= $this->titulo; ?></h2>
<form method="post" enctype="multipart/form-data">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?= $this->categoria->getNome(); ?>">

    <br><br>
    <input type="submit" value="Enviar">
</form>