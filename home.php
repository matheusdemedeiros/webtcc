<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->

</head>

<body>
    <?php 
		$cabecalho_title = "Página Inicial";
        include("cabecalho.php");
        session_start();
        if(isset($_SESSION['name_session'])){
            ?>
            <div class="container">
            <h5><?php echo $_SESSION['name_session']?>, seja bem vindo!!<h5>
        </div>
        <?php
            
        }
	?>
  
    <div class ="container">
        <img src="img/ifsc-lages.jpg">
    </div>
    <?php include("rodape.php"); ?>

</body>

</html>
