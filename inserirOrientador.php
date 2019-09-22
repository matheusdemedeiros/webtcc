<?php

include("conecta.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$area_atuacao = $_POST['area_atuacao'];
$senha = $_POST['password'];
$matricula=$_POST["matricula"];

echo "Id_area: " . $area_atuacao;
echo "<br>Email: " . $email;
echo "<br>Nome: " . $nome;
echo "<br>Senha: " . $senha;

mysqli_query($conexao,"insert into advisor(NameAdvisor, OccupationArea ,Email, Password,Siapei) 
values('$nome', '$area_atuacao','$email','$senha','$matricula')");
 
header('Location:listagemOrientadores.php');

?>
