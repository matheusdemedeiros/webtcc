<!DOCTYPE html>
<html>

<head>
    
    <meta charset="UTF-8">


</head>

<body>

    <?php 
		$cabecalho_title = "Lista do TCC";
		include("cabecalho.php"); 
	?>
    <table class="container" width="100%"  borde="1" bordercolor="#EEE" cellspacing="0" cellpadding="10">
 
        <tr>
 
            <td>
 
                <strong>Nome</strong>
 
            </td>
 
            <td>
 
                <strong>Orientador</strong>
 
            </td>
 
            <td>
 
                <strong>Co-orientador</strong>
 
            </td>
 
            <td>
 
                <strong>Tema</strong>
 
            </td>

            <td width="10">
 
                <strong>Alterar</strong>
 
            </td>
 
            <td Width="10">
 
                <strong>Excluir</strong>
 
            </td>
 
        </tr>

        <?php
            
            include("conecta.php");
            $dados = mysqli_query($conexao, "SELECT * FROM termpaper t
            INNER JOIN student s
            INNER JOIN  advisortermpaper atp
            INNER JOIN advisor a
            WHERE t.IdTermPaper=s.TermPaperId AND t.IdTermPaper=atp.TermPaperId
            AND a.IdAdvisor=atp.AdvisorId
            ORDER BY IdTermPaper");
            while ($termPaper = mysqli_fetch_array($dados)){
                
            ?>

        <tr>
            
            <td>
                
                <?=
                    $termPaper["NameStudent"]
                ?>
            
            </td>
            
            <td>
            <?= $termPaper["NameAdvisor"]?>
            
            </td>

            <td>
            <?= $termPaper["NameAdvisor"]?>
               
            
            </td>
            
            <td>
            
                <?=
                    $termPaper["Topic"]
                ?>
            
            </td>

            <td alingn="center"><a href="editarTCC.php?editaid=<?=$termPaper['IdTermPaper']?>" 
            href="editarTCC.php?editaidcourse=<?=$termPaper['IdCourse']?>"> <i class="material-icons" style="color: #00e676">edit</i></a></td>
            
            <td alingn="center"><a href="#" onclick="excluirTCC(<?=$termPaper['IdTermPaper']?>)"><i class="material-icons" style="color: #00e676">delete</i></a></td>
        
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
