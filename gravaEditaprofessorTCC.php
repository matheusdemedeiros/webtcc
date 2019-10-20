<?php 
    include("conecta.php");
    
    $recid = $_POST['fid'];
    $recnome = $_POST['nome'];
    $recemail = $_POST['email'];
    
    $matricula=$_POST["matricula"];
    $curso=$_POST["curso"];

    mysqli_query($conexao, "update termpaperteacher set 
    NameTermPaperTeacher='$recnome',
    Siape='$matricula',CourseId='$curso' where IdTermPaperTeacher='$recid'");

    $id=mysqli_query($conexao,"Select * from termpaperteacher where IdTermPaperTeacher='$recid'");
    $id_user=mysqli_fetch_array($id);
    mysqli_query($conexao,"update users 
    set Email='$recemail' where IdUser='$id_user[UserId]'");

    header("location:listagemProfessorTCC.php");
?>
