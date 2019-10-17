<?php
    include("conecta.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $curso = $_POST['curso'];
    $matricula=$_POST['matricula'];
    $tipo_usuario="TermPaperTeacher";

    mysqli_query($conexao,"insert into users(Email,Password, TypeUsers) values ('$email','$senha','$tipo_usuario')");
    $id=mysqli_query($conexao,"Select * from users where Email='$email' and Password='$senha'");
    $id_users=mysqli_fetch_array($id);

    mysqli_query($conexao,
    "insert into termpaperteacher(NameTermPaperTeacher, 
    CourseId,Siape,UserId) values('$nome',
    '$curso','$matricula','$id_users[IdUser]')");
 
    header('Location:listagemProfessorTCC.php');
?>
