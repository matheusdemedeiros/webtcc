<?php 
    include("conecta.php");

    $recemail = $_POST['email'];
    $recsenha = $_POST['password'];
    $sql =  "select * from student where Email ='$recemail' and Password = '$recsenha' limit 1";
    $result_sql = mysqli_query($conexao, $sql);
    $rows = mysqli_num_rows($result_sql);

    if ($rows == ''){
        ?>
        <script>alert("Erro: e-mail e/ou senha incorretos!!");</script>
        <?php
    }else{
         while($dados=mysqli_fetch_assoc($result_sql)){
             session_start();
             $_SESSION['name_session'] = $dados['NameStudent'];
             
         }

        header("Location:home.php");
    }
 
?>
