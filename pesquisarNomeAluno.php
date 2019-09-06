<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
    <title>Listagem de alunos</title>

    <!-- <link rel="stylesheet" href="css/estilos.css"> -->

    <script type="text/jscript" src="script.js"></script>

</head>

<body>
    <?php 
		$cabecalho_title = "Listagem de alunos";
		include("cabecalho.php"); 
		?>

    <div class="container">
        <form name="formuser" action="pesquisarNomeAluno.php" method="POST">
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
            <td>
                <strong>Matricula</strong>
            </td>
            <td>
                <strong>E-mail</strong>
            </td>
            <td>
                <strong>Curso</strong>
            </td>
            <td>
                <strong>Senha</strong>
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
$dados = mysqli_query($conexao, "SELECT * FROM student
INNER JOIN course WHERE CourseId=IdCourse
and NameStudent like '$nome%'  ORDER BY NameStudent");
while ($aluno = mysqli_fetch_array($dados)){?>

        <tr>
            <td>
                <?=$aluno["NameStudent"]?>
            </td>
            <td>
                <?=$aluno["Registration"]?>
            </td>
            <td>
                <?=$aluno["Email"]?>
            </td>
            <td>
            <?=$aluno["NameCourse"]?>
            </td>
            <td>
            <?=$aluno["Password"]?>
            </td>
            <td align="center"><a href="editarAluno.php?editaid=<?=$aluno['IdStudent']?>"><i class="material-icons" style="color: #00e676">edit</i></a></td>
            <td align="center"><a href="#" onclick="excluirAluno(<?=$aluno['IdStudent']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
        </tr>
        <?php } ?>


    </table>
    <?php include("rodape.php"); ?>

</body>

</html>
