<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
   

</head>

<body>
    <?php 
		$cabecalho_title = "Página Inicial";
		include("cabecalho.php"); 
		?>
    <div class="container">

        <form class="container" action="validaLogin.php" method="POST">
            <fieldset class="container">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" name="email" value="" class="validate" autofocus required />
                        <label for="login">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" name="password" value="" class="validate" autofocus required />
                        <label for="senha">Senha</label>
                    </div>
                </div>
                <div class="row">
                    <input class="btn" style="background-color: #00e676" type="submit" name="enviar" value="Login" />
                    
                </div>
            </fieldset>
        </form>
    </div>


    <?php include("rodape.php"); ?>

</body>

</html>
