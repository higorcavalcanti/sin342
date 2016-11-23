<!doctype html>
<html>
<head>
    <base href="<?php echo __dir(); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Livraria Virtual</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
<header>
    <div id="logo">
        <a href="./">
            <img src="public/img/logo.png" alt="" title="" border="0" width="202" height="85" />
        </a>
    </div>

    <section id="search">
        <form method="post" action="search">
            <select name="tipo">
                <option value="livro">Livro</option>
                <option value="autor">Autor</option>
                <option value="editora">Editora</option>
            </select>
            <input type="text" name="search" placeholder="Digite aqui o termo da pesquisa">
            <input type="submit" name="submit" value="Pesquisar">
        </form>
    </section>

    <div id="carrinho">
        <a href="carrinho">
            <img src="public/img/carrinho.png">
        </a>
    </div>
</header>

<nav>
    <ul class="menu">
        <li><a href="./"> Home </a></li>
        <li><a href="vendidos">Mais Vendidos</a></li>
        <li><a href="atendimento">Atendimento</a></li>
        <li><a href="carrinho">Meu Carrinho</a></li>
        <?php if($this->usuario): ?>
            <li><a href="auth/conta">Minha Conta</a></li>
        <?php else: ?>
            <li><a href="auth/login">Entrar/Cadastrar</a></li>
        <?php endif; ?>
    </ul>
</nav>

<section id="conteudo">
