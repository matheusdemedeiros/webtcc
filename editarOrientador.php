<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pagina de Cadastro</title>
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->

    <script type="text/javascript">
        function validar() {
            var senha = formuser.password.value;
            var confirmarsenha = formuser.password2.value;
            if (senha == "" || senha.length <= 5) {
                alert('prencha o campo com no mínimo 6 caracteres');
                formuser.password.focus();
                return false;
            }
            if (confirmarsenha == "" || confirmarsenha.length <= 5) {
                alert('prencha o campo com no mínimo 6 caracteres');
                formuser.password2.focus();
                return false;
            }

            if (senha != confirmarsenha) {
                alert('Senhas diferentes!');
                formuser.password2.focus();
                return false;
            }
        }

    </script>
</head>

<body>
    <?php 
		$cabecalho_title = "Editar Orientador";
		include("cabecalho.php");
        include("conecta.php");
        $recid = $_GET['editaid'];
        $seleciona = mysqli_query($conexao, "SELECT * FROM advisor WHERE IdAdvisor = '$recid'");
        $campo = mysqli_fetch_array($seleciona);
		?>
    <div class="container">
        <form class="container" name="formuser" action="gravaEditaOrientador.php" method="POST">

            <fieldset class="container">
                <h5>Edição de Orientador</h5>
                <input type="hidden" name="fid" value="<?=$campo["IdAdvisor"]?>">

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="nome" name="nome" autofocus required value="<?=$campo["NameAdvisor"]?>">
                        <label for="nome">Nome completo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">

                        <input type="email" id="email" name="email" autofocus required value="<?=$campo["Email"]?>">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
    
    <div class="input-field col s12">

        <select id="area_atuacao" name="area_atuacao" class="browser-default">

            <option value="" disabled selected>Área de Atuação</option>

            <?php

                include("conecta.php");
                $dados = mysqli_query($conexao, "SELECT * FROM area ORDER BY NameArea");
                
                while ($area = mysqli_fetch_array($dados)){
                
            ?>
                
            <option value="<?=$area["IdArea"]?>"><?=$area["NameArea"]?></option>
                   
            <?php
            
            }
            
            ?>

        </select>
    
    </div>

</div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" id="password" name="password" autofocus required value="<?=$campo["Password"]?>">
                        <label for="password">Senha</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" id="password2" name="password2" autofocus required>
                        <label for="password2">Confirmar Senha</label>
                    </div>
                </div>
                <input class="btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar" onclick="return validar()" />
            </fieldset>

        </form>
    </div>
    <?php include("rodape.php"); ?>
</body>

</html>
