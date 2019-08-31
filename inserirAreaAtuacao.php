<?php

include("conecta.php");


$nome = $_POST['nome'];


mysqli_query($conexao,"insert into area(NameArea) values('$nome')");
 
header('Location:listagemAreaAtuacao.php');

?>
