<?php 
    include("conecta.php");
    
    $recid=$_GET["idexc"];
    $id=mysqli_query($conexao, "SELECT * FROM termpaperteacher WHERE IdTermpaperTeacher = '$recid'");
    $id_user=mysqli_fetch_array($id);

    mysqli_query($conexao, "DELETE FROM termpaperteacher WHERE IdTermPaperTeacher = $recid");
    
    mysqli_query($conexao, "DELETE FROM users WHERE IdUser = '$id_user[UserId]'");

    header("location:listagemProfessorTCC.php");

?>
