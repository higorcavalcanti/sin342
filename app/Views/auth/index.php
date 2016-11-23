<h1>Login</h1>
<div>
    <div id="auth">
        <div class="auth" id="login">
            <h2 class="center">Já tem conta?</h2>
            <?php echo $this->erro['login'] ?>
            <form method="post">
                <input type="hidden" name="action" value="login">

                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Email" required>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" placeholder="Senha" required>

                <input type="submit" value="Logar">
            </form>
        </div>

        <div class="auth" id="registro">
            <h2 class="center">Ainda não tem conta?</h2>
            <?php echo $this->erro['registro'] ?>
            <form method="post">
                <input type="hidden" name="action" value="registro">

                <label for="email">Nome:</label>
                <input type="text" name="nome" placeholder="Nome Completo">

                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Email">

                <label for="senha">Senha:</label>
                <input type="password" name="senha" placeholder="Senha">

                <input type="submit" value="Criar Conta">
            </form>
        </div>
    </div>
</div>