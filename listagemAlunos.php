<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
   
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->

    <script type="text/jscript" src="script.js"></script>
    <script type="text/javascript">
        function validar() {
            var nome = formuser.nome.value;
            if (nome == "") {
                alert('O campo não pode ser nulo!');
                formuser.nome.focus();
                return false;
            }
        }

    </script>
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
    <table class="container" width="100%" border="1" bordercolor="#EEE" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <strog>Nome</strog>
            </td>
            <td>
                <strog>Matrícula</strog>
            </td>
            <td>
                <strog>E-mail</strog>
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
            
$dados = mysqli_query($conexao, "SELECT * FROM student ORDER BY NameStudent");
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

            <td align="center"><a href="editarAluno.php?editaid=<?=$aluno['IdStudent']?>"> <i class="material-icons" style="color: #00e676">edit</i></a></td>
            <td align="center"><a href="#" onclick="excluirAluno(<?=$aluno['IdStudent']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
        </tr>
        <?php } ?>


    </table>

    <div class="container">
        <button class="btn" style="background-color: #00e676"  name="Cadastrar" value="Cadastrar" 
       > <a href="cadastroaluno.php">Cadastrar Aluno</a></button>
    </div>
    <?php include("rodape.php"); ?>
</body>

</html>
