<?php 
    include("conecta.php");
    
    $recid = $_POST['fid'];
    $recnome = $_POST['nome'];
    $reccoordenador=$_POST['coordenador'];
    $matricula=$_POST['matricula'];    

    mysqli_query($conexao, "UPDATE course set NameCourse='$recnome',
    NameCourseCoordinator='$reccoordenador',
    SiapeCourseCoordinator='$matricula'
    where IdCourse='$recid'");
    header("location:listagemCurso.php");
?>
