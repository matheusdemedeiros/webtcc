<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
   

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
		$cabecalho_title = "Professores de TCC";
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
    <table class="container" width="100%" borde="1" bordercolor="#EEE" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <strong>Nome</strong>
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
<div class="container">
        <button class= "btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar">
        <a class = "material-icons" href="cadastroprofessortcc.php" style="color: #ffffff">add</a>
        </button>
    </div>
        <?php
include("conecta.php");
            
$dados = mysqli_query($conexao, "SELECT * FROM termpaperteacher 
INNER JOIN  course WHERE CourseId=IdCourse  ORDER BY NameTermPaperTeacher");
while ($teacher = mysqli_fetch_array($dados)){?>

        <tr>
            <td>
                <?=$teacher["NameTermPaperTeacher"]?>
            </td>
            <td>
                <?=$teacher["Email"]?>
            </td>
            <td>
            <?=$teacher["NameCourse"]?>
            </td>
            <td>
                <?=$teacher["Password"]?>
            </td>
            <td alingn="center"><a href="editarProfessorTCC.php?editaid=<?=$teacher['IdTermPaperTeacher']?>"> <i class="material-icons" style="color: #00e676">edit</i></a></td>
            <td alingn="center"><a href="#" onclick="excluirProfessorTCC(<?=$teacher['IdTermPaperTeacher']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
        </tr>
        <?php } ?>


    </table>
    
    <?php include("rodape.php"); ?>
</body>

</html>
