<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
   

    <!-- <link rel="stylesheet" href="css/estilos.css"> -->

</head>

<body>
    <?php 
		$cabecalho_title = "Cursos";
		include("cabecalho.php"); 
		?>

    <div class="container">
        <form name="formuser" action="pesquisarNomeCurso.php" method="POST">
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
    <table class="container" width="100%" border="1" bordercolor="#EEE" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <strog>Nome</strog>
            </td>
            <td width="10">
                <strog>Alterar</strog>
            </td>
            <td Width="10">
                <strog>Excluir</strog>
            </td>
        </tr>

        <?php
include("conecta.php");
$nome = $_POST["nome"];
$dados = mysqli_query($conexao, "SELECT * FROM course  WHERE NameCourse like '$nome%' ORDER BY NameCourse");
while ($course = mysqli_fetch_array($dados)){?>

        <tr>
            <td>
                <?=$course["NameCourse"]?>
            </td>


            <td align="center"><a href="editarCurso.php?editaid=<?=$course['IdCourse']?>"> <i class="material-icons" style="color: #00e676">edit</i></a></td>
            <td align="center"><a href="#" onclick="excluirCurso(<?=$course['IdCourse']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
        </tr>
        <?php } ?>


    </table>
    <div class="container">
        <button class="btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar" 
       > <a href="cadastrocurso.php">Cadastrar Curso</a></button>
    </div>
    <?php include("rodape.php"); ?>
</body>

</html>
