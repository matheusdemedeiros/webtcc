<!DOCTYPE html>


<html>



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

    <div class="container">
    <a  class="waves-effect  green accent-3 btn" href="cadastrocurso.php">
    <i class="material-icons right">add</i>Adicionar</a>
       
    </div>
    <table class="container" width="100%" borde="1" bordercolor="#EEE" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <strong>Nome do Curso</strong>
            </td>
            <td>
                <strong>Coordenador do Curso</strong>
            </td>
            <td>
                <strong>Matrícula Siape</strong>
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
            
$dados = mysqli_query($conexao, "SELECT * FROM course ORDER BY NameCourse");
while ($course = mysqli_fetch_array($dados)){?>

        <tr>
            <td>
                <?=$course["NameCourse"]?>
            </td>
            <td>
                <?=$course["NameCourseCoordinator"]?>
            </td>
            <td>
                <?=$course["SiapeCourseCoordinator"]?>
            </td>


            <td alingn="center"><a href="editarCurso.php?editaid=<?=$course['IdCourse']?>"> <i class="material-icons" style="color: #00e676">edit</i></a></td>
            <td alingn="center"><a href="#" onclick="excluirCurso(<?=$course['IdCourse']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
        </tr>
        <?php } ?>


    </table>
    
    
    <?php include("rodape.php"); ?>
</body>

</html>
