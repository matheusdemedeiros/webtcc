<!DOCTYPE html>
<html>


<body>
<?php
$cabecalho_title = "Home Aluno";
include("cabecalhoAluno.php"); 
 ?>
    <?php 
		
        include("conecta.php");
        session_start();
        $id_user = $_SESSION['name_session'];
        if(isset($_SESSION['name_session'])){
            ?>
            <div class="container">
            <?php  
           
            $aluno=mysqli_query($conexao,"SELECT NameStudent FROM student
            WHERE '$id_user' = UserId"); 
            $nome_aluno=mysqli_fetch_array($aluno);?>
            <h5><strong><?=$nome_aluno['NameStudent']?></strong>, seja bem vindo!!<h5>
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
