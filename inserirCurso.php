<?php

include("conecta.php");


$nome = $_POST['nome'];
$coordenador=$_POST['coordenador'];
$matricula=$_POST['matricula'];


mysqli_query($conexao,"insert into course(NameCourse,NameCourseCoordinator,SiapeCourseCoordinator) values('$nome',
'$coordenador','$matricula')");
 
header('Location:listagemCurso.php');

?>
