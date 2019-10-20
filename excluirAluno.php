<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];

    $id=mysqli_query($conexao, "SELECT * FROM student WHERE IdStudent = '$recid'");
    $id_user=mysqli_fetch_array($id);
   
//    $confere=mysqli_query($conexao, "SELECT * FROM student INNER JOIN studenttermpaper
//     WHERE IdStudent = '$recid' AND StudentId='$recid'");
//     var_dump($confere);
    
    mysqli_query($conexao, "DELETE FROM student WHERE IdStudent = '$recid'");
    mysqli_query($conexao, "DELETE FROM users WHERE IdUser = '$id_user[UserId]'");
    
    header("location:listagemAlunos.php");

?>
