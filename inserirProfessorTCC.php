<?php

include("conecta.php");


$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['password'];

mysqli_query($conexao,"insert into termpaperteacher(NameTermPaperTeacher, Email, Password) values('$nome','$email','$senha')");
 
header('Location:listagemProfessorTCC.php');

?>
