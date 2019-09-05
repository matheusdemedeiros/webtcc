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
		$cabecalho_title = "Listagem de Orientadores";
		include("cabecalho.php"); 
		?>

    <div class="container">
        <form name="formuser" action="pesquisarNomeOrientador.php" method="POST">
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
 
            <td>
 
                <strog>Area de atuacao</strog>
 
            </td>
 
            <td>
 
                <strog>Senha</strog>
 
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
            $dados = mysqli_query($conexao, "SELECT * FROM advisor INNER JOIN  area 
            WHERE  NameAdvisor like '$nome%' and OccupationArea=IdArea
            ORDER BY NameAdvisor");
            while ($advisor = mysqli_fetch_array($dados)){
                
            ?>

        <tr>
            
            <td>
                
                <?=
                    $advisor["NameAdvisor"]
                ?>
            
            </td>
            
            <td>
            
                <?=
                    $advisor["Email"]
                ?>
            
            </td>

            <td>
            
                <?=
                    $advisor["NameArea"]
                ?>
            
            </td>
            
            <td>
            
                <?=
                    $advisor["Password"]
                ?>
            
            </td>

            <td align="center"><a href="editarOrientador.php?editaid=<?=$advisor['IdAdvisor']?>"> <i class="material-icons" style="color: #00e676">edit</i></a></td>
            
            <td align="center"><a href="#" onclick="excluirOrientador(<?=$advisor['IdAdvisor']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
        
        </tr>
    
        <?php
            
            }
        
        ?>

    </table>

    <?php
        
        include("rodape.php");
    
    ?>

</body>

</html>
