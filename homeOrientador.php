<!DOCTYPE html>
<html>


<body>    
    <?php 
		$cabecalho_title = "Home Orientador";
		include("cabecalhoOrientador.php"); 
        include("conecta.php");
        session_start();
        $id_user = $_SESSION['name_session'];
        if(isset($_SESSION['name_session'])){
            ?>
            <div class="container">
            <?php  
           
            $orientador=mysqli_query($conexao,"SELECT NameAdvisor FROM advisor
            WHERE '$id_user' = UserId"); 
            $nome_orientador=mysqli_fetch_array($orientador);?>
            <h5><strong><?=$nome_orientador['NameAdvisor']?></strong>, seja bem vindo!!<h5>
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
