<?php
    include("conecta.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $curso = $_POST['curso'];
    $matricula=$_POST['matricula'];

    mysqli_query($conexao,
    "insert into termpaperteacher(NameTermPaperTeacher, 
    Email, Password,CourseId,Siape) values('$nome','$email','$senha',
    '$curso','$matricula')");
 
    header('Location:listagemProfessorTCC.php');
?>
