<?php

include("conecta.php");


$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula = $_POST['registration'];
$senha = $_POST['password'];

mysqli_query($conexao,"insert into student(NameStudent, Registration ,Email, Password) values('$nome', '$matricula','$email','$senha')");
 
header('Location:listagemAlunos.php');

?>
