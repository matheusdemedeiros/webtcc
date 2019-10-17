<?php

include("conecta.php");


$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula = $_POST['registration'];
$senha = $_POST['password'];
$curso = $_POST['curso'];
$tipo_usuario="Student";
mysqli_query($conexao,"insert into users(Email,Password, TypeUsers) values ('$email','$senha','$tipo_usuario')");
$id=mysqli_query($conexao,"Select * from users where Email='$email' and Password='$senha'");
$id_users=mysqli_fetch_array($id);
// var_dump($id_users);
mysqli_query($conexao,"insert into student(NameStudent, Registration ,CourseId,UserId) 
VALUES ('$nome', '$matricula','$curso','$id_users[IdUser]')");
 
header('Location:listagemAlunos.php');

?>
