<?php 
    include("conecta.php");

    $recemail = $_POST['email'];
    $recsenha = $_POST['password'];
    $sql =  "select * from users where Email ='$recemail' limit 1";
    $result_sql = mysqli_query($conexao, $sql);
    $result_sql2=$result_sql;
    $hashPassword=mysqli_fetch_array($result_sql2);
    $rows = mysqli_num_rows($result_sql);
    
    if ($rows == ''){
        ?>

<?php 
       echo "<script> alert('Erro: e-mail e/ou senha incorretos!!');</script>";
       header("Location:Index.php"); 
        ?>
<?php
    }else{
        $confirmacao_senha=password_verify($recsenha,$hashPassword['Password']);
        $senha_confirmada=0;
        if($confirmacao_senha==true){
            $senha_confirmada=1;
        }
        // var_dump($confirmacao_senha);
        // var_dump($rows);
        if($rows==1) {
          
            // echo "teste";
               if($senha_confirmada==1) {
                $dados2=mysqli_fetch_array($result_sql2);
                  echo $senha_confirmada;
                  var_dump($hashPassword['TypeUsers']);
                  var_dump($dados2['TypeUsers']);
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
               
        }
        

    
    }
    // header("Location:Index.php");
 
?>
