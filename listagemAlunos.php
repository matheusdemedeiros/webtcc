<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
   
    

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
		$cabecalho_title = "Alunos";
        include("cabecalho.php"); 
        session_start();
        $id_user = $_SESSION['name_session'];
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
    <div class="container">
    <a  class="waves-effect  green accent-3 btn"href="cadastroaluno.php"><i class="material-icons right">add</i>Adicionar</a>
        
    </div>

    <table class="container" width="100%" borde="1" bordercolor="#EEE" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <strong>Nome</strong>
            </td>
            <td>
                <strong>Matrícula</strong>
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

$professor_tcc=mysqli_query($conexao,"SELECT CourseId 
FROM termpaperteacher 
WHERE '$id_user' = UserId");
$curso= mysqli_fetch_array($professor_tcc);

$dados = mysqli_query($conexao, "SELECT * FROM student INNER JOIN 
course INNER JOIN users WHERE 
CourseId=IdCourse 
AND IdUser=UserId 
AND '$curso[CourseId]'=CourseId
ORDER BY NameStudent");
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
            
            <?=
                $aluno["Password"]
            ?>
        
        </td>

            <td alingn="center"><a href="editarAluno.php?editaid=<?=$aluno['IdStudent']?>"> <i class="material-icons" style="color: #00e676">edit</i></a></td>
            <td alingn="center"><a href="#" onclick="excluirAluno(<?=$aluno['IdStudent']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
        </tr>
        <?php } ?>


    </table>

    
    <?php include("rodape.php"); ?>
</body>

</html>
