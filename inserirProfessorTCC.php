<?php
    include("conecta.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $curso = $_POST['curso'];

    mysqli_query($conexao,
    "insert into termpaperteacher(NameTermPaperTeacher, 
    Email, Password,CourseId) values('$nome','$email','$senha',
    '$curso')");
 
    header('Location:listagemProfessorTCC.php');
?>
