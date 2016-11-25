<h1>Login</h1>

<div id="auth">
    <div class="auth" id="login">
        <h2 class="center">Já tem conta?</h2>

        <form method="post">
            <input type="hidden" name="action" value="login"><br>

            <label for="email">Email:</label><br>
            <input type="email" name="email" placeholder="Digite seu e-mail" required><br>

            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" placeholder="Digite sua senha" required>

            <div class="alertError"><?php echo $this->erro['login']; ?></div>
            <div class="espacoEntre"></div>

            <input type="submit" value="Logar">
        </form>
    </div>

    <div class="auth" id="registro">
        <h2 class="center">Ainda não tem conta?</h2>
        <form method="post">
            <input type="hidden" name="action" value="registro"><br>

            <label for="email">Nome completo:</label><br>
            <input type="text" name="nome" placeholder="Digite seu nome completo"><br>

            <label for="email">Email:</label><br>
            <input type="email" name="email" placeholder="Digite seu e-mail"><br>

            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" placeholder="Digite sua senha"><br>

            <div class="alertError"><?php echo $this->erro['registro']; ?></div>

            <input type="submit" value="Criar Conta">
        </form>
    </div>
</div>
