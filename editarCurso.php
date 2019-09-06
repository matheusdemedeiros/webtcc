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
        include("conecta.php");
        $recid = $_GET['editaid'];
        $seleciona = mysqli_query($conexao, "SELECT * FROM course WHERE IdCourse = '$recid'");
        $campo = mysqli_fetch_array($seleciona);
		?>
    <div class="container">
        <form class="container" action="gravaEditaCurso.php" method="POST">
            <fieldset class="container">
                <h5>Cadastro Curso</h5>
                <input type="hidden" name="fid" value="<?=$campo["IdCourse"]?>">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="nome" name="nome" class="validate" autofocus required value="<?=$campo["NameCourse"]?>">
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
