<?php

include("conecta.php");


$nome = $_POST['nome'];


mysqli_query($conexao,"insert into course(NameCourse) values('$nome')");
 
header('Location:listagemCurso.php');

?>
