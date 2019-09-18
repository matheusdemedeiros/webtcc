<?php
include("conecta.php");
$id=$_POST["id"];
$dataReuniao=$_POST["dataReuniao"];
$assuntos=$_POST["assuntosAbordados"];
$observacao=$_POST["observacoes"];
mysqli_query($conexao, "UPDATE formtermpaper SET Topic='$assuntos', 
Observation='$observacao',MeetingDate= '$dataReuniao' WHERE IdFormTermPaper='$id'");
header('Location:listagemFormulariosAcompanhamento.php');
?>