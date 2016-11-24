<h1>Carrinho Index</h1>

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
