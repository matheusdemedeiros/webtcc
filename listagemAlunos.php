<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
    <title>Listagem de alunos</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/jscript" src="script.js"></script>
    
</head>

<body>
    <?php 
		$cabecalho_title = "Listagem de alunos";
		include("cabecalho.php"); 
		?>

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
            
$dados = mysqli_query($conexao, "SELECT * FROM aluno ORDER BY nome");
while ($aluno = mysqli_fetch_array($dados)){?>

        <tr>
            <td>
                <?=$aluno["nome"]?>
            </td>
            <td>
                <?=$aluno["email"]?>
            </td>
            
            <td align="center"><a href="editar.php?editaid=<?=$aluno['id']?>"> <span class="glyphicon glyphicon-edit"></span></a></td>
            <td align= "center"><a href="#" onclick="verifica(<?=$aluno['id']?>)"><span class="glyphicon glyphicon-trash" ></span></a></td>
        </tr>
        <?php } ?>


    </table>


</body>

</html>

