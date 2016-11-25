<h1>Carrinho</h1>
<?php if (empty($this->carrinho)): ?>
    <div class="vazioCarrinho">
        Nenhum produto no carrinho.
    </div>

<?php else: ?>
    <div id="carrinhoTabelas">
        <table style="width: 900px; margin: auto; text-align: center">
            <thead>
            <th>Imagem</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço Unitário</th>
            <th>Preço Total</th>
            <th>Remover</th>
            </thead>
            <tbody>

            <!--Colocar linha de baixo do titulo-->
            <td>
                <hr>
            </td>
            <td>
                <hr>
            </td>
            <td>
                <hr>
            </td>
            <td>
                <hr>
            </td>
            <td>
                <hr>
            </td>
            <td>
                <hr>
            </td>

            <?php foreach ($this->carrinho as $item): ?>
                <tr>
                    <td><?= $item['livro']->imageLink(true); ?></td>
                    <td><?= $item['livro']->getTitulo(); ?></td>
                    <td><?= $item['quantidade'] ?></td>
                    <td> R$<?= $item['livro']->getPrecoFormatado(); ?></td>
                    <td> R$<?= $item['livro']->getPreco() * $item['quantidade']; ?></td>
                    <td><a href="carrinho/remove/<?= $item['livro']->getId() ?>"> Remover </a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
    <div class="right" style="padding-right: 40px">
        <a href="carrinho/finalizar">
            <button class="carrinhoInput" type="button" value="teste">Finalizar</button>
        </a>
    </div>
<?php endif; ?>
