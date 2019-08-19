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
        include("conecta.php");
        $recid = $_GET['editaid'];
        $seleciona = mysqli_query($conexao, "SELECT * FROM aluno WHERE id = '$recid'");
        $campo = mysqli_fetch_array($seleciona);
		?>
    <div class="container">
        <form action="gravaEdita.php" method="POST">

            <fieldset>
                <legend>Edição de aluno</legend>

                <input type="hidden" name="fid" value="<?=$campo["id"]?>">
                <label for="nome">Nome completo</label>
                <div>

                    <input type="text" id="nome" name="nome" autofocus required value="<?=$campo["nome"]?>">
                </div>

                <label for="email">Email</label>
                <div>

                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="email" id="email" name="email" value="<?=$campo["email"]?>" autofocus required>
                    </div>
                </div>
                <label for="senha">Senha</label>
                <div>

                    <input type="password" id="password" name="password" autofocus required value="<?=$campo["senha"]?>">
                </div>
                <label for="senha">Confirmar Senha</label>
                <div>

                    <input type="password" id="password" name="password2" autofocus required>
                </div>


                <input type="submit" name="alterar" value="Alterar" />
            </fieldset>

        </form>
    </div>
    <!--    <?php include("rodape.php"); ?>-->
</body>

</html>
