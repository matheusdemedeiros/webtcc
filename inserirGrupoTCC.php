<?php
    include("conecta.php");

    $tema = $_POST["tema"];
    $aluno_1 = $_POST["aluno-1"];
    $aluno_2 = $_POST["aluno-2"];
    $orientador = $_POST["orientador"];
    $co_orientador = $_POST["coorientador"];
    $data_inicio = $_POST["dataInicio"];
    $data_final = $_POST["dataFim"];
    $resumo = $_POST["resumo"];
    $area = $_POST["area"];
    
    mysqli_query($conexao,"insert into termpaper(StartDate, EndDate,AreaId,Topic,Summary) 
    values('$data_inicio','$data_final','$area','$tema','$resumo')");
    $dados= mysqli_query($conexao,"SELECT * FROM termpaper WHERE '$tema'=Topic
    AND '$resumo'=Summary");
    $IdTCC = mysqli_fetch_array($dados);
    
    
     if($aluno_2==null){
         mysqli_query($conexao,"update student set termPaperId = '$IdTCC[IdTermPaper]' 
         where IdStudent='$aluno_1'");
     }else {
        mysqli_query($conexao,"update student set termPaperId='$IdTCC[IdTermPaper]' 
        where IdStudent='$aluno_1'");
        mysqli_query($conexao,"update student set termPaperId='$IdTCC[IdTermPaper]' 
        where IdStudent='$aluno_2'");
     }
     
     if ($co_orientador==null) {
        mysqli_query($conexao,"insert into advisortermpaper(AdvisorId, TermPaperId,AdvisorType)
        values('$orientador','$IdTCC[IdTermPaper]','Orientador')");
     } else {
        mysqli_query($conexao,"insert into advisortermpaper(AdvisorId, TermPaperId,AdvisorType)
        values('$orientador','$IdTCC[IdTermPaper]','Orientador')");
        mysqli_query($conexao,"insert into advisortermpaper(AdvisorId, TermPaperId,AdvisorType)
        values('$co_orientador','$IdTCC[IdTermPaper]','Co-orientador')");
     }
    //  echo "Inicio: ".$data_inicio;
    //  echo "Fim: ".$data_final;
    //  echo  "Resumo: ".$resumo;
    //  echo "Area: ".$area;
    //  echo "Tema: ".$tema;
    //  echo "Aluno1: ".$aluno_1;
    // echo "Orientador: ".$orientador;

    header('Location:listagemTCC.php');
?>