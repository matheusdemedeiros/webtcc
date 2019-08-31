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
		$cabecalho_title = "Cadastro Professor de TCC";
		include("cabecalho.php");
        include("conecta.php");
        $recid = $_GET['editaid'];
        $seleciona = mysqli_query($conexao, "SELECT * FROM termpaperteacher WHERE IdTermPaperTeacher = '$recid'");
        $campo = mysqli_fetch_array($seleciona);
		?>
    <div class="container">
        <form class="container" name="formuser" action="gravaEditaProfessorTCC.php" method="POST">

            <fieldset class="container">
                <h5>Edição de aluno</h5>
                <input type="hidden" name="fid" value="<?=$campo["IdTermPaperTeacher"]?>">

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="nome" name="nome"  autofocus required value="<?=$campo["NameTermPaperTeacher"]?>">
                        <label for="nome">Nome completo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">

                        <input type="email" id="email" name="email"  autofocus required value="<?=$campo["Email"]?>">
                        <label for="email">Email</label>
                    </div>
                </div>
               
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" id="password" name="password"  autofocus required value="<?=$campo["Password"]?>">
                        <label for="password">Senha</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" id="password2" name="password2"  autofocus required>
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
