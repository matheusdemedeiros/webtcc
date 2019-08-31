<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
    <title>Listagem de alunos</title>

  
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
		$cabecalho_title = "Listagem de Professores de TCC";
		include("cabecalho.php"); 
		?>

    <div class="container">
        <form name="formuser" action="pesquisarNomeProfessorTCC.php" method="POST">
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
            
$dados = mysqli_query($conexao, "SELECT * FROM termpaperteacher ORDER BY NameTermPaperTeacher");
while ($aluno = mysqli_fetch_array($dados)){?>

        <tr>
            <td>
                <?=$aluno["NameTermPaperTeacher"]?>
            </td>
            <td>
                <?=$aluno["Email"]?>
            </td>

            <td align="center"><a href="editarProfessorTCC.php?editaid=<?=$aluno['IdTermPaperTeacher']?>"> <i class="material-icons" style="color: #00e676">edit</i></a></td>
            <td align="center"><a href="#" onclick="excluirProfessorTCC(<?=$aluno['IdTermPaperTeacher']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
        </tr>
        <?php } ?>


    </table>

    <?php include("rodape.php"); ?>
</body>

</html>
