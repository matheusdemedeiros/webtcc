<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pagina de Cadastro</title>
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->


</head>

<body>
    <?php 
		$cabecalho_title = "Cadastro Área Atuação";
		include("cabecalho.php");
        include("conecta.php");
        $recid = $_GET['editaid'];
        $seleciona = mysqli_query($conexao, "SELECT * FROM area WHERE IdArea = '$recid'");
        $campo = mysqli_fetch_array($seleciona);
		?>
    <div class="container">
        <form class="container" name="formuser" action="gravaEditaAreaAtuacao.php" method="POST">

            <fieldset class="container">
                <h5>Edição Área Atuação</h5>
                <input type="hidden" name="fid" value="<?=$campo[" IdArea"]?>">

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="nome" name="nome" autofocus required value="<?=$campo["NameArea"]?>">
                        <label for="nome">Área Atuação</label>
                    </div>
                </div>



                <input class="btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar" />
            </fieldset>

        </form>
    </div>
    <?php include("rodape.php"); ?>
</body>

</html>
