<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
   
    

    <script type="text/jscript" src="script.js"></script>
   
</head>

<body>
    <?php 
		$cabecalho_title = "Formularios de Acompanhamento";
        include("cabecalho.php"); 
     
		?>

    
 <div class="container" alingn="center">
<?php
include("conecta.php");
$id_tcc=$_GET['id'];
 //var_dump($id_tcc);
$dados = mysqli_query($conexao, "SELECT t.Title as titulo, f.Observation as observacao,
f.Topic as assuntos, f.MeetingDate as dataReuniao, f.IdFormTermPaper as id
 FROM termpaper t INNER JOIN
formtermpaper f WHERE  f.TermPaperId='$id_tcc' AND t.IdTermPaper=f.TermPaperId ORDER BY dataReuniao");

while ($formulario = mysqli_fetch_array($dados)){?>
    
    <?php
             include("conecta.php");
             $idAtual=$id_tcc;
             $tipoOrientacao="Advisor";
             $dadosAdvisor = mysqli_query($conexao, "SELECT t.IdTermPaper as id_tcc, 
             a.NameAdvisor as orientador, atp.AdvisorType 
             as tipo_orientador,atp.TermpaperId
             as tcc_id FROM termpaper t
             INNER JOIN  advisortermpaper atp
             INNER JOIN advisor a
             WHERE '$idAtual'=atp.TermPaperId
             AND a.IdAdvisor=atp.AdvisorId 
            AND atp.AdvisorType='$tipoOrientacao'");
             $aux=mysqli_fetch_array($dadosAdvisor);
             $orientador=$aux["orientador"];
             
           ?>
           <?php
             include("conecta.php");
             $idAtual=$id_tcc;
             $tipoOrientacao="CoAdvisor";
             $dadosCoAdvisor = mysqli_query($conexao, "SELECT t.IdTermPaper as id_tcc, 
             a.NameAdvisor as orientador, atp.AdvisorType 
             as tipo_orientador,atp.TermpaperId
             as tcc_id FROM termpaper t
             INNER JOIN  advisortermpaper atp
             INNER JOIN advisor a
             WHERE '$idAtual'=atp.TermPaperId
             AND a.IdAdvisor=atp.AdvisorId 
            AND atp.AdvisorType='$tipoOrientacao'");
             $aux2=mysqli_fetch_array($dadosCoAdvisor);
             $co_orientador=$aux2["orientador"];
             
           ?>
            <?php
             include("conecta.php");
             $idAtual=$id_tcc;
             $tipoAluno="FirstStudent";
             $dadosFirstStudent = mysqli_query($conexao, "SELECT t.IdTermPaper as id_tcc, 
             s.NameStudent as nome_aluno, stp.StudentType 
             as tipo_aluno,stp.TermPaperId
             as tcc_id FROM termpaper t
             INNER JOIN  studenttermpaper stp
             INNER JOIN student s
             WHERE '$idAtual'=stp.TermPaperId
             AND s.IdStudent=stp.StudentId 
            AND stp.StudentType='$tipoAluno'");
            $aux3=mysqli_fetch_array($dadosFirstStudent);
            $primeiro_aluno=$aux3["nome_aluno"];
             
           ?>
            <?php
             include("conecta.php");
             $idAtual=$id_tcc;
             $tipoAluno="SecondStudent";
             $dadosSecondStudent = mysqli_query($conexao, "SELECT t.IdTermPaper as id_tcc, 
             s.NameStudent as nome_aluno, stp.StudentType 
             as tipo_aluno,stp.TermPaperId
             as tcc_id FROM termpaper t
             INNER JOIN  studenttermpaper stp
             INNER JOIN student s
             WHERE '$idAtual'=stp.TermPaperId
             AND s.IdStudent=stp.StudentId 
            AND stp.StudentType='$tipoAluno'");
             $aux4=mysqli_fetch_array($dadosSecondStudent);
             $segundo_aluno=$aux4["nome_aluno"];
             
           ?>
       <div class="container">
       <form action="" method="post">
       <fieldset>
            <h5>
                Declaração
            </h5>
            <p>
                <strong>
                Data da Reunião: 
                </strong>
                <?=$formulario["dataReuniao"]?>

            </p>
            <p><strong>Orientador: </strong>
            <?=$orientador?></p>
            <p>
            <p>
                <strong>Co-Orientador: </strong>
                <?=$co_orientador?></p>
            <p>
            <p>
                <strong>Aluno: </strong>
                <?=$primeiro_aluno?></p>
            <p>
            <p>
                <strong>Aluno: </strong>
                <?=$segundo_aluno?></p>
            <p>
            <strong>
                Assuntos Abordados:  
                </strong><br>
                <?=$formulario["assuntos"]?>
            </p>
            <p>
            <strong>
                Observações:  
                </strong><br>
                <?=$formulario["observacao"]?>
            </p>
            <div class="container">
            <button class= "btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar">
                <a href="editarFormularioAcompanhamento.php?editaid=<?=$formulario['id']?>">edit</a>
            </button>
            <button class= "btn" style="background-color: #00e676" type="submit" name="Cadastrar" value="Cadastrar">
            <a onclick="excluirFormularioAcompanhamento(<?=$formulario['id']?>)">delete</a>
            </button>
    </div>
       </fieldset>
       </form>
      </div>
        <?php } ?>
    </div>
    <?php include("rodape.php"); ?>
</body>
</html>
