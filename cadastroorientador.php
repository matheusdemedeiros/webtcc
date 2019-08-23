<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pagina de Cadastro</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type ="text/javascript">
        function validar(){
            var senha = formuser.password.value;
            var confirmarsenha= formuser.password2.value;
            if(senha == "" || senha.length <=5){
                alert('prencha o campo com no mínimo 6 caracteres');
                formuser.password.focus();
                return false;
            }
            if(confirmarsenha == "" || confirmarsenha.length <=5){
                alert('prencha o campo com no mínimo 6 caracteres');
                formuser.password2.focus();
                return false;
            }

            if(senha!=confirmarsenha){
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
        <form name="formuser" method="POST">

            <fieldset>
                <legend>Cadastro Orientador</legend>
                <label for="nome">Nome completo</label>
                <div>

                    <input type="text" id="nome" name="nome" autofocus required>
                </div>
                <label for="area_atuacao">Área de Atuação</label>
                <div>

                    <input type="text" id="area_atuacao" name="area_atuacao" autofocus required>
                </div>
                <label for="email">Email</label>
                <div>

                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="email" id="email" name="email" autofocus required>
                    </div>
                </div>
                <label for="senha">Senha</label>
                <div>

                    <input type="password" id="password" name="password" autofocus required>
                </div>
                <label for="senha2">Confirmar Senha</label>
                <div>

                    <input type="password2" id="password2" name="password2" autofocus required>
                </div>

                
                <div>
                    <label for="numero_vagas">Numero de Vagas</label>
                    <select name="tipo_usuario">
                        <option value=""></option>
                        <option value="1">0</option>
                        <option value="2">1</option>
                        <option value="2">2</option>
                        <option value="2">3</option>
                        <option value="2">4</option>
                        <option value="2">5</option>
                    </select>
                </div>

                <input type="submit" name="Cadastrar" value="Cadastrar" onclick="return validar()" />
            </fieldset>

        </form>
    </div>




    <!--    <?php include("rodape.php"); ?>-->
</body>

</html>
