<?php

include("conecta.php");


$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula = $_POST['registration'];
$senha = $_POST['password'];
$curso = $_POST['curso'];

mysqli_query($conexao,"insert into student(NameStudent, Registration ,Email, Password,CourseId) 
values('$nome', '$matricula','$email','$senha','$curso')");
 
header('Location:listagemAlunos.php');

?>
