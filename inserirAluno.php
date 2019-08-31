<?php

include("conecta.php");


$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula = $_POST['registration'];
$senha = $_POST['password'];

//mysqli_query($conexao,"insert into aluno(nome, email,senha) values($aluno->getNome(),$aluno->getEmail(),$aluno->getSenha())");



mysqli_query($conexao,"insert into student(NameStudent, Registration ,Email, Password) values('$nome', '$matricula','$email','$senha')");
 
header('Location:listagemAlunos.php');
/*
echo $aluno->getNome();
echo $aluno->getEmail();
echo $aluno->getSenha();
*/

//list($nome, $email, $password) = $info;
// echo "$nome é o nome do aluno que tem esse email $email e essa senha: $password.\n";
?>
