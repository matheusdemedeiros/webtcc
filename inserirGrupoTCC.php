<?php
    include("conecta.php");

   
    $aluno_1 = $_POST["aluno-1"];
    $aluno_2 = $_POST["aluno-2"];
    $orientador = $_POST["orientador"];
    $co_orientador = $_POST["coorientador"];
    $data_inicio = $_POST["dataInicio"];
    $data_final = $_POST["dataFim"];
    $resumo = $_POST["resumo"];
    $area = $_POST["area"];
    $titulo=$_POST["titulo"];
    if($data_inicio>=$data_final){
        header('Location:cadastrarGrupoTCC.php?aluno=3');
    }else{
        if($orientador==$co_orientador){
            header('Location:cadastrarGrupoTCC.php?aluno=2');
        }else{
            if($aluno_1=$aluno_2){
                header('Location:cadastrarGrupoTCC.php?aluno=1');
            }else{
                $confere_aluno_1=mysqli_query($conexao,"SELECT * FROM studenttermpaper WHERE StudentId='$aluno_1'");
                $aluno_1_conferido=mysqli_fetch_array($confere_aluno_1);
                $confere_aluno_2=mysqli_query($conexao,"SELECT * FROM studenttermpaper WHERE StudentId='$aluno_2'");
                $aluno_2_conferido=mysqli_fetch_array($confere_aluno_2);
                
                 if($aluno_2==null){
                    if($aluno_1_conferido==NULL){
                        mysqli_query($conexao,"insert into termpaper(Title,StartDate, EndDate,AreaId,Summary) 
                        values('$titulo','$data_inicio','$data_final','$area','$resumo')");
                        $dados= mysqli_query($conexao,"SELECT * FROM termpaper WHERE '$titulo'=Title
                        AND '$resumo'=Summary");
                        $IdTCC = mysqli_fetch_array($dados);
            
                       $primeiro_aluno="FirstStudent";
                       mysqli_query($conexao,"INSERT INTO studenttermpaper(StudentId,TermPaperId,StudentType)
                       VALUES('$aluno_1','$IdTCC[IdTermPaper]','$primeiro_aluno')");
                      
                    }else{
                        header('Location:cadastrarGrupoTCC.php?aluno=0');
                    }
                     
                 }else {
                    if($aluno_1_conferido==NULL && $aluno_2_conferido==NULL){
                        mysqli_query($conexao,"insert into termpaper(Title,StartDate, EndDate,AreaId,Summary) 
                        values('$titulo','$data_inicio','$data_final','$area','$resumo')");
                        $dados= mysqli_query($conexao,"SELECT * FROM termpaper WHERE '$titulo'=Title
                        AND '$resumo'=Summary");
                        $IdTCC = mysqli_fetch_array($dados);
            
                        $primeiro_aluno="FirstStudent";
                        mysqli_query($conexao,"INSERT INTO studenttermpaper(StudentId,TermPaperId,StudentType)
                        VALUES('$aluno_1','$IdTCC[IdTermPaper]','$primeiro_aluno')");
                        $segundo_aluno="SecondStudent";
                        mysqli_query($conexao,"INSERT INTO studenttermpaper(StudentId,TermPaperId,StudentType)
                        VALUES('$aluno_2','$IdTCC[IdTermPaper]','$segundo_aluno')");
                    }else{
                        header('Location:cadastrarGrupoTCC.php?aluno=0');
                    }
                    
                 }
                 
                 if ($co_orientador==null) {
                    mysqli_query($conexao,"insert into advisortermpaper(AdvisorId, TermPaperId,AdvisorType)
                    values('$orientador','$IdTCC[IdTermPaper]','Advisor')");
                 } else {
                    mysqli_query($conexao,"insert into advisortermpaper(AdvisorId, TermPaperId,AdvisorType)
                    values('$orientador','$IdTCC[IdTermPaper]','Advisor')");
                    mysqli_query($conexao,"insert into advisortermpaper(AdvisorId, TermPaperId,AdvisorType)
                    values('$co_orientador','$IdTCC[IdTermPaper]','CoAdvisor')");
                    echo "<script>location.window='listagemTCC.php'</script>";
                 }
            }
        }
    }
   
?>