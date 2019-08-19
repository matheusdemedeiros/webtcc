<?php

include("conecta.php");

//require_once "Usuario.php";
//require_once "Aluno.php";


//$aluno = new Aluno($_POST['email'], $_POST['password'] , $_POST['nome']);
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['password'];

//mysqli_query($conexao,"insert into aluno(nome, email,senha) values($aluno->getNome(),$aluno->getEmail(),$aluno->getSenha())");



mysqli_query($conexao,"insert into aluno(nome, email,senha) values('$nome', '$email','$senha')");
 
header('Location:listagemAlunos.php');
/*
echo $aluno->getNome();
echo $aluno->getEmail();
echo $aluno->getSenha();
*/

//list($nome, $email, $password) = $info;
// echo "$nome é o nome do aluno que tem esse email $email e essa senha: $password.\n";
?>
