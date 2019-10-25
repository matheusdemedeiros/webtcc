<?php

include("conecta.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$area_atuacao = $_POST['area_atuacao'];
$senha = $_POST['password'];
$matricula=$_POST["matricula"];
$tipo_usuario="Advisor";

$confere_email=mysqli_query($conexao, "SELECT * FROM users WHERE Email='$email'");
$email_conferido=mysqli_fetch_array($confere_email);
if($email_conferido != NULL){
    header('location:cadastroorientador.php?orientador=0');
}else{
$options = array("cost"=>4);
$hashPassword = password_hash($senha,PASSWORD_BCRYPT,$options);

mysqli_query($conexao,"insert into users(Email,Password, TypeUsers) values 
('$email','$hashPassword','$tipo_usuario')");
$id=mysqli_query($conexao,"Select * from users where Email='$email'");
$id_users=mysqli_fetch_array($id);

mysqli_query($conexao,"insert into advisor(NameAdvisor, OccupationArea ,Siapei,UserId) 
values('$nome', '$area_atuacao','$matricula','$id_users[IdUser]')");
 
header('Location:listagemOrientadores.php');
}
?>
