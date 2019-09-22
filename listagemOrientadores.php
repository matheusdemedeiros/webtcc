<!DOCTYPE html>
<html>

<head>
    
    <meta charset="UTF-8">
    <title>Orientadores</title>
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
		$cabecalho_title = "Lista de Orientadores";
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
        
        <div class="container">
        <button class= "btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar">
        <a class = "material-icons" href="cadastroorientador.php" style="color: #ffffff">add</a>
        </button>
    </div>

    <table class="container" width="100%"  borde="1" bordercolor="#EEE" cellspacing="0" cellpadding="10">
 
        <tr>
 
            <td>
 
                <strong>Nome</strong>
 
            </td>
 
            <td>
 
                <strong>E-mail</strong>
 
            </td>
 
            <td>
 
                <strong>Area de atuacao</strong>
 
            </td>
 
            <td>
 
                <strong>Senha</strong>
 
            </td>
            <td>
                <strong>
                Matrícula Siapei
                </strong>
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
            $dados = mysqli_query($conexao, "SELECT * FROM advisor INNER JOIN  area 
            WHERE OccupationArea=IdArea
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
             <td>
             <?=$advisor["Siapei"]?>
             </td>   
            <td alingn="center"><a href="editarOrientador.php?editaid=<?=$advisor['IdAdvisor']?>"> <i class="material-icons" style="color: #00e676">edit</i></a></td>
            
            <td alingn="center"><a href="#" onclick="excluirOrientador(<?=$advisor['IdAdvisor']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
        
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
