<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
    <title>Listagem de alunos</title>
    
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->

</head>

<body>
    <?php 
		$cabecalho_title = "Áreas de Atuação";
		include("cabecalho.php"); 
		?>

    <div class="container">
        <form name="formuser" action="pesquisarNomeArea.php" method="POST">
            <fieldset>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="nome" name="nome" autofocus required>
                        <label for="nome">Nome completo</label>

                    </div>

                </div>
                <input class="btn" style="background-color: #00e676" type="submit" name="Pesquisar" value="Pesquisar" onclick="return validar()" />
            </fieldset>
        </form>

    </div>
    <table class="container" width="100%" borde="1" bordercolor="#EEE" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <strong>Nome</strong>
            </td>
            <td width="10">
                <strong>Alterar</strong>
            </td>
            <td Width="10">
                <strong>Excluir</strong>
            </td>
        </tr>

        <?php
include("conecta.php");
$nome = $_POST["nome"];
            
$dados = mysqli_query($conexao, "SELECT * FROM area Where NameArea like '$nome%' ORDER BY NameArea");
while ($aluno = mysqli_fetch_array($dados)){?>

        <tr>
            <td>
                <?=$aluno["NameArea"]?>
            </td>
            

            <td alingn="center"><a href="editarAreaAtuacao.php?editaid=<?=$aluno['IdArea']?>"> <i class="material-icons" style="color: #00e676">edit</i></a></td>
            <td alingn="center"><a href="#" onclick="excluirArea(<?=$aluno['IdArea']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
        </tr>
        <?php } ?>


    </table>

    <?php include("rodape.php"); ?>
</body>

</html>
