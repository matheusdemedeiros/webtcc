<?php 
    include("conecta.php");
    
    $id_aluno=$_GET["idexc"];

    $id=mysqli_query($conexao, "SELECT * FROM student WHERE IdStudent = '$id_aluno'");
    $id_user=mysqli_fetch_array($id);
   
    $confere=mysqli_query($conexao, "SELECT * FROM student INNER JOIN studenttermpaper
    WHERE IdStudent = '$id_aluno' AND StudentId='$id_aluno'");
    $aluno=mysqli_fetch_array($confere);
    //var_dump($confere);
    if($aluno==NULL){
        mysqli_query($conexao, "DELETE FROM student WHERE IdStudent = '$id_aluno'");
        mysqli_query($conexao, "DELETE FROM users WHERE IdUser = '$id_user[UserId]'");
        // echo "<script>alert('Cadastro excluido com sucesso!');</script>";
        // echo "<script>window.location='listagemAlunos.php';</script>";
        header("location:listagemAlunos.php?remove=1");
       
    }else{
        // echo "<script>alert('Esta área de atuação não pode ser excluida pois está associada a outros registros!');</script>";
        // echo "<script>window.location='listagemAlunos.php';</script>";
        header("location:listagemAlunos.php?remove=0");
    }
  
    
    

?>
