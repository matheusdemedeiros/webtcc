<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Index</title>

    <!-- <link rel="stylesheet" href="css/estilos.css"> -->

</head>

<body>
    <?php 
		$cabecalho_title = "Página Inicial";
		include("cabecalho.php"); 
		?>
    <div class="container">

        <form class="container" action="cadastroorientador.php" method="POST">
            <fieldset class="container">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="login" value="" autofocus required />
                        <label for="login">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" name="senha" value="" autofocus required />
                        <label for="senha">Senha</label>
                    </div>
                </div>
                <div class="row">
                    <input class="btn" style="background-color: #00e676" type="submit" name="enviar" value="Login" />
                    <a href="cadastroorientador.php">Sem cadastro?</a>
                </div>

            </fieldset>

        </form>




    </div>


    <?php include("rodape.php"); ?>

</body>

</html>
