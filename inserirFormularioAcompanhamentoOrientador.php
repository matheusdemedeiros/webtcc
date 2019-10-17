<?php
include("conecta.php");
$id=$_POST["id"];
$dataReuniao=$_POST["dataReuniao"];
$assuntos=$_POST["assuntosAbordados"];
$observacao=$_POST["observacoes"];
mysqli_query($conexao, "INSERT INTO formtermpaper(Topic, Observation, TermPaperId, MeetingDate)
VALUES('$assuntos','$observacao','$id','$dataReuniao')");
//"listagemFormulariosAcompanhamento.php?id=$id";
header('Location:listagemTCCOrientador.php');
?>
