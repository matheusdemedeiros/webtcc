<?php 
    include("conecta.php");
    
    $recid = $_POST['fid'];
    $recnome = $_POST['nome'];
    $recmatricula = $_POST['registration'];
    $recemail = $_POST['email'];
    
    $reccurso =$_POST['curso'];

    mysqli_query($conexao, "update student set NameStudent='$recnome',
    Registration='$recmatricula',CourseId='$reccurso' where IdStudent='$recid'");
    
    $id=mysqli_query($conexao,"Select * from student where IdStudent='$recid'");
    $id_user=mysqli_fetch_array($id);
    mysqli_query($conexao,"update users 
    set Email='$recemail' where IdUser='$id_user[UserId]'");
    header("location:listagemAlunos.php");
?>
