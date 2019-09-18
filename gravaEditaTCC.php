<?php

include("conecta.php");

$IdTCC=$_POST["fid"];
$tema = $_POST["tema"];
$aluno_1 = $_POST["aluno-1"];
$aluno_2 = $_POST["aluno-2"];
$orientador = $_POST["orientador"];
$co_orientador = $_POST["coorientador"];
$data_inicio = $_POST["dataInicio"];
$data_final = $_POST["dataFim"];
$resumo = $_POST["resumo"];
$area = $_POST["area"];
$titulo=$_POST["titulo"];

mysqli_query($conexao,"DELETE FROM advisortermpaper WHERE TermPaperId='$IdTCC'");
mysqli_query($conexao, "UPDATE student SET TermPaperId=NULL WHERE student.TermPaperId = '$IdTCC'");

if($aluno_2==null){
    mysqli_query($conexao,"UPDATE student SET TermPaperId = '$IdTCC' 
    WHERE IdStudent='$aluno_1'");
}else {
   mysqli_query($conexao,"UPDATE student SET TermPaperId='$IdTCC' 
   WHERE IdStudent='$aluno_1'");
   mysqli_query($conexao,"UPDATE student SET TermPaperId='$IdTCC' 
   WHERE IdStudent='$aluno_2'");
}

if ($co_orientador==null) {
    mysqli_query($conexao,"INSERT INTO advisortermpaper(AdvisorId, TermPaperId,AdvisorType)
    VALUES('$orientador','$IdTCC','Orientador')");
 } else {
    mysqli_query($conexao,"INSERT INTO advisortermpaper(AdvisorId, TermPaperId,AdvisorType)
    VALUES('$orientador','$IdTCC','Orientador')");
    mysqli_query($conexao,"INSERT INTO advisortermpaper(AdvisorId, TermPaperId,AdvisorType)
    VALUES('$co_orientador','$IdTCC','Co-orientador')");
 }
 
 mysqli_query($conexao,"UPDATE termpaper SET Title='$titulo',
Summary='$resumo', StartDate='$data_inicio',EndDate='$data_final',
AreaId='$area' Where IdTermPaper='$IdTCC'");
 header("location:listagemTCC.php");

?>