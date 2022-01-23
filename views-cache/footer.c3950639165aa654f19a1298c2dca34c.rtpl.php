<?php if(!class_exists('Rain\Tpl')){exit;}?><!--Inicio do rodapé-->
<footer>
<div class="container-fluid">
    <div class="col-100 footer">
        <div class="content container-fluid">
            <div class="col-3">
                <h2><b>Um pouco sobre nós</b></h2>
                <p>
             Conteudo em desenvovimento!!
                </p>
            </div>
            <div class="col-3 contatos">
                <h2><b>contato</b></h2>
               
                <p class="local">Assis Chateaubriand, PR<p>
                <p class="email">email@email.com<p>
                <p class="telefone">(44)3528-1433<p>
            </div>

            <div class="col-3">
                <h2><b>Desenvolvimento</b></h2>
                <ul>
                    <?php require $this->checkTemplate("categories-menu");?>
                </ul>
              
            </div>
        </div>
    </div>
</div>
</footer>
<!--fim do rodapé-->
<!-- barra de créditos-->
<div class="col-100 footer-2">
    <div class="creditos">
        <p>&copy; 2021 - Todos os direitos reservados</p>
    </div>
</div>
<!--Fim da barra de créditos-->

<!--Javascript-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!--Fim do Javascript-->
<!--Fim do Código-->
</body>
</html>