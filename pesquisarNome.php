<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
    <title>Listagem de alunos</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/jscript" src="script.js"></script>
    <script type="text/javascript">
        function validar() {
            var nome = formuser.nome.value;
            if (nome == "" || nome.length <= 5) {
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
        <form name="formuser">
            <fieldset>
                <div>
                    <label for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome" autofocus required>
                    <input type="submit" name="Pesquisar" value="Pesquisar" onclick="return validar()" />
                </div>

            </fieldset>

        </form>

    </div>
    <table class="container" width="100%" border="1" bordercolor="#EEE" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <strog>Nome</strog>
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
$nome = $_POST["nome"];
$dados = mysqli_query($conexao, "SELECT * FROM aluno WHERE nome like '%$nome%'  ORDER BY nome");
while ($aluno = mysqli_fetch_array($dados)){?>

        <tr>
            <td>
                <?=$aluno["nome"]?>
            </td>
            <td>
                <?=$aluno["email"]?>
            </td>

            <td align="center"><a href="editar.php?editaid=<?=$aluno['id']?>"> <span class="glyphicon glyphicon-edit"></span></a></td>
            <td align="center"><a href="#" onclick="verifica(<?=$aluno['id']?>)"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        <?php } ?>


    </table>


</body>

</html>
