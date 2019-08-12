<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Index</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <?php 
		$cabecalho_title = "Página Inicial";
		include("cabecalho.php"); 
		?>
    <div class="container">

        <form action="cadastroorientador.html" method="post">
            <input type="text" name="login" value="" />
            <input type="password" name="senha" value="" />
            <input type="submit" name="enviar" value="Login" />
            <a href="cadastroorientador.html">Sem cadastro?</a>
        </form>




    </div>


    <!--    <?php include("rodape.php"); ?>-->

</body>

</html>
