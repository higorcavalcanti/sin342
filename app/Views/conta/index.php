<h1>Olá <?= $this->usuario->getNome(); ?></h1>

<form method="post">
    <input type="hidden" name="action" value="registro"><br>

    <label for="email">Nome completo:</label><br>
    <input type="text" name="nome" value="<?= $this->usuario->getNome(); ?>" placeholder="Digite seu nome completo"><br>

    <br>
    <label for="email">Email:</label><br>
    <input type="email" name="email" value="<?= $this->usuario->getEmail() ?>" placeholder="Digite seu e-mail"><br>

    <br>
    <input type="submit" value="Atualizar perfil">
</form>