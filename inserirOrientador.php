<?php

include("conecta.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$area_atuacao = $_POST['area_atuacao'];
$senha = $_POST['password'];
$matricula=$_POST["matricula"];
$tipo_usuario="Advisor";

echo "Id_area: " . $area_atuacao;
echo "<br>Email: " . $email;
echo "<br>Nome: " . $nome;
echo "<br>Senha: " . $senha;

mysqli_query($conexao,"insert into users(Email,Password, TypeUsers) values ('$email','$senha','$tipo_usuario')");
$id=mysqli_query($conexao,"Select * from users where Email='$email' and Password='$senha'");
$id_users=mysqli_fetch_array($id);

mysqli_query($conexao,"insert into advisor(NameAdvisor, OccupationArea ,Siapei,UserId) 
values('$nome', '$area_atuacao','$matricula','$id_users[IdUser]')");
 
header('Location:listagemOrientadores.php');

?>
