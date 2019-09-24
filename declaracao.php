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
           <?php
             include("conecta.php");
             $idAtual=$id_tcc;
             $dadosCoordenador = mysqli_query($conexao, "SELECT 
             c.NameCourseCoordinator as nome_coordenador,
             c.SiapeCourseCoordinator as siape,
             NameCourse as curso
             FROM termpaper t
             INNER JOIN  course c
             INNER JOIN student s
             INNER JOIN studenttermpaper stp
             WHERE '$idAtual'=stp.TermPaperId
             AND t.IdTermPaper='$idAtual'
             AND s.CourseId=c.IdCourse");
             $coordenador=mysqli_fetch_array($dadosCoordenador);
            ?>
            <?php
             include("conecta.php");
             $idAtual=$id_tcc;
             $dadosProfessorTCC = mysqli_query($conexao, "SELECT 
             tp.NameTermPaperTeacher as professor_tcc,
             tp.Siape as siape
             FROM termpaper t
             INNER JOIN  course c
             INNER JOIN termpaperteacher tp
             INNER JOIN student s
             INNER JOIN studenttermpaper stp
             WHERE 
             t.IdTermPaper='$idAtual'
             AND tp.CourseId=c.IdCourse
             AND '$idAtual'=stp.TermPaperId
             AND s.CourseId=c.IdCourse");
             $professortcc=mysqli_fetch_array($dadosProfessorTCC);
            ?>
          
       <div class="container" alingn="center">
       
       <fieldset>
       <img src="img/Capturar.png">
            <h5>
                Declaração
            </h5>
            <p>Declaramos que <strong><?=$orientador?></strong>, Professor do Ensino
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
            <?php if($segundo_aluno!=NULL){?>
                <p>
                Aluno: 
                <strong><?=$segundo_aluno?></strong>
            </p>
            <?php } ?>
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
             <?php 
            $dataInicio=date("d/m/Y", strtotime($formulario["dataInicio"]));
            $dataFim=date("d/m/Y", strtotime($formulario["dataFim"]));
           
            $partes = explode("/", $dataInicio);
            $diaInicio = $partes[0];
            $mesInicio = $partes[1];
            $anoInicio = $partes[2];

            $partesFim = explode("/", $dataFim);
            $diaFim = $partesFim[0];
            $mesFim = $partesFim[1];
            $anoFim = $partesFim[2];
            
            ?>
            <p>
            Periodo de Execução: 
                <strong>
                <?=$mesInicio?> de <?=$anoInicio?>
                até <?=$mesFim?> de <?=$anoFim?>
                </strong>
            </p> 
           <p>Lages(SC), <?=$dia?> de <?= $meses[date('m')]?> de <?=$ano?></p>

           <div class ="row">
                <div class="input-field col s6">
                <p>Prof. <?=$coordenador["nome_coordenador"]?> <br>Coord. do Curso de <?=$coordenador["curso"]?>
                <br>Matrícula SIAPE nº <?=$coordenador["siape"]?>.</p>
                </div>
                <div class="input-field col s6">
                <p>Prof. <?=$professortcc["professor_tcc"]?> <br>Professor  do Trabalho 
                    de Conclusão de Curso <br>Matrícula SIAPE nº <?=$professortcc["siape"]?>.</p>
                </div>
           </div>
           
       </fieldset>
     
      </div>
        <?php } ?>
    </div>

   <?php if($co_orientador!=NULL){?>
    <div class="container" alingn="center">
            <?php
                include("conecta.php");

                $dados = mysqli_query($conexao, "SELECT t.Title as titulo,t.StartDate as dataInicio, t.EndDate as
                dataFim FROM termpaper t WHERE  t.IdTermPaper='$id_tcc'");

            while ($formulario = mysqli_fetch_array($dados)){?>
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
           <?php
             include("conecta.php");
             $idAtual=$id_tcc;
             $dadosCoordenador = mysqli_query($conexao, "SELECT 
             c.NameCourseCoordinator as nome_coordenador,
             c.SiapeCourseCoordinator as siape,
             NameCourse as curso
             FROM termpaper t
             INNER JOIN  course c
             INNER JOIN student s
             INNER JOIN studenttermpaper stp
             WHERE '$idAtual'=stp.TermPaperId
             AND t.IdTermPaper='$idAtual'
             AND s.CourseId=c.IdCourse");
             $coordenador=mysqli_fetch_array($dadosCoordenador);
            ?>
            <?php
             include("conecta.php");
             $idAtual=$id_tcc;
             $dadosProfessorTCC = mysqli_query($conexao, "SELECT 
             tp.NameTermPaperTeacher as professor_tcc,
             tp.Siape as siape
             FROM termpaper t
             INNER JOIN  course c
             INNER JOIN termpaperteacher tp
             INNER JOIN student s
             INNER JOIN studenttermpaper stp
             WHERE 
             t.IdTermPaper='$idAtual'
             AND tp.CourseId=c.IdCourse
             AND '$idAtual'=stp.TermPaperId
             AND s.CourseId=c.IdCourse");
             $professortcc=mysqli_fetch_array($dadosProfessorTCC);
            ?>
          
       <div class="container" alingn="center">
       
       <fieldset>
       <img src="img/Capturar.png">
            <h5>
                Declaração
            </h5>
            <p>Declaramos que <strong><?=$co_orientador?></strong>, Professor do Ensino
                Básico, Técnico e Tecnológico, Matrícula SIAPE nº <strong><?=$aux2["siapei"]?></strong>,
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
            <?php if($segundo_aluno!=NULL){?>
                <p>
                Aluno: 
                <strong><?=$segundo_aluno?></strong>
            </p>
            <?php } ?>
            
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
             <?php 
            $dataInicio=date("d/m/Y", strtotime($formulario["dataInicio"]));
            $dataFim=date("d/m/Y", strtotime($formulario["dataFim"]));
           
            $partes = explode("/", $dataInicio);
            $diaInicio = $partes[0];
            $mesInicio = $partes[1];
            $anoInicio = $partes[2];

            $partesFim = explode("/", $dataFim);
            $diaFim = $partesFim[0];
            $mesFim = $partesFim[1];
            $anoFim = $partesFim[2];
            
            ?>
            <p>
            Periodo de Execução: 
                <strong>
                <?=$mesInicio?> de <?=$anoInicio?>
                até <?=$mesFim?> de <?=$anoFim?>
                </strong>
            </p> 
           <p>Lages(SC), <?=$dia?> de <?= $meses[date('m')]?> de <?=$ano?></p>

           <div class ="row">
                <div class="input-field col s6">
                <p>Prof. <?=$coordenador["nome_coordenador"]?> <br>Coord. do Curso de <?=$coordenador["curso"]?>
                <br>Matrícula SIAPE nº <?=$coordenador["siape"]?>.</p>
                </div>
                <div class="input-field col s6">
                <p>Prof. <?=$professortcc["professor_tcc"]?> <br>Professor  do Trabalho 
                    de Conclusão de Curso <br>Matrícula SIAPE nº <?=$professortcc["siape"]?>.</p>
                </div>
           </div>
           
       </fieldset>
     
      </div>
        <?php } ?>
    </div>
   <?php } ?>

    <?php include("rodape.php"); ?>
</body>
</html>
