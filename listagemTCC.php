<!DOCTYPE html>
<html>
<body>
    <?php 
		$cabecalho_title = "Lista do TCC";
		include("cabecalho.php"); 
        session_start();    
        $id_user = $_SESSION['name_session'];
	?>

    <div>
    <a  class="waves-effect  green accent-3 btn" href="cadastrarGrupoTCC.php?curso=<?=$id_user?>">
    <i class="material-icons right">add</i>Adicionar</a>
       
    </div>
<div>
    <table width="100%"  borde="1" bordercolor="#EEE" cellspacing="0" cellpadding="10">
 
        <tr>
            <td>
                <strong>Título</strong>
            </td>
            <td>
 
                <strong>Aluno</strong>
 
            </td>
            <td>
 
                <strong>Aluno</strong>

            </td>
 
            <td>
 
                <strong>Orientador</strong>
 
            </td>
 
            <td>
 
                <strong>Co-orientador</strong>
 
            </td>
 

            <td width="10">
 
                <strong>Alterar</strong>
 
            </td>
 
            <td Width="10">
                <strong>Excluir</strong>
            </td>
            <td>
                <strong>Registro da Reunião</strong>
            </td>
            <td>
                <strong>Ver Registros</strong>
            </td>
            <td>
                <strong> Gerar Declaração</strong>
            </td>
 
        </tr>

        <?php
            
            include("conecta.php");
            $professor_tcc=mysqli_query($conexao,"SELECT CourseId FROM termpaperteacher 
            WHERE '$id_user' = UserId");
            $curso_do_professor_tcc= mysqli_fetch_array($professor_tcc);
            $dados = mysqli_query($conexao, "SELECT t.IdTermPaper as id_tcc, t.Title 
            as titulo FROM termpaper t
            INNER JOIN student s
            INNER JOIN users u
            INNER JOIN course c
            INNER JOIN termpaperteacher tpt
            INNER JOIN studenttermpaper stp
            WHERE t.IdTermPaper=stp.TermPaperId
            AND stp.StudentId=s.IdStudent
            AND s.CourseId='$curso_do_professor_tcc[CourseId]'
            AND '$curso_do_professor_tcc[CourseId]'=c.IdCourse
            GROUP BY titulo");
            
            while ($termPaper = mysqli_fetch_array($dados)){
              

            ?>
            <?php
             include("conecta.php");
             $idAtual=$termPaper["id_tcc"];
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
             $idAtual=$termPaper["id_tcc"];
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
             if ($co_orientador==NULL) {
                $co_orientador="Não Tem";
             }
             
           ?>
            <?php
             include("conecta.php");
             $idAtual=$termPaper["id_tcc"];
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
             $idAtual=$termPaper["id_tcc"];
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
             if ($segundo_aluno==NULL) {
                 $segundo_aluno="Não Tem";
             }
             
           ?>
          
        <tr>
            <td>
                    <?=$termPaper["titulo"]?>
            </td>
            <td>
                <?=
                    $primeiro_aluno
                ?>
            </td> 
            <td>
                <?=
                    $segundo_aluno
                ?>
            </td>
            <td>
           
           <?=$orientador?>
            
            </td>

           <td>
          <?=$co_orientador?>
            </td>
            <td alingn="center"><a href="editarTCC.php?editaid=<?=$termPaper['id_tcc']?>"> 
            <i class="material-icons" style="color: #00e676">edit</i></a></td>
            
            <td alingn="center"><a href="#" onclick="excluirTCC(<?=$termPaper['id_tcc']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
           
           <td alingn="center"><a href="formularioAcompanhamento.php?formid=<?=$termPaper['id_tcc']?>">
           <i class="material-icons" style="color: #00e676">library_books</i></a></td>
           <td alingn="center"><a href="listagemFormulariosAcompanhamento.php?id=<?=$termPaper['id_tcc']?>">
           <i class="material-icons" style="color: #00e676">list</i></a></td>
           <td alingn="center"><a href="gerarDeclaracao.php?id=<?=$termPaper['id_tcc']?>">
           <i class="material-icons" style="color: #00e676">assignment</i></a></td>
        </tr>
    
        <?php
            
            }
        
        ?>

    </table>
    </div>
    <?php
        
        include("rodape.php");
    
    ?>
    
</body>

</html>
