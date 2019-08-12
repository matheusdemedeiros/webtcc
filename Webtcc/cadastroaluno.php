<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pagina de Cadastro</title>
  
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <?php 
		$cabecalho_title = "Cadastro Aluno";
		include("cabecalho.php"); 
		?>
    <div class="container">
        <form action="teste_tabela.php" method="POST">

            <fieldset>
                <legend>Cadastro Aluno</legend>

                <div>
                    <label for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome" autofocus required>
                </div>


                <div>
                    <label for="email">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="email" id="email" name="email" autofocus required>
                    </div>
                </div>

                <div>
                    <label for="senha">Senha</label>
                    <input type="password" id="password" name="password" autofocus required>
                </div>

                <div>
                    <label for="senha2">Confirmar Senha</label>
                    <input type="password" id="password2" name="password2" autofocus required>
                </div>




                <input type="submit" name="Cadastrar" value="Cadastrar" />
            </fieldset>

        </form>
    </div>
<!--    <?php include("rodape.php"); ?>-->
</body>

</html>
