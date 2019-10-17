<?php 
    include("conecta.php");

    $recemail = $_POST['email'];
    $recsenha = $_POST['password'];
    $sql =  "select * from users where Email ='$recemail' and Password = '$recsenha' limit 1";
    $result_sql = mysqli_query($conexao, $sql);
    $rows = mysqli_num_rows($result_sql);

    if ($rows == ''){
        ?>
          
        <?php 
       echo "<script> alert('Erro: e-mail e/ou senha incorretos!!');</script>";
       header("Location:Index.php"); 
        ?>
        <?php
    }else{
         while($dados=mysqli_fetch_assoc($result_sql)){
             session_start();
            
            switch ($dados['TypeUsers']) {
                case "TermPaperTeacher":
                $_SESSION['name_session'] = $dados['IdUser'];
                header("Location:listagemTCC.php");
                    break;
                case "Student":
                $_SESSION['name_session'] = $dados['IdUser'];
                header("Location:listagemTCCAlunos.php");
                    break;
                case "Advisor":
                $_SESSION['name_session'] = $dados['IdUser'];    
                header("Location:listagemTCCOrientador.php");
                break;
            }
             
         }

    
    }
    // header("Location:Index.php");
 
?>
