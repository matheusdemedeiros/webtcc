<?php

include("conecta.php");


$nome = $_POST['nome'];
$email = $_POST['email'];

$area_atuacao = $_POST['area_atuacao'];

/* $dados = mysqli_query($conexao, "SELECT * FROM area");
while ($areaOrientador = mysqli_fetch_array($dados)){
        if($area_atuacao == $areaOrientador["NameArea"]){
            $area=$areaOrientador["IdArea"];
            break;
        }
     }  */
$senha = $_POST['password'];


mysqli_query($conexao,"insert into advisor(NameAdvisor, OccupationArea ,Email, Password) values('$nome', '$area_atuacao','$email','$senha')");
 
header('Location:listagemOrientadores.php');

?>
