<!doctype html>
<html>

<head>
    <meta charset="UTF-8">

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
		$cabecalho_title = "Cadastro Orientador";
		include("cabecalho.php"); 
		?>
    <div class="container">
        <form class="container" name="formuser" method="POST">
            <fieldset class="container">
                <h5>Cadastro Orientador</h5>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="nome" name="nome" class="validate" autofocus required>
                        <label for="nome">Nome completo</label>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="area_atuacao" name="area_atuacao" class="validate" autofocus required>
                        <label for="area_atuacao">Área de Atuação</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">

                        <input type="email" id="email" name="email" class="validate" autofocus required>
                        <label for="email">Email</label>

                    </div>
                </div>
               
                <div class="row">
                    <div class="input-field col s12">
                        <select class="browser-default">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                      
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" id="password" name="password" class="validate" autofocus required>
                        <label for="senha">Senha</label>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" id="password2" name="password2" class="validate" autofocus required>
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
