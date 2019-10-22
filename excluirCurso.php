<?php 
    include("conecta.php");
    
    $id_curso=$_GET["idexc"];

    $verifica_professor_tcc=mysqli_query($conexao,"SELECT * FROM termpaperteacher inner join course
    WHERE CourseId='$id_curso' AND CourseId=IdCourse");
    $professor_tcc=mysqli_fetch_array($verifica_professor_tcc);
   
    $verifica_aluno=mysqli_query($conexao,"SELECT * FROM student inner join course
    WHERE CourseId='$id_curso' AND IdCourse=CourseId");
    $aluno=mysqli_fetch_array($verifica_aluno);

   if ($professor_tcc==NULL && $aluno==NULL) {
    mysqli_query($conexao, "DELETE FROM course WHERE IdCourse = '$id_curso'");
    header("location:listagemCurso.php?remove=1");
   

   }else{
    header("location:listagemCurso.php?remove=0");
   }

    
?>
