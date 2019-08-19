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
        $recid = $POST["editaid"];
        $seleciona = mysqli_query($conexao, "SELECT * FROM aluno WHERE id = $recid");
        $campo = mysqli_fetch_array($seleciona);
		?>
    <div class="container">
        <form action="gravaEdita.php" method="POST">

            <fieldset>
                <legend>Edição de aluno</legend>
                
                    <input type="hidden" name="fid" value="<?=$campo["id"]?>">
                <div>
                    <label for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome" autofocus required value= "<?=$campo["nome"]?>"><br>
                </div>


                <div>
                    <label for="email">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="email" id="email" name="email" autofocus required value= "<?=$campo["email"]?>"><br>>
                    </div>
                </div>

                <div>
                    <label for="senha">Senha</label>
                    <input type="password" id="password" name="password" autofocus required value= "<?=$campo["senha"]?>"><br>>
                </div>


                <input type="submit" name="alterar" value="Alterar" />
            </fieldset>

        </form>
    </div>
<!--    <?php include("rodape.php"); ?>-->
</body>

</html>
