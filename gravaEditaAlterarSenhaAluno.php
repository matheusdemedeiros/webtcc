<?php 
    include("conecta.php");
    
    $idAluno = $_POST['id'];
    $id_user =$_POST['user_id'];
    $senha = $_POST['password'];
    $nova_senha=$_POST['password2'];


    $userData=mysqli_query($conexao,"SELECT * FROM users WHERE IdUser='$id_user'");

    $id_usuario=mysqli_fetch_array($userData);
   
    $confirmacao_senha=password_verify($senha,$id_usuario['Password']);
   
    if($confirmacao_senha==true){
        $id=mysqli_query($conexao,"Select * from student where IdStudent='$idAluno'");
        $user_id=mysqli_fetch_array($id);
        
        $options = array("cost"=>4);
        $hashPassword = password_hash($nova_senha,PASSWORD_BCRYPT,$options);

        
        mysqli_query($conexao,"update users 
        set Password='$hashPassword' where IdUser='$user_id[UserId]'");
        header("location:listagemTCCAlunos.php");
    }else{
        echo "<script>alert('Senha Atual incorreta!');</script>";
        echo "<script>window.location='alterarSenhaAluno.php';</script>";
    }

    
?>
