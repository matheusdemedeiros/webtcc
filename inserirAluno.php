<?php
include("conecta.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula = $_POST['registration'];
$senha = $_POST['password'];
$curso = $_POST['curso'];
$tipo_usuario="Student";

$confere_email=mysqli_query($conexao, "SELECT * FROM users WHERE Email='$email'");
$email_conferido=mysqli_fetch_array($confere_email);
if($email_conferido != NULL){
    header('location:cadastroaluno.php?aluno=0');
}else{
    $options = array("cost"=>4);
    $hashPassword = password_hash($senha,PASSWORD_BCRYPT,$options);

    mysqli_query($conexao,"insert into users(Email,Password, TypeUsers) 
    values ('$email','$hashPassword','$tipo_usuario')");
    $id=mysqli_query($conexao,"Select * from users where Email='$email'");
    $id_users=mysqli_fetch_array($id);

    mysqli_query($conexao,"insert into student(NameStudent, Registration ,CourseId,UserId) 
    VALUES ('$nome', '$matricula','$curso','$id_users[IdUser]')");
    
    header('Location:listagemAlunos.php');
}

?>