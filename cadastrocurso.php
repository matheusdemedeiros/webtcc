<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    

    <!-- <link rel="stylesheet" href="css/estilos.css"> -->

</head>

<body>
    <?php 
		$cabecalho_title = "Cadastro Curso";
		include("cabecalho.php"); 
		?>
    <div class="container">
        <form class="container" action="inserirCurso.php" method="POST">
            <fieldset class="container">
                <h5>Cadastro Curso</h5>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="nome" name="nome" class="validate" autofocus required>
                        <label for="nome">Nome do Curso</label>
                    </div>
                </div>
                <input class="btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar" />
            </fieldset>
        </form>


    </div>



    <?php include("rodape.php"); ?>


</body>

</html>
