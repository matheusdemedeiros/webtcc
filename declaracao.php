<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
    

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
$dados = mysqli_query($conexao, "SELECT t.Title as titulo,t.StartDate as dataInicio, t.EndDate as
dataFim FROM termpaper t WHERE  t.IdTermPaper='$id_tcc'");

while ($formulario = mysqli_fetch_array($dados)){?>
    
    <?php
             include("conecta.php");
             $idAtual=$id_tcc;
             $tipoOrientacao="Advisor";
             $dadosAdvisor = mysqli_query($conexao, "SELECT t.IdTermPaper as id_tcc, 
             a.NameAdvisor as orientador, atp.AdvisorType 
             as tipo_orientador,atp.TermpaperId
             as tcc_id, a.Siapei as siapei FROM termpaper t
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
             as tcc_id,a.Siapei as siapei  FROM termpaper t
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
       
       <fieldset>
       
            <h5>
                Declaração
            </h5>
            <p>Declaramos que <strong> <?=$orientador?></strong>, Professor do Ensino
                Básico, Técnico e Tecnológico, Matrícula SIAPE nº <strong><?=$aux["siapei"]?></strong>,
                orientou Projeto Integrador no curso
                de Técnico em Informática, modalidade concomitante, 
                ofertado no Câmpus Lages (SC), conforme
                informações abaixo.</p>
           
           <p>
           Título do Trabalho de Conclusão: <strong><?=$formulario["titulo"]?></strong>
           </p>
           <p>
                Aluno: 
                <strong><?=$primeiro_aluno?></strong>
            </p>
            <p>
                Aluno: 
                <strong><?=$segundo_aluno?></strong>
            </p>
            <p>
            Periodo de Execução: 
            <?php $dataInicio=date("d/m/Y", strtotime($formulario["dataInicio"]))?>
            <?php $dataFim=date("d/m/Y", strtotime($formulario["dataFim"]))?>
                <strong>
                <?=$dataInicio?> 
                até <?=$dataFim?>
                </strong>
            </p>
            <?php
                    $meses = array(
                        '01'=>'Janeiro',
                        '02'=>'Fevereiro',
                        '03'=>'Março',
                        '04'=>'Abril',
                        '05'=>'Maio',
                        '06'=>'Junho',
                        '07'=>'Julho',
                        '08'=>'Agosto',
                        '09'=>'Setembro',
                        '10'=>'Outubro',
                        '11'=>'Novembro',
                        '12'=>'Dezembro'
                                        )
                    
            ?>
             <?php $dataAtual =date("d/m/Y")?>
            <?php
                $data = $dataAtual;
                $partes = explode("/", $data);
                $dia = $partes[0];
                $mes = $partes[1];
                $ano = $partes[2];
            
            ?>

           
           <p>Lages(SC), <?=$dia?> de <?= $meses[date('m')]?> de <?=$ano?></p>
           <div class ="row">
                <div class="input-field col s6">
                <p>Prof. <?=$orientador?> <br>Professor  do Trabalho 
                    de Conclusão de Curso <br>MatrículaSIAPE nº <?=$aux["siapei"]?>.</p>
                </div>
                <div class="input-field col s6">
                <p>Prof. <?=$orientador?> <br>Professor  do Trabalho 
                    de Conclusão de Curso <br>MatrículaSIAPE nº <?=$aux["siapei"]?>.</p>
                </div>
           </div>
           
       </fieldset>
     
      </div>
        <?php } ?>
    </div>
    <?php include("rodape.php"); ?>
</body>
</html>
