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

if ($data_inicio >= $data_final) {
   
   header('Location:editarTCCAluno.php?aluno=3');
} if ($orientador == $co_orientador) {
   
   header('Location:editarTCCAluno.php?aluno=2');
} 
if ($aluno_1 == $aluno_2) {
   header("Location:editarTCCAluno.php?aluno=1");
   
} 

mysqli_query($conexao,"DELETE FROM advisortermpaper WHERE TermPaperId='$IdTCC'");
mysqli_query($conexao, "DELETE FROM studenttermpaper WHERE TermPaperId = '$IdTCC'");





if($aluno_2==null){
  
   $primeiro_aluno="FistStudent";
   mysqli_query($conexao,"INSERT INTO studenttermpaper(StudentId,TermPaperId,StudentType)
   VALUES('$aluno_1','$IdTCC','$primeiro_aluno')");
}else {
  
         $primeiro_aluno="FirstStudent";
         mysqli_query($conexao,"INSERT INTO studenttermpaper(StudentId,TermPaperId,StudentType)
         VALUES('$aluno_1','$IdTCC','$primeiro_aluno')");
         $segundo_aluno="SecondStudent";
         mysqli_query($conexao,"INSERT INTO studenttermpaper(StudentId,TermPaperId,StudentType)
         VALUES('$aluno_2','$IdTCC','$segundo_aluno')");
}

if ($co_orientador==null) {
    mysqli_query($conexao,"INSERT INTO advisortermpaper(AdvisorId, TermPaperId,AdvisorType)
    VALUES('$orientador','$IdTCC','Advisor')");
 } else {
    mysqli_query($conexao,"INSERT INTO advisortermpaper(AdvisorId, TermPaperId,AdvisorType)
    VALUES('$orientador','$IdTCC','Advisor')");
    mysqli_query($conexao,"INSERT INTO advisortermpaper(AdvisorId, TermPaperId,AdvisorType)
    VALUES('$co_orientador','$IdTCC','CoAdvisor')");
 }
 
mysqli_query($conexao,"UPDATE termpaper SET Title='$titulo',
Summary='$resumo', StartDate='$data_inicio',EndDate='$data_final',
AreaId='$area' Where IdTermPaper='$IdTCC'");
//header("location:listagemTCCAlunos.php");
echo "<script>location.window=editarTCC.php</script>";
?>