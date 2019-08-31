<?php

include("conecta.php");


$nome = $_POST['nome'];
$email = $_POST['email'];
$area_atuacao = $_POST['area_atuacao'];
$senha = $_POST['password'];





mysqli_query($conexao,"insert into advisor(NameAdviso, OccupationArea ,Email, Password) values('$nome', '$area_atuacao','$email','$senha')");
 
header('Location:listagemOrientadores.php');

?>
