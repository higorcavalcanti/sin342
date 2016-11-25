<div id="blocoTotal">
    <div class="boxTitulo">
        <?= $this->livro->getTitulo(); ?>
    </div>
    <div class="blocoImagem">
        <?= $this->livro->image(); ?>
    </div>

    <div class="blocoConteudo">
        <b>Autor:</b> <?= $this->livro->getAutor(); ?> <br>
        <b>Categoria: </b><?= $this->livro->getCategoria()->getNome(); ?> <br>
        <b>Editora:</b> <?= $this->livro->getEditora()->getNome(); ?> <br>
        <b>Ano: </b>2000 <br>
        <b>Descrição: </b>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos,
        e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os
        embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como
        também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na
        década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente
        quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker. <br>
    </div>

    <div class="blocoValor">
        <div class="blocoPreco"><?= $this->livro->getPrecoFormatado() ?></div>
        <a href="carrinho/add/<?= $this->livro->getId(); ?>">
            <button class="blocoButton" type="button" value="add">Adicionar ao carrinho</button>
        </a>
    </div>
</div>