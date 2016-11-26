<h2><?= $this->titulo; ?></h2>
<form method="post" enctype="multipart/form-data">
    <label for="titulo">Titulo:</label>
    <input type="text" name="titulo" value="<?= $this->livro->getTitulo(); ?>">

    <br>
    <label for="autor">Preço:</label>
    <input type="number" name="preco" value="<?= $this->livro->getPreco(); ?>" step=0.01 min="1">

    <br>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" value="<?= $this->livro->getAutor(); ?>">

    <br>
    <label for="descricao">Descrição:</label><br>
    <textarea type="text" name="descricao" cols="50" ><?= $this->livro->getDescricao    (); ?></textarea>

    <br>
    <label for="categoria_id">Categoria:</label>
    <select name="categoria_id">
    <?php foreach ($this->categorias as $categoria): ?>
        <option <?= $this->livro->getCategoriaId() == $categoria->getId() ? 'selected':'' ?> value="<?= $categoria->getId()?>">
            <?=$categoria->getNome(); ?>
        </option>
    <?php endforeach; ?>
    </select>

    <br>
    <label for="editora_id">Editora:</label>
    <select name="editora_id">
        <?php foreach ($this->editoras as $editora): ?>
            <option <?= $this->livro->getEditoraId() == $editora->getId() ? 'selected':'' ?> value="<?= $editora->getId()?>">
                <?=$editora->getNome(); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br>
    <label for="image">Imagem:</label>
    <input type="file" name="image">

    <br><br>
    <input type="submit" value="Enviar">
</form>