<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pagina de Cadastro</title>
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->
</head>

<body>
    <?php 
		$cabecalho_title = "Cadastro Área de Atuação";
		include("cabecalho.php"); 
		?>
    <div class="container">

        <form class="container" name="formuser" action="inserirAreaAtuacao.php" method="POST">

            <fieldset class="container">
                <h5>Cadastro Área de Atuação</h5>
                <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="nome" name="nome" class="validate" autofocus required>
                    <label for="nome">Nome área de atuação</label>
                </div>
                </div>
                
                <input class="btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar" onclick="return validar()" />
            </fieldset>
        </form>


    </div>


    <?php include("rodape.php"); ?>
</body>

</html>
