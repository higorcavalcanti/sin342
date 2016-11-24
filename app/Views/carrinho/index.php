<div id="conteudo">
    <h1>Carrinho</h1>
    <?php if(empty($this->carrinho)):?>
        <div class="vazioCarrinho">
            Nenhum produto no carrinho.
        </div>

        <?php else:?>
            <table>
                <thead>
                <th>Imagem</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Remover</th>
                </thead>
                <tbody>
                <?php foreach($this->carrinho as $item): ?>
                    <tr>
                        <td><?=$item['livro']->imageLink();?></td>
                        <td><?= $item['livro']->getTitulo(); ?></td>
                        <td><?= $item['quantidade']?></td>
                        <td> <a href="carrinho/remove/<?=$item['livro']->getId()?>"> Remover </a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        <br>
        [Botão: Continuar compra]
    <?php endif;?>

</div>
