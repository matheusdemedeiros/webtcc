<?php

include("conecta.php");


$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula = $_POST['registration'];
$senha = $_POST['password'];
$curso = $_POST['curso'];
$tipo_usuario="Student";

$options = array("cost"=>4);
$hashPassword = password_hash($senha,PASSWORD_BCRYPT,$options);

mysqli_query($conexao,"insert into users(Email,Password, TypeUsers) values ('$email','$hashPassword','$tipo_usuario')");
$id=mysqli_query($conexao,"Select * from users where Email='$email'");
$id_users=mysqli_fetch_array($id);
// var_dump($id_users);
mysqli_query($conexao,"insert into student(NameStudent, Registration ,CourseId,UserId) 
VALUES ('$nome', '$matricula','$curso','$id_users[IdUser]')");
 
header('Location:listagemAlunos.php');

?>
