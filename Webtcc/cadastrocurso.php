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
		$cabecalho_title = "Cadastro Curso";
		include("cabecalho.php"); 
		?>
    <div class="container">
        <form action="teste.php" method="POST">

            <fieldset>
                <legend>Cadastro Curso</legend>

                <div>
                    <label for="nome">Nome do Curso</label>
                    <input type="text" id="nome" name="nome" autofocus required>
                </div>
                <input type="submit" name="Cadastrar" value="Cadastrar" />
            </fieldset>
        </form>


    </div>



<!--    <?php include("rodape.php"); ?>-->
</body>

</html>
