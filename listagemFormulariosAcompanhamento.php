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
     
		?>

    

    <table class="container" width="100%" borde="1" bordercolor="#EEE" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <strong>Título do TCC</strong>
            </td>
            <td>
                <strong>Data da Reunião</strong>
            </td>
            <td>
                <strong>Assuntos Abordados</strong>
            </td>
            <td>
                <strong>Observaçãoes</strong>
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
//$id_tcc=$_GET['formid'];
$dados = mysqli_query($conexao, "SELECT t.Title as titulo, f.Observation as observacao,
f.Topic as assuntos, f.MeetingDate as dataReuniao, f.IdFormTermPaper as id
 FROM termpaper t INNER JOIN
formtermpaper f WHERE  IdTermPaper=TermPaperId ORDER BY dataReuniao");

while ($formulario = mysqli_fetch_array($dados)){?>

        <tr>
            <td>
                <?=$formulario["titulo"]?>
            </td>
            <td>
                <?=$formulario["dataReuniao"]?>

            </td>
            <td>
                <?=$formulario["assuntos"]?>
            </td>
            <td>
                <?=$formulario["observacao"]?>
            </td>
            <td>
        </td>

            <td alingn="center"><a href="editarFormularioAcompanhamento.php?editaid=<?=$formulario['id']?>"> <i class="material-icons" style="color: #00e676">edit</i></a></td>
            <td alingn="center"><a href="#" onclick="excluirFormularioAcompanhamento(<?=$formulario['id']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
        </tr>
        <?php } ?>


    </table>

    
    <?php include("rodape.php"); ?>
</body>

</html>
