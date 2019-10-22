<?php 
    include("conecta.php");
    
    $id_orientador=$_GET["idexc"];
    $id=mysqli_query($conexao, "SELECT * FROM advisor WHERE IdAdvisor = '$id_orientador'");
    $id_user=mysqli_fetch_array($id);

    $confere=mysqli_query($conexao, "SELECT * FROM advisor INNER JOIN advisortermpaper
    WHERE IdAdvisor = '$id_orientador' AND AdvisorId='$id_orientador'");
    $orientador=mysqli_fetch_array($confere);
    
    if($orientador==null){
        mysqli_query($conexao, "DELETE FROM advisor WHERE IdAdvisor = '$id_orientador'");
        mysqli_query($conexao, "DELETE FROM users WHERE IdUser = '$id_user[UserId]'");
        header("location:listagemOrientadores.php?remove=1");
    }else{
        header("location:listagemOrientadores.php?remove=0");
    }
   

   

?>
