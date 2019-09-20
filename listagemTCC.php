<!DOCTYPE html>
<html>

<body>

    <?php 
		$cabecalho_title = "Lista do TCC";
		include("cabecalho.php"); 
	?>
    <div class="container">
        <button class= "btn" style="background-color: #00e676" type="submit" name="Cadastrar">
        <a class = "material-icons" href="cadastrogrupoTCC.php" style="color: #ffffff">add</a>
        </button>
    </div>

    <table class="container" width="100%"  borde="1" bordercolor="#EEE" cellspacing="0" cellpadding="10">
 
        <tr>
        <td>
            <strong>ID</strong>
        </td>
            <td>
                <strong>Título</strong>
            </td>
            <td>
 
                <strong>Nome</strong>
 
            </td>
 
            <td>
 
                <strong>Orientador</strong>
 
            </td>
 
            <td>
 
                <strong>Co-orientador</strong>
 
            </td>
 

            <td width="10">
 
                <Strong>Alterar</Strong>
 
            </td>
 
            <td Width="10">
 
                <strong>Excluir</strong>
 
            </td>
            <td>
 
                <strong>Criar Formulario</strong>

            </td>
 
        </tr>

        <?php
            
            include("conecta.php");
            $dados = mysqli_query($conexao, "SELECT t.IdTermPaper as id_tcc, t.Title as titulo,s.NameStudent as
            nome_aluno, a.NameAdvisor as orientador, atp.AdvisorType as tipo_orientador,atp.TermpaperId
            as tcc_id FROM termpaper t
            INNER JOIN student s
            INNER JOIN  advisortermpaper atp
            INNER JOIN advisor a
            WHERE t.IdTermPaper=s.TermPaperId AND t.IdTermPaper=atp.TermPaperId
            AND a.IdAdvisor=atp.AdvisorId 
            GROUP BY  orientador");
            
            while ($termPaper = mysqli_fetch_array($dados)){
                echo var_dump($termPaper) . "<br><br>";

            ?>
           
        <tr>
            <td>
                <?=$termPaper["id_tcc"]?>    
            </td>
            <td>
                    <?=$termPaper["titulo"]?>
            </td>

            <td>
                
                <?=
                    $termPaper["nome_aluno"]
                ?>
            
            </td>

            <?php
           if ($termPaper["tipo_orientador"]=="Advisor"
           && $termPaper["tcc_id"]==$termPaper["id_tcc"]) {?>
                       <?php $orientador= $termPaper["orientador"]?>
                 <?php  }  elseif ($termPaper["tipo_orientador"]=="CoAdvisor" && 
            $termPaper["tcc_id"]==$termPaper["id_tcc"]) { ?> 
                <?php $co_orientador=$termPaper["orientador"]?>  
            <?php } ?>
                
            <?php if(isset($termPaper["tipo_orientador"]) && $termPaper["tipo_orientador"]!="CoAdvisor"){?>
            <?php  $co_orientador="Não tem" ?>
            <?php }?>
            
            <td>
           
           <?=$orientador?>
            
            </td>

           <td>
           <?=$co_orientador?>
            </td>
            <td alingn="center"><a href="editarTCC.php?editaid=<?=$termPaper['id_tcc']?>" 
            href="editarTCC.php?editaidcourse=<?=$termPaper['IdCourse']?>"> <i class="material-icons" style="color: #00e676">edit</i></a></td>
            
            <td alingn="center"><a href="#" onclick="excluirTCC(<?=$termPaper['id_tcc']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
           
           <td alingn="center"><a href="formularioAcompanhamento.php?formid=<?=$termPaper['id_tcc']?>">
           <i class="material-icons" style="color: #00e676">library_books</i></a></td>
        </tr>
    
        <?php
            
            }
        
        ?>

    </table>
    <?php
        
        include("rodape.php");
    
    ?>
    
</body>

</html>
