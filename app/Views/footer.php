
    <div style="clear:both;"></div>
</section>

<footer>
    <div class="conteudoFooter">
        <a href="./">
            <img src="public/img/logo.png" />
        </a>
        <div class="textoFooter">
            Copyright &copy; <?= copyright('2016') ?> - <a href="./">Livraria Virtual</a> | Todos direitos reservados.
        </div>
    </div>
</footer>

</body>
</html>
<?php
function copyright($year = 'auto')
{
    if(intval($year) == 'auto')
        $year = date('Y');

    if(intval($year) == date('Y')) return intval($year);
    else if(intval($year) < date('Y')) return intval($year) . ' - ' . date('Y');
    else if(intval($year) > date('Y')) return date('Y');
}
?>