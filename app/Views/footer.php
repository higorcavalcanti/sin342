
    <p>&nbsp;</p>
</section>

<footer>
    <div class="conteudoFooter">
        <img src="public/img/logo_footer.png" />
        <div class="textoFooter">Copyright &copy; <?= copyright('2016') ?> - Livraria Virtual | Todos direitos reservados.</div>
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