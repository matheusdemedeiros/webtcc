<?php 
    include("conecta.php");

    $recemail = $_POST['email'];
    $recsenha = $_POST['password'];
    $sql =  "select * from users where Email ='$recemail' limit 1";
    $result_sql = mysqli_query($conexao, $sql);
    $result_sql2=$result_sql;
    $userData=mysqli_fetch_array($result_sql2);
    $rows = mysqli_num_rows($result_sql);
    
    if ($rows == ''){
        ?>

<?php 
       echo "<script> alert('Erro: e-mail e/ou senha incorretos!!');</script>";
      echo "<script> window.location='Index.php';</script>";
      
       //header("Location:Index.php"); 
        ?>
<?php
    }else{
        $confirmacao_senha=password_verify($recsenha,$userData['Password']);
        $senha_confirmada=0;
        if($confirmacao_senha==true){
            $senha_confirmada=1;
        }else{
            echo "<script> alert('Erro: e-mail e/ou senha incorretos!!');</script>";
            echo "<script> window.location='Index.php';</script>";
        }
      
        if($rows==1) {
          
            // echo "teste";
               if($senha_confirmada==1) {
               
                 
                   while($userData){
                    session_start();
                   
                            switch ($userData['TypeUsers']) {
                                
                                case "TermPaperTeacher":
                                $_SESSION['name_session'] = $userData['IdUser'];
                                header("Location:listagemTCC.php");
                                break;
                                case "Student":
                                $_SESSION['name_session'] = $userData['IdUser'];
                                header("Location:listagemTCCAlunos.php");
                                break;
                                case "Advisor":
                                $_SESSION['name_session'] = $userData['IdUser'];    
                                header("Location:listagemTCCOrientador.php");
                                break;
                            }
                    
                }
                          
               }
               
        }
        

    
    }
    // header("Location:Index.php");
 
?>
