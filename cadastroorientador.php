<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pagina de Cadastro</title>
    
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <?php 
		$cabecalho_title = "Cadastro Orientador";
		include("cabecalho.php"); 
		?>
    <div class="container">
        <form>

            <fieldset>
                <legend>Cadastro Orientador</legend>

                <div>
                    <label for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome" autofocus required>
                </div>

                <div>
                    <label for="area_atuacao">Área de Atuação</label>
                    <input type="text" id="area_atuacao" name="area_atuacao" autofocus required>
                </div>

                <div>
                    <label for="email">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="email" id="email" name="email" autofocus required>
                    </div>
                </div>

                <div>
                    <label for="senha">Senha</label>
                    <input type="password" id="password" name="password" autofocus required>
                </div>

                <div>
                    <label for="senha2">Confirmar Senha</label>
                    <input type="password2" id="password2" name="password2" autofocus required>
                </div>

                <label for="numero_vagas">Numero Vagas</label>
                <select name="tipo_usuario">
                    <option value="">Selecione</option>
                    <option value="1">0</option>
                    <option value="2">1</option>
                    <option value="2">2</option>
                    <option value="2">3</option>
                    <option value="2">4</option>
                    <option value="2">5</option>
                </select>
                <input type="submit" name="Cadastrar" value="Cadastrar" />
            </fieldset>

        </form>
    </div>




<!--    <?php include("rodape.php"); ?>-->
</body>

</html>
