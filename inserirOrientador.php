<?php

include("conecta.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$area_atuacao = $_POST['area_atuacao'];
$senha = $_POST['password'];

echo "Id_area: " . $area_atuacao;
echo "<br>Email: " . $email;
echo "<br>Nome: " . $nome;
echo "<br>Senha: " . $senha;

mysqli_query($conexao,"insert into advisor(NameAdvisor, OccupationArea ,Email, Password) 
values('$nome', '$area_atuacao','$email','$senha')");
 
header('Location:listagemOrientadores.php');

?>
